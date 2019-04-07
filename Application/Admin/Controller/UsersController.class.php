<?php

namespace Admin\Controller;

use       Think\Controller;

class UsersController extends BaseController
{

    //用户列表
    public function user_list()
    {

        $model = D('users');
        $user_data = $model->search_user();


        $this->assign($user_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "用户管理");
        $this->assign('nav3', "用户列表");
        $this->display();
    }


    //删除用户
    public function deleteuser($u_id)
    {
        $model = D('users');
        $uid = $u_id;
        $account = $model->field('u_account')->where(array('u_id' => $uid))->find();
        $where['u_id'] = $u_id;
        if ($model->where($where)->delete()) {
            $email_model = D('emails');
            $email_model->where(array('e_user' => $account['u_account']))->delete();

            $goods_model = D('goods');
            $goods_model->where(array('g_user' => $uid))->delete();

            $gu_model = D('goodsuser');
            $gu_model->where(array('users_id' => $uid))->delete();

            $hp_model = D('helpgoods');
            $hp_model->where(array('user_id' => $uid))->delete();

            $msg_model = D('messages');
            $msg_model->where(array('m_user' => $uid))->delete();

            $pwds_model = D('passwords');
            $pwds_model->where(array('user_email' => $account['u_account']))->delete();
            echo 'y';
        } else {
            echo 'n';
        }

    }


}
