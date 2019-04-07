<?php

namespace Admin\Controller;

use       Think\Controller;

class TipsController extends BaseController
{

    public function tips_show()
    {
        $model = D('tips');
        $data = $model->search();

        $this->assign($data);

        $this->assign('nav1', '后台');
        $this->assign('nav2', '公告管理');
        $this->assign('nav3', '公告列表');
        $this->display();
    }

    public function tips_update()
    {
        if ($_GET['id']) {
            $model = D('tips');
            $where['id'] = $_GET['id'];
            $data = $model->where($where)->find();
            $data['content'] = html_entity_decode($data['content']);

            $this->assign('data', $data);
        }

        if (IS_POST) {
            if ($model->create(I('post.'), 2)) {
                //在调用add()的时候调用钩子函数_before_insert
                if (FALSE !== $model->save()) {

                    $this->success('公告修改成功', U('tips_show'));
                    exit;
                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }

        $this->assign('nav1', '后台');
        $this->assign('nav2', '公告管理');
        $this->assign('nav3', '修改公告');
        $this->display();
    }


    public function tips_add()
    {
        $model = D('Tips');

        if (IS_POST) {
            if ($model->create(I('post.'), 1)) {
                //在调用add()的时候调用钩子函数_before_insert
                if ($model->add()) {

                    $this->success('公告添加成功', U('tips_show'));
                    exit;
                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }

        $this->assign('nav1', '后台');
        $this->assign('nav2', '公告管理');
        $this->assign('nav3', '添加公告');
        $this->display();
    }

    //查看公告内容
    public function tips_detail()
    {
        if ($_GET['id']) {
            $model = D('tips');
            $where['id'] = $_GET['id'];
            $data = $model->where($where)->find();
            $data['content'] = html_entity_decode($data['content']);

            $this->assign('data', $data);
        }
        $this->assign('nav1', '后台');
        $this->assign('nav2', '公告管理');
        $this->assign('nav3', '添加公告');
        $this->display();
    }

    //删除发件箱里面的邮件
    public function delete_tip($id)
    {
        $model = D('tips');
        $where['id'] = $id;
        if ($model->where($where)->delete()) {
            echo 'y';

        } else {
            echo 'n';
        }

    }


}
