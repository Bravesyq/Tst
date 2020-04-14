<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// 角色控制器
class Role extends Common{
    // 列表展示
    public function rolelist(){
        $info = Db::table('role')-> paginate(15);
        $this -> assign('info',$info);

        return view();
    }

    // 分配权限
    public function distribute(){
        // 获取操作的ID
        $role_id = $_GET['role_id'];
        
        if(!empty($_POST)){
            // ①
            // 获取post的authid
            $authid = $_POST['auth_id'];
            // 用逗号组合$authid
            $authids = implode(',',$authid);

            // ②
            // 制作role_auth_ac 控制器和操作方法链接字符串
            // 根据把选中的权限ID信息，查询对应的权限记录，遍历并从中获得每个权限的 controller 和 action 信息
            $authinfo = Db::table('auth') -> select($authid);
      
            $s = "";
            foreach ($authinfo as $k => $v) {
                if(!empty($v['auth_c'])&&!empty($v['auth_a']))
                $s.=$v['auth_c']."-".$v['auth_a'].",";
            }
            $s = rtrim($s,',');
            
            // 拼接sql 语句
            $sql = "update role set role_auth_ids='$authids',role_auth_ac='$s' where role_id='$role_id'";
            
            // 执行sql语句
            $data=Db::execute("$sql");
            if($data){
                $this->success('新增成功','Role/rolelist');
            }else{
                $this->error('新增失败');
            }
      
        }else{
            $role_info = Db::table('role') -> find($role_id);           
            
            // 查询当前角色已经拥有的权限
            $have_authids = $role_info['role_auth_ids']; //例如：101,103,108
            $have_authids = explode(',',$have_authids);  // 字符串到-》 数组

            // 获得可供选取分配的权限信息
            $auth_infoA = Db::table('auth') -> where('auth_level = 0') -> select(); 

            // 父级
            $map['auth_level'] = array('not in','0');   
            $auth_infoB = Db::table('auth') -> where($map) -> select(); // 子级

            $this -> assign('auth_infoA',$auth_infoA);
            $this -> assign('auth_infoB',$auth_infoB);
            $this -> assign('role_info',$role_info);
            $this -> assign('have_authids',$have_authids);
            
            return view();    
        }

        
        
    }

}