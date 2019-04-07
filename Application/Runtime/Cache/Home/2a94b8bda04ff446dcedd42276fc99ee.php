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

</style>
<!--导航栏-->
<nav class="h_nav">
<ul class="nav nav-tabs">
  <li role="presentation" class="active h_active"><a href="#">商品分类</a></li>
  <li role="presentation"><a href=<?php echo U('Index/index');?>  >网站首页</a></li>
  <li role="presentation"><a href=<?php echo U('HelpGoods/morehelp');?>  >求购专区</a></li>
</ul>
</nav>
<!--轮播图和导航菜单，网站登录和网站公告-->
<div class="row">
  <div class="col-md-2" >   
      <!--左侧菜单结束 -->
  <div class="cat_bd">
  	
<?php if(is_array($cate_data)): foreach($cate_data as $k=>$v): if($k == $flag): ?><div class="cat" >
            <h3>
            <?php if(is_array($catesdata)): foreach($catesdata as $key=>$vcate): if($vcate["c_id"] == $k): ?><a href=<?php echo U('Goods/glist?gid='.$vcate['c_id']);?>  >
            		<?php echo ($vcate["c_name"]); ?></a><?php endif; endforeach; endif; ?>	
            </a><b></b></h3>
            <div class="cat_detail">
              <dl class="dl_1st">
               
                <dd>                	
                	<?php if(is_array($v)): foreach($v as $key=>$v1): if(is_array($catesdata)): foreach($catesdata as $key=>$vcate): if($vcate["c_id"] == $v1): ?><a href=<?php echo U('Goods/glist?gids='.$vcate['c_id']);?>  >
			            		<?php echo ($vcate["c_name"]); ?>
                                                </a><?php endif; endforeach; endif; endforeach; endif; ?>
                </dd>
              </dl>
            </div>
          </div>
<?php else: ?>
 <div class="cat">
  <h3>
  	 <?php if(is_array($catesdata)): foreach($catesdata as $key=>$vcate): if($vcate["c_id"] == $k): ?><a href=<?php echo U('Goods/glist?gid='.$vcate['c_id']);?>  >
            		<?php echo ($vcate["c_name"]); ?></a><?php endif; endforeach; endif; ?>	
    	
  	<b></b></h3>
            <div class="cat_detail none">
                  <dl class="dl_1st">
                
                <dd>              	
                	<?php if(is_array($v)): foreach($v as $key=>$v1): if(is_array($catesdata)): foreach($catesdata as $key=>$vcate): if($vcate["c_id"] == $v1): ?><a href=<?php echo U('Goods/glist?gids='.$vcate['c_id']);?> >
			            		<?php echo ($vcate["c_name"]); ?></a><?php endif; endforeach; endif; endforeach; endif; ?>
                </dd>
              </dl>
            </div>
          </div><?php endif; endforeach; endif; ?>
        </div>
    <!--左侧菜单结束 -->
  </div>
  <div class="col-md-8" >
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

    <?php if(is_array($pic_data)): foreach($pic_data as $key=>$val): if($val["first"] == y): ?><div class="item active ">
	      <img src="/Public<?php echo ($val["url"]); ?>" style="height: 330px;width: 750px;" >
	    </div>
    <?php else: ?>
	    <div class="item ">
	      <img src="/Public<?php echo ($val["url"]); ?>" style="height: 330px;width: 750px;" >
	    </div><?php endif; endforeach; endif; ?>
    
    
      </div>

    </div>
  </div>
<!--网站公告-->
  <div class="col-md-2">
    <div class="list-group h_info" style="margin-top: 0px;height:294px;">
      <a href="#" class="list-group-item h_info1 " >
        平台公告
      </a>
      <?php if(is_array($tip_data)): foreach($tip_data as $key=>$val): ?><span style="height:30px;background:#555;color:white;"  class="list-group-item"><?php echo ($val["title"]); ?></span>
      <span style="height:235px;background:#555;color:white;"  class="list-group-item"><?php echo ($val["content"]); ?></span><?php endforeach; endif; ?>
   
    
    </div>
    <div class="list-group h_info" style="margin-top: 0px;">
      <a  class="list-group-item h_info1 "href=<?php echo U('Messages/showmsg');?> >
        私信管理员
      </a>
    </div>
    
  </div>
</div>
<!--西安工业大学上新专区-->
<div class="row goods_info" >
<div class="h_title">
  <h3>西安工业大学上新专区</h3>
<a class="pull-right" style="margin-top:-30px;margin-right:10px;color:white;" href=<?php echo U('Goods/moregoods?mflag=1');?>  >更多</a>
</div>
<?php if($g_data != null): if(is_array($g_data)): foreach($g_data as $key=>$v): ?><div class="goods_list">  
<ul class="list-group" >
  <li class="list-group-item goods_li">
    <a  class="thumbnail" href=<?php echo U('Goods/goods_detail?g_id='.$v[0]['g_id']);?> >
      <img src=/Public<?php echo ($v[0]["g_logo"]); ?> >
    </a>
  </li>
  <li class="list-group-item " style="margin-top: -32px;" ><?php echo ($v[0]["g_name"]); ?> </li>
  <li class="list-group-item"><?php echo (substr($v["gu_time"],0,10)); ?> </li>
  <li class="list-group-item"  > <label  style='color:#c40000;'><?php echo ($v[0]["g_price"]); ?></label></li>
