<!DOCTYPE html>
<html>
<head>
	<title>管理员登录</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/log.css">
	
</head>
<body>
	<div class="login">
		<div class="top">
				<div class="wrapper">
					<div class="logo">
						<a href="user/unindex">
							<img src="assets/images/logo.jpg" />
						</a>
					</div>
					<ul class="top-nav">
						
					</ul>
					<div class="log-reg">
					</div>
				</div>
		</div>
		<form action="<?php echo site_url("user/do_admin_login")?>" method="post" class="login-surface">
			<div>账号：<input type="text" name="name" class="first"></div>
			<div>密码：<input type="password" name="pass"></div>
		
			<div class="last">
				<input type="submit" class="login-btn" name="sub" value="管理员登录">
			</div>
		</form>
		
	</div>
</body>
</html>