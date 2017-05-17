<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/reg.css">
</head>
<body>
	<div class="reg">
		<div class="top">
				<div class="wrapper">
					<div class="logo">
						<a href="user/unindex">
							<img src="assets/images/logo.jpg" />
						</a>
					</div>
					<ul class="top-nav">
						<li><a href="user/unindex">首页</a></li>
						<li><a href="user/in">榜单</a></li>	
						<!-- <li><a href="user/in">专辑</a></li> -->
						<li><a href="user/in">歌手</a></li>
					</ul>
					<div class="log-reg">
						<a href="user/login">登录</a>
						<a href="user/reg">注册</a>
					</div>
					<div class="se">
					<form action="user/login" method="post">
						<input type="text" placeholder="找到好音乐">
						<input type="submit" class="search-botn" value="">
					</form>
				</div>
				</div>
		</div>
	<form action="<?php echo site_url("user/do_reg")?>" method="post" class="reg-surface">
			<div>
				账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name1" class="first">
			</div>
			<div>
				昵称：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="zname"  class="first">
			</div>
			<div>
				密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="p1" name="pass1">
			</div>
			<div>
				确认密码：<input type="password" id="p2" name="pass2">
			</div>
			<div class="last">
				<input type="submit" class="login-btn" name="sub" value="立 即 注 册">
			</div>
		</form>
	</div>
	
	<script src="assets/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(function(){
		$('#p2').blur(function(){
			
			var pass=$('#p1').val();
			console.log(pass);
			var rpass=$('#p2').val();
			if(pass!=rpass){
				var oSpan=$('<span style="font-size:11px;" id="s1">密码不一致</span>');
				$(this).after(oSpan);
			}
		});
		
		
		$('#p2').focus(function(){
			$('#s1').remove();
		});
		
		$('#name1').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan=$('<span style="font-size:11px;" id="u1">账号不能为空</span>');
				$('#name1').after(oSpan);
			}else{
					$.post('<?php echo site_url('user/check')?>','uemail='+name,function(data){				
				if(data=='success'){
					var oSpan=$('<span style="font-size:11px;" id="u1">该用户已注册</span>');
					$('#name1').after(oSpan);
				}			
			})
		
			}
		
		});
		 $('#name1').focus(function(){
			$('#u1').remove();
		 });
		
		
			$("#sub").on("click",function(){
				var name=$("#name1").val();
				var pass=$('#p1').val();
				var rpass=$('#p2').val();
				if(pass!=""&&rpass!=""&&name!=""){
					return true;
				}else{
					return false;
				}
			})
	})
	</script>
	
</body>
</html>