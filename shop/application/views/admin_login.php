<!DOCTYPE html>
<html>
<head>
	<title>log_in</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="title">二手商城管理员管理界面</div>
	<div id="container">

		<div class="content content-one"></div>
		<div class="content content-two"></div>
		<div class="content content-three">
			<form class="form-log" action="admin_user/do_login" method="post">
				<!-- <label for="username">账号</label> -->
				<input type="text" name="username" id="username" placeholder="Admin-name">
				<!-- <label for="password">密码</label> -->
				<input type="password" name="password" id="password" placeholder="Password">
				<input type="submit" name="sub" value="Login" id="log-btn" class="btn">
			</form>
		</div>
	</div>
</body>
</html>