<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	public function __construct(){
		parent::__construct();
		$this->checkUser();
	}
	private function checkUser(){
		if (!$_SESSION['admin']) {
			redirect(U('Login/login'));
			
		}

	}
}