<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_sing.css"> 
	<script src="assets/js/jquery.min.js">
		
	</script>
</head>
<body>
	<div id='overlay'>
	</div>
	<div id="upload">
		<div id="msgShut" onclick="closes('overlay','upload')">关闭</div>
		  	<form action="<?php echo site_url("user/do_upload_sing")?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  		<input type="hidden" name="sid" value="<?php echo $sid?>"/>
		  		<span>歌曲名称：</span>
				<input type="text" name="mname" value="" id="mname"/><br>
				<span>歌手姓名：</span>
				<input type="text" name="msinger" value="" id="msinger" /><br>
				<span>歌曲文件：</span>
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
					<a id="back" style="cursor: pointer;">返回</a>
				</div>
			</div>
		</div>
		<div class="detail">
			<div class="add">
				<span onclick="show('overlay','upload')" style="cursor:pointer;">添加歌曲</span>
			</div>
			
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
						<div id="hide" style='display:none;'><?php echo $key->mid;?></div>
						<div class="music-id"></div>
						<div class="music-name"><?php echo $key->mname?></div>
						<div class="music-singer"><?php echo $key->msinger?></div>
						<div class="music-hits"><?php echo $key->hits?></div>
						<div class="music-tools">
							<a href="user/admin_pl?id=<?php echo $key->mid;?>" class='chakanpl' style="color:#000;" >查看评论</a>
							<a href="user/admin_sing?id=<?php echo $key->aid?>" data='<?php echo $key->mid?>' class='del' style="color:#000">删除歌曲</a>     
						</div>
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
			$('#back').on('click',function(){
				window.history.go(-1);
			})
		</script>
		<script src="assets/js/jquery-1.12.4.js"></script>
		<script type="text/javascript" charset="utf-8">
		$(function(){
			
			$('#sname').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">请输入歌曲名！</span>');
				$('#sname').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/search_sing')?>','sing='+name,function(data){				
				if(data=='success'){
					var oSpan=$('<span style="font-size:11px;" id="u1">该歌曲已存在！</span>');
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
				$.post('<?php echo site_url('user/do_delete_sing')?>','mid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			
			$("#sub").on('click',function(){
				var mname = $("#mname").val();
				var msinger = $("#msinger").val();
				var c_pic = $("#c_pic").val();
				if(mname!=''&&msinger!=''&&c_pic!=''){
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