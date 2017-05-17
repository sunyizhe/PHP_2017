<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/album.css">
</head>
<body style="background: #EEEEEE;">
	<div class="top">
			<div class="wrapper">
				<div class="logo">
					<a href="user/index">
						<img src="assets/images/logo.jpg" />
					</a>
				</div>
				<ul class="top-nav">
					<li><a href="user/index">首页</a></li>
					<li><a href="user/list1">榜单</a></li>	
					<!-- <li><a href="user/album">专辑</a></li> -->
					<li><a href="user/singer">歌手</a></li>
				</ul>
				<div class="log-reg">
					<a href="user/unindex">退出</a>
					<a href="user/collect"><?php echo $this->session->userdata('name')?></a>
				</div>
				<div class="se">
					<form action="user/search" method="post">
						<input type="text" placeholder="找到好音乐">
						<input type="submit" class="search-botn" value="">
					</form>
				</div>
			</div>
		</div>
		<div class="album">
		
			<div class="album-content">
				<h2>专辑分类-最新</h2>
				<?php
					foreach ($album as $key) {
					?>
				<div class="demo">
					
					<a href="user/album_detail?id=<?php echo $key->aid?>" class="demo-img"><img src="assets/images/<?php echo $key->apic?>"></a>
					<div class="demo-content">
						<a href="user/album_detail?id=<?php echo $key->aid?>" class="demo-title"><?php echo $key->aname?></a><br/>
						<span class="demo-time"> 发行时间: <?php echo $key->atime?></span><br/>
						<span class="demo-con"><?php echo $key->acon?></span>
					</div>
					
				</div>	
				<?php
					}
					?>
			</div>
		
		</div>
		
		<!-- <div class="footer">
			<div class="wrapper">
				&nbsp;&nbsp;&nbsp;&nbsp;这是梁博文的在线音乐网站
			</div>
		</div> -->
</body>
</html>