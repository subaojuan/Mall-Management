<?php

namespace Admin\Controller;

use       Think\Controller;

class MessagesController extends BaseController
{


    public function message_list()
    {

        $model = D('messages');
        $data = $model->search();

        $this->assign('nav1', "后台");
        $this->assign('nav2', "邮件管理");
        $this->assign('nav3', "收件箱");
        $this->assign($data);
        $this->display();
    }

    //发送邮件
    public function send_email()
    {


        if ($_GET['id']) {
            $model = D('messages');
            $where['id'] = $_GET['id'];
            if ($data = $model->field('m_user')->where($where)->find()) {
                $user_model = D('users');
                $where1['u_id'] = $data['m_user'];
                $user = $user_model->field('u_account')->where($where1)->find();

                $this->assign('u_account', $user['u_account']);
            }
        }

        if (IS_POST) {
            $model = D('emails');
            if ($model->create(I('post.'), 1)) {
                //在调用add()的时候调用钩子函数_before_insert
                if ($model->add()) {

                    $to = $_POST['e_user'];
                    $subject = $_POST['e_title'];
                    $con = $_POST['e_content'];
                    //SendMail($to,$subject,$con);
                    if (SendMail($to, $subject, $con)) {
                        $this->success('邮件发送成功', U('send_email'));
                        exit;
                    } else {
                        $this->error("邮件发送失败", U('send_email'));
                    }

                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }
        $this->assign('nav1', "后台");
        $this->assign('title', "邮件列表");
        $this->display();
    }

    //删除邮件
    public function deletemessage($m_id)
    {
        $model = D('messages');
        $where['id'] = $m_id;
        if ($model->where($where)->delete()) {
            echo 'y';
        } else {
            echo 'n';
        }

    }

    //查看邮件内容
    public function look_mes($m_id)
    {

        $model = D('messages');
        $where['id'] = $m_id;
        if ($data = $model->where($where)->find()) {
            $user_model = D('users');
            $where1['u_id'] = $data['m_user'];
            $user = $user_model->field('u_account')->where($where1)->find();
            $data['m_user'] = $user['u_account'];
            $model->where($where)->setField(array('m_flag' => '已阅'));
            echo json_encode($data);
        }


    }


}
