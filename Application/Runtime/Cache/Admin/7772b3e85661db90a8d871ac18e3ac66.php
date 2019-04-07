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
 	<img src="/Public<?php echo ($picture); ?>" alt="个人图像" class="img-thumbnail img-1" >
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
.dele{
	margin-top: 5px;
	color: red;
	font-size: 20px;
}
.num,.current{
	border: 1px solid #428bca;
    width: 30px;
    height: 24px;
    display: inline-block;
    margin-left: 5px;
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
  <div class="panel-heading">
  	<span>公告列表</span>
  	<a   class="btn btn-info dropdown-toggle pull-right" href=<?php echo U('tips_add');?> >
    添加公告
    </a>
  </div>
  <!-- Table -->
  <table class="table table-striped table-hover">
   <tr >
   	<th> 公告主题</th>
   	<th> 公告时间</th>
   	<th> 查看公告</th>
   	<th> 修改公告</th>
   	<th> 删除公告</th>
   </tr>
   
     <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="tid<?php echo ($val["id"]); ?>" >
   	<td> <?php echo ($val["title"]); ?>  </td>
   	<td> <?php echo ($val["time"]); ?> </td>
   	<td>
	  <a  class="btn btn-success dropdown-toggle" href=<?php echo U('tips_detail?id='.$val['id']);?>  >
	  查看公告
	  </a>   		
   	</td>
   	<td>
	  <a  class="btn btn-warning dropdown-toggle" href=<?php echo U('tips_update?id='.$val['id']);?>  >
	修改公告
      </a>	
   	</td>
   	<td><span  onclick="delete_tip(<?php echo ($val["id"]); ?>);" class="glyphicon glyphicon-remove dele" aria-hidden="true"></span></td>
   </tr><?php endforeach; endif; ?>  
<tr>
   <td align="center" colspan="9"> 
   	<?php echo ($page); ?>
   </td>
</tr>
  </table>
</div>

	
</div>
<script src="<?php echo (JS_URL); ?>jquery.js"></script>
<script>
//删除邮件
function delete_tip(id){

				$.ajax({
				type:"get",
				url:"<?php echo U('delete_tip', '', FALSE); ?>/id/"+id,			
				success:function(data){
				if(data=='y'){
					var tid='#tid'+id;
					$(tid).remove();
					alert('公告删除成功!');
					
				}else{
					alert('公告删除失败!');
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