<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function login(){
		
		if(IS_POST){
			$condition['stu_num'] = I('stu_num');
			$condition['stu_psw'] = I('stu_psw');
			$stuModel = D('student');


			if ($stuModel->checkData($condition)) {
				
				redirect(U('Index/index'));
			}  else {
				$error = "账号或密码错误";
			}
		}
		$this->assign('error',$error);
		$this->display();
	}

	public function logout(){
		session('admin',null);
		redirect(U('Login/login'));

	} 

	public function code(){
		
		$Verify = new \Think\Verify();
		$Verify->entry();
	}
	public function checkPac(){

		$pac = I('captcha');
		$info ="<font color='green' >验证码输入正确</font><input type='hidden' name='a' id='a' value='1'/>";
		$Verify = new \Think\Verify();
		if (!$Verify->check($pac)) {
			$info ="<font color='red' >验证码错误</font><input type='hidden' name='a' id='a' value='2'/>
                ";
		}
		$this->ajaxReturn($info,'eval');
		
	}

}