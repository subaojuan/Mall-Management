<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台首页</title>
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>admin_style.css" >
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>signin.css" >
              <script src="<?php echo (JS_URL); ?>jquery.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $(".div2").click(function(){
                    $(this).next("div").slideToggle("slow")
                            .siblings(".div3:visible").slideUp("slow");
                });
            });
        </script>
        <style>
            body{ margin:0;font-family:微软雅黑;}
            .left{ width:200px; height:100%; border-right:1px solid #CCCCCC ;#FFFFFF; color:#000000; font-size:14px; text-align:center;}
            .div1{text-align:center; width:200px; }
            .div2{background:rgba(220, 220, 220, 0.29);  height:40px; line-height:40px;cursor: pointer; font-size:13px; position:relative;border-bottom:#6d4c4c 1px dotted;}
            .con {position: absolute; height: 20px; width: 20px; left: 40px;}
            .div3{display: none;cursor:pointer; font-size:13px;}
            .div3 ul{margin:0;padding:0;}
            .div3 li{ height:30px; line-height:30px; list-style:none; border-bottom:#ccc 1px dotted; text-align:center;}
            .div3 li a{ text-decoration: none;}
        </style>


	</head>
	<body>
	
		<!--头部-->
	<header class="header">
	<img src="<?php echo (IMG_URL); ?>admin/logo.png" alt="网站logo" class="logo" >
	<span class="pull-right time" id="time"></span>

</header>
	
	
			<div style="margin-top: 3px; height: 50px;"></div>
		<div class="row nav-1" style="border:none" >
			<!--左边导航栏-->
			<div class="col-md-2 content-left" >
		<!-- 菜单栏 -->
<div class="row nav-2" >
 <div class="col-md-6" >
 	<img src="/school/Public<?php echo ($picture); ?>" alt="个人图像" class="img-thumbnail img-1" >
 </div>
 <div class="col-md-6">
<div class="alert alert-success img-info nick"  > <?php echo ($nickname); ?> </div>
<a class="btn btn-info logout" id="logout" href="<?php echo U('Login/logout');?>" >退出管理</a>
 	
 </div>
</div>


                <div class="left">
                    <div class="div1">
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-th-large"></span> </div>网站管理</div>
                        <div class="div3">
                            <ul>

                                <li><a href=<?php echo U('Index/index');?> >信息统计</a></li>
                                <li><a href=<?php echo U('Picture/picture_show');?>    >轮播图列表</a></li>
                                <li><a href=<?php echo U('Picture/picture_add');?>    >设置轮播图 </a></li>

                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-shopping-cart"></span> </div>商品管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Goods/goods_list');?>     >商品列表</a></li>

                                <li><a href=<?php echo U('HelpGoods/hg_list');?>     >求购列表</a></li>

                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-user"></span> </div>用户管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Users/user_list');?> >用户列表</a></li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-align-justify"></span> </div>分类管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Categorys/cat_list');?>    >分类列表</a></li>

                                <li><a href=<?php echo U('Categorys/cat_add');?>    >添加分类</a></li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-home"></span> </div>学校管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Areas/area_list');?>    >学校列表</a></li>

                                <li><a href=<?php echo U('Areas/area_add');?>    >添加学校</a></li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"><span class="glyphicon glyphicon-wrench"></span>  </div>设置管理员</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Admins/admin_list');?>    >管理员列表</a></li>
                                <?php if($a_flag ==1 ): ?><li><a href=<?php echo U('Admins/admin_add');?>    >添加管理员</a></li><?php endif; ?>
                                <li><a href=<?php echo U('Admins/change_pwd');?>    >修改密码</a></li>

                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-envelope"></span> </div>邮件管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Messages/message_list');?>    >收件箱</a></li>

                                <li><a href=<?php echo U('Emails/emails_show');?>    >发件箱</a></li>

                                <li><a href=<?php echo U('Messages/send_email');?>    >发送邮件</a></li>

                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-tags"></span> </div> 公告管理</div>
                        <div class="div3">
                            <ul>
                                <li><a href=<?php echo U('Tips/tips_show');?>    >公告列表 </a></li>

                                <li><a href=<?php echo U('Tips/tips_add');?>    >添加公告</a></li>

                            </ul>
                        </div>
                    </div>

                </div>




</div>
	
<style>
.imgs{
	width:750px;
	height:330px;
	
}	
	
</style>	


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
  	设置轮播图
    <a class="btn btn-primary navbar-right navbt"href=<?php echo U('picture_show');?> >轮播图列表</a>
  </div>
  <div class="panel-body">
<form enctype="multipart/form-data"  action="/school/index.php/Admin/Picture/picture_add.html" method="post">
  <ul class="list-group" >

	<li class="list-group-item" style="text-align: center;" >
	  <div  id="preview" class="item">
      <img id="img0"  class="imgs" src="" >     
	  </div>
	  
      <p> <input type="file"  name="url"  id="file0">
      	<input type="hidden"  name="flag" value="n" />
      	<button type="submit" class="btn btn-info">添加轮播图</button></p>
	</li>


</form>
</ul>	

  </div>
</div>

</div>

<script type="text/javascript" src="/school/Public/ueditor/third-party/jquery.min.js"></script>

<script>
$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;
//建立一個可存取到該file的url
function getObjectURL(file) {
	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}	
</script>
	
</div>		
<div>			
	<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>	
	
<script src="<?php echo (JS_URL); ?>js.js"></script>
	
	</body>
</html>