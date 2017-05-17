<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/reg.css">
</head>
<body>
<div class="login-title">
	<a href="index.html"><img src="assets/images/logobig.png"></a>
</div>
<div class="login-content">
	<img src="assets/images/big.jpg">
	<div class="login-box">
		<h3>二手商城登录</h3>
		<a href="user/show_reg" class="to-reg">去注册</a>
		<form action="user/do_login" method="post">
			<div class="user-name">
				<label for="user" id="i-u"></label>
				<input type="text" name="email" id="user" placeholder="请输入邮箱">
			</div>
			<div class="password">
				<label for="pass" id="i-p"></label>
				<input type="password" name="pwd" id="pass" placeholder="请输入密码">
			</div>
			<input type="submit" name="" id="to-index" value="登录">
		</form>
	</div>
</div>
</body>
</html>