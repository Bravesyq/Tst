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
        $post['verification_dsk'] = '待审核';

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
    // 员工修改姓名
    public function ajax_edit_name(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('name'=>input('post.name')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工修改手机号
    public function ajax_edit_lxfs(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('lxfs'=>input('post.lxfs')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工修改地址
    public function ajax_edit_address(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('address'=>input('post.address')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工ajax修改产品
    public function ajax_edit_product(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('product'=>input('post.product')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工ajax修改产品数量
    public function ajax_edit_number(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('number'=>input('post.number')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工ajax修改押金
    public function ajax_edit_earnest_money(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('earnest_money'=>input('post.earnest_money')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工ajax修改支付方式
    public function ajax_edit_pay_type(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('pay_type'=>input('post.pay_type')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // 员工ajax修改代收款
    public function ajax_edit_ds_money(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('ds_money'=>input('post.ds_money')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // 员工ajax修改快递状态
    public function ajax_edit_express_stat(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('express_stat'=>input('post.express_stat')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // 员工ajax修改是否复购
    public function ajax_edit_is_purchase(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('is_purchase'=>input('post.is_purchase')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    // 员工ajax修改进线日期
    public function ajax_edit_line_time(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('line_time'=>input('post.line_time')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }

    // 员工 ajax修改成交日期
    public function ajax_edit_deal_time(){
      $data = Db::table('st_information')->where(array('id'=>input('post.id')))->update(array('deal_time'=>input('post.deal_time')));
      if( $data !== false){
          echo json_encode(array('code'=>200,'msg'=>'修改成功'));
      }else {
          echo json_encode(array('code'=>400,'msg'=>'修改失败'));
      }
    }
    
}