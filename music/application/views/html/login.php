<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
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
						<li><a href="user/unindex">首页</a></li>
						<li><a href="user/login">榜单</a></li>	
						<!-- <li><a href="user/login">专辑</a></li> -->
						<li><a href="user/login">歌手</a></li>
					</ul>
					<div class="log-reg">
						<a href="user/login">登录</a>
						<a href="user/reg">注册</a>
					</div>
					<div class="se">
					<form action="user/login" method="post">
						<input type="text" placeholder="找到好音乐">
						<input type="submit" class="search-botn" value="">
					</form>
				</div>
				</div>
		</div>
		<form action="<?php echo site_url("user/do_login")?>" method="post" class="login-surface">
			<div>账号：<input type="text" name="name" class="first"></div>
			<div>密码：<input type="password" name="pass"></div>
	
			<div class="last">
				<input type="submit" class="login-btn" name="sub" value="登     录">
			</div>
		</form>
		
	</div>
</body>
</html>