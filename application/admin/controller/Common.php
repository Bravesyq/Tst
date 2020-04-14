<?php



namespace app\admin\controller;

// 引入系统数据类

use think\Db;

// 引入系统控制器类

use think\Controller;

class Common extends Controller{



	public function _initialize(){

		

		$id = session('user_id');

		

		//判断用户是否登录 如果是空就重定向到登录页面

		if(empty($id)){

			$this->redirect('Login/index');

		}

	

		//使用常量获取当前路由中的控制器名和方法名

		$controller = strtolower(request()->controller());

		$action = strtolower(request()->action());

	

		// 把当前控制器和方法拼接起来

		$nowac = $controller."-".$action;

		// 把拼接的控制器和方法第一个字母大写

		$nowac = ucwords($nowac);  

		

		

        //获取当前用户的等级

        $user_id = session('user_id');

        $user_name = session('user_name');



        // 获得全部权限信息并给模板

        $user_info = Db::table('st_user') -> find($user_id);



  		$roleid = $user_info['rou_id'];

  		// 查询用户的等级

  		$roleinfo = Db::table('role') -> find($roleid);

  		// 获取用户应有的权限

		$auth_ac = $roleinfo['role_auth_ac'];

		// 分隔权限转换成数组

		$add = explode(',',$auth_ac);





		// 公共的Index-index Index-welcome 控制器

		$allow_ac = "Index-index,Index-welcome,Index-a404,Index-add_studentinfo,Index-pass_edit";

		// 以逗号分隔公共控制器方法 转换成数组

		$public_ac = explode(',',$allow_ac);

		

		

		



		//当用户不是超级管理员的时候进行权限判断

		if ($user_name !== 'admin') {

			// 判断用户操作的方法是否在可允许的范围内

			if(!in_array($nowac, $add) && !in_array($nowac, $public_ac)){

				echo "<script>window.top.location.href = 'http://sale.sdsthk.com/public/admin.php/';</script>";

				//用户没有权限

				// echo "<script>alert('没有权限')</script>";
				
				die;

			

			}

		}



	}



	public function _empty(){



		$this->redirect('Index/index');



	}



}