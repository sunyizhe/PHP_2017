<!DOCTYPE html>
<html>
<head>
	<title>album</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_album.css">
</head>
<body style="background: #EEEEEE;">
	<div id='overlay' class="overl">
	</div>
	<div id="upload">
		<div id="msgShut" onclick="closes('overlay','upload')">关闭</div>
		  	<form action="<?php echo site_url("user/do_upload_album")?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  		<input type="hidden" name="sid" value="<?php echo $sid?>"/>
		  		<span>专辑名称：</span>
				<input type="text" name="aname" value="" id="aname"/><br>
				<span>歌手姓名：</span>
				<input type="text" name="asinger" value="" id="asinger" /><br>
				<span>发行时间：</span>
				<input type="text" name="atime" value=""  id="atime"/><br>
				<span>专辑内容：</span>
				<textarea rows="5" cols="40" id='acon' name='acon' id="acon"></textarea>
				<span>专辑图片：</span>
				<input type="file" name="file" value="" id="c_pic" /><br>
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
					<a href="user/admin_index">返回</a>
				</div>
			</div>
		</div>
		<div class="album">
			<div class="add">
				<span onclick="show('overlay','upload')" style="cursor:pointer;">添加专辑</span>
			</div>
			<div class="album-content">
					<?php
					foreach ($album as $key) {
					?>
				<div class="demo">
					
					<a href="user/admin_sing?id=<?php echo $key->aid?>" class="demo-img"><img src="assets/images/<?php echo $key->apic?>"></a>
					<div class="demo-content">
						<a href="user/admin_sing?id=<?php echo $key->aid?>" class="demo-title"><?php echo $key->aname?></a><br/>
						<span class="demo-time"> 发行时间: <?php echo $key->atime?></span><br/>
						<span class="demo-con"><?php echo $key->acon?></span>
						<span style="cursor:pointer;" class='update' style="color:#000">更改专辑</span>        
						<a href="user/admin_album?id=<?php echo $key->sid?>" data='<?php echo $key->aid?>' class='del' style="color:#000">删除专辑</a>        
					</div> 
				</div>	
				<hr>
				<div class="updata overl">
		<div class="msgShut1" >关闭</div>
		  	<form action="<?php echo site_url("user/do_updata_album")?>" method="post" accept-charset="utf-8" >
		  		<input type="hidden" name="sid" value="<?php echo $sid?>"/>
		  		<input type="hidden" name="aid" value="<?php echo $key->aid?>"/>
		  		<span>专辑名称：</span>
				<input type="text" name="aname" value="<?php echo $key->aname?>" class="aname1"/><br>
				<span>歌手姓名：</span>
				<input type="text" name="asinger" value="<?php echo $key->asinger?>" class="asinger1" /><br>
				<span>发行时间：</span>
				<input type="text" name="atime" value="<?php echo $key->atime?>"  class="atime1"/><br>
				<span>专辑内容：</span>
				<textarea rows="5" cols="40"  name='acon' class="acon1"><?php echo $key->acon?></textarea>
				<input type="submit" value="修改" class='sub1'/>
			</form>
		</div>
				
				<?php
					}
					?>			
			</div>
		</div>
		<script src="assets/js/jquery-1.12.4.js"></script>
		<script>
			function show(overlay,upload){
				document.getElementById(overlay).style.display = 'block';
            	document.getElementById(upload).style.display = 'block';
			}
			function closes(overlay,upload){
				document.getElementById(overlay).style.display = 'none';
            	document.getElementById(upload).style.display = 'none';
			}
			
			$(".update").on("click",function(){
				$("#overlay").addClass('ccc');
				$(".updata").addClass("ccc");
			})
			$(".msgShut1").on("click",function(){
				$("#overlay").removeClass('ccc');
				$(".updata").removeClass("ccc");
			})
			
		</script>
		
		<script type="text/javascript" charset="utf-8">
		$(function(){
			
			$('#sname').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">请输入专辑名！</span>');
				$('#sname').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/search_album')?>','album='+name,function(data){				
				if(data=='success'){
					var oSpan=$('<span style="font-size:11px;" id="u1">该专辑已存在！</span>');
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
				$.post('<?php echo site_url('user/do_delete_album')?>','aid='+aa,function(data){				
				if(data=='success'){
					alert('删除成功！');
				}	
				})
			})
			
			
			$("#sub").on('click',function(){
				var name = $("#aname").val();
				var pass = $("#asinger").val();
				var atime = $("#atime").val();
				var acon = $("#acon").val();
				var c_pic = $("#c_pic").val();
				if(aname!=''&&asinger!=''&&atime!=''&&acon!=''&&c_pic!=''){
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