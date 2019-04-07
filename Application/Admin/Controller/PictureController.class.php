<?php

namespace Admin\Controller;

use       Think\Controller;

class PictureController extends BaseController
{


    public function picture_add()
    {

        $model = D('picture');

        if (IS_POST) {
            if ($model->create(I('post.'), 1)) {

                //在调用add()的时候调用钩子函数_before_insert
                if ($model->add()) {
                    $this->success('轮播图添加成功', U('picture_show'));
                    exit;
                }
            }
            //获取插入数据的时候出错信息
            $error = $model->getError();
            //显示出错信息并且跳转到前一个页面
            $this->error($error);

        }
        $this->assign('nav1', '后台');
        $this->assign('nav2', '网站管理');
        $this->assign('nav3', '添加轮播图');
        $this->display();


    }

    public function picture_show()
    {
        $model = D('picture');
        $data = $model->select();

        $this->assign('nav1', '后台');
        $this->assign('nav2', '网站管理');
        $this->assign('nav3', '轮播图列表');
        $this->assign('data', $data);
        $this->display();
    }

    public function deletepic($id)
    {
        $model = D('picture');
        $where['id'] = $id;
        $pic = $model->field('url')->where($where)->find();


        if ($model->where($where)->delete()) {
            unlink("./Public" . $pic['url']);
            echo 'y';
        } else {
            echo 'n';
        }

    }

    public function set_pic($id)
    {
        $model = D('picture');
        $where['id'] = $id;
        $data['flag'] = 'y';
        if ($model->where($where)->setField($data)) {
            echo 'y';
        } else {
            echo 'n';
        }
    }

    public function close_pic($id)
    {
        $model = D('picture');
        $where['id'] = $id;
        $data['flag'] = 'n';
        if ($model->where($where)->setField($data)) {
            echo 'y';
        } else {
            echo 'n';
        }
    }

    //设为为主轮播
    public function first_pic($id)
    {
        $model = D('picture');
        $where['first'] = 'y';

        if ($data = $model->field('id')->where($where)->find()) {
            if ($model->where(array('id' => $data['id']))->setField(array('first' => 'n'))) {
                if ($model->where(array('id' => $id))->setField(array('first' => 'y'))) {
                    echo 'y';
                } else {
                    echo 'n';
                }
            } else {
                echo "n";
            }


        } else {
            if ($model->where(array('id' => "$id"))->setField(array('first' => 'y'))) {
                echo 'y';
            } else {
                echo 'n';
            }
        }

    }


}
