<?php

namespace Admin\Controller;

use       Think\Controller;

class AdminsController extends BaseController
{

    //管理员列表
    public function admin_list()
    {
        $model = D('Admins');
        if (session('a_flag') == 1) {

            $admin_data = $model->select();
        } else {

            $where['a_id'] = session('id');
            $admin_data[] = $model->where($where)->find();

        }


        $this->assign('admin_data', $admin_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "管理员设置");
        $this->assign('nav3', "管理员列表");
        $this->display();
    }


    //添加管理员
    public function admin_add()
    {

        $model = D('Admins');

        if (IS_POST) {
            if ($model->create(I('post.'), 1)) {
                //在调用add()的时候调用钩子函数_before_insert
                if ($model->add()) {
                    $this->success('管理员添加成功', U('admin_list'));
                    exit;
                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }
        $this->assign('nav1', "后台");
        $this->assign('nav2', "管理员设置");
        $this->assign('nav3', "添加管理员");
        $this->display();
    }


//删除管理员
    public function admin_del()
    {
        $where['a_id'] = $_GET['id'];
        $model = D('Admins');
        if (FALSE !== $model->where($where)->delete()) {
            $this->success('删除管理员成功', U('admin_list'));
            exit;
        }
        $this->error("删除管理员失败", U('admin_list'));
    }

//编辑管理员的信息
    public function admin_update()
    {

        $model = D('Admins');
        $where['a_id'] = $_GET['id'];
        if ($_GET['id']) {
            $info = $model->where($where)->find();
            $this->assign('info', $info);
        }
        if (IS_POST) {

            if ($model->create(I('post.'), 2)) {
                if (FALSE !== $model->where($where)->save()) {      // $where['a_id']=I('post.a_id');
                    //parent::change_info( $where['a_id']);
                    $this->success('管理员信息修改成功', U('admin_list'));
                    exit;
                }

            }
            $this->error($model->getError());
        }
        $this->assign('nav1', "后台");
        $this->assign('nav2', "管理员设置");
        $this->assign('nav3', "编辑管理员");
        $this->display();

    }

//修改管理员的密码
    public function change_pwd()
    {
        $model = D('Admins');

        $where1['a_id'] = session('id');
        if ($model->where($where1)->getField('a_flag') == 0) {
            $admin_data = $model->where($where1)->select();
        } else {
            $admin_data = $model->select();
        }


        $this->assign('admin_data', $admin_data);
        if (IS_POST) {

            $where['a_id'] = $_POST['a_id'];
            $pwd_data['a_password'] = md5($_POST['a_password']);
            if ($_POST['a_password'] == null) {
                $this->error("密码不可以为空");
            }
            if (FALSE !== $model->where($where)->save($pwd_data)) {
                if (session('id') == $_POST['a_id']) {
                    $this->success('管理员密码修改成功,请重新登录', U('Login/login'));
                    exit;
                } else {
                    $this->success('管理员密码修改成功', U('change_pwd'));
                    exit;
                }

            }

            $this->error($model->getError());
        }
        $this->assign('nav1', "后台");
        $this->assign('nav2', "管理员设置");
        $this->assign('nav3', "修改密码");
        $this->display();

    }


}
