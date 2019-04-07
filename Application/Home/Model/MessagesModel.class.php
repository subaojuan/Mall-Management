<?php

namespace Home\Model;

use       Think\Model;

class MessagesModel extends Model
{
    protected $insertFields = 'm_title,m_content';

    protected $_validate = array(
        array('m_title', 'require', '留言主题不能为空！', 1),
        array('m_content', 'require', '留言内容不能为空！', 1)
    );


    //创建添加留言之前的函数
    protected function _before_insert(&$data, $option)
    {

        $data['m_content'] = str_replace(' ', '', $data['m_content']);
        $data['m_user'] = session('hid');
        $data['m_time'] = date('Y-m-d H:i:s', time());


    }


}
