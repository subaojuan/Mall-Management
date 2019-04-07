<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>后台登录界面</title>

<link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet">
<link href="<?php echo (CSS_URL); ?>signin.css" rel="stylesheet">

</head>

<body class="bg">

<div class="signin">
	<div class="signin-head"><img src="<?php echo (IMG_URL); ?>admin/logo_h.png" alt="" ></div>
	<form class="form-signin" role="form" method="post" action="/school/index.php/Admin/Login/login.html">
		<input type="text" name="a_account" class="form-control" placeholder="用户名" required autofocus />
		<input type="password" name="a_password" class="form-control" placeholder="密码" required />
		<button class="btn btn-lg btn-warning btn-block" type="submit">登录</button>

	</form>
</div>


</body>
</html>