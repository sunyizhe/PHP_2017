<!DOCTYPE html>
<html>
<head>
	<title>个人信息</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/personal.css">
</head>
<body>
<div class="hmtop">
	<div class="hmtop-top">
		<div class="hmtop-left">
			<a href="user/show_personal"><?php echo $this->session->userdata('name')?></a>
			<a href="user/show_unindex">[注销]</a>
		</div>
		<div class="hmtop-right">
			<a href="user/show_index">商城首页</a>
			<a href="user/show_personal" class="person">个人中心</a>
			<a href="user/show_collect" class="person">收藏夹</a>
		</div>
	</div>
	<div class="wrap">
		<div class="logo">
			<a href="user/show_index"><img src="assets/images/logobig.png"></a>
		</div>
		<!-- 搜索框 -->
		<form  action="user/do_search" method="post" class="search">
			<input type="text" name="" id="input-search" placeholder="搜索">
			<input type="submit" name="" id="input-sub" value="搜  索">
		</form>
	</div>
</div>
<div class="nav-table">
	<div class="nav-cont">
		<div class="nav-title">
			全部分类
		</div>
		<a href="#">商城首页</a>
	</div>
</div>
<div class="content">
	<ul class="content-nav">
		<li><a href="javascript:;" class="sheet sheet-title unline">个人中心</a></li>
		<li><a href="user/show_personal" class="sheet sheet-con active">个人信息</a></li>
		<li><a href="user/show_upload" class="sheet sheet-con">上传物品</a></li>
		<li><a href="user/show_mine" class="sheet sheet-con">个人物品</a></li>
		<li><a href="user/show_collect" class="sheet sheet-con">收藏夹</a></li>
	</ul>
	<div class="user-info">
		<div class="user-title unline">
			<strong>个人信息</strong>
			<small>/ Personal Information</small>
		</div>
		<?php
			foreach($user as $v) {
		?>
				<div class="user-pic unline">
					<div class="pic"><img src="assets/images/getAvatar.do.jpg"></div>
					<div class="n-name">昵称：<span><?php echo $v->uname;?></span></div>
				</div>
				<form id="user-change" action="user/do_index" method="post">
					<div class="change">
						<label for="">昵称</label>
						<input type="text" name="uname" placeholder="昵称" id="uname" value="<?php echo $v->uname;?>">
					</div>
					<div class="change">
						<label for="">性别</label>
						<input type="text" name="usex" id="usex" placeholder="男/女" value="<?php echo $v->usex;?>">
					</div>
					<div class="change">
						<label for="">城市</label>
						<input type="text" name="ubirth" id="ubirth" placeholder="如：黑龙江" value="<?php echo $v->ubirth;?>">
					</div>
					<div class="change">
						<label for="">电话</label>
						<input type="text" name="utel" id="utel" placeholder="请输入11位移动电话号码" value="<?php echo $v->utel;?>">
					</div>

					<input type="submit" id="submit" value="提交 修改" class="sub">
				</form>
		<?php
			}
		?>
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/same.js"></script>
</body>
</html>