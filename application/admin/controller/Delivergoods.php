<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

// 角色控制器
class Delivergoods extends Common{
    // 列表展示
    public function index(){

    	// 查询所有员工
      	$teacs = Db::table('st_user') -> field('id,teac_id,nickname') -> select();
		// 判断前台是否有单独的员工
		if (!empty(input('teac_id'))) {
			$map['s1.user_id'] = input('teac_id');
		}

		// 姓名的筛选条件
		if(!empty(input('get.name'))){
			$name = input('get.name');
			$map['s1.name'] = array("like","%$name%");
		}
    	$map['s1.verification_dsk'] = '已通过';
      	$map['s1.is_del'] = '1';
      	
      	$tot = Db::table('st_information')
			-> field("s1.*,s2.nickname")
			-> alias("s1") 
			-> join("st_user s2","s1.user_id = s2.teac_id") 
			-> where($map) 
			-> count();

      	$data = Db::table('st_information')
            -> field("s1.*,s2.nickname")
			-> alias("s1") 
			-> join("st_user s2","s1.user_id = s2.teac_id") 
			-> where($map) 
			-> order("s1.id desc")
			-> paginate(15,false,['query'=>request()->param()]);

      // 分配数据
      $this->assign('data',$data);
      // 总数
      $this->assign('tot',$tot);
      // 职员
      $this->assign('teacs',$teacs);
      
      return view();
    }

}