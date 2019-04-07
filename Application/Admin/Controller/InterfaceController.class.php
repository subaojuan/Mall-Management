<?php

namespace Admin\Controller;
use       Think\Controller;

class InterfaceController extends Controller
{


//获取各学校注册人数
    public function get_register_num()
    {

        //获取西安工业大学的注册人数
        $amodel = D('areas');
        $umodel = D('users');
        $gs = $amodel->where(array('a_name' => '西安工业大学'))->find();
        $g_num = $umodel->where(array('u_school' => $gs['a_id']))->select();
        //获取陕西科技大学的注册人数
        $ks = $amodel->where(array('a_name' => '陕西科技大学'))->find();
        $k_num = $umodel->where(array('u_school' => $ks['a_id']))->select();

        //获取西安医学院
        $ys = $amodel->where(array('a_name' => '西安医学院'))->find();
        $y_num = $umodel->where(array('u_school' => $ys['a_id']))->select();

        $count = array('g' => count($g_num), 'k' => count($k_num), 'y' => count($y_num));
//  var_dump($count); 
        echo json_encode($count);
    }

//获取各学校的商品数量

    public function get_goods_num()
    {

        $amodel = D('areas');
        $gmodel = D('goods');
        $gs = $amodel->where(array('a_name' => '西安工业大学'))->find();
        $ks = $amodel->where(array('a_name' => '陕西科技大学'))->find();
        $ys = $amodel->where(array('a_name' => '西安医学院'))->find();

        $g_num = $gmodel->where(array('g_school' => $gs['a_id'], 'g_flag' => 'y'))->select();
        $k_num = $gmodel->where(array('g_school' => $ks['a_id'], 'g_flag' => 'y'))->select();
        $y_num = $gmodel->where(array('g_school' => $ys['a_id'], 'g_flag' => 'y'))->select();
        $count = array('g' => count($g_num), 'k' => count($k_num), 'y' => count($y_num));

        //  $count=array(count($g_num),count($k_num),count($y_num));
        echo json_encode($count);
    }


//获取求购信息数量

    public function get_help_num()
    {

        $amodel = D('areas');
        $hmodel = D('helpgoods');
        $gs = $amodel->where(array('a_name' => '西安工业大学'))->find();
        $ks = $amodel->where(array('a_name' => '陕西科技大学'))->find();
        $ys = $amodel->where(array('a_name' => '西安医学院'))->find();

        $g_num = $hmodel->where(array('h_school' => $gs['a_id']))->select();
        $k_num = $hmodel->where(array('h_school' => $ks['a_id']))->select();
        $y_num = $hmodel->where(array('h_school' => $ys['a_id']))->select();
        $count = array('g' => count($g_num), 'k' => count($k_num), 'y' => count($y_num));

//   $count=array(count($g_num),count($k_num),count($y_num));
        echo json_encode($count);

    }


}


?>
