<?php

namespace app\web\controller;

class Index extends App{
	public function index(){
		$redirectUrl = $this->request->param('redirectUrl');
		if (!empty($redirectUrl)) {
			$sessionId = $this->request->param('sessionId');
			if (!empty($sessionId)) {
				cookie('PHPSESSID', base64_decode($sessionId));
			}
			$redirectUrl = urldecode($redirectUrl);
			$this->redirect($redirectUrl);
		}
		return $this->fetch('./index');
	}
}