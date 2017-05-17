<!DOCTYPE html>
<html>
<head>
	<title>collect</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/list.css">
	<link rel="stylesheet" type="text/css" href="assets/css/collect.css">
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
		<div class="collect">
			<div class="collect-content">
			<h2>我的收藏夹</h2>
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
						 foreach ($all as $v){
						 ?>
							
						
						<li>
							<div style="display: none;" id="hide">
							  <?php echo $v->mid;?>
							</div>
							<div class="music-id"><?php echo $a++;?></div>
							<div class="music-name"><?php echo $v->mname;?></div>
							<div class="music-singer"><?php echo $v->msinger;?></div>
							<div class="music-hits"><?php echo $v->hits;?></div>
							<div class="music-tools">
								<a href="user/listen?id=<?php echo $v->mid?>" class="play"></a>
								<a href="javascript:;" class="collected" style="background: url('assets/bootstrap/img/glyphicons-halflings.png') -455px 0px no-repeat;"></a>
							</div>
						</li>
						<?php } ?>
					</ul>
			</div>
		</div>
		<script src="assets/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$('.collected').on('click',function(){
				var $id = $('#hide').html();
				console.log($id);
				$.get('user/do_delete',{'mid':$id},function(data){
					if(data){
						location.reload();
						alert('删除成功');
						
					}
					else{
						alert('删除失败');
					}
				
				});
			});
		</script>
		
</body>
</html>