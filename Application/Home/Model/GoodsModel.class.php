<?php

namespace Home\Model;

use       Think\Model;

class GoodsModel extends Model
{

    // 添加时调用create方法允许接收的字段
    protected $insertFields = 'g_name,g_school,g_brand,g_category,g_categorys,g_price,g_num,g_desc,g_logo,g_new,is_price';
    //更新时候对字段进行验证
    protected $updateFields = 'g_id,g_name,g_school,g_brand,g_category,g_categorys,g_price,g_num,g_desc,g_logo,g_new,is_price';

    protected $_validate = array(
        array('g_num', 'require', '商品数量不能为空', 3),
        array('g_num', 'number', '商品数量必须为数字', 3),
        array('g_new', 'require', '商品新旧不能为空', 3),
        array('g_name', 'require', '商品名称不能为空！', 3),
        array('g_category', 'require', '商品主分类不能为空！', 3),
        array('g_categorys', 'require', '商品子分类不能为空！', 3),
        array('g_price', 'currency', '价格必须是货币类型！', 3),
    );

    // 这个方法在添加之前会自动被调用 --》 钩子方法
    // 第一个参数：表单中即将要插入到数据库中的数据->数组
    // &按引用传递：函数内部要修改函数外部传进来的变量必须按钮引用传递，除非传递的是一个对象,因为对象默认是按引用传递的
    protected function _before_insert(&$data, $option)
    {


        /**************** 处理LOGO *******************/
        // 判断有没有选择图片
        if ($_FILES['g_logo']['error'] == 0) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/';
            $upload->savePath = './Uploads/'; // 设置附件上传目录// 上传文件
            $info = $upload->upload();
            if (!$info) {   // 上传错误提示错误信息
                return $upload->getError();
            } else {
                $path = ltrim($info['g_logo']['savepath'] . $info['g_logo']['savename'], '.');
                $data['g_logo'] = $path;
            }
        }
        // 获取当前时间并添加到表单中这样就会插入到数据库中
        $data['g_time'] = date('Y-m-d H:i:s', time());
        $data['g_flag'] = 'n';
        // 我们自己来过滤这个字段
        $data['g_desc'] = removeXSS($_POST['g_desc']);
        $data['g_user'] = session('hid');

        $uid = session('hid');
        $u_model = D('users');
        $u_sch = $u_model->where(array('u_id' => $uid))->find();
        $data['g_school'] = $u_sch['u_school'];


    }

//创建一个添加商品成功后的钩子函数
    protected function _after_insert(&$data, $option)
    {


        $model = D('Goodsuser');
        $datas['goods_id'] = $data['g_id'];
        $datas['users_id'] = $data['g_user'];
        $uid = session('hid');
        $u_model = D('users');
        $u_sch = $u_model->where(array('u_id' => $uid))->find();
        $datas['school_id'] = $u_sch['u_school'];
        $datas['gu_time'] = date('Y-m-d H:i:s', time());
        $model->add($datas);

    }

//更新数据之前对数据进行操作
    protected function _before_update(&$data, $option)
    {

        $g_id = $option['where']['g_id'];
        // 判断有没有选择图片
        if ($_FILES['g_logo']['error'] == 0) {


            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 10 * 1024 * 1024;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/';
            $upload->savePath = './Uploads/'; // 设置附件上传目录// 上传文件
            $info = $upload->upload();
            if (!$info) {   // 上传错误提示错误信息
                return $upload->getError();
            } else {
                $where['g_id'] = $g_id;
                $g_logo = $this->field('g_logo')->where($where)->find();
                unlink("./Public" . $g_logo['g_logo']);

                $path = ltrim($info['g_logo']['savepath'] . $info['g_logo']['savename'], '.');
                $data['g_logo'] = $path;
            }
        }

        // 我们自己来过滤这个字段
        $data['g_desc'] = removeXSS($_POST['g_desc']);


    }


//根据主分类id获取对应的商品
    public function get_cate_goods($cate_id)
    {


        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 15;
        // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page = new \Think\Page($count, $page_num);
        //设置上一页和写一页的显示
        $Page->setConfig('prev', "上一页");
        $Page->setConfig('next', "下一页");
        // 分页显示输出	,显示分页
        $show = $Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
        $list = $this->where(array('g_flag' => 'y', 'g_category' => $cate_id))
            ->order(array('g_time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串
        );

    }

//根据子分类id获取对应的商品
    public function get_cates_goods($cates_id)
    {


        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 15;
        // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page = new \Think\Page($count, $page_num);
        //设置上一页和写一页的显示
        $Page->setConfig('prev', "上一页");
        $Page->setConfig('next', "下一页");
        // 分页显示输出	,显示分页
        $show = $Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
        $list = $this->where(array('g_flag' => 'y', 'g_categorys' => $cates_id))
            ->order(array('g_time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串
        );

    }

//获取更多商品
    function get_more_goods($sid)
    {
        if ($sid > 0) {
            $where1['g_school'] = $sid;
            $where1['g_flag'] = 'y';
            $where1['g_price'] = array('neq', '0');
        } elseif ($sid == 0) {
            $where1['g_flag'] = 'y';
            $where1['g_price'] = array('eq', '0');


        }
        /********实现分页**********/
        //记录总数
        $count = $this->count();
        //分页显示数目
        $page_num = 15;
        // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page = new \Think\Page($count, $page_num);
        //设置上一页和写一页的显示
        $Page->setConfig('prev', "上一页");
        $Page->setConfig('next', "下一页");
        // 分页显示输出 ,显示分页
        $show = $Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
        $list = $this->where($where1)
            ->order(array('g_time' => 'desc'))
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        return array(
            'data' => $list,//数据
            'page' => $show,//分页字符串
        );

    }


}
