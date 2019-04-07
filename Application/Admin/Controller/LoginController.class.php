<?php

namespace Admin\Controller;

use       Think\Controller;

class LoginController extends Controller
{

    //登录验证
    public function login()
    {
        if (IS_POST) {
            $model = D('Admins');
            // 接收表单并且验证表单
            if ($model->validate($model->_login_validate)->create()) {
                if ($model->login()) {
                    $this->success('登录成功!', U('Index/index'));
                    exit;
                }
            }
            $this->error($model->getError());
        }

        $this->display();
    }

    //退出登录
    public function logout()
    {

        $model = D('Admins');
        $model->loginout();
        redirect('login');
    }


}
