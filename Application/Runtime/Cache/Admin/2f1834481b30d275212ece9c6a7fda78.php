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
                                <li><a href=<?php echo U('Index/index');?> >信息统计</a>
                                </li>
                                <li> 管理设置</li>
                                <li> 导航菜单</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-shopping-cart"></span> </div>商品管理</div>
                        <div class="div3">
                            <ul>
                                <li> 网站配置</li>
                                <li> 管理设置</li>
                                <li> 导航菜单</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-user"></span> </div>用户管理</div>
                        <div class="div3">
                            <ul>
                                <li> 网站配置</li>
                                <li> 管理设置</li>
                                <li> 导航菜单</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-align-justify"></span> </div>分类管理</div>
                        <div class="div3">
                            <ul>
                                <li> 网站配置</li>
                                <li> 管理设置</li>
                                <li> 导航菜单</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-home"></span> </div>学校管理</div>
                        <div class="div3">
                            <ul>
                                <li> 网站配置</li>
                                <li> 管理设置</li>
                                <li> 导航菜单</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"><span class="glyphicon glyphicon-wrench"></span>  </div>设置管理员</div>
                        <div class="div3">
                            <ul>
                                <li> 管理文章</li>
                                <li> 文章分类</li>
                                <li> 添加文章</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-envelope"></span> </div>邮件管理</div>
                        <div class="div3">
                            <ul>
                                <li>图片管理</li>
                                <li> 图片分类</li>
                                <li> 添加图片</li>
                            </ul>
                        </div>
                        <div class="div2"><div class="con"> <span class="glyphicon glyphicon-tags"></span> </div> 公告管理</div>
                        <div class="div3">
                            <ul>
                                <li> 文章系统</li>
                                <li> 图片系统</li>
                                <li> 添加表单</li>
                                <li> 招聘系统</li>
                            </ul>
                        </div>
                    </div>
                    <div class="div2"><div class="con"><span class="glyphicon glyphicon-globe"></span>  </div>网站管理</div>
                    <div class="div3">
                        <ul>
                            <li>图片管理</li>
                            <li> 图片分类</li>
                            <li> 添加图片</li>
                        </ul>
                    </div>
                </div>







                <!--控制台模块-->
<div class="row nav-2"  >
	<div class="col-md-12" id="bg1">
		<a href=<?php echo U('Index/index');?> >
<div class="btn-group list-2" role="group" aria-label="..." >
	<button type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
</button>
	<button  class="btn btn-default btn-default-1 list-b2" href=<?php echo U('Index/index');?> >控制台</button>
	<button type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       
    <span class="glyphicon glyphicon-bookmark"></span> 
  </button>
	 </div>
	 </a>
	 </div>
</div>	

<!--商品管理菜单-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg2" >
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >商品管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-apple"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" id="bg_li" >
    <li><a href=<?php echo U('Goods/goods_list');?>     >商品列表</a></li>
    <li class="divider"></li>  
    <li><a href=<?php echo U('HelpGoods/hg_list');?>     >求购列表</a></li>
    <li class="divider"></li>  
  </ul>
</div>	
</div>
</div>


<!--会员管理菜单-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg3">
	<div class="btn-group" >
	<button type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
</button>
  <button type="button" class="btn btn-default btn-default-1 list-b2" >用户管理</button>
  
  <button type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Users/user_list');?> >用户列表</a></li>
    <li class="divider"></li>
    
  </ul>
  
</div>	

</div>
</div>
<!--分类管理-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg4">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >分类管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Categorys/cat_list');?>    >分类列表</a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Categorys/cat_add');?>    >添加分类</a></li>
    <li class="divider"></li> 

  </ul>
</div>	
</div>
</div>
<!--区域管理模块-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg5">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >地域管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3  " data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Areas/area_list');?>    >学校列表</a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Areas/area_add');?>    >添加学校</a></li>
    <li class="divider"></li> 

  </ul>
</div>	
</div>
</div>
<!--管理员设置-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg6">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >管理员设置</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Admins/admin_list');?>    >管理员列表</a></li>
    <li class="divider"></li> 
    <?php if($a_flag ==1 ): ?><li><a href=<?php echo U('Admins/admin_add');?>    >添加管理员</a></li>
   <li class="divider"></li><?php endif; ?>
 <li><a href=<?php echo U('Admins/change_pwd');?>    >修改密码</a></li>
    <li class="divider"></li> 
  </ul>
