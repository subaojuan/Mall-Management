<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台首页</title>
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>admin_style.css" >
		<link rel="stylesheet" href="<?php echo (CSS_URL); ?>signin.css" >
              <script src="<?php echo (JS_URL); ?>jquery.js"></script>
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
.prev,.next{
	border: 1px solid #428bca;
    display: inline-block;
    margin-left: 5px;
    width: 60px;	
}

.num,.current{
	border: 1px solid #428bca;
    width: 30px;
    height: 24px;
    display: inline-block;
    margin-left: 5px;
}	
.dele{
	margin-top: 5px;
	color: red;
	font-size: 20px;
}
.notread{
	color: red;
}	
.read{
	color: green;s
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
  <div class="panel-heading">邮件列表</div>
  <!-- Table -->
  <table class="table table-striped table-hover">
   <tr >
   	<th> 邮件主题</th>
   	<th> 收件人</th>
   	<th> 发件时间</th>
   	<th> 查看详情</th>
   	<th> 删除邮件</th>
   </tr>
   
     <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="mid<?php echo ($val["e_id"]); ?>" >
   	<td> <?php echo ($val["e_title"]); ?>  </td>
   	<td> <?php echo ($val["e_user"]); ?> </td>
   	<td> <?php echo ($val["e_time"]); ?></td>  	
   	<td>
	  <button onclick="look_email(<?php echo ($val["e_id"]); ?>);"  type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	    查看邮件 
	  </button>   		
   	</td>
   	<td><span  onclick="delete_mes(<?php echo ($val["e_id"]); ?>);" class="glyphicon glyphicon-remove dele" aria-hidden="true"></span></td>
   </tr><?php endforeach; endif; ?>  
<tr>
   <td align="center" colspan="9"> 
   	<?php echo ($page); ?>
   </td>
</tr>
  </table>
</div>
<div class="panel panel-default" id="mes_content"  style="display: none;" >
  <div class="panel-body" >
 <p>发件人:<span id="span_user"></span></p>
 <p>邮件主题:<span id="span_title"></span></p>
 <p>邮件内容:<span id="span_content"></span></p>
    
  </div>
  <div class="panel-body" >
 <button type="button" id="closeinfo" class="btn btn-info dropdown-toggle pull-right" data-toggle="dropdown" aria-expanded="false">
关闭邮件内容
 </button>
 </div>
</div>
	
</div>
<script src="<?php echo (JS_URL); ?>jquery.js"></script>
<script>
//删除邮件
function delete_mes(e_id){
	
				$.ajax({
				type:"get",
				url:"<?php echo U('delete_email', '', FALSE); ?>/e_id/"+e_id,			
				success:function(data){
				if(data=='y'){
					var mid='#mid'+e_id;
					$(mid).remove();
					alert('邮件删除成功!');
					
				}else{
					alert('邮件删除失败!');
				}
			   
		}
	});
	
}
//查看邮件
function look_email(e_id){
	$("#mes_content").css('display','none');
				$.ajax({
				type:"get",
				url:"<?php echo U('look_email', '', FALSE); ?>/e_id/"+e_id,
				dataType:'json',
				success:function(data){
					if(data){
						$("#mes_content").css('display','block');
							$('#span_user').html(data.e_user);
							$('#span_title').html(data.e_title);
							$('#span_content').html(data.e_content);

							
							
					}

			   
		}
	});
	
}
//关闭邮件内容
$("#closeinfo").click(function(){
	
	$("#mes_content").css('display','none');
});

	
</script>	

	
</div>		
<div>			
	<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>	
	
<script src="<?php echo (JS_URL); ?>js.js"></script>
	
	</body>
</html>