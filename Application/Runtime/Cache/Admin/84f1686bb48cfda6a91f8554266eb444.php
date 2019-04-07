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
.goods_img{
	width:70px;
	height:70px;
}
.table tr td{
	text-align: center;
	
}	
.dele{
	margin-top: 26px;
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
.prev,.next{
        border: 1px solid #428bca;
    display: inline-block;
    margin-left: 5px;
    width: 60px;
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
  <div class="panel-heading">商品列表</div>
  <div class="panel-body">
  <form action="/index.php/Admin/Goods/goods_list" method="get" name="searchform">
   	<div class="col-lg-6 search-2" >
   		

        <div class="col-lg-8" style="margin-left: 0px;">
    <div class="input-group">    
      <input type="text" name="searchinfo" id="searchtext" style="width:400px" class="form-control" placeholder="输入商品名">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary" id="bt1" >搜索</button>
      </span>
    </div>
  
    </div>
  </div>
  
  
<ul class="nav nav-list" > 
     <li class="divider"></li>  
</ul>
<hr class="hr"/>

 
  <div class="row search-3"  style="margin-left: 3px;">
  	
 
  	<!--新旧程度-->
  	 <div class="col-md-4">
  		<label>新旧程度</label>
        <select name="g_new" class="search-1">
             <option value="0" >选择新旧程度</option>
                <?php if(is_array($new_data)): foreach($new_data as $key=>$v): ?><option value=<?php echo ($v["gn_id"]); ?> <?php if($g_new_type == $v['gn_id']): ?>selected=selected<?php endif; ?> ><?php echo ($v["gn_name"]); ?></option><?php endforeach; endif; ?>	
                         
        </select>
    </div>
    <!--是否议价-->
    <div class="col-md-4">
  	<label>能否议价</label>	
        <select name="is_price" class="search-1">
        	 <option value='-1' selected="selected"> 选择是否议价</option>
        	 <option value='1'  <?php if($is_price_type == 1 ): ?>selected=selected<?php endif; ?>  >可以议价</option>                       
             <option value='2'  <?php if($is_price_type == 2 ): ?>selected=selected<?php endif; ?> >不可议价</option>
        </select>
    </div>
  	<div class="col-md-4" >
  	 		<label>时间前后</label>
  		<select name="g_time" class="search-1">
  			<option value="0" selected=selected>选择时间顺序</option>
             <option value="desc" <?php if($g_time_type == 'desc' ): ?>selected=selected<?php endif; ?>  >从近到远</option>
             <option value="asc"   <?php if($g_time_type == 'asc' ): ?>selected=selected<?php endif; ?> >从远到近</option>                       
        </select>
  	</div>
  	
  </div>
<div class="row search-3"  style="margin-left: 3px;">

  	<!--价格从低到高-->
  	<div class="col-md-4" >
  		<label>价格高低</label>
  		<select name="g_price" class="search-1">
  			<option value="0" selected=selected>选择价格顺序</option>
             <option value="desc" <?php if($g_price_type == 'desc' ): ?>selected=selected<?php endif; ?>>从高到低</option>
             <option value="asc" <?php if($g_price_type == 'asc' ): ?>selected=selected<?php endif; ?> >从低到高</option>                       
        </select>
  	</div>
  	<div class="col-md-4" >
  	<label>学校名称</label>
  	<select name="school_id" class="search-1" >
            <option value="0" selected=selected>选择学校名称</option>
             <option value="2" <?php if($g_school_id == 2 ): ?>selected=selected<?php endif; ?> >西安工业大学</option> 
             <option value="3" <?php if($g_school_id == 3 ): ?>selected=selected<?php endif; ?> >陕西科技大学</option> 
             <option value="4" <?php if($g_school_id == 4 ): ?>selected=selected<?php endif; ?> >西安医学院</option> 
        </select>
  	</div>
  	<div class="col-md-4">
  		<!--分类查询-->
  		<!--主分类-->
  		<label>商品分类</label>
	    	<select name="g_category"   class="select1" id="selects" >
	            <option value="0" selected="selected" >选择主分类</option>   
	          <?php if(is_array($cate_data1)): foreach($cate_data1 as $key=>$v1): ?><option value=<?php echo ($v1["c_id"]); ?> <?php if($g_cate_id == $v1['c_id'] ): ?>selected=selected<?php endif; ?>  ><?php echo ($v1["c_name"]); ?></option><?php endforeach; endif; ?>  
	        </select>
	    	<select name="g_categorys"   class="select1" id="select2" >
	            <option value="0" selected="selected">选择子分类</option> 
	            
	        </select>
  	</div>
</div>

<div class="row search-3"  style="margin-left: 3px;margin-top: 20px;
	margin-bottom: 5px;text-align: center;">
	<div class="col-md-4">
		<button type="submit" class="btn btn-primary" >
			开始筛选
		</button>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<a  class="btn btn-primary" href=<?php echo U('Goods/goods_list');?> >
			刷新商品
		</a>
	</div>
  
  
</div>	
<hr class="hr"/>
 </form>
  </div>



  <!-- Table -->
  <table class="table table-striped table-hover table-bordered">
   <tr >
   	<th> 商品ID</th>
   	<th> 商品图片</th>
   	<th> 商品名称</th>
   	<th> 商品品牌</th>
   	<th> 商品价格</th>
   	<th> 商品数量</th>
   	<th> 新旧程度</th>  	
   	<th> 能否议价</th>
   	<th> 出售学校</th>
   	<th> 主分类</th>
   	<th> 子分类</th>
   	<th> 卖家ID</th>
   	<th> 创建时间</th>
   	<th> 删除商品</th>
   </tr>
   
     <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="gid<?php echo ($val["g_id"]); ?>" >
   	<td>
   		<?php echo ($val["g_id"]); ?>
   		
   	</td>
   	<td> <img  src="/Public<?php echo ($val['g_logo']); ?>" class="img-thumbnail goods_img " ></td>
   	<td> <?php echo ($val["g_name"]); ?>  </td>
   	<td> <?php echo ($val["g_brand"]); ?> </td>
   	<td> <?php echo ($val["g_price"]); ?> </td>
   	<td> <?php echo ($val["g_num"]); ?></td>
   	<td>
   		<?php if(is_array($new_data)): foreach($new_data as $key=>$v): if($val['g_new'] == $v['gn_id']): echo ($v["gn_name"]); endif; endforeach; endif; ?>	
   	</td>
   	<td> 
   	<?php if($val['is_price'] == 1): ?>可以议价	
   	<?php else: ?>	
   	不可议价<?php endif; ?>
   	
   	</td>
   	<td>
       <?php if(is_array($sch_data)): foreach($sch_data as $key=>$v1): if($val['g_school'] == $v1['a_id']): echo ($v1["a_name"]); endif; endforeach; endif; ?>	
   		
   	</td>
   	  	<td>
       <?php if(is_array($cate_data)): foreach($cate_data as $key=>$v2): if($val['g_category'] == $v2['c_id']): echo ($v2["c_name"]); endif; endforeach; endif; ?>	
   		
   	</td>
   	<td>
       <?php if(is_array($cate_data)): foreach($cate_data as $key=>$v3): if($val['g_categorys'] == $v3['c_id']): echo ($v3["c_name"]); endif; endforeach; endif; ?>	
   		
   	</td>
   	<td>
   	<?php echo ($val["g_user"]); ?>
   	</td>
   	<td>
   	<?php echo ($val["g_time"]); ?>
   	</td>

   	<td><span  onclick="delete_goods(<?php echo ($val["g_id"]); ?>);" class="glyphicon glyphicon-remove dele" aria-hidden="true"></span></td>
   </tr ><?php endforeach; endif; ?>
   
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
	//删除商品
	function delete_goods(g_id){

			    $.ajax({
				type:"get",
				url:"<?php echo U('deletegoods', '', FALSE); ?>/g_id/"+g_id,			
				success:function(data){
				if(data=='y'){
					var gid='#gid'+g_id;
					$(gid).remove();
					alert('商品删除成功!');
					
				}else{
					alert('商品删除失败!');
				}
			   
		}
	});
	}
	
		 $('#selects').change(function(){
	 	
	 	var cate_id=$(this).children('option:selected').val();//这就是selected的值 	 	
	    $.ajax({
				type:"get",
				url:"<?php echo U('Home/Goods/ajaxGetCate', '', FALSE); ?>/cate_id/"+cate_id,
				dataType:'json',
				success:function(data){
					var options="";
			    $(data).each(function(k,v){
			    	options+='<option value="'+v.c_id+'" >';
			    	options+=v.c_name;
			    	options+='</option>';
			    	
			    });
			    
			    $("#select2").html(options);
		}
	});
	
	 });
	
</script>	

	
</div>		
<div>			
	<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>	
	
<script src="<?php echo (JS_URL); ?>js.js"></script>
	
	</body>
</html>