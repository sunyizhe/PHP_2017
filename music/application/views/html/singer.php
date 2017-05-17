<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/album.css">
	<link rel="stylesheet" type="text/css" href="assets/css/singer.css">
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
					<li><a href="user/lists">榜单</a></li>	
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
				<ul class="singer">
					<?php
					foreach ($singer as $key) {
					?>
					<li>
						<a class="cover" href="user/album?id=<?php echo $key->sid?>">
							<img title="<?php echo $key->sname?>" src="assets/images/<?php echo $key->spic?>">
						</a>	
						<span><?php echo $key->sname?></span>&nbsp;&nbsp;
						<a href="user/album?id=<?php echo $key->sid?>">专辑</a>       
					</li>
					<?php
					}
					?>
				</ul>
			
				<!-- <h2>专辑分类-最新</h2>
				<div class="demo">
					<a href="user/album_detail" class="demo-img"><img src="assets/images/3382580125.jpg"></a>
					<div class="demo-content">
						<a href="album_detailuser/" class="demo-title">缘</a><br/>
						<span class="demo-time"> 发行时间:2015-02-27</span><br/>
						<span class="demo-con">电视剧《锦绣园华丽冒险》片头曲震撼发布 主演黄晓明倾情献唱 《锦绣缘华丽冒险》改编自念一小说《锦绣缘》，由林合隆执导，黄晓明、陈乔恩、乔任梁、吕佳容、谢君豪、...</span>
					</div>
				</div> -->
			</div>
		</div>
		
</body>
</html>