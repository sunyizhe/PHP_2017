<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_pl.css"> 
	<script src="assets/js/jquery.min.js">
		
	</script>
</head>
<body>
	<div class="top">
			<div class="wrapper">
				<div class="logo">
					<img src="assets/images/logo.jpg" />
				</div>
				<ul class="top-nav">
				</ul>
				<div class="log-reg">
					<a href="user/admin_login">退出</a>
					<a id="back" style="cursor: pointer;">返回</a>
				</div>
			</div>
		</div>
		<div class="content">
			<?php 
				foreach ($pl as $key) {
			?>
			<div class="cont">
				<span>评论人：</span>
			  	<span><?php echo $key->aa->uname;?></span>&nbsp;&nbsp;|&nbsp;&nbsp;	  	
			  	<span>评论时间：</span>
			  	<span><?php echo $key->pltime;?></span><br>
			  	<span>评论内容：</span>
			  	<span><?php echo $key->plcon;?></span>
			  	<a href="user/admin_pl?id=<?php echo $key->mid;?>" data='<?php echo $key->plid?>' class="del">删除评论</a>
			</div>
			<?php 
				}
			?>
			
		</div>
		
		
		<script src="assets/js/jquery-1.12.4.js"></script>
		<script type="text/javascript" charset="utf-8">
		$(function(){
				$('#back').on('click',function(){
				window.history.go(-1);
			})
				$(".del").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_pl')?>','plid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			})
		</script>
		
</body>
</html>