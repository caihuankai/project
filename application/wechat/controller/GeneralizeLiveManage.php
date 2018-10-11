<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/7/16
 * Time: 14:29
 */

namespace app\wechat\controller;


use app\admin\model\LiveGeneralize;
use app\admin\service\Redis;

class GeneralizeLiveManage extends App
{
    protected $noLoginAction = ['getGeneralizeLiveInfo', 'index','checkPassword'];

    public function index()
    {
        //定位到html的模板页
        // return $this->fetch(APP_PATH . request()->module() . '/view/generalize_live_manage/index.html');
        echo '暂停使用';
    }

    /**
     * 获取推广直播间信息
     */
    public function getGeneralizeLiveInfo()
    {
        $LiveStateModel = new \app\wechat\model\LiveState();
        $LiveGeneralize = new LiveGeneralize();
        $livedata = \app\wechat\model\Live::checkPass();
        $ip = request()->ip();
        if (!empty($ip)) {
            $haswhere = [
                'address_ip' => $ip,
                'create_time' => date('Y-m-d'),
            ];
            $is_has = $LiveGeneralize->db()->table('talk_live_generalize_info')->where($haswhere)->find();

            if (!$is_has) {
                $LiveGeneralize->db()
                    ->table('talk_live_generalize_info')
                    ->insert([
                        'address_ip' => $ip,
                        'create_time' => date('Y-m-d')
                    ]);
            }

        }
        $generalizeData = $LiveGeneralize->where('id>0')->field('id,type,src,sort')->select();

        foreach ($generalizeData as $key => $item) {
            if ($item['type'] != 'right') {
                $generalizeData[$item['type']]['imgSrc'] = $item['src'];
            }
            if ($item['type'] == 'right') {
                $generalizeData[$item['type']][$item['sort']] = ['imgSrc' => $item['src']];
            }
            unset($generalizeData[$key]);
        }


        $status = $LiveStateModel->getState($groupid = 1000010000);
        $result = [
            'push_url' => config('push_url')."1_1000010000?user=99cj&passwd=hc992017win",
            'pull_url' => config('pull_url') . "1_1000010000/playlist.m3u8",
            'generalizeData' => $generalizeData,
            'isPass' => intval($livedata['adapt']) == 1 ? true : false, //true 需要输入密码：false不需要
            'Livestate' => $status,//推流状态 1：正在直播 2：没有直播则播放默认图
        ];
        $msg = $status == 1 ? '正在直播' : '播放默认图';
        return $this->sucSysJson($result, $msg);
    }//end

    /**
     * 验证推广直播间密码
     * @param null $courseId
     * @param null $password
     * @return \think\response\Json
     */
    public function checkPassword($password = null)
    {
        $model = new \app\wechat\model\Live();
        if (empty(trim($password))) return $this->errSysJson('请输入密码');
        $checkData = $model->where(['id' => 10000, 'password' => $password])->field('id,password')->find();
        if (!empty($checkData)) {
            return $this->sucSysJson(['returnCode' => 4200, 'returnStatus' => true, 'LiveID' => 10000], '验证通过！');
        } else {
            return $this->sucSysJson(['returnCode' => 4400, 'returnStatus' => false, 'liveID' => 10000], '验证不通过！');
        }
    }
}