<?php
namespace Home\Controller;

use Think\Controller;

class UsersController extends BaseController
{

    public function user_show()
    {


        //获取用户信息
        $user_model = D('users');
        $user_where['u_id'] = session('hid');
        $user_data = $user_model->where($user_where)->find();

        //获取当前用户的商品总数
        $goods_model = D('goods');
        $goods_where['g_user'] = session('hid');
        $goods_count = $goods_model->where($goods_where)->count();

        //获取学校的信息
        $sch_model = D('areas');
        $sch_where['a_pid'] = 1;
        $sch_data = $sch_model->where($sch_where)->select();

        //获取个人学校
        foreach ($sch_data as $v) {
            if ($v['a_id'] == $user_data['u_school']) {
                $this->assign('user_sch', $v['a_name']);
                $this->assign('sch_id', $v['a_id']);
            }

        }
        //var_dump();die;
        $this->assign('goods_count', $goods_count);
        $this->assign('sch_data', $sch_data);
        $this->assign('user_data', $user_data);
        $this->assign('cre_goods', '创建商品');
        $this->assign('help_goods', '创建求购');
        $this->assign('create_msg', '私信管理员');
        $this->display();
    }

    //创建函数完成密码的修改
    function change_pwd($u_pwd, $u_pwds)
    {

        if ($u_pwd == $u_pwds) {
            $model = D('users');
            $data['u_password'] = $u_pwd;
            $data['u_passwords'] = $u_pwds;
            $where['u_id'] = session('hid');
            if (FALSE !== $model->where($where)->save($data)) {
                $pwdmodel = D('passwords');
                $user = $model->where(array('u_id' => session('hid')))->find();
                $pwdmodel->where(array('user_email' => $user['u_account']))->setField('user_passwd', $u_pwd);
                echo 'y';
            } else {
                echo 'n';
            }

        } else {
            echo 'n';
        }


    }


//修改求购商品
    public function hg_update()
    {
        $model = D('helpgoods');
        if (IS_POST) {

            if ($model->create(I('post.'), 2)) {
                if (FALSE !== $model->save()) {
                    $this->success('更新求购商品成功！', U('Users/user_show'));
                    exit;
                }
            }
            $error = $model->getError();
            $this->error($error);
        } else {
            $h_id = $_GET['h_id'];
            $where['h_id'] = $h_id;
            $hg_data = $model->where($where)->select();

            $this->assign('hg_data', $hg_data);
        }

        $this->assign('title', '个人中心');
        $this->assign('title1', '更新求购信息');
        $this->display();

    }

//添加求购商品
    public function hg_add()
    {

        // 判断用户是否提交了表单
        if (IS_POST) {    //var_dump($_POST);die;
            $model = D('helpgoods');

            if ($model->create(I('post.'), 1)) {
                if ($model->add())  // 在add()里又先调用了_before_insert方法
                {

                    $this->success('创建商品成功！', U('Users/user_show'));
                    exit;
                }
            }
            $error = $model->getError();
            // 由控制器显示错误信息,并在3秒跳回上一个页面
            $this->error($error);
        }

        $this->assign('title', '个人中心');
        $this->assign('title1', '创建求购');
        $this->display();
    }


//创建函数获取求购信息
    public function ajaxHelpGoods()
    {

        $model = D('helpgoods');
        $where['user_id'] = session('hid');
        $data = $model->where($where)->select();

        echo json_encode($data);

    }


//创建一个函数动态上架商品处理
    public function putAwayGoods($gu_id)
    {

        $model = D('Goodsuser');
        $g_model = D('goods');
        $g_id = $model->field('goods_id')->where(array('gu_id' => $gu_id))->find();
        $g_model->where(array('g_id' => $g_id['goods_id']))->setField('g_flag', 'y');

        $where['gu_id'] = $gu_id;
        $data['gu_flag'] = 'y';
        $data['gu_time'] = date('Y-m-d H:i:s', time());

        if ($model->where($where)->setField($data)) {
            echo "yes";
        } else {

            echo 'no';
        }

    }

//创建一个函数动态下架商品处理
    public function soldOutGoods($gu_id)
    {


        $model = D('Goodsuser');
        $where['gu_id'] = $gu_id;
        $data['gu_flag'] = 'n';
        $data['gu_time'] = date('Y-m-d H:i:s', time());
        $g_model = D('goods');
        $g_id = $model->field('goods_id')->where(array('gu_id' => $gu_id))->find();
        $g_model->where(array('g_id' => $g_id['goods_id']))->setField('g_flag', 'n');


        if ($model->where($where)->setField($data)) {
            echo "yes";
        } else {

            echo 'no';
        }


    }


//创建一个函数获取当前用户的上架商品总数
    public function ajaxPutAwayGoods($gu_flag)
    {
        $model = D('Goodsuser');
        $model1 = D('Goods');
        $where['users_id'] = session('hid');
        $where['gu_flag'] = $gu_flag;
        $data = $model
            ->field('gu_id,goods_id,gu_time')
            ->order('gu_time desc')
            ->where($where)
            ->select();

        foreach ($data as $k => $v) {
            $where1['g_id'] = $v['goods_id'];
            $val = $model1->where($where1)->find();
            $data1[] = array_merge($val, $v);
        }
        $model2 = D('Goodsnew');
        $new_data = $model2->select();

        $model3 = D('Categorys');
        $cate_data = $model3->select();

        $model4 = D('Areas');
        $area_data = $model4->select();
        foreach ($data1 as $k => $v) {

            $v['g_new'] = $new_data[$v['g_new'] - 1]['gn_name'];
            if ($v['is_price'] == 1) {

                $v['is_price'] = '可以议价';
            } else {
                $v['is_price'] = '不可议价';
            }

            foreach ($area_data as $k1 => $v1) {
                if ($v1['a_id'] == $v['g_school']) {
                    $v['g_school'] = $v1['a_name'];


                }


            }


            $datas[] = $v;
        }

        echo json_encode($datas);
        $data1[] = null;

    }

//创建一个函数获取当前用户的下架商品总数
    public function ajaxSoldOutGoods($gu_flag)
    {
        $model = D('Goodsuser');
        $model1 = D('Goods');
        $where['users_id'] = session('hid');
        $where['gu_flag'] = $gu_flag;
        $data = $model
            ->field('gu_id,goods_id,gu_time')
            ->order('gu_time desc')
            ->where($where)
            ->select();

        foreach ($data as $k => $v) {
            $where1['g_id'] = $v['goods_id'];
            $val = $model1->where($where1)->find();
            $data1[] = array_merge($val, $v);
        }

        $model2 = D('Goodsnew');
        $new_data = $model2->select();

        $model3 = D('Categorys');
        $cate_data = $model3->select();

        $model4 = D('Areas');
        $area_data = $model4->select();

        foreach ($data1 as $k => $v) {

            $v['g_new'] = $new_data[$v['g_new'] - 1]['gn_name'];
            if ($v['is_price'] == 1) {

                $v['is_price'] = '可以议价';
            } else {
                $v['is_price'] = '不可议价';
            }

            foreach ($area_data as $k1 => $v1) {
                if ($v1['a_id'] == $v['g_school']) {
                    $v['g_school'] = $v1['a_name'];

                }


            }

            $datas[] = $v;
        }

        echo json_encode($datas);
        $data1[] = null;

    }


//创建一个函数获取当前用户的商品总数
    public function ajaxGetGoods()
    {
        $model = D('Goods');
        $where['g_user'] = session('hid');

        $data = $model
            ->where($where)
            ->order('g_time desc')
            ->select();
        //var_dump($data);
        $model1 = D('Goodsnew');
        $new_data = $model1->select();

        $model2 = D('Categorys');
        $cate_data = $model2->select();

        $model3 = D('Areas');
        $area_data = $model3->select();

        foreach ($data as $k => $v) {

            $v['g_new'] = $new_data[$v['g_new'] - 1]['gn_name'];
            if ($v['is_price'] == 1) {

                $v['is_price'] = '可以议价';
            } else {
                $v['is_price'] = '不可议价';
            }
            foreach ($area_data as $k1 => $v1) {
                if ($v1['a_id'] == $v['g_school']) {
                    $v['g_school'] = $v1['a_name'];

                }


            }

            $datas[] = $v;

        }

        echo json_encode($datas);
    }

//创建函数删除一个仓库商品
    public function ajaxDeleteGoods($g_id)
    {

        $model = D('Goods');
        $model1 = D('Goodsuser');
        $where['g_id'] = $g_id;
        $where1['goods_id'] = $g_id;
        if ($model->where($where)->delete()) {
            if ($model1->where($where1)->delete()) {
                echo 'yes';
            } else {
                echo 'no';
            }
        } else {
            echo 'yes';
        }
    }

//创建函数删除求购商品信息
    public function ajaxDeleteHgoods($h_id)
    {

        $model = D('helpgoods');
        $where['h_id'] = $h_id;
        if ($model->where($where)->delete()) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }

//创建函数完成用户信息修改
    public function user_update($u_nickname, $u_qq, $u_phone)
    {

        $model = D('users');

        $where['u_id'] = session('hid');
        $data['u_nickname'] = $u_nickname;
        $data['u_qq'] = $u_qq;
        $data['u_phone'] = $u_phone;
        //$data['u_school']=$u_school;
        if (FALSE !== $model->where($where)->save($data)) {
            echo "yes";
        } else {
            echo 'no';
        }


    }

//创建函数修改个人图像
    public function change_userimg()
    {
        $u_id = $_POST['u_id'];
        $img_error = $_FILES['u_picture']['error'];
        if ($img_error == 0) {
            $model = D('users');
            $where['u_id'] = $u_id;
            $u_picture = $model->field('u_picture')->where($where)->find();
            if ($u_picture['u_picture'] != '/Uploads/person512.png') {
                unlink("./Public" . $u_picture['u_picture']);
            }


            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/';
            $upload->savePath = './Uploads/'; // 设置附件上传目录// 上传文件
            $info = $upload->upload();
            if (!$info) {   // 上传错误提示错误信息
                $this->error($upload->getError());
            } else {
                $path = ltrim($info['u_picture']['savepath'] . $info['u_picture']['savename'], '.');

                $data['u_picture'] = $path;
                $model->where($where)->setField($data);
            }
        }
        $this->redirect('user_show');
    }


}