</ul>
</div><?php endforeach; endif; ?>
<?php else: ?>
<div  class="null_div">
	<div><?php echo ($infos); ?></div>
</div><?php endif; ?>



</div>
<!--陕西科技大学上新专区-->
<div class="row goods_info" >
<div class="h_title">
  <h3>陕西科技大学上新专区</h3>
<a class="pull-right" style="margin-top:-30px;margin-right:10px;color:white;" href=<?php echo U('Goods/moregoods?mflag=2');?>  >更多</a>

</div>

<?php if($s_data != null): if(is_array($s_data)): foreach($s_data as $key=>$v): ?><div class="goods_list">  
<ul class="list-group" >
  <li class="list-group-item goods_li">
    <a  class="thumbnail" href=<?php echo U('Goods/goods_detail?g_id='.$v[0]['g_id']);?> >
      <img src=/Public<?php echo ($v[0]["g_logo"]); ?> >
    </a>
  </li>
  <li class="list-group-item " style="margin-top: -32px;" ><?php echo ($v[0]["g_name"]); ?></li>
  <li class="list-group-item"><?php echo (substr($v["gu_time"],0,10)); ?> </li>
  <li class="list-group-item"  ><label  style='color:#c40000;'><?php echo ($v[0]["g_price"]); ?></label></li>
</ul>
</div><?php endforeach; endif; ?>
<?php else: ?>
<div  class="null_div">
	<div><?php echo ($infos); ?></div>
</div><?php endif; ?>


</div>

<!--西安医学院上新专区-->  
  <div class="row goods_info" >
<div class="h_title">
  <h3>西安医学院上新专区</h3>
<a class="pull-right" style="margin-top:-30px;margin-right:10px;color:white;" href=<?php echo U('Goods/moregoods?mflag=3');?>  >更多</a>

</div>
<?php if($y_data != null): if(is_array($y_data)): foreach($y_data as $key=>$v): ?><div class="goods_list">  
<ul class="list-group" >
  <li class="list-group-item goods_li">
    <a class="thumbnail"  href=<?php echo U('Goods/goods_detail?g_id='.$v[0]['g_id']);?> >
      <img src=/Public<?php echo ($v[0]["g_logo"]); ?> >
    </a>
  </li>
  <li class="list-group-item " style="margin-top: -32px;" ><?php echo ($v[0]["g_name"]); ?></li>
  <li class="list-group-item"><?php echo (substr($v["gu_time"],0,10)); ?> </li>
  <li class="list-group-item"  ><label  style='color:#c40000;'><?php echo ($v[0]["g_price"]); ?></label></li>
</ul>
</div><?php endforeach; endif; ?>
<?php else: ?>
<div  class="null_div">
	<div><?php echo ($infos); ?></div>
</div><?php endif; ?>

</div>

  <div class="row goods_info" >
<div class="h_title">
  <h3>学长学姐免费送</h3>
<a class="pull-right" style="margin-top:-30px;margin-right:10px;color:white;" href=<?php echo U('Goods/moregoods?mflag=4');?>  >更多</a>

</div>
<?php if($f_data != null): if(is_array($f_data)): foreach($f_data as $key=>$v): ?><div class="goods_list">  
<ul class="list-group" >
  <li class="list-group-item goods_li">
    <a class="thumbnail"  href=<?php echo U('Goods/goods_detail?g_id='.$v['g_id']);?> >
      <img src=/Public<?php echo ($v["g_logo"]); ?> >
    </a>
  </li>
  <li class="list-group-item " style="margin-top: -32px;" ><?php echo ($v["g_name"]); ?></li>
  <li class="list-group-item"><?php echo (substr($v["gu_time"],0,10)); ?> </li>
  <li class="list-group-item" ><label  style='color:#c40000;'><?php echo ($v["g_price"]); ?></label></li>
</ul>
</div><?php endforeach; endif; ?>
<?php else: ?>
<div  class="null_div">
	<div><?php echo ($infos); ?></div>
</div><?php endif; ?>

</div>


<!--专区结束-->
<!--最新求购-->
    <div class="row h_help" >
<div class="h_title">
  <h3>求购专区</h3>
<a class="pull-right" style="margin-top:-30px;margin-right:10px;color:white;" href=<?php echo U('HelpGoods/morehelp');?>  >更多</a>

</div>
<?php if($hp_data != null): ?><div class="list-group h_hd">

  <?php if(is_array($hp_data)): foreach($hp_data as $key=>$v): ?><a  class="list-group-item list-group-item-warning" href=<?php echo U('HelpGoods/hg_detail?hg_id='.$v['h_id']);?> >
    <span class="pull-left span1"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i>
     <?php if(is_array($areadata)): foreach($areadata as $key=>$val): if($val["a_id"] == $v['h_school']): echo ($val["a_name"]); endif; endforeach; endif; ?>


    </span>
    <span class="span2" ><?php echo ($v["h_name"]); ?></span>
    <span class="pull-right span3"><?php echo ($v["h_time"]); ?></span>
  </a><?php endforeach; endif; ?>
  <?php else: ?>
<div  class="null_div">
	<div><?php echo ($infos); ?></div>
</div><?php endif; ?>

</div>
</div>
</div>

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