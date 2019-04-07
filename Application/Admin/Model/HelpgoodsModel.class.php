<?php
namespace Admin\Model;

use Think\Model;

class HelpGoodsModel extends Model
{

    public function search()
    {
        $where = array();
        /********根据商品名称**********/

        //根据时间的前后查询
        if (I('get.h_time') == 'desc') {
            $order['h_time'] = 'desc';
        }

        if (I('get.h_time') == 'asc') {
            $order['h_time'] = 'asc';
        }

        //根据学校名称来选择
        if (I('get.h_school') > 0) {

            $where['h_school'] = I('get.h_school');
        }


        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 4;
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
            'h_time_type' => I('get.h_time'),//当前时间类型
            'h_school_id' => I('get.h_school'),//根据学校ID

        );
    }


}
