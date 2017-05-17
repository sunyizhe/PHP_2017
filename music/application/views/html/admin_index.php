<!DOCTYPE html>
<html>
<head>
	<title>管理员页面</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/album.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_index.css">
	<!-- <script src="assets/js/jquery-1.7.2.min.js"></script> -->
	<!-- <script src="assets/js/jquery.min.js"></script> -->
</head>
<body style="background: #EEEEEE;">
	<div id='overlay'>
	</div>
	<div id="upload">
		<div id="msgShut" onclick="closes('overlay','upload')">关闭</div>
		  	<form action="<?php echo site_url("user/do_upload")?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  		<span>歌手名：</span>
				<input type="text" name="sname" value="" id="sname"/><br>
				<span>歌手图片：</span>
				<input type="file" name="file" value="" id="c_pic"  /><br>
				<input type="submit" value="添加" id='sub'/>
			</form>
		</div>
	<div class="top">
			<div class="wrapper">
				<div class="logo">				
					<img src="assets/images/logo.jpg" />
				</div>
				<ul class="top-nav">
				</ul>
				<div class="log-reg">
					<a href="user/admin_login">退出</a>
					<a>管理员</a>
				</div>
			</div>
		</div>
		<div class="album">
			<div class="add">
				<span onclick="show('overlay','upload')" style="cursor:pointer;">添加歌手</span>
			</div>
			<div class="album-content">
				<ul class="singer">
					<?php
					foreach ($admin_singer as $key) {
					?>
					<li>
						<a class="cover" href="user/admin_album?id=<?php echo $key->sid?>">
							<img title="<?php echo $key->sname?>" src="assets/images/<?php echo $key->spic?>">
						</a>	
						<span><?php echo $key->sname?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="user/admin_index" data='<?php echo $key->sid?>' class='del' style="color:#000">删除</a>        
					</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<script>
			function show(overlay,upload){
				document.getElementById(overlay).style.display = 'block';
            	document.getElementById(upload).style.display = 'block';
			}
			function closes(overlay,upload){
				document.getElementById(overlay).style.display = 'none';
            	document.getElementById(upload).style.display = 'none';
			}
		</script>
		<script src="assets/js/jquery-1.12.4.js"></script>
		<script type="text/javascript" charset="utf-8">
		$(function(){
			
			$('#sname').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">请输入歌手名！</span>');
				$('#sname').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/search_upload')?>','singer='+name,function(data){				
				if(data=='success'){
					var oSpan=$('<span style="font-size:11px;" id="u1">该歌手已存在！</span>');
					$('#sname').after(oSpan);
				}		
			})
		
			}
		
		});
		 $('#sname').focus(function(){
			$('#u1').remove();
		 });
				
			
				$(".del").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('user/do_delete_singer')?>','sid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			$("#sub").on('click',function(){
				var mname = $("#sname").val();
				var c_pic = $("#c_pic").val();
				if(mname!=''&&c_pic!=''){
					return true;
				}else{
					alert("请输入完整信息！");
					return false;
				}
			})
			})
		</script>
</body>
</html>