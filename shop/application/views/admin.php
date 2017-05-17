<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员页面</title>
	<base href="<?php echo site_url();?>" target=""/>
	<link rel="stylesheet" href="assets/css/admin.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/common.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top">
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
			</div>
			<div>
				<ul class="nav navbar-nav">
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="user/admin_user"><span>管理员</span></a></li>
				<li><a href="user/unhome"><span>[退出]</span></a></li>
			</ul>
		</div>
	</nav>
</div>

<div class="content">
	<div class="container">
		<div class="left_con">
			<ul id="menu">
				<li>
					<h3>用户管理</h3>
					<ul class="sub-menu">
						<li id="l1"><p>用户信息</p></li>
					</ul>
				</li>
				<li>
					<h3>商品管理</h3>
					<ul class="sub-menu">
						<li id="l4"><p>商品审核</p></li>
					</ul>
				</li>
			</ul>

		</div>

		<div class="right_con">
			<div id="d1">
				<?php
				foreach($user as $v){
					?>
					<div class='d1'>
						<span>用户：</span>
						<span><?php echo $v->uemail;?></span><br>
						<span>姓名：</span>
						<span><?php echo $v->uname;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span>性别：</span>
						<span><?php echo $v->usex;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span>城市：</span>
						<span><?php echo $v->ubirth;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span>电话：</span>
						<span><?php echo $v->utel;?></span>
						<a href="admin_user/admin"  data='<?php echo $v->uid;?>' class='delete_user'><span>[删除用户]</span></a>
					</div>
					<?php
				}
				?>
			</div>



			<div id="d4" >
				<?php
				foreach($goods as $v){
					?>
					<div>
						<div class="x_con">
							<div class="img_div">
								<a href="admin_user/show_single?id=<?php echo $v->wid?>"><img src="assets/uploads/<?php echo $v->wpic;?>" alt=""></a>
							</div>
							<div class="cont">
								<div class="c_title">
									<a href="#"><?php echo $v->wtitle;?></a>
								</div>

								<div class="c_sum">
									<span>价格：<?php echo $v->wprice;?></span>
								</div>
								<div class="c_sum">
									<span>内容：<?php echo substr($v->wcon,0,61).'......'?></span>
								</div>
								<div class="c_foot">
									<a href="admin_user/admin"  data='<?php echo $v->wid;?>' class='delete_wz'><span>[删除商品]</span></a>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<?php
				}
				?>
			</div>

		</div>

	</div>


	<script>
		var oL1 = document.getElementById('l1');
		var oL4 = document.getElementById('l4');
		var oD1 = document.getElementById('d1');
		var oD4 = document.getElementById('d4');
		oL1.className = 'li';
		oD1.className = '';
		oD4.className = 'selected';
		oL1.onclick =function () {
			oL1.className = 'li';
			oL4.className = '';
			oD1.className = '';
			oD4.className = 'selected';
		}
		oL4.onclick =function () {
			oL1.className = '';
			oL4.className = 'li';
			oD1.className = 'selected';
			oD4.className = '';
		}
	</script>
	<script type="text/javascript" charset="utf-8">
		$(function(){
			$(".delete_user").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('admin_user/user_del')?>','uid='+aa,function(data){
					if(data=='success'){
						alert('用户删除成功！');
					}
				})
			})

			$(".delete_wz").on("click",function(){
				var aa =$(this).attr("data");
				$.post('<?php echo site_url('admin_user/goods_del')?>','wid='+aa,function(data){
					if(data=='success'){
						alert('商品删除成功！');
					}
				})
			})

		})

	</script>

</body>
</html>