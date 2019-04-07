<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        // 必须先调用父类的构造函数
        parent::__construct();
        // 判断登录
        if (!session('id')) {
            $this->error('必须先登录！', U('Login/login'));
        } else {
            $this->assign('nickname', session('name'));
            $this->assign('picture', session('picture'));
            $this->assign('a_flag', session('a_flag'));
            return TRUE;

        }

    }

}