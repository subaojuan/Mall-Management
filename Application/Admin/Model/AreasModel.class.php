<?php

namespace Admin\Model;

use           Think\Model;

class AreasModel extends Model
{

    //添加数据的时候允许接收的字段名
    protected $insertFields = array('a_pid', 'a_name');
    //修改数据的时候应该接受的字段名
    protected $updateFields = array('a_id,a_name');
    //定义验证规则
    protected $_validate = array(
        array('a_pid', 'require', '地域ID不可以为空', 1),//地域ID不可以为空
        array('a_name', 'require', '学校名不可以为空', 1) //学校名不可以为空
    );


    public function _add($num)
    {
        if ($num == 0) {
            $this->error = "地域名不可以为顶级地域";
            return false;
        } else {
            return true;
        }
    }


//创建一个函数用来判断当前的学校是否是当前省份的第一个数据
//如果是，修改省份的标志字段a_falg为'y'

    public function change_add($num)
    {

        $where['a_pid'] = $num;
        $count = $this->where($where)->count();

        if ($count > 0) {
            $where1['a_id'] = $num;
            $data['a_flag'] = 'y';
            $this->where($where1)->setField($data);
        }

    }

//创建一个函数用来判断当前的学校被删除后是否当前的省份还有其他的学校
//如果没有，修改省份的标志字段a_falg为'n'

    public function change_del($num)
    {

        $where['a_id'] = $num;
        $a_pid = $this->field('a_pid')->where($where)->find();

        $where1['a_pid'] = $a_pid['a_pid'];
        $count = $this->where($where1)->count();
        if ($count == 1) {
            $where2['a_id'] = $a_pid['a_pid'];

            $data['a_flag'] = 'n';
            $this->where($where2)->setField($data);
        }

    }


}