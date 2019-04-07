<?php

namespace Admin\Controller;

use       Think\Controller;

class CategorysController extends BaseController
{

    //分类列表
    public function cat_list()
    {

        $model = D('Categorys');
        $cate_data = $model->select();

        $this->assign('cate_data', $cate_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "分类管理");
        $this->assign('nav3', "分类列表");
        $this->display();
    }

    //添加分类
    public function cat_add()
    {
        $model = D('Categorys');
        if (IS_POST) {
            if ($model->create(I('post.'), 1)) {
                //在调用add()的时候调用钩子函数_before_insert
                if ($model->add()) {
                    $this->success('分类添加成功', U('cat_list'));
                    exit;
                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }
        $cate_data = $model->where("c_pid=0")->select();
        $this->assign('cate_data', $cate_data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "分类管理");
        $this->assign('nav3', "添加分类");
        $this->display();
    }


//分类的删除
    public function cat_del()
    {
        $model = D('Categorys');

        if ($_GET['id'] == 0) {
            $where1['c_pid'] = $_GET['ids'];
            $where2['c_id'] = $_GET['ids'];
            if (FALSE !== $model->where($where1)->delete() && $model->where($where2)->delete()) {
                $this->success('删除分类成功', U('cat_list'));
                exit;
            }

        } else {

            $where3['c_id'] = $_GET['ids'];
            if (FALSE !== $model->where($where3)->delete()) {
                $this->success('删除分类成功', U('cat_list'));
                exit;
            }
        }
        $this->error('分类删除失败', $model->getError());

    }


//分类编辑修改

    public function cat_update()
    {
        $model = D('Categorys');
        if ($_GET['id']) {
            $where['c_id'] = $_GET['id'];

            $data = $model->field('c_id,c_name')->where($where)->find();
            $this->assign('data', $data);
        }
        if (IS_POST) {
            $where['c_id'] = $_POST['c_id'];
            if (FALSE !== $model->where($where)->setField('c_name', $_POST['c_name'])) {
                $this->success('分类修改成功', U('cat_list'));
                exit;
            }

            $this->error('分类修改出错', $model->getError());
        }

        $this->assign('nav1', "后台");
        $this->assign('nav2', "分类管理");
        $this->assign('nav3', "编辑分类");
        $this->display();
    }


}


?>