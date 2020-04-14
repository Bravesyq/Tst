<?php

namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;
class Error extends Controller{

	public function index(){
        $this->redirect('index/index');

	}

}