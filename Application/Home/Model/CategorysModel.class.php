<?php

namespace Home\Model;

use           Think\Model;

class CategorysModel extends Model
{
    /*
        //添加数据的时候允许接收的字段名
        protected $insertFields = array('c_pid', 'c_name');
        //修改数据的时候应该接受的字段名
        protected $updateFields = array('c_id,c_name');
         //定义验证规则
        protected $_validate = array(
        array('c_pid','require', '分类ID不可以为空',1),//分类ID不可以为空
        array('c_name', 'require', '商品名不可以为空', 1) //商品名不可以为空
        );
    */

//创建函数获取分类

    public function showcates()
    {

        $data = $this->select();
        foreach ($data as $k => $v) {
            if ($v['c_pid'] == 0) {
                $data1[$v['c_id']] = array();
            } else {
                $where['c_id'] = $v['c_pid'];
                $name = $this->field('c_id')->where($where)->find();
                $data1[$name['c_id']][] = $v['c_id'];
            }
        }
        return $data1;
    }


}