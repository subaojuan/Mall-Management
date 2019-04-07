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
      <input type="text" class="form-control input_but1"  placeholder="输入搜索内容">
      <span class="input-group-btn" >
        <button class="input_but2"  type="button">搜索</button>
      </span>
    </div>
        
      </div>
    </div>
  <div class="container">   




	

<!--商品信息模块-->
<div class="row">

	<!--右边信息显示-->
	<div class="col-md-10 desc">
		<ul class="list-group">
		  <li class="list-group-item goods_name"><span>求购物品:</span><?php echo ($data["h_name"]); ?></li>
		  <li class="list-group-item"><span>商品数量:</span><span><?php echo ($data["h_num"]); ?></span></li>
		   <li class="list-group-item"><span class="goods_pf">￥</span>
		  	                          <span class="goods_price"><?php echo ($data["h_price"]); ?></span>
		  </li>
		  <li class="list-group-item"><span>所属学校:</span><span><?php echo ($sch); ?></span></li>
		  <li class="list-group-item"><span>联系QQ:</span><span><?php echo ($user_qq); ?></span></li>
		 <li class="list-group-item contact_btn" >  <button type="button" class="btn btn-info">直通卖家</button></li>

		</ul>
				
	</div>

</div>

<!--商品详情-->

<div class="row">
	
	<div class="col-md-10 desc">
		<ul class="list-group">
		  <li class="list-group-item active" >求购附加信息</li>
		  <li class="list-group-item" style="overflow-x: hidden;">
		  	<div style="width:100%;">
		  		<?php echo ($data["h_desc"]); ?>
		  		
            </div>
		  </li>
		  
		</ul>
	</div>

</div>

















</div>	

	</body>
	<script src="./js/jquery.js"></script>		
	<script src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/umeditor.min.js"></script>
	<script src="./js/js.js"></script>	

</html>

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