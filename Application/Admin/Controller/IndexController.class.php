<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends BaseController
{

    public function index()
    {

        $this->assign('nav1', "后台");
        $this->assign('nav2', "控制台");
        $this->assign('nav3', "网站数据");
        $this->display();
    }


}
