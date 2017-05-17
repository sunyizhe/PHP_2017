<!DOCTYPE html>
<html>
<head>
	<title>选择城市</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/city.css">
</head>
<body>
<div class="hmtop">
	<div class="hmtop-top">
		<div class="hmtop-left">
<!--			<a href="javascript:;">--><?php //echo $this->session->userdata('name')?><!--</a>-->
<!--			<a href="user/show_unindex">[注销]</a>-->
<!--			<a href="#" class="person">注册</a>-->
		</div>
		<div class="hmtop-right">
			<a href="#">商城首页</a>
			<a href="#" class="person">个人中心</a>
			<a href="#" class="person">收藏夹</a>
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
			选择城市
		</div>	
	</div>
</div>
<ul class="choose-city">
	<?php
		foreach ($goods as $g) {
			?>
			<li>
				<div class="city-title">
					<a href="user/show_index?id=<?php echo $g->id?>" class="city-name"><?php echo $g->name?></a>
				</div>
			</li>
			<?php
		}
	?>
</ul>
</body>
</html>