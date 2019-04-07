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
	  
	  <form enctype="multipart/form-data"  action="/school/index.php/Home/Goods/goods_add.html" method="post">
	  <ul class="list-group "  >	
	  	<li class="list-group-item" >
	       <label for="exampleInputName2" >商品logo:</label>
	       <div id="preview">
               <img id="imghead" border="0" src="/school/Public/img/home/photo_icon.png" width="220" height="210" onclick="$('#previewImg').click();">
           </div>         
           <input type="file"  name="g_logo" onchange="previewImage(this)" style="display: none;" id="previewImg">	    	
	    </li>  
	    <li class="list-group-item" >
	   <label for="exampleInputName2">商品名称:</label>
	    <input type="text" name="g_name" class="form-control cate_input" id="" placeholder="请输入商品名称">
	    	
	    </li>
	        <li class="list-group-item" >
	    	<label for="exampleInputName2">商品品牌:</label>
	    	<input type="text" name="g_brand" class="form-control cate_input" id="" placeholder="请输入商品品牌">
	    	 
	    </li>
	    <li class="list-group-item" >
	    	<label for="exampleInputName2">商品数量:</label>
	    	<input type="text" name="g_num" class="form-control cate_input"  placeholder="请输入商品数量">
	    	 
	    </li>
	    <li class="list-group-item" >
	    	<label for="exampleInputName2" >商品分类:</label>
	    	<select name="g_category"   class="select1" id="selects" >
	            <option value="" >选择主分类</option>   
	          <?php if(is_array($cate_data1)): foreach($cate_data1 as $key=>$v1): ?><option value=<?php echo ($v1["c_id"]); ?> ><?php echo ($v1["c_name"]); ?></option><?php endforeach; endif; ?>  
	        </select>
	    	<select name="g_categorys"   class="select1" id="select2" >
	            <option value="" >选择子分类</option> 
	            
	        </select>
	    </li>
	    
	    <li class="list-group-item" >
	    	<label for="exampleInputName2">商品价格: <span style="color:red;"> 商品价格为空，即为免费商品哦...</span> </label>
	    	<input type="text" name="g_price" class="form-control cate_input"  placeholder="请输入商品价格">
	    	 
	    </li>
	    <li class="list-group-item" >
	    	<label for="exampleInputName2" >新旧程度:</label>
	    	<select name="g_new"   class="select1"  >
	    		 <?php if(is_array($new_data)): foreach($new_data as $key=>$v1): ?><option value=<?php echo ($v1["gn_id"]); ?> ><?php echo ($v1["gn_name"]); ?></option><?php endforeach; endif; ?> 
	    		
	                       
	        </select>
	    	
	    </li>
	    <li class="list-group-item" >
	    	<label for="exampleInputName2" >能否议价:</label>
	       <select name="is_price"   class="select1" >
	            <option value="1" >可议价</option>  
	            <option value="0" >不可议价</option> 
	        </select>
	    </li>
	    	
	    <li class="list-group-item" >
	    	<label for="exampleInputName2">商品描述:</label>
	    	<textarea id="myEditor" name="g_desc">    
            </textarea>
	    </li> 
 
	     <li class="list-group-item" style="text-align: center;"> 
	    	
	  <button type="submit" class="btn btn-warning" id="sale">创建商品</button>	
	
	     </li>
	</ul>	
	</form>
	

	
</div>
</div>
    <link href="/school/Public/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/school/Public/ueditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/school/Public/ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/school/Public/ueditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/school/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
	 UM.getEditor('myEditor',{
	 	initialFrameWidth:"100%",
		initialFrameHeight:400
	 	
	 });
	 //监听主分类select事件
	 $('#selects').change(function(){
	 	
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
	 
	 
	  //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 220; 
          var MAXHEIGHT = 210;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead onclick=$("#previewImg").click()>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
          
          
          
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
	

	
	
	
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