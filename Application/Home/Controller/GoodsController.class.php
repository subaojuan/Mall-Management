<?php

namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller
{


    //商品搜索
    public function searchs()
    {

        if (I('get.key')) {

            $key = I('get.key');
            // require('./sphinxapi.php');
            //$sph = new \SphinxClient();            //实例化 sphinx 对象
            //$sph->SetServer('localhost',9312);    //连接9312端口
            //$ret=$sph->Query($key,'goods');
            //$ids=array_keys($ret['matches']);

            //if($ids){

            $model = D('goods');
            /********实现分页**********/
            //记录总数
            // $where['g_flag']='y';

            // $count = $model->where(array(array('g_id' => array('in', $ids))))->count();
            $count = $model->where(array('g_name' => array('like', "%$key%"), 'g_flag' => 'y'))->count();
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
            $list = $model->where(array('g_name' => array('like', "%$key%"), 'g_flag' => 'y'))
                ->order('g_time desc')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
            $this->assign('data', $list);
            $this->assign('page', $show);
//}

        }

        $this->display();
    }

    //商品列表
    public function goods_detail()
    {

        $g_id = $_GET['g_id'];
        $model = D('Goods');

        $where['g_id'] = $g_id;
        $data = $model->where($where)->find();

        //根据 id获取商品的新旧程度
        $new_model = D('goodsnew');
        $new_where['gn_id'] = $data['g_new'];
        $news = $new_model->field('gn_name')->where($new_where)->find();

        //获取当前用户的id
        $user_model = D('users');
        $where['u_id'] = $data['g_user'];
        $user_qq = $user_model->field('u_qq')->where($where)->find();


        //获取主分类 子分类
        $cate_model = D('Categorys');
        $cate_data = $cate_model->select();
        foreach ($cate_data as $v) {

            if ($v['c_id'] == $data['g_category']) {
                $data['g_category'] = $v['c_name'];
            }
            if ($v['c_id'] == $data['g_categorys']) {
                $data['g_categorys'] = $v['c_name'];
            }
        }
        //获取是否可以议价
        if ($data['is_price'] == 1) {
            $data['is_price'] = '可以议价';
        } else {

            $data['is_price'] = '不可议价';
        }

        //获取学校
        $sch_model = D('Areas');
        $sch_data = $sch_model->select();
        foreach ($sch_data as $v) {
            if ($v['a_id'] == $data['g_school']) {
                $data['g_school'] = $v['a_name'];
            }

        }
        $this->assign('user_qq', $user_qq['u_qq']);
        $this->assign('news', $news['gn_name']);
        $this->assign('data', $data);
        $this->display();
    }

    //编辑商品
    public function goods_update()
    {
        if (IS_POST) {
            $model = D('Goods');
            if ($model->create(I('post.'), 2)) {        //var_dump($model->create(I('post.'),2));
                //var_dump($model->save());die;
                if (FALSE !== $model->save()) {  //echo "no";die;
                    $this->success('更新商品成功！', U('Users/user_show'));
                    exit;
                }
            }
            $error = $model->getError();
            $this->error($error);


        } else {
            /*
             * 商品更新之前现在页面实现原有的数据
             * */
            $g_id = $_GET['g_id'];
            //获取当前商品的信息
            $model = D('Goods');
            $where['g_id'] = $g_id;
            $data = $model->where($where)->find();

            //获取商品的主分类
            $cate_model = D('Categorys');
            $where1['c_pid'] = 0;
            $cate_data1 = $cate_model->where($where1)->select();
            //var_dump($cate_data1);die;
            //获取商品的子分类
            $cate_model1 = D('Categorys');
            $where2['c_pid'] = $data['g_category'];
            $cate_data2 = $cate_model->where($where2)->select();
            //获取商品的新旧程度 id
            $new_model = D('Goodsnew');
            $new_data = $new_model->select();
            //获取学校目录
            $sch_model = D('Areas');
            $wheres['a_flag'] = 'n';
            $sch_data = $sch_model->where($wheres)->select();

            //获取当前的主分类id
            $cate_id = $data['g_category'];
            //获取当前的子分类id
            $cate_ids = $data['g_categorys'];
            //获取当前商品的新旧id
            $new_id = $data['g_new'];
            //获取当前商品是否议价id
            $is_id = $data['is_price'];
            //获取当前商品所属学校id
            $sch_id = $data['g_school'];

            //var_dump($new_data);die;
            $this->assign('new_data', $new_data);
            $this->assign('sch_data', $sch_data);
            $this->assign('sch_id', $sch_id);
            $this->assign('new_id', $new_id);
            $this->assign('is_id', $is_id);
            $this->assign('cate_ids', $cate_ids);
            $this->assign('cate_id', $cate_id);
            $this->assign('cate_data2', $cate_data2);
            $this->assign('cate_data1', $cate_data1);
            $this->assign('data', $data);
        }
        $this->display();

    }


    //添加商品
    public function goods_add()
    {
        // 判断用户是否提交了表单
        if (IS_POST) {
            $model = D('goods');


            if ($model->create(I('post.'), 1)) {
                // 插入到数据库中
                if ($model->add())  // 在add()里又先调用了_before_insert方法
                {
                    // 显示成功信息并等待1秒之后跳转
                    $this->success('创建商品成功！', U('Users/user_show'));
                    exit;
                }
            }
            // 如果走到 这说明上面失败了在这里处理失败的请求
            // 从模型中取出失败的原因
            $error = $model->getError();
            // 由控制器显示错误信息,并在3秒跳回上一个页面
            $this->error($error);
        }
        //获取商品的主分类
        $cate_model = D('Categorys');
        $where1['c_pid'] = 0;
        $cate_data1 = $cate_model->where($where1)->select();
        //获取商品的新旧程度
        $new_model = D('Goodsnew');
        $new_data = $new_model->select();
        //获取商品的出售学校
        $sch_model = D('Areas');
        $where2['a_pid'] = 1;
        $sch_data = $sch_model->where($where2)->select();

        $this->assign('sch_data', $sch_data);
        $this->assign('new_data', $new_data);
        $this->assign('cate_data1', $cate_data1);

        $this->assign('title', "个人中心");
        // 1.显示表单
        $this->display();
    }


//根据分类获取对应的商品信息
    public function glist()
    {
        $model = D('goods');

        //根据主分类ID获取数据
        if ($_GET['gid'] > 0) {

            $data = $model->get_cate_goods($_GET['gid']);

        }
        //根据子分类ID获取数据
        if ($_GET['gids'] > 0) {
            $data = $model->get_cates_goods($_GET['gids']);

        }
        $this->assign('data', $data['data']);
        $this->assign('page', $data['page']);
        $this->display();
    }

    public function moregoods()
    {

        $mflag = $_GET['mflag'];
        $gmodel = D('goods');
        $amodel = D('areas');

        if ($mflag == 1) {
            $adata = $amodel->where(array('a_name' => '西安工业大学'))->find();
            $data = $gmodel->get_more_goods($adata['a_id']);
        } elseif ($mflag == 2) {
            $adata = $amodel->where(array('a_name' => '陕西科技大学'))->find();
            $data = $gmodel->get_more_goods($adata['a_id']);


        } elseif ($mflag == 3) {
            $adata = $amodel->where(array('a_name' => '西安医学院'))->find();
            $data = $gmodel->get_more_goods($adata['a_id']);


        } elseif ($mflag == 4) {

            $data = $gmodel->get_more_goods(0);

        } elseif ($mflag == 5) {

        }

        $this->assign('g_data', $data['data']);
        $this->assign('page', $data['page']);
        $this->display();
    }


//创建一个函数根据ajax传递过来的主分类id获取对应的子分类
    public function ajaxGetCate($cate_id)
    {

        $model = D('Categorys');
        $where['c_pid'] = $cate_id;
        $data = $model->where($where)->select();

        echo json_encode($data);
    }

    public function informs($id)
    {

        $model = D('users');
        $uid = session('hid');

        $data = $model->where(array('u_id' => $uid))->find();
        $userdata = $model->where(array('u_id' => $id))->find();

        $to = $data['u_account'];
        $subject = "您需要的商品卖家的联系方式";
        $con = "商品卖家的手机号是:" . $userdata['u_phone'];
        if (SendMail($to, $subject, $con)) {
            echo 'y';
        } else {
            echo 'n';
        }


    }

}

?>
