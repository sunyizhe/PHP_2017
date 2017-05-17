<!DOCTYPE html>
<html>
<head>
	<title>list</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/list.css">
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
		<div class='content'>
			<div class="wrapper">
				<div class="content-left">
					<h2>榜单</h2>
					<ul>
						<li>
							<img src="assets/images/1481783338617_.png">
							<div class="list"><a href="user/lists" class="mark">收听榜</a></div>
						</li>
						<li>
							<img src="assets/images/1481783338617_.png">
							<div class="list"><a href="user/list1">查询榜</a></div>
						</li>
						
					</ul>
				</div>
				<div class="content-right">
					<img src="assets/images/bang_xgb.jpg">
					<div class="choose">
						<ul>
							<li class="choose-sing">歌曲</li>
							<li class="choose-singer">歌手</li>
							<li class="choose-hits">点击率</li>
						</ul>
					</div>
					<ul class="music">
					<?php
						$a=1;
						foreach ($lists as $key) {
					?>
						<li>
							<div class="hide" style='display:none;'><?php echo $key->mid ;?></div>
							<div class="music-id"><?php echo $a++?></div>
							<div class="music-name"><?php echo $key->mname?></div>
							<div class="music-singer"><?php echo $key->msinger?></div>
							<div class="music-hits"><?php echo $key->hits?></div>
							<div class="music-tools">
									<a href="user/listen?id=<?php echo $key->mid?>" class="play"></a>
								<a id="do_col" href="user/do_collect?id=<?php echo $key->mid;?>" class="collected"></a>
							</div>
						</li>
					<?php
					}
					?>
						
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	<!-- <script src="assets/js/jquery-1.7.2.min.js"></script>
	<script>
			$('#do_col').on('click',function(){
				var $mid = $('.hide').html();
				
				$.get('user/do_collect',{'id':$mid},function(data){
					if(data=='success'){
						alert('收藏成功');
						
					}
					else{
						alert('已收藏，请勿重复添加');
					}
				});
			});
		</script> -->
</body>
</html>