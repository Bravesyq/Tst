<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;
class Index extends Common{
    //首页
    public function index(){
        // 获取管理员ID
        $admin_id = session('user_id');

        $admin_name = session('user_name');

        
        // 根据ID 查出管理员信息
        $admin_info=Db::table("st_user")->where("id = $admin_id")->find();
        
        // 查出管理员级别
        $role_id = $admin_info['rou_id'];

        // 根据$role_id 获取本身记录信息
        $role_info = Db::table("role")->where("role_id = $role_id")->find();
        $auth_ids = $role_info['role_auth_ids'];
     
        // 根据$auth_ids 获得具体权限
        // admin超级管理员没有权限限制
        if($admin_name === 'admin'){
            // 父级
            $auth_infoA = Db::table("auth")->where("auth_level = 0")->order("auth_id asc")->select();
            // 子级
            $auth_infoB = Db::table("auth")->where("auth_level = 1")->order("auth_id asc")->select();
        }else{
            // 父级
            $auth_infoA = Db::table("auth")->where("auth_level = 0 and auth_id in ($auth_ids)")->order("auth_id asc")->select();
            // 子级
            $auth_infoB = Db::table("auth")->where("auth_level = 1 and auth_id in ($auth_ids)")->order("auth_id asc")->select();
        }
       
        
        $this -> assign('auth_infoA',$auth_infoA);

        $this -> assign('auth_infoB',$auth_infoB);

        
        return view();
    }
    // welcome
    public function welcome(){
     
        return view();
    }

    public function login(){
    	return view();
    }

    public function a404(){
        return view();
    }

    // 学生添加信息方法
    public function add_studentinfo(){
        if(input('post.')){
            $teac_id = session('user_teac_id');
            
            $teac_zhujian_id = session('user_id');

            $teac_nickname = session('user_nickname');

            // 数组格式化
            // 先把实体转换
            $str = str_replace('&amp;','&',input('post.str'));
            // 使用函数格式化字符串
            parse_str($str,$arr);
                    
            $arr['jibie'] = ' ';
            $arr['addtime'] = time();
            $arr['waters'] = 'N';
            $arr['waters_time'] = time();
            $arr['teac_id'] = $teac_id;
            $arr['source'] = '1';


            $p = $arr;
            
            echo'<pre>';
            print_r($p);
            echo'</pre>';
              
            echo'<pre>';
            print_r($arr);
            echo'</pre>';
            
            die;
            
            $data = Db::name('st_student') -> insert($arr);
            
            if( $data ){
                echo json_encode(array('code'=>1,'msg'=>'添加成功'));
            }else {
                echo json_encode(array('code'=>2,'msg'=>'添加失败'));
            }
        }else{
            echo json_encode(array('code'=>404,'msg'=>'链接失败'));
        }

    }
    
     public function pass_edit(){
        if(input('post.')){
            $pass = input('post.pass');
            $id = session('user_id');
            $arr['pass'] = substr(md5($pass),3);
    
            $data = Db::table("st_user")->strict(false)->where("id = $id")->update($arr);
            session(null);
            // 如果执行成功返回 json数据1   失败返回json数据2
            if($data !== false){
                die('{"code":1,"msg":"修改成功"}');
            }else{
                die('{"code":2,"msg":"修改失败"}');
            }
            
        }else{
            return view();
        }
        
    }

}
