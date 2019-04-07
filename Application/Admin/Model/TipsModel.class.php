<?php

namespace Admin\Model;

use           Think\Model;

class TipsModel extends Model
{

    //添加数据的时候允许接收的字段名
    protected $insertFields = array('title', 'content');
    //修改数据的时候应该接受的字段名
    protected $updateFields = array('id', 'title', 'content');
    //定义验证规则
    protected $_validate = array(
        array('title', 'require', '公告主题不可以为空', 1),//地域ID不可以为空
        array('content', 'require', '公告内容不可以为空', 1) //学校名不可以为空
    );


    protected function _before_insert(&$data, $option)
    {

        $data['content'] = removeXSS($_POST['content']);

        $data['time'] = date('Y-m-d H:i:s', time());
    }

    public function search()
    {

        /********实现分页**********/        //记录总数
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
            ->order(array('time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();
        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串

        );

    }


}
