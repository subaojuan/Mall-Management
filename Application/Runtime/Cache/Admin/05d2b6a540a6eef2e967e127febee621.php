<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>admin_style.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>signin.css">
    <script src="<?php echo (JS_URL); ?>jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".div2").click(function () {
                $(this).next("div").slideToggle("slow")
                        .siblings(".div3:visible").slideUp("slow");
            });
        });
    </script>
    <style>
        body {
            margin: 0;
            font-family: 微软雅黑;
        }

        .left_top {
            height: 40px;
            background: #f0ad4e;
            padding-top: 9px;
            text-align: center
        }

        .left a {
            font-size: 15px;
            text-decoration: none;
        }

        .left {
            width: 200px;
            height: 100%;
            color: #000000;
            font-size: 14px;
            text-align: center;
        }

        .div1 {
            text-align: center;
            width: 210px;
        }

        .div2 {
            background: rgba(220, 220, 220, 0.29);
            height: 40px;
            line-height: 40px;
            cursor: pointer;
            font-size: 13px;
            position: relative;
            border-bottom: #6d4c4c 1px dotted;
        }

        .con {
            position: absolute;
            height: 20px;
            width: 20px;
            left: 40px;
        }

        .div3 {
            display: none;
            cursor: pointer;
            font-size: 13px;
        }

        .div3 ul {
            margin: 0;
            padding: 0;
        }

        .div3 li {
            height: 30px;
            line-height: 30px;
            list-style: none;
            border-bottom: #ccc 1px dotted;
            text-align: center;
        }

        .div3 li a {
            text-decoration: none;
        }
    </style>


</head>
<body>

<!--头部-->
<header class="header">
    <img src="<?php echo (IMG_URL); ?>admin/logo.png" alt="网站logo" class="logo">
    <span class="pull-right time" id="time"></span>

</header>


<div style="margin-top: 3px; height: 50px;"></div>
<div class="row nav-1" style="border:none">
    <!--左边导航栏-->
    <div class="col-md-2 content-left">
        <!-- 菜单栏 -->
        <div class="row nav-2">
            <div class="col-md-6">
                <img src="/school/Public<?php echo ($picture); ?>" alt="个人图像" class="img-thumbnail img-1">
            </div>
            <div class="col-md-6">
                <div class="alert alert-success img-info nick"> <?php echo ($nickname); ?></div>
                <a class="btn btn-info logout" id="logout" href="<?php echo U('Login/logout');?>">退出管理</a>

            </div>
        </div>


        <div class="left">
            <div class="div1">
                <div class="left_top"><a style="color:white;" href="<?php echo U('Home/Index/index');?>">前往网站首页</a></div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-th-large"></span></div>
                    网站管理
                </div>
                <div class="div3">
                    <ul>

                        <li><a href=<?php echo U('Index/index');?> >信息统计</a></li>
                        <li><a href=<?php echo U('Picture/picture_show');?> >轮播图列表</a></li>
                        <li><a href=<?php echo U('Picture/picture_add');?> >设置轮播图 </a></li>

                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-shopping-cart"></span></div>
                    商品管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Goods/goods_list');?> >商品列表</a></li>

                        <li><a href=<?php echo U('HelpGoods/hg_list');?> >求购列表</a></li>

                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-user"></span></div>
                    用户管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Users/user_list');?> >用户列表</a></li>
                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-align-justify"></span></div>
                    分类管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Categorys/cat_list');?> >分类列表</a></li>

                        <li><a href=<?php echo U('Categorys/cat_add');?> >添加分类</a></li>
                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-home"></span></div>
                    学校管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Areas/area_list');?> >学校列表</a></li>

                        <li><a href=<?php echo U('Areas/area_add');?> >添加学校</a></li>
                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-wrench"></span></div>
                    设置管理员
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Admins/admin_list');?> >管理员列表</a></li>
                        <?php if($a_flag ==1 ): ?><li><a href=<?php echo U('Admins/admin_add');?> >添加管理员</a></li><?php endif; ?>
                        <li><a href=<?php echo U('Admins/change_pwd');?> >修改密码</a></li>

                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-envelope"></span></div>
                    邮件管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Messages/message_list');?> >收件箱</a></li>

                        <li><a href=<?php echo U('Emails/emails_show');?> >发件箱</a></li>

                        <li><a href=<?php echo U('Messages/send_email');?> >发送邮件</a></li>

                    </ul>
                </div>
                <div class="div2">
                    <div class="con"><span class="glyphicon glyphicon-tags"></span></div>
                    公告管理
                </div>
                <div class="div3">
                    <ul>
                        <li><a href=<?php echo U('Tips/tips_show');?> >公告列表 </a></li>

                        <li><a href=<?php echo U('Tips/tips_add');?> >添加公告</a></li>

                    </ul>
                </div>
            </div>

        </div>


    </div>
    

			<!--右边内容显示区-->
<div class="col-md-10 content-right">
	<!--路径-->
<ol class="breadcrumb">
<li><a  style="text-decoration: none;" ><?php echo ($nav1); ?>     </a></li>
  <li><a   style="text-decoration: none;" ><?php echo ($nav2); ?>   </a></li>
  <li class="active"   ><?php echo ($nav3); ?>    </li>
</ol>

	<div class="panel panel-default">
  <!-- 列表信息 -->  
  <div class="panel-heading">
  	分类列表
    <button class="btn btn-primary navbar-right navbt" ><a href=<?php echo U('cat_add');?>  >添加分类</a></button>
  </div>
  
  
  <div class="panel-body">

  <ul class="list-group" id="cate_ul" >
	<?php if(is_array($cate_data)): foreach($cate_data as $key=>$vo): if($vo['c_pid'] == 0 ): ?><li class="list-group-item" style="background-color:#8EBFFA ;">   
      <span class="badge"><a href=<?php echo U("cat_del?id=".$vo['c_pid']."&&ids=".$vo['c_id']);?>  onclick="return confirm('您确定删除此分类？');">删除</a></span>
      <span class="badge"><a href=<?php echo U("cat_update?id=".$vo['c_id']);?>   >编辑</a></span>
      <?php echo ($vo["c_name"]); ?>
      	<?php if(is_array($cate_data)): foreach($cate_data as $key=>$v1): if($v1['c_pid'] == $vo['c_id'] ): ?><li class="list-group-item" >   
    <span class="badge"><a href=<?php echo U("cat_del?id=".$v1['c_pid']."&&ids=".$v1['c_id']);?> onclick="return confirm('您确定删除此分类？');" >删除</a></span>
    <span class="badge"><a href=<?php echo U("cat_update?id=".$v1['c_id']);?>  >编辑</a></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span class="glyphicon glyphicon-hand-right cons" aria-hidden="true"></span> 
  <?php echo ($v1["c_name"]); ?>
  </li><?php endif; endforeach; endif; ?>      	
      </li><?php endif; endforeach; endif; ?>

</ul>	

  </div>
</div>

</div>


</div>
<div>
    <script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>

    <script src="<?php echo (JS_URL); ?>js.js"></script>

</body>
</html>