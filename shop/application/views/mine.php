<!DOCTYPE html>
<html>
<head>
	<title>我的物品</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/personal.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mine.css">
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
			<img src="assets/images/logobig.png">
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
<div class="content1">
	<ul class="content-nav">
		<li><a href="javascript:;" class="sheet sheet-title unline">个人中心</a></li>
		<li><a href="user/show_personal" class="sheet sheet-con">个人信息</a></li>
		<li><a href="user/show_upload" class="sheet sheet-con">上传物品</a></li>
		<li><a href="user/show_mine" class="sheet sheet-con active">个人物品</a></li>
		<li><a href="user/show_collect" class="sheet sheet-con">收藏夹</a></li>
	</ul>
	<div class="user-info1">
		<div class="user-title unline">
			<strong>个人物品管理</strong>
			<small>/ Personal Items manager</small>
		</div>
		<div class="goods">
			<?php

				foreach($mine as $v) {

					?>
					<div class="goods-info">
						<div class="goods-pic">
							<img src="assets/uploads/<?php echo $v->wpic;?>">
						</div>
						<div class="goods-con">
							<p>类型：<?php echo $v->cname; ?></p>
							<p>价格：￥<?php echo $v->wprice; ?></p>
							<p>标题：<?php echo $v->wtitle;?></p>
							<p>内容：<?php echo $v->wcon;?></p>
						</div>
						<div class="goods-btn">
							<a href="user/do_delete?id=<?php echo $v->wid; ?>">下架</a>
							<a href="user/show_update?id=<?php echo $v->wid;?>">修改</a>
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
</body>
</html>