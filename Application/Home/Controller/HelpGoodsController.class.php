<?php

namespace Home\Controller;

use        Think\Controller;

class HelpGoodsController extends Controller
{

    //查看求助商品的详细信息
    public function hg_detail()
    {
        //根据hg_id获取信息
        $model = D('helpgoods');
        $where['h_id'] = $_GET['hg_id'];
        $data = $model->where($where)->find();

        //根据user_id获取用户qq
        $user_id = $data['user_id'];
        $user_model = D('users');
        $user_where['u_id'] = $user_id;
        $user_qq = $user_model->field('u_qq')->where($user_where)->find();

        //根据学校id获取学校名称
        $sch_id = $data['h_school'];
        $sch_model = D('areas');
        $sch_where['a_id'] = $sch_id;
        $sch = $sch_model->field('a_name')->where($sch_where)->find();

        $this->assign('data', $data);
        $this->assign('user_qq', $user_qq['u_qq']);
        $this->assign('sch', $sch['a_name']);
        $this->display();

    }

    public function morehelp()
    {
        $model = D('helpgoods');
        $areamodel = D('areas');
        $adata = $areamodel->select();
        $data = $model->get_morehelp();


        $this->assign('adata', $adata);
        $this->assign('data', $data['data']);
        $this->assign('page', $data['page']);
        $this->display();
    }


}
