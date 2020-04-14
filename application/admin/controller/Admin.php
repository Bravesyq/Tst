<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




class Admin extends Common{
    // 首页
    public function index(){

        $map['s1.nickname'] = ['like','%'.input('name').'%'];

        $data = Db::table('st_user')
                -> field("s1.*,s2.bumen_name") 
                -> alias("s1") 
                -> join("st_bumen s2","s1.bumen = s2.id",'right') 
                -> where($map) 
                -> order("s1.id desc")
                -> paginate(15,false,['query'=>request()->param()]);

        // 分配数据
        $this->assign('data',$data);

        // 加载页面
       	return view();
    }


    // 修改用户
    public function admin_infoedit(){
        $id = input('post.id');

        $map['id'] = $id;

        $list = Db::table('st_user')-> where($map) -> find();

        $bumen=Db::table('st_bumen') -> select();

        $this->assign('bumen',$bumen);


        $this->assign('list',$list);
        return $this->fetch('admin_infoedit');
    }
    
    // 修改用户的保存
    public function adminusersave(){

        $obje = input('post.');

        $list = $obje['obj'];
        $id = $list['id'];

        $list['pass'] = substr(md5($list['pass']),3);

        $data = Db::table('st_user')->where('id',$id)->update($list);

        if ($data !== false) {
            $this->success('{"code":1,"msg":"修改成功"}');
        }else{
            $this->error('{"code":2,"msg":"修改失败"}');
        }

    }
    
    // 添加页面
    public function addadminuser(){
        if(input('post.')){
            // 随机生成老师的唯一ID
            $teac_id = mt_rand(111111,999999);
            // 数组格式化
            // 先把实体转换
            $str = str_replace('&amp;','&',input('post.str'));
            // 使用函数格式化字符串
            parse_str($str,$arr);
 
            
            $arr['pass'] = substr(md5($arr['pass']),3);
            $arr['addtime'] = time();
            $arr['statu'] = 1;
            $arr['teac_id'] = $teac_id;
            $data = Db::name('st_user') -> insert($arr);
            if( $data ){
                echo json_encode(array('code'=>1,'msg'=>'添加成功'));
            }else {
                echo json_encode(array('code'=>2,'msg'=>'添加失败'));
            }
        }else{
            $data=Db::table('st_user') -> field("id,nickname") -> where("rou_id = 11") -> select();
            $bumen=Db::table('st_bumen') -> select();
            
            $this->assign('data',$data);
            $this->assign('bumen',$bumen);
            return view();
        }

        
    }
    // 添加保存页面
    public function ajax_addslhadminuser(){
        // 随机生成老师的唯一ID
        $teac_id = mt_rand(111111,999999);
        // 数组格式化
        // 先把实体转换
        $str = str_replace('&amp;','&',input('post.str'));
        // 使用函数格式化字符串
        parse_str($str,$arr);
        $arr['pass'] = md5($arr['pass']);
        $arr['addtime'] = time();
        $arr['statu'] = 1;
        $arr['teac_id'] = $teac_id;
        $data = Db::name('st_user') -> insert($arr);
        if( $data ){
            echo json_encode(array('code'=>1,'msg'=>'添加成功'));
        }else {
            echo json_encode(array('code'=>2,'msg'=>'添加失败'));
        }

    }

    // 状态改变
    public function adminstatu(){
        $data = Db::name('st_user') -> update(input('post.'));
        if ($data) {
            echo '1';
        } else {
            echo '2';
        }
    }

 
    // 部门管理
    public function bumen_index(){
        $data=Db::table('st_bumen') -> paginate(15,false,['query'=>request()->param()]);

        // 分配数据
        $this->assign('data',$data);

        // 加载页面
        return view();
    }

    // 部门的添加
    public function ajax_bumen_add(){
        $post = input('post.');

        $data = Db::name('st_bumen') -> insert($post);
        
        if( $data ){
            echo json_encode(array('code'=>200,'msg'=>'添加成功'));
        }else {
            echo json_encode(array('code'=>400,'msg'=>'添加失败'));
        }
        
    }
    // 部门的修改
    public function ajax_bumen_edit(){

        $post = input('post.');
        $data = Db::name('st_bumen') -> where(array('id'=>input('post.id'))) -> update(array('bumen_name'=>input('post.bumen_name')));
        
        if( $data !== false ){
            echo json_encode(array('code'=>200,'msg'=>'修改成功'));
        }else {
            echo json_encode(array('code'=>400,'msg'=>'修改失败'));
        }
    }
    
    // --------------------
    // 产品
    public function product(){
        if(input('post.')){
            $post = input('post.product_name');

            $data = Db::name('st_product') -> insert(array('product_name'=>$post,'product_stat'=>'1'));
            
            if( $data ){
                echo json_encode(array('code'=>200,'msg'=>'添加成功'));
            }else {
                echo json_encode(array('code'=>400,'msg'=>'添加失败'));
            }
            die;
        }else{
            $data=Db::table('st_product') -> paginate(15,false,['query'=>request()->param()]);
            // 分配数据
            $this->assign('data',$data);
            // 加载页面
            return view();
        }
        
    }
    // 产品的修改
    public function ajax_chanpin_edit(){
        $post = input('post.');
        $data = Db::name('st_product') -> where(array('product_id'=>input('post.id'))) -> update(array('product_name'=>input('post.product_name')));
        
        if( $data !== false ){
            echo json_encode(array('code'=>200,'msg'=>'修改成功'));
        }else {
            echo json_encode(array('code'=>400,'msg'=>'修改失败'));
        }
    }
    // 产品状态的修改
    public function chanpin_stat_edit(){
        
        $post = input('post.');
        if(input('post.statu') == '1'){
            $stat = '4';
        }else if(input('post.statu') == '4'){
            $stat = '1';
        }

        $data = Db::name('st_product') -> where(array('product_id'=>input('post.id'))) -> update(array('product_stat'=>$stat));
        
        if( $data !== false ){
            echo json_encode(array('code'=>200,'msg'=>'修改成功'));
        }else {
            echo json_encode(array('code'=>400,'msg'=>'修改失败'));
        }

    }

    

}