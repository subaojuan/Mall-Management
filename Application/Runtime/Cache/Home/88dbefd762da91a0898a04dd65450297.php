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
</style>


	
	<div class="panel panel-warning" >
	  <div class="panel-heading">
	  	<a class="btn btn-info" href=<?php echo U('Users/user_show');?>  ><?php echo ($title); ?>  </a>
	  	
	  </div>
	  
	  <form enctype="multipart/form-data" id="form"  action="/school/index.php/Home/Messages/showmsg.html" method="post">
	  <ul class="list-group " " >	

	    <li class="list-group-item" >
	   <label class="labelinput">留言主题</label>
	    <input type="text" name="m_title" class="form-control mesinput" id="m_title" placeholder="留言主题不超过16个字">
	    	
	    </li>
       
	     <li class="list-group-item" >
	    	<label class="msglabel">留言内容</label>
	    	<textarea id="m_content" class="mestextarea"  name="m_content" >字数不能超过200个字</textarea>
	    </li> 

 
	     <li class="list-group-item" style="text-align: center;"> 
	    	
	  <button type="button" class="btn btn-warning" id="mes_btn">发送留言</button>	
	
	     </li>
	</ul>	
	</form>
	
	
</div>
<script src="<?php echo (JS_URL); ?>jquery.js"></script> 
<script>

	
	$("#mes_btn").click(function(){
		var m_title=$("#m_title").val();
		var m_content=$("#m_content").val();
		
		if(m_title.length<1|| m_title.length>16){
			alert("留言主题不能为空或者字数不能超过16个字");
		}if(m_content.length>200||m_content =='字数不能超过200个字'){
			alert("留言内容不能为空或者字数不能超过200个字");
		}else{
			$("#form").submit();
		}
		
		
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