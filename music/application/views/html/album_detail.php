<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/detail.css">
	<link rel="stylesheet" type="text/css" href="assets/css/list.css">
</head>
<body>
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
		<div class="detail">
			
			<div class="detail-content">
				<?php
					foreach ($albumd as $key) {
					?>
				<h2><?php echo $key->aname?>--<?php echo $key->asinger?></h2>
				<div class="detail-top">
					<img src="assets/images/<?php echo $key->apic?>">
					<div class="detail-tools">
						<span class="tools-title"><?php echo $key->aname?></span> <br/><br/>
						<span>歌手：<?php echo $key->asinger?></span> <br/><br/>
						<span>发行时间：<?php echo $key->atime?></span> <br/><br/>
						<!-- <span>歌曲数：1</span> <br/><br/> -->
						<span><?php echo $key->acon?></span>
					</div>
				</div>
	<?php
					}
					?>
				<div class="choose" style="margin: 0 auto;">
						<ul>
							<li class="choose-sing">歌曲</li>
							<li class="choose-singer">歌手</li>
							<li class="choose-hits">点击率</li>
						</ul>
				</div>
				<ul class="music" style="margin: 0 auto; border: 0;">
					<?php
					foreach ($albumm as $key) {
					?>
					<li>
						<div id="hide" style='display:none;'><?php echo $key->mid ;?></div>
						<div class="music-id"></div>
						<div class="music-name"><?php echo $key->mname?></div>
						<div class="music-singer"><?php echo $key->msinger?></div>
						<div class="music-hits"><?php echo $key->hits?></div>
						<div class="music-tools">
							<a href="user/listen?id=<?php echo $key->mid?>" class="play"></a>
							<a id="do_col" href="user/do_collect?id=<?php echo $key->mid?>" class="collected"></a>
						</div>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<script src="assets/js/jquery-1.7.2.min.js"></script>
		<!-- <script>
			$('#do_col').on('click',function(){
				var $mid = $('#hide').html();
				
				$.get('user/do_collect',{'id':$mid},function(data){
					if(data=='success'){
						alert('收藏成功');
						
					}
					else{
						alert('收藏失败');
					}
				});
			});
		</script> -->
		<!-- <div class="footer">
			<div class="wrapper">
				&nbsp;&nbsp;&nbsp;&nbsp;这是梁博文的在线音乐网站
			</div>
		</div> -->
</body>
</html>