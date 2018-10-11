<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/4/1
 * Time: 10:11
 */

namespace app\wechat\controller;


use app\wechat\model\LiveFocus;

class GeneralizeManage extends App
{
//    protected $noLoginAction = ['getGeneralizelist','getColumnRecommend'];

    /**
     * 获取栏目广告
     * @return \think\response\Json
     */
    public function getGeneralizelist()
    {
        $id = trim(request()->param('id'));
        if (is_numeric($id)&& !empty($id) ){
            $model = new \app\admin\model\GeneralizeManage();
            $where = [
                'affiliation_column' =>$id,
                'status'=>1,
            ];
            $result = $model
                -> where($where)
                ->field('id,ad_title1,ad_title2,ad_img1,ad_img2,ad_target_type1,
                ad_target_type2,affiliation_column,column_place,ad_target_id1,ad_target_id2,
                ad_target_url1,ad_target_url2,ad_target_type_name1,ad_target_type_name2')
                ->select();
            if ($result){
                return $this->sucSysJson($result);
            }else{
                return $this->errSysJson(array(),'该栏目暂无广告！');
            }
        }else{
            return $this ->errSysJson('栏目ID为正整数！');
        }
    }

//    public function getColumnRecommend()
//    {
//        $userid = $this->getUserId();
//        $model = new \app\wechat\model\Column();
//        $results = $model ->alias('c')
//            ->join('talk_qiniu_gallerys qg','c.qiniu_id = qg.id','left')
//            ->field('c.id,c.name,c.level,c.read_num,c.virtual_read_num,c.focus_num,c.virtual_focus_num,qg.qiniuImg')
//            ->where('c.recommend_status',1)
//            ->order('c.sort','dsc')
//            ->select();
//        if (!empty($results)){
//            $data = [];
//            $focusmodel =  new LiveFocus();
//            foreach ($results as $result){
//               $focus = $focusmodel->isFocus($result['id'],$userid);
//               $data[] = [
//                   'id'=>$result['id'],
//                   'name'=>$result['name'],
//                   'level'=>$result['level'],
//                   'read_num'=>$result['read_num']+$result['virtual_read_num'],
//                   'focus_num'=>$result['focus_num']+$result['virtual_focus_num'],
//                   'qiniuImg'=>$result['qiniuImg'],
//                   'isfocus' =>$focus,
//               ];
//           }
//            return $this->sucSysJson($data);
//        }else{
//            return $this->errSysJson('暂无栏目推荐！');
//        }
//    }

}