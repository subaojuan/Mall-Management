<?php

namespace Home\Controller;

use       Think\Controller;

class MessagesController extends BaseController
{

    public function showmsg()
    {


        if (IS_POST) {
            $model = D('messages');

            if ($model->create(I('post.'), 1)) {
                if ($model->add())  // 在add()里又先调用了_before_insert方法
                {

                    $this->success('留言发送成功,返回个人首页', U('Users/user_show'));
                    exit;
                }
            }
            $error = $model->getError();

            $this->error($error);
        }

        $this->assign('title', '个人中心');
        $this->display();
    }


}
