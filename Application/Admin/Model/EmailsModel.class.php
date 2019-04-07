<?php

namespace Admin\Model;

use       Think\Model;

class EmailsModel extends Model
{

    protected $insertFields = array('e_title', 'e_content', 'e_user');


    protected function _before_insert(&$data, $option)
    {

        $data['e_time'] = date('Y-m-d H:i:s', time());
    }


    //创建一个收件列表信息的搜索函数
    public function search()
    {

        /********实现分页**********/        //记录总数
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
            ->order(array('e_time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();
        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串

        );

    }


}
