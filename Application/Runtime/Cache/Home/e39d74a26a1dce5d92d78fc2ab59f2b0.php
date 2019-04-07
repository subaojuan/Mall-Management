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
      <input type="text" id="key" class="form-control input_but1"  placeholder="输入商品名称">
     
         <span class="input-group-btn" >
        <button type="button" onclick="search();"  class="input_but2"  >搜索</button>
      </span>
    </div>
        
      </div>
    </div>
  <div class="container">   



<style>
    .null_div{
        width: 100%;
        height: 150px;
        margin-top: 30px;
        color: #9C27B0;
        font-size: 20px;
        text-align: center;
        padding-top: 70px;
    }
    .index_img{
        width: 750px;
        height: 330px;
    }

    .prev,.next{
        border: 1px solid #428bca;
        display: inline-block;
        margin-left: 5px;
        width: 60px;
        height: 24px;
    }

    .num,.current{
        border: 1px solid #428bca;
        width: 40px;
        height: 24px;
        display: inline-block;
        margin-left: 5px;
    }

</style>
<!--导航栏-->



<div class="row goods_info" >

    <?php if(is_array($data)): foreach($data as $key=>$val): ?><div class="goods_list">
            <ul class="list-group" >
                <li class="list-group-item goods_li">
                    <a  class="thumbnail" href=<?php echo U('Goods/goods_detail?g_id='.$val['g_id']);?> >
                        <img src=/school/Public<?php echo ($val["g_logo"]); ?> >
                    </a>
                </li>
                <li class="list-group-item " style="margin-top: -32px;" ><?php echo ($val["g_name"]); ?> </li>
                <li class="list-group-item"><?php echo (substr($val["g_time"],0,10)); ?> </li>
                <li  style="color:#c40000;"  class="list-group-item"><?php echo ($val["g_price"]); ?></li>
            </ul>
        </div><?php endforeach; endif; ?>

</div>

<div style="text-align:center;" >
    <?php echo ($page); ?>
</div>

<script src="<?php echo (JS_URL); ?>jquery.js"></script>

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
			    		infos+='<img  class="img-rounded login_img"  src="/school/Public'+data["u_picture"]+'"  />';
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

 	  	function search(){
               var key=$('#key').val();

  	//		$.ajax({
	//			type:"get",
	//、、			url:"<?php echo U('Goods/ajaxsearch', '', FALSE); ?>/key/"+key,
	///		    success:function(data){
	//		 alert(data);
			 
			 location.href="<?php echo U('Goods/searchs');?>"+'?key='+key;
	//		    }
			
	//		});
  		
  	}
  	
  </script>	
  <!--导入在线编辑器 -->
</html>