<?php

namespace Admin\Controller;

use       Think\Controller;

class AreasController extends BaseController
{


    //地域列表方法
    public function area_list()
    {
        $model = D('Areas');
        $area_data = $model->select();
        $this->assign('area_data', $area_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "地域管理");
        $this->assign('nav3', "学校列表");
        $this->display();
    }

    //地域添加方法
    public function area_add()
    {

        $model = D('Areas');

        if (IS_POST) {
            if ($model->_add($_POST['a_pid'])) {
                if ($model->create(I('post.'), 1)) {
                    //在调用add()的时候调用钩子函数_before_insert
                    if ($model->add()) {
                        $model->change_add($_POST['a_pid']);
                        $this->success('学校添加成功', U('area_list'));
                        exit;
                    }
                }
            }
            //获取插入数据的时候出错信息	
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }
        $area_data = $model->where("a_pid=0")->select();
        $this->assign('area_data', $area_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "地域管理");
        $this->assign('nav3', "添加学校");
        $this->display();
    }

    //学校名称编辑修改

    public function area_update()
    {
        $model = D('Areas');
        if ($_GET['id']) {

            $where['a_id'] = $_GET['id'];

            $data = $model->field('a_id,a_name')->where($where)->find();

            $this->assign('data', $data);
        }
        if (IS_POST) {
            $where['a_id'] = $_POST['a_id'];
            if (FALSE !== $model->where($where)->setField('a_name', $_POST['a_name'])) {
                $this->success('学校名称修改成功', U('area_list'));
                exit;
            }

            $this->error('学校名称修改出错', $model->getError());
        }
        $this->assign('nav1', "后台");
        $this->assign('nav2', "地域管理");
        $this->assign('nav3', "编辑学校");
        $this->display();
    }

//学校名称的删除
    public function area_del()
    {
        $model = D('Areas');

        $where['a_id'] = $_GET['id'];
        $num = $_GET['id'];
        $model->change_del($num);
        if (FALSE !== $model->where($where)->delete()) {

            $this->success('删除学校名称成功', U('area_list'));
            exit;
        }

        $this->error('学校名称删除失败', $model->getError());

    }


}
