<?php

namespace Admin\Controller;

use Think\Controller;

class GoodsController extends BaseController
{

    //商品列表
    public function goods_list()
    {

        //实例化模型
        $model = D('Goods');
        //获取新旧列表
        $new_model = D('goodsnew');
        $new_data = $new_model->select();
        //获取分类列表

        $cate_model = D('Categorys');
        $cate_data = $cate_model->select();

        //获取商品主分类
        $where1['c_pid'] = 0;
        $cate_data1 = $cate_model->where($where1)->select();
        //获取学校
        $sch_model = D('Areas');
        $sch_data = $sch_model->select();

        //调用模型方法实现搜索与列表信息的显示
        $data = $model->search();


        $this->assign($data);
        $this->assign('new_data', $new_data);
        $this->assign('sch_data', $sch_data);
        $this->assign('cate_data', $cate_data);
        $this->assign('cate_data1', $cate_data1);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "商品管理");
        $this->assign('nav3', "商品列表");
        $this->display();
    }

    //删除商品
    public function deletegoods($g_id)
    {
        $model = D('goods');
        $where['g_id'] = $g_id;
        if ($model->where($where)->delete()) {
            echo 'y';
        } else {
            echo 'n';
        }

    }


}


?>