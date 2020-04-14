<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

// 角色控制器
class Staff extends Common{
    // 列表展示
    public function index(){
      // 查询产品表  跟  数量表
      $chanpinarr = Db::table('st_product') -> where(array('product_stat'=>'1')) -> select();
      $liang = Db::table('st_liang') -> select();
      // 取出用户的唯一ID
      $teac_id = session('user_teac_id');
      // 姓名的筛选条件
      if(!empty(input('get.name'))){
          $name = input('get.name');
          $map['name'] = array("like","%$name%");
      }
      // 只显示自己的
      $map['user_id'] = $teac_id;
      $map['is_del'] = '1';

    	$data = Db::table('st_information')
              -> order("id desc")
              -> where($map)
              -> paginate(15,false,['query'=>request()->param()]);
      $tot = Db::table('st_information')
              -> order("id desc")
              -> where($map)
              -> count();

      // 分配数据
      $this->assign('data',$data);
      $this->assign('tot',$tot);

      // 产品
      $this->assign('chanpinarr',$chanpinarr);
      $this->assign('liang',$liang);
      
      return view();
    }

   	// 员工的录入页面
   	public function add_customer(){
      if(input('post.')){
        //获取用户id
        $teac_id = session('user_teac_id');
        $post = input('post.');
        $post['add_luru_time'] = time();
        $post['user_id'] = $teac_id;
        $post['is_del'] = '1';

        $data = Db::table('st_information') -> insert($post);
      }else{
        $product=Db::table('st_product') -> where(array('product_stat'=>'1')) -> select();
        $chanpinnumber = Db::table('st_liang') -> select();
            // 分配数据
        $this->assign('product',$product);

        $this->assign('chanpinnumber',$chanpinnumber);
        return view();
      }
   	}

}