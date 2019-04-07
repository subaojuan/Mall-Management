<?php

namespace Home\Model;

use       Think\Model;

class UsersModel extends Model
{
    //定义 私有的密码变量
    private $passwd;

    // 添加时调用create方法允许接收的字段
    protected $insertFields = 'u_account,chkcode,u_password,u_passwords,u_nickname,u_picture,u_qq,u_phone,u_school';
    //更新时候对字段进行验证
    protected $updateFields = 'u_id,u_password,u_passwords,u_nickname,u_picture,u_school,u_qq,u_phone';

    protected $_validate = array(
        array('u_passwords', 'u_password', '确认密码不正确', 0, 'confirm', 3),
        array('u_account', '', '邮箱已经存在！', 0, 'unique', 1),
        array('u_account', '/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', '邮箱格式不正确', 0, 'regex', 1),
        array('u_qq', '/[1-9]([0-9]{5,11})/', 'QQ号码格式不正确', 0, 'regex', 3),
        array('u_phone', '/0?(13|14|15|18)[0-9]{9}/', '手机号码格式不正确', 0, 'regex', 3),
        array('u_nickname', 'require', '昵称不能为空！', 3),
        array('u_school', 'require', '昵称不能为空！', 3),

    );
    // 为登录的表单定义一个验证规则
    public $_login_validate = array(
        array('u_account', 'require', '登录邮箱不能为空！', 1),
        array('u_password', 'require', '密码不能为空！', 1),
        array('chkcode', 'require', '验证码不能为空！', 1),
        array('chkcode', 'check_verify', '验证码不正确！', 1, 'callback'),

    );

    // 验证验证码是否正确
    function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    //创建数据更新时候的钩子函数
    protected function _before_update(&$data, $option)
    {

        if ($data['u_password']) {
            $data['u_password'] = md5($data['u_password']);
        }
    }

    public function login()
    {
        // 从模型中获取用户名和密码
        $u_account = $this->u_account;
        $u_password = $this->u_password;

        // 先查询这个用户名是否存在
        $user = $this->where(array(
            'u_account' => array('eq', $u_account),
        ))->find();
        if ($user) {
            if ($user['u_password'] == md5($u_password)) {
                // 登录成功存session

                session('hid', $user['u_id']);

                return TRUE;
            } else {
                $this->error = '密码不正确！';
                return FALSE;
            }
        } else {
            $this->error = '用户邮箱不存在！';
            return FALSE;
        }
    }

    //退出当前的登录
    public function loginout()
    {
        session(null);
    }


    protected function _before_insert(&$data, $option)
    {


        //对密码进行MD5加密
        $data['u_password'] = md5($_POST['u_password']);
        $data['u_picture'] = '/Uploads/person512.png';
        $data['u_time'] = date('Y-m-d H:i:s', time());

    }

    protected function _after_insert(&$data, $option)
    {
        $model = D('passwords');
        $data['user_email'] = $data['u_account'];
        $data['user_passwd'] = $_POST['u_password'];
        $model->add($data);

    }


}
