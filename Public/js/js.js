 //实时显示当前时间
$(document).ready(function(){
 	setInterval(showtime,1000);
});
function showtime (){
	var now=new Date();
	var str=now.toLocaleString();
	$("#time").text(str);
}






 //左侧菜单栏的鼠标悬停的斑马线效果
$("#bg1").mouseover(function(){
   	$("#bg1 button").css("background-color","#FAE5AA");
   	$("#bg1").css("background-color","#FAE5AA");
}); 
    $("#bg1").mouseout(function(){   	
   	$("#bg1 button").css("background-color","white");
   	$("#bg1").css("background-color","white");
   });
   

     $("#bg2").mouseover(function(){   	
   	$("#bg2 button").css("background-color","#FAE5AA");
   	$("#bg2").css("background-color","#FAE5AA");
   });
    $("#bg2").mouseout(function(){   	
   	$("#bg2 button").css("background-color","white");
   	$("#bg2").css("background-color","white");
   });
   
   
$("#bg3").mouseover(function(){   	
   	$("#bg3 button").css("background-color","#FAE5AA");
   	$("#bg3").css("background-color","#FAE5AA");
   });
    $("#bg3").mouseout(function(){   	
   	$("#bg3 button").css("background-color","white");
   	$("#bg3").css("background-color","white");
   });
   
   
    $("#bg4").mouseover(function(){   	
   	$("#bg4 button").css("background-color","#FAE5AA");
   	$("#bg4").css("background-color","#FAE5AA");
   });
    $("#bg4").mouseout(function(){   	
   	$("#bg4 button").css("background-color","white");
   	$("#bg4").css("background-color","white");
   });

    $("#bg5").mouseover(function(){   	
   	$("#bg5 button").css("background-color","#FAE5AA");
   	$("#bg5").css("background-color","#FAE5AA");
   });
    $("#bg5").mouseout(function(){   	
   	$("#bg5 button").css("background-color","white");
   	$("#bg5").css("background-color","white");
   });
 
    $("#bg6").mouseover(function(){   	
   	$("#bg6 button").css("background-color","#FAE5AA");
   	$("#bg6").css("background-color","#FAE5AA");
   });
    $("#bg6").mouseout(function(){   	
   	$("#bg6 button").css("background-color","white");
   	$("#bg6").css("background-color","white");
   });  
   
   
   
   
  //分类表下面的鼠标悬停斑马线效果

$("#cate_ul li").hover(function(){
	$(this).addClass('blue');
},function(){
	$(this).removeClass("blue");
});


   
//地域添加的时候，进行地域选择的判断
$("#exampleInputName2").focus(function(){
			var select=$("#select1 option:selected").val();
		if(select==0){
			$("#area_info").text("请选择顶级地域");
		}else{
				$("#area_info").text("");
		}
	
});

$("#exampleInputName2").focusout(function(){
			var info=$("#exampleInputName2").val();
		if(info==""){
			$("#area_info1").text("请输入学校名称");
		}else{			
			$("#area_info1").text("");	
		}
		if($("#select1 option:selected").val()!=0&&info!=""){
			$("#area_info2").text("");
		}
	
});


$("#add_school").click(
	function (){
		var select=$("#select1 option:selected").val();
		var info=$("#exampleInputName2").val();

		if(select!=""&&info!=0){
			
			  $("form").submit();	
		}else{
			$("#area_info2").text("请检查你们的填写数据！");
		}
	
	}
	
);



//修改密码时候顶级分类的选择
		$("#btn_pwd").click(function(){
			var select=$("#admin_select option:selected").val();
			var pwd1=$("#pwd1").val();
			var pwd2=$("#pwd2").val();
		if(select==0){
			$("#info1").text("请选择管理员");
		}else{
				$("#info1").text("");
		}
			
		if(pwd1==""){

			$("#info2").text("密码不可以为空！");
		}else{
		
				if(pwd1!=pwd2){
			$("#info2").text("密码不一致");
		}else{
			$("#info2").text("");
		}
	
		}
	
		if(select!=0&&pwd1==pwd2&&pwd1!=""&&pwd2!=""){
		 $("form").submit();	
			}
		
		});

