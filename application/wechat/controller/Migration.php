<?php
namespace app\wechat\controller;

use app\common\controller\ControllerBase;
use app\admin\model\MigrationLog;

class Migration extends ControllerBase{
	//数据迁移是把讲师的身份改成学生，把他的live直播间禁用，课程和观点移到公共账号名下，聊天记录清除
	public function migrating(){
		set_time_limit(180);
		$MigrationLogM = new MigrationLog();
		$MigrationLogM->migration_working();
	}
}