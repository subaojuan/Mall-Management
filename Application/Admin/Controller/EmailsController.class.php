<?php

namespace Admin\Controller;

use       Think\Controller;

class EmailsController extends BaseController
{

    public function emails_show()
    {

        $model = D('emails');
        $data = $model->search();


        $this->assign($data);
        $this->display();
    }

    //删除发件箱里面的邮件
    public function delete_email($e_id)
    {
        $model = D('emails');
        $where['e_id'] = $e_id;
        if ($model->where($where)->delete()) {
            echo 'y';
        } else {
            echo 'n';
        }

    }

    //查看邮件内容
    public function look_email($e_id)
    {

        $model = D('emails');
        $where['e_id'] = $e_id;
        if ($data = $model->where($where)->find()) {

            echo json_encode($data);
        }
    }


}
