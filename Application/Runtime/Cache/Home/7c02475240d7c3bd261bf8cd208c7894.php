<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
<title>北郊三校服务平台</title>
    <meta charset="UTF-8">
      <link rel="stylesheet" href="<?php echo (CSS_URL); ?>bootstrap.min.css" >
        <link rel="stylesheet" href="<?php echo (CSS_URL); ?>h_style.css" >
    <title></title>
    <style>
    	.login_img{
    		width:26px ;
    		height:26px;
    		border:0px;
    		background-color: #F71543;
        
    	}
     .logindiv{
   
     }	

     .login_a{
     	color:white;
     	font-size: 14px;
     	margin-left: -7px;
     }
     .login_out{
     	color:black;
     	font-size: 12px;
     	margin-top: 5px;
     	margin-left: -10px;
     }
    	</style>
  </head>
  <body>
  <header class="h_header">
  	<a  class="btn modal_btn " href=<?php echo U('Index/index');?>  >首页</a>	
  	<div class="pull-right" id="divlogin1" style="display:block">
  		
	
  	<a  class="btn modal_btn " href=<?php echo U('Login/showlogin');?>  >登录</a>		
		<a  class="btn modal_btn"  href=<?php echo U('Login/showlogin');?> >注册</a>
  	</div>
	<div class="pull-right logindiv" id="divlogin2" style="display:none">
		
	</div>
	
  </header> 
  
  
  
  
  
  
  
    <!--网站logo和搜索框的设计-->
    <div class="row logo_sec">
      <div class="col-md-6 h_logo">
      <a href=<?php echo U('Index/index');?> >  <img src="<?php echo (IMG_URL); ?>home/logo.png" alt="网站logo" class="logo" ></a>
      </div>
      
  <div class="col-md-6 h_sec">
    <div class="input-group input_but" >
      <form method="get" action="<?php echo U('Goods/searchs');?>">
      <input type="text" name="key" class="form-control input_but1"  placeholder="输入商品名称">
     </form>
         <span class="input-group-btn" >
        <input type="submit" class="input_but2"  >搜索</input>
      </span>
    </div>
        
      </div>
    </div>
  <div class="container">   



	<style>
		.select1{
			height: 25px;
		}
		.btn-info{	
		    background-color: rgba(230, 221, 173, 0.43);
		    border: none;
		    color: #3e8ea0;
		}
		.btn-info:hover{
			 background-color: rgba(230, 221, 173, 0.43);
			 color: blueviolet;
		}
		
	</style>
<div class="container" style="margin-left: -18px;">

	
	<div class="panel panel-warning" >
	  <div class="panel-heading">
	  	<a class="btn btn-info" href=<?php echo U('Users/user_show');?>  ><?php echo ($title); ?>  </a>
	  
	  </div>
	  
	  <form enctype="multipart/form-data"  action="/index.php/Home/Users/hg_add.html" method="post">
	  <ul class="list-group "  >	
 
	    <li class="list-group-item" >
	   <label for="exampleInputName2">求购名称:</label>
	    <input type="text" name="h_name" class="form-control cate_input" id="" placeholder="请输入商品名称">
	    	
	    </li>

	    <li class="list-group-item" >
	    	<label for="exampleInputName2">求购数量:</label>
	    	<input type="text" name="h_num" class="form-control cate_input"  placeholder="请输入商品数量">
	    	 
	    </li>

	    
	    <li class="list-group-item" >
	    	<label for="exampleInputName2">求购价格:</label>
	    	<input type="text" name="h_price" class="form-control cate_input"  placeholder="请输入商品价格">
	    	 
	    </li>
	    

	    <li class="list-group-item" >
	    	<label for="exampleInputName2">商品描述:</label>
	    	<textarea id="myEditor" name="h_desc">    
            </textarea>
	    </li> 
 
	     <li class="list-group-item" style="text-align: center;"> 
	    	
	  <button type="submit" class="btn btn-warning" id="sale">发布求购</button>	
	
	     </li>
	</ul>	
	</form>
	

	
</div>
</div>
    <link href="/Public/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/ueditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
	 UM.getEditor('myEditor',{
	 	initialFrameWidth:"100%",
		initialFrameHeight:400
	 	
	 });
	 //监听主分类select事件
	 $('#select1').change(function(){
	 	var cate_id=$(this).children('option:selected').val();//这就是selected的值 	 	
	    $.ajax({
				type:"get",
				url:"<?php echo U('ajaxGetCate', '', FALSE); ?>/cate_id/"+cate_id,
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
<footer class="h_footer">
  
</footer>
  </body>
 <script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
  <script src="<?php echo (JS_URL); ?>js.js"></script>  
  <script src="<?php echo (JS_URL); ?>header.js"></script>
  <script>
  	
  	 	$.ajax({
				type:"get",
				url:"<?php echo U('Login/check_online', '', FALSE); ?>",
				dataType:'json',
			    success:function(data){			    			    	
			    	if(data){		
			    		
			    		$("#divlogin1").css('display','none');
			    		var infos="";
			    		infos+='<img  class="img-rounded login_img"  src="/Public'+data["u_picture"]+'"  />';
	            infos+='<a  class="btn login_a " href=<?php echo U("Users/user_show");?>  >欢迎,'+data["u_nickname"]+'</a>';
	            infos+='<a  class="btn login_out"  onclick="loginout();" >退出</a>';
			    		$("#divlogin2").html(infos);
			    		$("#divlogin2").css('display','block');
			    	}
			    	
			    	
			    }
			
			});
			
  	function loginout(){
  			$.ajax({
				type:"get",
				url:"<?php echo U('Login/loginout', '', FALSE); ?>",
			    success:function(data){
			    	if(data=='y'){
			    		$("#divlogin2").css('display','none');
			    		$("#divlogin1").css('display','block');
			    		 location.href="<?php echo U('Login/showlogin');?>";
			    	}
			    }
			
			});
  		
  	}
  	
  </script>	
  <!--导入在线编辑器 -->
</html>