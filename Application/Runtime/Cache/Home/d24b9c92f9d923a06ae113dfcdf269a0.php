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



<div class="container">


    <!--商品信息模块-->
    <div class="row">
        <!--左边商品图片-->
        <div class="col-md-5">
            <div class="img_div">
                <img src=/school/Public<?php echo ($data["g_logo"]); ?> class="detail_img">
            </div>

        </div>
        <!--右边信息显示-->
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item goods_name"><?php echo ($data["g_name"]); ?></li>
                <li class="list-group-item"><span>新旧程度:</span><span><?php echo ($news); ?></span></li>
                <li class="list-group-item"><span>商品数量:</span><span><?php echo ($data["g_num"]); ?></span></li>
                <li class="list-group-item"><span class="goods_pf">￥</span>
                    <span class="goods_price"><?php echo ($data["g_price"]); ?></span>
                </li>
                <li class="list-group-item"><span>主分类:<?php echo ($data["g_category"]); ?></span>---------------<span>子分类:<?php echo ($data["g_categorys"]); ?></span>
                </li>
                <li class="list-group-item"><span>能否议价:</span><span><?php echo ($data["is_price"]); ?></span></li>
                <li class="list-group-item"><span>所属学校:</span><span><?php echo ($data["g_school"]); ?></span></li>
                <li class="list-group-item"><span>联系qq:</span><span><?php echo ($user_qq); ?></span></li>
                <li class="list-group-item contact_btn">
                    <button type="button" onclick="inform(<?php echo ($data["g_user"]); ?>);" class="btn btn-info">直通卖家</button>
                </li>

            </ul>

        </div>

    </div>

    <!--商品详情-->

    <div class="row">

        <div class="col-md-10 desc">
            <ul class="list-group">
                <li class="list-group-item active">商品详情</li>
                <li class="list-group-item" style="overflow-x: hidden;">
                    <div style="width:100%;">
                        <?php echo ($data["g_desc"]); ?>

                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>

</body>
<script src="/school/Public/js/jquery.js"></script>
<script src="/school/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/school/Public/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/school/Public/ueditor/umeditor.min.js"></script>
<script src="/school/Public/js/js.js"></script>
<script>

    function inform(id) {

        $.ajax({
            type: "get",
            url: "<?php echo U('Goods/informs', '', FALSE); ?>/id/" + id,
            success: function (data) {

                if (data == 'y') {
                    alert('商品的卖家联系方式已发送至注册邮箱,请前去查看（注意邮件垃圾箱查找）');
                } else {
                    alert('获取失败！必须登录才可以获取卖家的联系方式！');
                }
            }
        });
    }

</script>
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