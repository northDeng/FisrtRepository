<?php
namespace Home\Model;
use Think\Model;
class StudentModel extends Model{
	
	
	public function checkData($condition){
		if($admin = $this->where($condition)->find()) {
			session('admin',$admin);
			return true;
		}
		return false;

	}
}