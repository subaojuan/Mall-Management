<?php
namespace Admin\Model;

use Think\Model;

class GoodsModel extends Model
{

    public function search()
    {
        $where = array();
        /********根据商品名称**********/
        if (I('get.searchinfo')) {
            $where['g_name'] = array('like', "%" . I('get.searchinfo') . "%");
        }
        //根据商品的 新旧程度筛选
        if (I('get.g_new') > 0) {
            $where['g_new'] = array('like', "%" . I('get.g_new') . "%");
        }
        //根据商品能否议价
        if (I('get.is_price') == 1) {
            $where['is_price'] = array('like', "%" . I('get.is_price') . "%");

        }
        if (I('get.is_price') == 2) {
            $val = I('get.is_price') - 2;
            $where['is_price'] = array('like', "%" . $val . "%");
        }
        //根据时间的前后查询
        if (I('get.g_time') == 'desc') {
            $order['g_time'] = 'desc';
        }

        if (I('get.g_time') == 'asc') {
            $order['g_time'] = 'asc';
        }
        //根据价格顺序来找
        if (I('get.g_price') == 'desc') {
            $order['g_price'] = 'desc';
        }
        if (I('get.g_price') == 'asc') {
            $order['g_price'] = 'asc';
        }

        //根据学校名称来选择
        if (I('get.school_id') > 0) {

            $where['g_school'] = I('get.school_id');
        }
        //根据主分类查询
        if (I('get.g_category') > 0) {

            $where['g_category'] = I('get.g_category');
        }
        //根据子分类查询
        if (I('get.g_categorys') > 0) {

            $where['g_categorys'] = I('get.g_categorys');
        }


        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 5;
        // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page = new \Think\Page($count, $page_num);
        //设置上一页和写一页的显示
        $Page->setConfig('prev', "上一页");
        $Page->setConfig('next', "下一页");
        // 分页显示输出	,显示分页
        $show = $Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
        $list = $this->where($where)
            ->order($order)
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串
            'g_new_type' => I('get.g_new'),//当前新旧类型
            'is_price_type' => I('get.is_price'),//当前议价类型
            'g_time_type' => I('get.g_time'),//当前时间类型
            'g_price_type' => I('get.g_price'),//当前价格类型
            'g_school_id' => I('get.school_id'),//根据学校ID
            'g_cate_id' => I('get.g_category'),//根据商品主分类
            'g_cate_ids' => I('get.g_categorys'),//根据商品子分类
        );
    }


}
