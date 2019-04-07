<?php

namespace Home\Controller;

use       Think\Controller;

class LoginController extends Controller
{

    public function showlogin()
    {
        $areamodel = D('areas');
        $areadata = $areamodel->where('a_pid', array('NEQ', '0'))->select();
        $this->assign('areadata', $areadata);
        //var_dump($areadata);die;
        $this->display();
    }

    public function register()
    {
        // 判断用户是否提交了表单
        if (IS_POST) {
            $model = D('users');

            if ($model->create(I('post.'), 1)) {
                // 插入到数据库中
                if ($model->add())  // 在add()里又先调用了_before_insert方法
                {
                    // 显示成功信息并等待1秒之后跳转
                    $this->success('恭喜你,注册成功,快去登录吧', U('Login/showlogin'));
                    exit;
                }
            }
            $error = $model->getError();
            $this->error($error);

        }
    }

    //登录验证
    public function login()
    {
        if (IS_POST) {
            $model = D('users');
            // 接收表单并且验证表单
            if ($model->validate($model->_login_validate)->create()) {
                if ($model->login()) {
                    $this->success('登录成功!', U('Users/user_show'));
                    exit;
                }
            }
            $this->error($model->getError());
        }

        $this->display();
    }

    //检查当前是否有用户在线
    public function check_online()
    {
        $u_id = session('hid');
        if ($u_id) {
            $model = D('users');
            $where['u_id'] = $u_id;
            $data = $model->where($where)->find();
            echo json_encode($data);

        }


    }

    //检查当前用户注册邮箱是否存在
    public function check_email($email)
    {
        $model = D('users');
        $where['u_account'] = $email;
        $data = $model->where($where)->count();
        echo $data;


    }

    //邮件找回密码
    public function find_passwd($email)
    {
        $model = D('passwords');
        $where['user_email'] = $email;
        $passwd = $model->field('user_passwd')->where($where)->find();
        if ($passwd['user_passwd']) {
            $to = $email;
            $subject = '北郊三校服务平台-找回密码';
            $con = "您的登录密码是:" . $passwd['user_passwd'];

            if (SendMail($to, $subject, $con) != null) {
                echo 'n';
            }
        } else {
            echo 'n';
        }

    }


    //检查登录的验证码
    public function checkcode()
    {
        $config = array(
            'fontSize' => 30,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => TRUE, // 关闭验证码杂点

        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();

    }

    //退出登录
    public function loginout()
    {

        $model = D('users');
        $model->loginout();
        echo 'y';
    }


}
