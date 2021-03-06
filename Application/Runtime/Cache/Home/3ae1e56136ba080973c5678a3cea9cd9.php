<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>登录页面</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/school/Public/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/school/Public/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="/school/Public/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/school/Public/assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/school/Public/assets/css/ace-rtl.min.css" />
        <style>
        	.capital{
        		width:110px;
        	}
        	</style>
	
	</head>
	<a class="btn" href="http://localhost/school/index.php/Home/Index/index"  >返回首页</a>
	<body class="login-layout">

		<div class="main-container">

			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="red">北郊三校服务平台</span>
									
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												登录


											</h4>


											<div class="space-6"></div>

											<form method="post" id="form1" action=<?php echo U('Login/login');?> >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="u_account" class="form-control" placeholder="输入登录邮箱" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="u_password" class="form-control" placeholder="输入密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<span style="color:black">验证码:</span><input type="text" name="chkcode" class="capital" />
															<img style="cursor:pointer;width:110px" onclick="this.src='<?php echo U('Login/checkcode'); ?>#'+Math.random();" src="<?php echo U('Login/checkcode'); ?>" />
														</label>

														<button type="submit" class="width-100 btn btn-sm btn-primary" style="margin-top: 16px;">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110" id='submit1'>登录</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>



											<div class="space-6"></div>

											<div class="social-login center">

											</div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													忘记密码
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													注册
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												找回密码
											</h4>

											<div class="space-6"></div>
											<p>
												输入您的电子邮件找回密码--(邮件可能被自动屏蔽到垃圾箱中去)
											</p>

											<form >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" id="passwd" class="form-control" placeholder="输入邮箱" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" id='passwd_btn' class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110" >发送邮件</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												返回登录
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												用户注册
											</h4>

											<div class="space-6"></div>
											<form method="post" id="form3" action=<?php echo U('Login/register');?> >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" id="u_account" name="u_account" class="form-control" placeholder="输入注册邮箱" />
															<em id="u_account_error" class="error" style="display:none;">邮箱已被注册</em>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="u_nickname" name="u_nickname" class="form-control" placeholder="输入用户昵称" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="u_phone" name="u_phone" class="form-control" placeholder="输入用户手机" />
															<i class="ace-icon fa fa-mobile"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="u_qq" name="u_qq" class="form-control" placeholder="输入QQ" />
															<i class="ace-icon fa fa-qq"></i>
														</span>
													</label>
													
													<label class="block clearfix">
															<span class="header  lighter bigger" style="color:#909090;font-size: 18px;border: none;">
                                                                                                                                                            注册学校:
											                </span>
																<select name="u_school"   class="select1"   >
																<?php if(is_array($areadata)): foreach($areadata as $key=>$val): ?><option value="<?php echo ($val["a_id"]); ?>"><?php echo ($val["a_name"]); ?></option><?php endforeach; endif; ?>
																
																</select>
														
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="u_password" name="u_password" class="form-control" placeholder="输入密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="u_passwords"name="u_passwords" class="form-control" placeholder="确认密码" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block" >
													
															<span style="color:green" >请确认填入正确的邮箱地址和手机号，然后注册，便于后期正常获取商品交易信息</span>
														
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">重置</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">注册</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												返回登录
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
					
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="/school/Public/assets/js/jquery.2.1.1.min.js"></script>
        <script src="<?php echo (JS_URL); ?>jquery.validate.min.js"></script> 
        <!--添加表单的验证规则-->
       <script>
       	//异步发送邮件找回密码
       $("#passwd_btn").click(function(){
       	var email=$("#passwd").val();
       	   $.ajax({
				type:"get",
				url:"<?php echo U('Login/find_passwd', '', FALSE); ?>/email/"+email,
			    success:function(data){		
			    	
			          if(data=='n'){
			          	alert('邮件发送失败,请检查邮箱是否正确');
			          }else{
			          	
			          	alert('邮件发送成功,请去邮箱查看密码');
			          }
			    }
			
			});	
       
       });
      
        //验证邮箱是否存在
        $("#u_account").blur(function(){
        	
        	var email=$("#u_account").val();
        	   $.ajax({
				type:"get",
				url:"<?php echo U('Login/check_email', '', FALSE); ?>/email/"+email,
			    success:function(data){		    	
			    	if(data>0){
			    		
			    		$("#u_account_error").css('display','block');		    		
			    	}else{
			    		$("#u_account_error").css('display','none');
			    	}
			    }
			
			});	
        });
       
         $("#submit1").click(function(){
				        	$("#form1").submit();
				        });
        
       	$().ready(function(){
            	//登录前端验证
                $('#form1').validate({
          	    
		          rules:{
		          	u_account:{
		          		required:true,
		          		email: true  
		          	},
          	        u_password:{
				        required: true,
				    }
		          	
		          },
		          messages:{
		          	u_account:{
			          	required:"登录邮箱不能为空",
			          	email:"邮箱格式不正确"
		          	},
		          	u_password:{
		          		required:"密码不能为空"
		          	}
		          }
             
                
                });
          
       		$("#form3").validate({
       			
       			submitHandler:function(form){
		           $('#form3').submit();
		     
		            
		          } ,
       			rules:{
       			    u_account: {
					        required: true,
					        email: true  
					      }	,
					u_nickname:"required",
					
					u_password:{
						        required: true,
						        minlength: 6,
						        maxlength:16
						     },
       			    u_passwords: {
						        required: true,
						        minlength: 6,
						        maxlength:16,
						        equalTo: "#u_password"
						      },
					u_qq:{
						  required: true,
						  minlength: 5,
						  maxlength: 11,
						  digits:true
					},
					u_phone:{
						required: true,
						digits:true
						
					}
					
					       			
       			},
       			messages:{
       				u_qq:{
       					required:"QQ号码不能为空",
       					minlength:"QQ号码至少5位",
       					maxlength:"QQ号码最多11位",
       					digits:"QQ号码必须为数字"
       				},
       				u_phone:{
       					required:"手机号码不能为空",
       					digits:"手机号码必须为数字"
       					
       				},
       				u_account:{
       					required:"邮箱不能为空",
       					email:"输入正确的邮箱格式",
       					
       				},
       			    u_nickname:{
       			    	required:"昵称不能为空"
       			    },
       			    u_password:{
       			    	required: "请输入密码",
       			    	minlength:"密码至少6位",
       			    	maxlength:"密码不能超过16位"
       			    },
       			    u_passwords: {
				        required: "请输入确认密码",
				        minlength: "密码长度不能小于 6位",
				        maxlength:"密码不能超过16位",
				        equalTo: "两次密码输入不一致"
				      }
				  
				    
       				
       			},
       			//设置错误信息存放标签
	          errorElement: "em"
       			
       		});
       		
       		
       		
       	});
       	
       </script>


		<script type="text/javascript">
			window.jQuery || document.write("<script src='/school/Public/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/school/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>

	</body>
</html>