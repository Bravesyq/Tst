<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

// 角色控制器
class Boss extends Common{
    // 列表展示
    public function index(){
      	// 查询产品表
      	$chanpinarr = Db::table('st_product') -> where(array('product_stat'=>'1')) -> select();
        	$liang = Db::table('st_liang') -> select();

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
        // 姓名的筛选条件
        if(!empty(input('get.verification_dsk'))){
          $map['s1.verification_dsk'] = input('get.verification_dsk');
        }


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
  		// 产品
  		$this->assign('chanpinarr',$chanpinarr);
  		$this->assign('liang',$liang);

  		return view();
    }

    // boss 修改姓名
    public function ajax_edit_name(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('name'=>input('post.name')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss 修改手机号
    public function ajax_edit_lxfs(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('lxfs'=>input('post.lxfs')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss 修改地址
    public function ajax_edit_address(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('address'=>input('post.address')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改产品
    public function ajax_edit_product(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('product'=>input('post.product')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改产品数量
    public function ajax_edit_number(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('number'=>input('post.number')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改押金
    public function ajax_edit_earnest_money(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('earnest_money'=>input('post.earnest_money')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改支付方式
    public function ajax_edit_pay_type(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('pay_type'=>input('post.pay_type')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改代收款
    public function ajax_edit_ds_money(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('ds_money'=>input('post.ds_money')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改状态
    public function ajax_edit_verification_dsk(){
    	$data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('verification_dsk'=>input('post.verification_dsk')));
  		if( $data !== false){
  		  	echo json_encode(array('code'=>200,'msg'=>'修改成功'));
  		}else {
  		  	echo json_encode(array('code'=>400,'msg'=>'修改失败'));
  		}
    }
    // boss ajax修改快递
    public function ajax_edit_express(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('express'=>input('post.express')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改快递单号
    public function ajax_edit_express_number(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('express_number'=>input('post.express_number')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改快递状态
    public function ajax_edit_express_stat(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('express_stat'=>input('post.express_stat')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // boss ajax修改是否复购
    public function ajax_edit_is_purchase(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('is_purchase'=>input('post.is_purchase')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // boss ajax修改进线日期
    public function ajax_edit_line_time(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('line_time'=>input('post.line_time')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // boss ajax修改成交日期
    public function ajax_edit_deal_time(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('deal_time'=>input('post.deal_time')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 导出
    public function daochu(){
      // 数组格式化
      // 先把实体转换
      $str=str_replace('&amp;','&',input('post.str'));
      
      // 使用函数格式化字符串
      parse_str($str,$arr);
      dump($arr);
    }
}