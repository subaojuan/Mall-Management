<?php

namespace Home\Controller;

use Think\Controller;

header("Content-type:text/html;charset=utf-8");

class IndexController extends Controller
{
    public function index()
    {

        $goods_model = D('Goods');
        $gu_model = D('Goodsuser');
        $hp_model = D('helpgoods');
        $areamodel = D('areas');

        $model = D('Categorys');
        $tip_model = D('tips');
        $pic_model = D('picture');

        if (S('pic_data')) {
            $pic_data = S('pic_data');
        } else {
            //获取轮播图
            $pic_data = $pic_model->where(array('flag' => 'y'))->select();
            S('pic_data', $pic_data, 600);
        }

        if (S('tip_data')) {
            $tip_data = S('tip_data');
        } else {
            //获取所有的公告
            $tip_data = $tip_model->order('time desc')->limit(1)->select();
            S('tip_data', $tip_data, 600);
        }


        //获取分类id列表
        $data = $model->showcates();
        $this->assign('cate_data', $data);
        //获取所有分类
        $catesdata = $model->select();


        //获取首页西安工业大学的上新商品
        if (S('g_data')) {
            $g_data = S('g_data');
        } else {
            $where1['gu_flag'] = 'y';

            $area1 = $areamodel->where(array('a_name' => '西安工业大学'))->find();
            $where1['school_id'] = $area1['a_id'];
            $g_data1 = $gu_model->field('goods_id,gu_time')->where($where1)->order('gu_time desc')->limit(10)->select();
            foreach ($g_data1 as $k => $v) {
                $where2['g_id'] = $v['goods_id'];
                $where2['g_price'] = array('gt', 0);
                $g_datas = $goods_model->field('g_id,g_logo,g_name,g_price')->where($where2)->select();
                if ($g_datas) {
                    $g_data[] = array_merge($g_datas, $v);
                }
            }
            S('g_data', $g_data, 600);
        }
        //获取首页陕西科技大学的上新商品
        if (S('s_data')) {
            $s_data = S('s_data');
        } else {
            $s_where['gu_flag'] = 'y';
            $area2 = $areamodel->where(array('a_name' => '陕西科技大学'))->find();
            $s_where['school_id'] = $area2['a_id'];

            $s_data1 = $gu_model->field('goods_id,gu_time')->where($s_where)->order('gu_time desc')->limit(10)->select();
            foreach ($s_data1 as $k => $v) {
                $where3['g_id'] = $v['goods_id'];
                $where3['g_price'] = array('gt', 0);
                $s_datas = $goods_model->field('g_id,g_logo,g_name,g_price')->where($where3)->select();
                if ($s_datas) {
                    $s_data[] = array_merge($s_datas, $v);
                }

            }
            S('s_data', $s_data, 600);
        }

        if (S('y_data')) {
            $y_data = S('y_data');
        } else {
            //获取首页西安医学院的上新商品
            $y_where['gu_flag'] = 'y';
            $area3 = $areamodel->where(array('a_name' => '西安医学院'))->find();
            $y_where['school_id'] = $area3['a_id'];

            $y_data1 = $gu_model->field('goods_id,gu_time')->where($y_where)->order('gu_time desc')->limit(10)->select();
            foreach ($y_data1 as $k => $v) {
                $where4['g_id'] = $v['goods_id'];
                $where4['g_price'] = array('gt', 0);
                $y_datas = $goods_model->field('g_id,g_logo,g_name,g_price')->where($where4)->select();
                if ($y_datas) {
                    $y_data[] = array_merge($y_datas, $v);
                }

            }
            S('y_data', $y_data, 600);
        }


        //获取学姐学长免费送
        if (S('f_data')) {
            $f_data = S('f_data');
        } else {
            $f_where['gu_flag'] = 'y';
            $f_data1 = $gu_model->field('goods_id,gu_time')->where($f_where)->order('gu_time desc')->limit(10)->select();
            foreach ($f_data1 as $k => $v) {
                $where5['g_id'] = $v['goods_id'];
                $where5['g_price'] = array('eq', 0);
                $f_datas = $goods_model->field('g_id,g_logo,g_name,g_price')->where($where5)->find();
                if ($f_datas) {
                    $f_data[] = array_merge($f_datas, $v);
                }

            }
            S('f_data', $f_data, 600);
        }


        if (S('hp_data')) {
            $hp_data = S('hp_data');
        } else {
            //获取求购最新求购信息
            $hp_data = $hp_model->field('h_id,h_name,h_time,user_id,h_school')->order('h_time desc')->limit(8)->select();
            S('hp_data', $hp_data, 600);
        }
        $adatas = $areamodel->select();

        $this->assign('areadata', $adatas);
        $this->assign('catesdata', $catesdata);
        $this->assign('tip_data', $tip_data);
        $this->assign('hp_data', $hp_data);
        $this->assign('y_data', $y_data);
        $this->assign('s_data', $s_data);
        $this->assign('g_data', $g_data);
        $this->assign('f_data', $f_data);
        $this->assign('pic_data', $pic_data);
        $this->assign('infos', "当前专区暂无上架商品！！！");
        $this->assign('flag', "1");
        $this->display();
    }


    public function glist()
    {


        $this->display();
    }


}
