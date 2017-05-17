<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
</head>
<body>
<div class="login-title">
	<a href="index.html"><img src="assets/images/logobig.png"></a>
</div>
<div class="login-content">
	<img src="assets/images/big.jpg">
	<div class="login-box">
		<h3>请注册</h3>
		<a href="user/show_login" class="to-reg">去登录</a>
		<form action="<?php echo site_url("user/do_reg")?>" method="post">
			<div class="user-name">
				<label for="user" id="i-u"></label>
				<input type="text" name="uemail" id="user" placeholder="请输入账号">
			</div>
			<div class="pass-word">
				<label for="pass" id="i-p"></label>
				<input type="password" name="pass" id="pass" placeholder="设置密码">
			</div>
			<div class="repass-word">
				<label for="repass" id="i-p"></label>
				<input type="password" name="rpass" id="repass" placeholder="确认密码">
			</div>
			<input type="submit" id="to-index" value="注册">
		</form>
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>

	$(function(){
		$('#repass').blur(function(){

			var pass=$('#pass').val();
			var rpass=$('#repass').val();
			if(pass!=rpass){
				var oSpan=$('<span style="font-size:11px; color: #ff3232;" id="s1">密码不一致</span>');
				$(this).after(oSpan);
				$('#to-index').attr('disabled',"disabled");
			}else{
				$('#to-index').removeAttr('disabled');
			}
		});


		$('#repass').focus(function(){
			$('#s1').remove();
		});

		$('#user').blur(function(){
			var name=$(this).val();
			if(name==""){
				var oSpan1=$('<span style="font-size:11px; color: #ff3232;" id="u1">账号不能为空</span>');
				$('#user').after(oSpan1);
//				$('#to-index').attr('disabled',"disabled");
			}else{
				$.post('<?php echo site_url('user/check')?>','uemail='+name,function(data){
					if(data=='success'){
						var oSpan1=$('<span style="font-size:11px; color: #ff3232;" id="u1">该用户已注册</span>');
						$('#user').after(oSpan1);
					}
				})
//				$('#to-index').attr('disabled',"disabled");

			}

		});
		$('#user').focus(function(){
			$('#u1').remove();
		});

		$("#to-index").on("click",function(){
			var name=$("#user").val();
			var pass=$('#pass').val();
			var rpass=$('#repass').val();
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
