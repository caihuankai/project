<?php

namespace app\admin\event;


class Apply extends EventApp
{
    use \app\admin\traits\ChangeStatusEvent;
    
    
    
    
    /**
     * Apply constructor.
     */
    public function __construct()
    {
        $this->statusValue = [2, 3];
    }
    
    protected function statusDataFunc($update)
    {
        $ids = $this->getIds();
        $status = $update[$this->statusKey];
    
        if (empty($ids)) {
            return [];
        }
    
        /** @var \app\admin\model\Apply $model */
        $model = $this->getCurrentModel();
        $typeTinyint = $model->getMysqlTinyint('type');
        
        $flowNum = $typeTinyint->getValueByActionValue('flow');
        $liveNum = $typeTinyint->getValueByActionValue('live');
        $myUrl = \app\common\model\RedirectUrl::getMyUrl();
        $date = date('Y-m-d');
        $messageArr = [
            'weChat' => [
                $flowNum => [
                    2 => <<<TAG
大策略流量主审核成功
{$date}

您好，您申请的流量主已通过大策略审核；您可分享邀请链接，邀请小伙伴。享受分成收益。

<a href='{$myUrl}'>[点击这里]可马上去邀请！</a>
TAG
,
                    3 => <<<TAG
大策略流量主审核失败
{$date}

您好，您申请的流量主审核失败；您可在大策略公众号-快速上手-联系我们，联系客服咨询详情。感谢您的支持！
TAG
,
                ],
                $liveNum => [
                    2 => <<<TAG
大策略我的空间审核成功
{$date}

您好，您申请的空间已通过大策略审核；您可发布Live直播，创建直播课程和发布观点。感谢您的支持。

<a href='{$myUrl}'>[点击这里]可马上去发布了！</a>
TAG
,
                    3 => <<<TAG
大策略我的空间审核失败
{$date}

您好，您申请的空间审核失败；您可在大策略公众号-快速上手-联系我们，联系客服咨询详情。感谢您的支持！
TAG
,
                ],
            ],
            'sms' => [
                $flowNum => [
                    2 => '【大策略】您好，您申请的流量主已通过大策略审核；您可分享邀请链接，邀请小伙伴。享受分成收益。邀请方式：进入大策略公众号-我的-复制分享邀请链接。',
                    3 => '【大策略】您好，您申请的流量主审核失败；您可在大策略公众号-快速上手-联系我们，联系客服咨询详情。感谢您的支持！',
                ],
                $liveNum => [
                    2 => '【大策略】您好，您申请的空间已通过大策略审核；您可发布Live直播，创建直播课程和发布观点。感谢您的支持。赶快打开大策略公众号看看吧！',
                    3 => '【大策略】您好，您申请的空间审核失败；您可在大策略公众号-快速上手-联系我们，联系客服咨询详情。感谢您的支持！',
                ],
            ],
        ];
        $result = [];
        
        
        $data = $model->where(['id' => ['in', $ids], 'type' => ['in', $typeTinyint->getListByActionValueTrue('typeIdIsUserId')], ])
            ->field('type, type_id, status, phone')->select();
    
        $userIds = $phoneData = [];
        foreach ($data as $item) {
            $userIds[] = $item['type_id'];
        }
        
        $openIds = (new \app\admin\model\ThirdLogin())->getUserOpenId($userIds);
    
        foreach ($data as $item) {
            if ($status == $item['status'] || empty($openIds[$item['type_id']])){
                continue;
            }
            $openId = $openIds[$item['type_id']];
    
            $result[$openId] = $messageArr['weChat'][$item['type']][$status];
            $phoneData[$item['type']][] = $item['phone'];
        }
        
        foreach ($phoneData as $type => $phones) { // 理论上只会有一种$type
            if (!empty($phones)) {
                WSendSMS(join($phones, ','), $messageArr['sms'][$type][$status]); // 直接发送短信
            }
        }
        
        return $result;
    }
    
}