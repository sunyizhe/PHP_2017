<!DOCTYPE html>
<html>
<head>
	<title>上传物品</title>
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
		<a href="user/show_index">商城首页</a>
	</div>
</div>
<div class="content">
	<ul class="content-nav">
		<li><a href="javascript:;" class="sheet sheet-title unline">个人中心</a></li>
		<li><a href="user/show_personal" class="sheet sheet-con">个人信息</a></li>
		<li><a href="user/show_upload" class="sheet sheet-con active">上传物品</a></li>
		<li><a href="user/show_mine" class="sheet sheet-con">个人物品</a></li>
		<li><a href="user/show_collect" class="sheet sheet-con">收藏夹</a></li>
	</ul>
	<div class="user-info">
		<div class="user-title unline">
			<strong>上传物品</strong>
			<small>/ Upload Items</small>
		</div>
		<?php
			foreach($user as $v){
				?>
		<div class="user-pic unline">
			<div class="pic"><img src="assets/images/getAvatar.do.jpg"></div>
			<div class="n-name">昵称：<span><?php echo $v->uname ;?></span></div>
		</div>
		<form id="user-change" enctype="multipart/form-data" action="user/addSubmit" method="post">
			<div class="change">
				<label for="t">标题</label>
				<input type="text" id="t" name="wtitle" placeholder="请输入标题">
			</div>
			<div class="change">
				<label for="b" style="margin: 0 50px 0 0;">类型</label>
				<select id="b" name="cid">
					<?php

					foreach($catalog as $a){

						?>

						<option value="<?php echo $a->cid ; ?>"><?php echo $a->cname;?></option>

						<?php
					}
					?>
				</select>
				</select>
				<label for="a" style="margin: 0 50px 0 120px;">城市</label>
				<select id="a" name="city">
					<?php

					foreach($city as $ccc){

						?>

						<option value="<?php echo $ccc->id ; ?>"><?php echo $ccc->name;?></option>

						<?php
					}
					?>
				</select>
			</div>
			<div class="change">
				<label for="p">价格</label>
				<input type="text" id="p" name="wprice" placeholder="请输入价格">
			</div>
			<label for="c" style="float: left;">描述</label>
			<textarea id="c" name="wcon" placeholder="请输入描述内容，描述真实，否则会被强制下架"></textarea>
			<input style="margin-left: 80px; border: none; margin-top: 10px; outline: none; text-indent: 0;" type="file" name="file" size="50"/>

			<input type="submit" id="submit" value="上传 物品" class="sub">
		</form>
				<?php
			}
		?>
	</div>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/upload.js"></script>
</body>
</html>