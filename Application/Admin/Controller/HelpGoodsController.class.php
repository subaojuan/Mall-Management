<?php

namespace Admin\Controller;

use       Think\Controller;

class HelpGoodsController extends BaseController
{

    public function hg_list()
    {
		

        $model = D('helpgoods');
        $data = $model->search();

        //查询学校的  数据
        $sch_model = D('areas');
        $sch_data = $sch_model->field('a_id,a_name')->select();


        $this->assign('sch_data', $sch_data);
        $this->assign($data);
        $this->assign('nav1', "后台");
        $this->assign('nav2', "商品管理");
        $this->assign('nav3', "求购列表");
        $this->display();
    }

    public function deletehgs($h_id)
    {

        $model = D('helpgoods');
        $where['h_id'] = $h_id;
        if ($model->where($where)->delete()) {
            echo 'y';
        } else {
            echo 'n';
        }

    }


}
