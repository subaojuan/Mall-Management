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
    
<style>
	.mesinput{
		width:500px;
		display: inline;
	}
	.list-group li {
		text-align: center;
	}
	.msglabel{
		display: inline-block;
	    float: left;
	    margin-left: 275px;
	    margin-right: -250px;
	}
	.mestextarea{
		width:500px;
		height: 300px;
		resize: none;
		color: gray;
		text-indent: 10px;
		
	}
	.labelinput{
		display: inline-block;
		margin-right: 8px;
		margin-left: 10px;
	}
	

.list-group-item {
	border: none;
}
</style>

<div class="col-md-10 content-right">
	
	<div class="panel panel-warning" >
	  <div class="panel-heading">
	  	<a class="btn btn-info" href=<?php echo U('Messages/message_list');?>  ><?php echo ($title); ?>  </a>
	  	
	  </div>
	  
	  <form enctype="multipart/form-data" id="form"  action="/school/index.php/Admin/Messages/send_email.html" method="post">
	  <ul class="list-group "  >	
	    <li class="list-group-item" >
	   <label class="labelinput">收件人</label>
	    <input type="text" name="e_user" class="form-control mesinput" id="e_user" value=<?php echo ($u_account); ?>  >
	    	
	    </li>
	    <li class="list-group-item" >
	   <label class="labelinput">邮件主题</label>
	    <input type="text" name="e_title" class="form-control mesinput" id="e_title" placeholder="邮件主题不超过16个字">
	    	
	    </li>
       
	     <li class="list-group-item" >
	    	<label class="msglabel">邮件内容</label>
	    	<textarea id="e_content" class="mestextarea"  name="e_content" >字数不能超过200个字</textarea>
	    </li> 

 
	     <li class="list-group-item" style="text-align: center;"> 
	    	
	  <button type="submit" class="btn btn-warning" id="mes_btn">发送邮件</button>	
	
	     </li>
	</ul>	
	</form>
	
	
</div>
</div>
<script src="<?php echo (JS_URL); ?>jquery.js"></script> 
<script>

	
	$("#mes_btn").click(function(){
		var m_title=$("#m_title").val();
		var m_content=$("#m_content").val();
		
		if(m_title.length<1|| m_title.length>16){
			alert("邮件主题不能为空或者字数不能超过16个字");
		}if(m_content.length>200||m_content =='字数不能超过200个字'){
			alert("邮件内容不能为空或者字数不能超过200个字");
		}else{
			$("#form").submit();
		}
		
		
	});
	
</script>


</div>
<div>
    <script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>

    <script src="<?php echo (JS_URL); ?>js.js"></script>

</body>
</html>