</div>	
</div>
</div>

<!--邮件管理-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg4">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >邮件管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Messages/message_list');?>    >收件箱</a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Emails/emails_show');?>    >发件箱</a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Messages/send_email');?>    >发送邮件</a></li>
    <li class="divider"></li> 

  </ul>
</div>	
</div>
</div>


<!--公告管理-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg4">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >公告管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
    <li><a href=<?php echo U('Tips/tips_show');?>    >公告列表 </a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Tips/tips_add');?>    >添加公告</a></li>
    <li class="divider"></li> 
    

  </ul>
</div>	
</div>
</div>
<!--网站管理-->
<div class="row nav-2" >
	<div class="col-md-12" id="bg4">
<div class="btn-group list-2" >
	
 <button   type="button" class="btn btn-default btn-default-1 list-b1" aria-label="Left Align">
  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
</button>
  <button   type="button" class="btn btn-default btn-default-1 list-b2" >网站管理</button>
  <button   type="button" class="btn btn-default btn-default-1 dropdown-toggle list-b3" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
    <span class="glyphicon glyphicon-menu-down"></span> 
  </button>
  
  <ul class="dropdown-menu list-1" role="menu" >
  	    <li><a href=<?php echo U('Picture/picture_show');?>    >轮播图列表</a></li>
    <li class="divider"></li> 
    <li><a href=<?php echo U('Picture/picture_add');?>    >设置轮播图 </a></li>
    <li class="divider"></li> 

    

  </ul>
</div>	
</div>
</div>

</div>
	
<style>
.num,.current{
	border: 1px solid #428bca;
    width: 30px;
    height: 24px;
    display: inline-block;
    margin-left: 5px;
}
.prev,.next{
	border: 1px solid #428bca;
    display: inline-block;
    margin-left: 5px;
    width: 60px;	
}
.dele{
	margin-top: 26px;
	color: red;
	font-size: 20px;
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
  	用户列表
  </div>
  
  
  <div class="panel-body">

    <table class="table table-striped table-hover ">
   <tr >
   	<th> 用户图像</th>
   	<th> 用户账号</th>
   	<th> 用户昵称</th>
   	<th> 用户学校</th>
   	<th> 用户QQ</th>
   	<th> 用户手机</th> 
   	<th> 注册时间</th>
   	<th> 删除用户</th>  
   </tr>
    <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="uid<?php echo ($val["u_id"]); ?>" >  
   	<td>
   		<img src="/school/Public<?php echo ($val["u_picture"]); ?>"   alt="个人图像" class="img-thumbnail img-1" >
   	</td>
   	<td ><?php echo ($val["u_account"]); ?>    </td>
   	<td > <?php echo ($val["u_nickname"]); ?>  </td>
   	<td > <?php echo ($val["u_school"]); ?>  </td>
   	<td > <?php echo ($val["u_qq"]); ?>  </td>
   	<td > <?php echo ($val["u_phone"]); ?>  </td>
   	<td > <?php echo ($val["u_time"]); ?>  </td>
   	<td><span  onclick="delete_user(<?php echo ($val["u_id"]); ?>);" class="glyphicon glyphicon-remove dele" aria-hidden="true"></span></td>

   </tr><?php endforeach; endif; ?>
   
<tr>
   <td align="center" colspan="9"> 
   	<?php echo ($page); ?>
   </td>
</tr>
  </table>
	

  </div>
  
  
</div>

</div>

<script>
	
		function delete_user(u_id){

			    $.ajax({
				type:"get",
				url:"<?php echo U('deleteuser', '', FALSE); ?>/u_id/"+u_id,			
				success:function(data){
				if(data=='y'){
					var uid='#uid'+u_id;
					$(uid).remove();
					alert('用户删除成功!');
					
				}else{
					alert('用户删除失败!');
				}
			   
		}
	});
	}
</script>

	
</div>		
<div>			
	<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>	
	
<script src="<?php echo (JS_URL); ?>js.js"></script>
	
	</body>
</html>