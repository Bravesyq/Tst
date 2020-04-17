<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

// 角色控制器
class Zhuguan extends Common{
    // 列表展示
    public function index(){
      // 取出用户的唯一ID
      $user_id = session('user_id');
      $my_data = Db::table('st_user') -> field('id,teac_id,bumen') -> where("id = $user_id") -> find();
      
      $my_bumen = $my_data['bumen'];

      // 查询主管部门下面所有人
      $teacs = Db::table('st_user') -> field('id,teac_id,nickname') -> where(array('bumen'=>$my_bumen)) -> select();

      // 遍历数组
      $allteac_id = array();
      foreach ($teacs as $key => $value) {
        $allteac_id[] = $value['teac_id'];
      }
      // 把数组转换为字符串
      $strteac_id = implode(",", $allteac_id);
      // 判断前台是否有种
      if (!empty(input('teac_id'))) {
          $map['s1.user_id'] = input('teac_id');
          $this->assign('get_teac_id',input('teac_id'));

      }else{
          // 查询条件
          $map['s1.user_id'] = array("in",$strteac_id);
      }

      // 姓名的筛选条件
      if(!empty(input('get.name'))){
          $name = input('get.name');
          $map['s1.name'] = array("like","%$name%");
      }

      if(!empty(input('get.time'))){
          $map['s1.time'] = input('get.time');
      }

      $map['s1.is_del'] = '1';
      
      $tot = Db::table('st_information')
                -> field("s1.*,s2.nickname")
                -> alias("s1") 
                -> join("st_user s2","s1.user_id = s2.teac_id") 
                -> where($map) 
                -> count();
      $qian = Db::table('st_information')
                -> field("s1.*,s2.nickname")
                -> alias("s1") 
                -> join("st_user s2","s1.user_id = s2.teac_id") 
                -> where($map) 
                -> sum('earnest_money');
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
      $this->assign('qian',$qian);

      // 职员
      $this->assign('teacs',$teacs);
      
      return view();
    }

}