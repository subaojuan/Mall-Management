<?php

namespace Admin\Model;

use       Think\Model;

class AdminsModel extends Model
{

    //添加数据允许接收的字段
    protected $insertFields = array('a_account', 'a_name', 'a_password', 'a_checkpwd');
    //更新数据允许接收的字段
    protected $updateFields = array('a_name', 'a_id', 'a_password');

    //添加验证规则
    protected $_validate = array(
        array('a_account', 'require', '账号不可以为空', 0),//账号不可以为空
        array('a_name', 'require', '昵称名不可以为空', 0), //昵称名不可以为空
        array('a_password', 'require', '密码不可以为空', 0),//密码不可以为空
        array('a_checkpwd', 'a_password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
        array('a_account', '', '账号已经存在！', 1, 'unique', 3),
    );
    // 为登录的表单定义一个验证规则
    public $_login_validate = array(
        array('a_account', 'require', '用户名不能为空！', 1),
        array('a_password', 'require', '密码不能为空！', 1)

    );


    public function login()
    {
        // 从模型中获取用户名和密码
        $a_account = $this->a_account;
        $a_password = $this->a_password;
        // 先查询这个用户名是否存在
        $user = $this->where(array(
            'a_account' => array('eq', $a_account),
        ))->find();
        if ($user) {
            if ($user['a_password'] == md5($a_password)) {
                // 登录成功存session

                session('id', $user['a_id']);
                session('name', $user['a_name']);
                session('a_flag', $user['a_flag']);
                session('picture', $user['a_picture']);
                return TRUE;
            } else {
                $this->error = '密码不正确！';
                return FALSE;
            }
        } else {
            $this->error = '用户名不存在！';
            return FALSE;
        }
    }

    protected function _before_insert(&$data, $option)
    {
        //判断图像是否上传成功
        if ($_FILES['a_picture']['error'] == 0) {

            // 实例化上传类
            $upload = new \Think\Upload();
            // 设置附件上传大小
            $upload->maxSize = 3145728;
            // 设置附件上传类型
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Public/';

            // 设置附件上传目录 （根目录下的）
            $upload->savePath = './Uploads/';
            // 上传文件
            $info = $upload->upload();
            if (!$info) {
                // 上传错误提示错误信息，把上传的错误信息放到模型类里面
                $this->error = $upload->getError();
                //返回false
                return FALSE;

            } else {
                $path = ltrim($info['a_picture']['savepath'], '\.');
                $a_path = $path . $info['a_picture']['savename'];

                $data['a_picture'] = $a_path;
            }

        }

        //密码用MD5加密
        $data['a_password'] = md5($data['a_password']);

    }

    //添加一个删除的钩子函数，在删除管理的账号之前首先删除他的图像
    protected function _before_delete(&$data, $option)
    {


        $a_id = $data['where']['a_id'];
        $where['a_id'] = $a_id;
        $pic_data = $this->where($where)->find();
        //删除图片
        unlink("./Public" . $pic_data['a_picture']);
    }

    //添加一个钩子函数，在编辑管理员的图像时候删除之前的图像
    protected function _before_update(&$data, $option)
    {

        //判断图像是否上传成功
        if ($_FILES['a_picture']['name']) {

            // 实例化上传类
            $upload = new \Think\Upload();
            // 设置附件上传大小
            $upload->maxSize = 3145728;
            // 设置附件上传类型
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Public/';

            // 设置附件上传目录 （根目录下的）
            $upload->savePath = './Uploads/';
            // 上传文件
            $info = $upload->upload();
            if (!$info) {
                // 上传错误提示错误信息，把上传的错误信息放到模型类里面
                $this->error = $upload->getError();
                //返回false
                return FALSE;

            } else {
                $path = ltrim($info['a_picture']['savepath'], '\.');
                $a_path = $path . $info['a_picture']['savename'];
                $data['a_picture'] = $a_path;
                $where['a_id'] = $option['where']['a_id'];
                $pic_data = $this->where($where)->find();
                //删除图片
                unlink("./Public" . $pic_data['a_picture']);
            }

        }
    }

    //退出当前的登录
    public function loginout()
    {
        session(null);
    }


}
