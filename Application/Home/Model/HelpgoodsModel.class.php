<?php

namespace Home\Model;

use       Think\Model;

class HelpGoodsModel extends Model
{

    // 添加时调用create方法允许接收的字段
    protected $insertFields = 'h_name,h_price,h_num,h_desc,h_school';
    //更新时候对字段进行验证
    protected $updateFields = 'h_id,h_name,h_price,h_num,h_desc,h_school';

    protected $_validate = array(
        array('h_school', 'require', '学校名称不能为空', 3),
        array('h_num', 'require', '商品数量不能为空', 3),
        array('h_num', 'number', '商品数量必须为数字', 3),
        array('h_name', 'require', '商品名称不能为空！', 3),
        array('h_price', 'currency', '价格必须是货币类型！', 3),
    );

    //添加数据之前做一些处理
    protected function _before_insert(&$data, $option)
    {


        $data['h_time'] = date('Y-m-d H:i:s', time());
        $data['user_id'] = session('hid');
        $uid = session('hid');
        $u_model = D('users');
        $u_sch = $u_model->where(array('u_id' => $uid))->find();
        $data['h_school'] = $u_sch['u_school'];
        $data['h_desc'] = removeXSS($_POST['h_desc']);

    }

    //在更新数据之前对数据进行处理
    protected function _before_update(&$data, $option)
    {
        $data['h_time'] = date('Y-m-d H:i:s', time());
        $data['h_desc'] = removeXSS($_POST['h_desc']);
    }

    public function get_morehelp()
    {

        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 15;
        // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page = new \Think\Page($count, $page_num);
        //设置上一页和写一页的显示
        $Page->setConfig('prev', "上一页");
        $Page->setConfig('next', "下一页");
        // 分页显示输出	,显示分页
        $show = $Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
        $list = $this
            ->order(array('h_time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串
        );

    }


}
