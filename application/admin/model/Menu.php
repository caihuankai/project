<?php
namespace app\admin\model;

use app\common\model\ModelBase;

/**
 * 菜单管理模型
 * Class Menu
 * @package app\admin\model
 * @author zhengkejian
 * @time 20161021 18:49
 */
class Menu extends ModelBase
{

    /**
     * 获取菜单列表
     * @param string $menuIdStr
     * @return array
     */
    public static function getShowMenuList($menuIdStr = "")
    {
        $menuIdStr = is_array($menuIdStr) ? implode(',', $menuIdStr) : $menuIdStr;
        //超级管理员没有节点数组
        $where = empty($menuIdStr) ? 'hide = 0 and pid = 0' : 'hide = 0 and pid = 0 and id in(' . $menuIdStr . ')';

        $result = db('menu')->field('id,name,pid,url,icon')
            ->where($where)->order("sort,id")->select();
        //dump($result);
        //$menu = self::prepareMenu($result);

        return $result;
    }

    /**
     * 获取菜单信息详情
     * @param $id
     */
    public static function getMenuInfo($id)
    {
        return $result = db('menu')->where('id ="' . $id . '"')->find();
    }

    /**
     * 根据节点数据获取对应的菜单
     * @param $nodeStr
     */
    public static function getMenu($nodeStr = '', $order = "")
    {
        $order = $order == "" ? "sort" : $order;
        //超级管理员没有节点数组
        $where = empty($nodeStr) ? '' : ' id in(' . $nodeStr . ')';

        $result = db('menu')->field('id,name,pid,url,icon,hide,access,sort')
            ->where($where)->order($order)->select();
        //$sql = db('menu')->getLastSql();
        $menu = self::treeMenu($result);
        //print_r($menu);exit;
        return $menu;
    }

    public static function checkMenuLevel($id)
    {
        $result = db('menu')->where('id', $id)->column('pid');
        return $result && $result[0] == 0 ? true : false;
    }

    /**
     * 获取子菜单
     * @param $id
     * @param string $nodeStr
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getMenuById($id, $nodeStr = '')
    {
        $order = "sort";
        //超级管理员没有节点数组
        $nodeStr = is_array($nodeStr) ? implode(',', $nodeStr) : $nodeStr;
        $where = empty($nodeStr) ? 'hide = 0 ' : ' hide = 0 AND id in(' . $nodeStr . ')';
        $idStr = is_array($id) ? implode(',', $id) : $id;
        $where .= " AND pid in ($idStr)";
        $result = db('menu')->field('id,name,pid,url,icon,hide,access,sort')
            ->where($where)->order($order)->select();
        if ($result) {
            foreach ($result as $k => $v) {
                $result[$k]['child'] = self::getMenuById($v['id'], $nodeStr);
            }
        }
        return $result;
    }

    /**
     * 整理菜单住方法 html
     * @param $param
     * @return array
     */
    private static function treeMenu($param)
    {
        $parent = []; //父类
        $child = [];  //子类
        $pid = $array = [];
        foreach ($param as $key => $vo) {
            if ($vo['pid'] == 0) {
                $vo['href'] = '#';
                $vo['level'] = '一';
                $parent[] = $vo;
            } else {
                $vo['href'] = $vo['url']; //跳转地址
                $vo['name'] = "--------" . $vo['name'];
                $child[] = $vo;
            }
            $pid[] = $vo['pid'];
        }

        foreach ($parent as $key => $vo) {
            $array[] = $vo;

            foreach ($child as $k => $v) {

                if ($v['pid'] == $vo['id']) {
                    $v['level'] = '二';
                    $array[] = $v;
                    foreach ($child as $x => $y) {
                        if ($v['id'] == $y['pid']) {
                            $y['level'] = '三';
                            $y['href'] = $y['url']; //跳转地址
                            $y['name'] = "----------------" . $y['name'];
                            $array[] = $y;
                        }
                    }
                    $parent[$key]['child'][] = $v;
                }

            }
        }
        unset($child);
        unset($parent);

        return $array;
    }

    /**
     * 整理菜单方法
     * @param $param
     * @return array
     */
    public static function prepareMenu($param)
    {
        $parent = []; //父类
        $child = [];  //子类

        foreach ($param as $key => $vo) {

            if ($vo['pid'] == 0) {
                $vo['level'] = '一';
                $vo['href'] = '#';
                $parent[] = $vo;
            } else {
                $vo['href'] = "/" . $vo['url']; //跳转地址
                $child[] = $vo;
            }
        }

        foreach ($parent as $key => $vo) {
            foreach ($child as $k => $v) {

                if ($v['pid'] == $vo['id']) {
                    $v['level'] = '二';
                    $parent[$key]['child'][] = $v;
                }
            }
        }
        unset($child);

        return $parent;
    }

    /**
     * 插入菜单信息
     * @param $param
     */
    public function insert($param)
    {
        try {
            $result = $this->validate(true)->allowField(true)->save($param);
            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => $this->id, 'msg' => '添加菜单成功'];
            }
        } catch (\PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑菜单信息
     * @param $param
     */
    public function edit($param)
    {
        try {

            $result = $this->validate(true)->save($param, ['id' => $param['id']]);

            if (false === $result) {
                // 验证失败 输出错误信息
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑菜单成功'];
            }
        } catch (\PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 删除菜单
     * @param $id array|int
     * @return array
     */
    public function del($id)
    {
        try {
            $this->where("id in (" . $id . ")")->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除菜单成功'];

        } catch (\PDOException $e) {
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 获取节点数据
     */
    public static function getNodeInfo($id)
    {
        $result = self::field('id,name,pid')->select();
        $str = "";

        $rule = \app\admin\model\Group::getRuleById($id);

        if (!empty($rule)) {
            $rule = explode(',', $rule);
        }
        foreach ($result as $key => $vo) {
            $str .= '{ "id": "' . $vo['id'] . '", "pId":"' . $vo['pid'] . '", "name":"' . $vo['name'] . '"';

            if (!empty($rule) && in_array($vo['id'], $rule)) {
                $str .= ' ,"checked":1';
            }

            $str .= '},';

        }

        return "[" . substr($str, 0, -1) . "]";
    }
}
