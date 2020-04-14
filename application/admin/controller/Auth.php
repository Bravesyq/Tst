<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

// 权限控制器
class Auth extends Common{

    public function authlist(){
        $info = Db::table('auth') -> group('auth_path') -> paginate(6,false,['query'=>request()->param()]);

        $this -> assign('info',$info);
        return view();
    }
    
    // 权限添加
    public function tianjia(){
        // 两个逻辑：展示、收集
        if(!empty($_POST)){

            $data = $_POST;
            $a = Db::name('auth') -> insert($data);
            // ①根据已有的数据 生成一条新的
            
            // 获取最大的ID
            $newid=Db::table("auth")->max("auth_id");

            // ②制作auth_path
                // ①顶级权限 auth_path======新记录主键ID值
                if($data['auth_pid']==0){        
                    $path = $newid;
                    
                }else{

                    // ②非顶级权限 根据pid获得父级权限信息，进而获得其"全路径"
                    // 父级全路径----新记录主键ID值
                    $path = $data['auth_pid']."-".$newid;
                }
                


            // ③制作auth_level
            // 全路径里边"-"数量就是auth_level的值
            // substr_count()计算机一个字符串 某个字符的个数
            // $level = substr_count($path,'-');

            $sql = "update auth set auth_path='$path' where auth_id = '$newid'";

            // $sql = "update auth set auth_path='$path',auth_level='$level' where auth_id = '$newid'";
            // 执行sql语句
            $ifdata=Db::execute("$sql");
            if($ifdata){
                $this->success('新增成功','Auth/authlist');
            }else{
                $this->error('新增失败');
            }

        }else{
            // 获取上级（顶级）权限信息
            $auth_infoA = Db::table('auth') -> where("auth_level=0") -> select();

            $this -> assign('auth_infoA',$auth_infoA);

            return view();
        }


    }
      
}