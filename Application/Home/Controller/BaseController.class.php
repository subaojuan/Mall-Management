<?php
namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        // 必须先调用父类的构造函数
        parent::__construct();
        // 判断登录
        if (!session('hid')) {
            $this->error('必须先登录！', U('Login/showlogin'));
        } else {
            //$this->assign('nickname',session('name'));
            //$this->assign('picture',session('picture'));
            //$this->assign('a_flag',session('a_flag'));
            return TRUE;

        }
        // 所有管理员都可以进入后台的首页
        //if(CONTROLLER_NAME == 'Index')

    }
//  public function change_info($arr){
//  	$model=D('Admins');
//  	$this->assign('nickname',$model->where($where)->getField('a_name'));
//		$this->assign('picture',$model->where($where)->getField('a_picture'));
//  }	

}