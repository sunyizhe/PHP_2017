<?php
	if($this->session->userdata('logged_in') != 'TRUE'){
		redirect('user/unindex');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>登录主页</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css"/>
	<script src="assets/js/jquery-1.12.4.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	
</head>
<body>
	<div id="container">
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
		<div id="myCarousel" class="carousel slide">
    
		    <!-- 轮播（Carousel）项目 -->
		    <div class="carousel-inner">
		        <div class="item active">
		            <img src="assets/images/1476867119115_.jpg" alt="First slide">
		        </div>
		        <div class="item">
		            <img src="assets/images/1489848406995_.jpg" alt="Second slide">
		        </div>
		        <div class="item">
		            <img src="assets/images/1488941285693_.jpg" alt="Third slide">
		        </div>
		        <div class="item">
		            <img src="assets/images/1490178978310_.jpg" alt="Third slide">
		        </div>
		        <div class="item">
		            <img src="assets/images/1490090503212_.jpg" alt="Third slide">
		        </div>
		    </div>
		    <!-- 轮播（Carousel）导航 -->
		    <a class="carousel-control left" href="#myCarousel" 
		        data-slide="prev">&lsaquo;
		    </a>
		    <a class="carousel-control right" href="#myCarousel" 
		        data-slide="next">&rsaquo;
		    </a>
		</div>
		<div class="content">
			<div class="content-one">
				<div class="wrapper">
					<a href="javascript:;"><img src="assets/images/one.jpg"></a>
					<a href="javascript:;"><img src="assets/images/two.jpg"></a>
				</div>	
			</div>
			<div class="content-two">
				<div class="wrapper">
					<!-- <div class="sing">
						<h2>专辑</h2>
						<?php foreach ($album as $al){ ?>
							<a href="user/album?id=<?php echo $al->aid; ?>"><img src="assets/images/<?php echo $al->apic;?>"></a>
						<?php } ?>
					</div> -->
					<div class="singer">
						<h2>歌手</h2>
						<?php foreach ($singer as $si){ ?>
							<a href="user/album?id=<?php echo $si->sid; ?>"><img src="assets/images/<?php echo $si->spic;?>"></a>
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="wrapper">
				&nbsp;&nbsp;&nbsp;&nbsp;这是梁博文的在线音乐网站
			</div>
		</div>
	</div>
	
</body>
</html>