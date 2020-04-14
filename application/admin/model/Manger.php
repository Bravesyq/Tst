<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Manger extends Model{
	public function editM(){
		$data = Db::table('st_aa') -> select();
        return $data;
	}

}