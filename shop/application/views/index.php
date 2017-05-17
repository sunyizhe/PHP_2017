<!DOCTYPE html>
<html>
<head>
	<title>主页</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<script src="assets/js/jquery.min.js"></script>
</head>
<body>
<div class="hmtop">
	<div class="hmtop-top">
		<div class="hmtop-left">
			<a href="user/show_personal"><?php echo $this->session->userdata('name')?></a>
			<a href="user/show_unindex">[注销]</a>
			<?php
				foreach ($good as $g) {
			?>
				<span  class="person"><?php echo $g->name?></span>
			<?php
			}
			?>
			<a href="user/show_city" >[选择]</a>
		</div>
		<div class="hmtop-right">
			<a href="user/show_index">商城首页</a>
			<a href="user/show_personal" class="person">个人中心</a>
			<a href="user/show_collect" class="person">收藏夹</a>
		</div>
	</div>
	<div class="wrap">
		<div class="logo">
			<img src="assets/images/logobig.png">
		</div>
		<!-- 搜索框 -->
		<form class="search" action="user/do_sear" method="get">
			<input type="text" id="input-search" name="search" placeholder="搜索">
			<input type="submit" id="input-sub" value="搜  索">
		</form>
	</div>
</div>
<div class="nav-table">
	<div class="nav-cont">
		<div class="create nav-title">
			全部分类
		</div>
		<a href="user/show_index">商城首页</a>
	</div>
</div>
<div class="banner">
	<ul class="banner-nav">
		<?php
			foreach ($goodss as $o) {
				?>
				<li class="cata"><?php echo $o->ccname?>
					<div class="access none">
						<?php
						foreach ($o->aaa as $y) {
							?>
								<div class="white">
									<a class="link" href="user/do_search?id=<?php echo $y->cid?>">
										<span><?php echo $y->cname?></span>
									</a>
								</div>
							<?php
						}
								?>
					</div>
				</li>
				<?php
			}
		?>
	</ul>
	<ul class="a">
		<li><img src="assets/images/ad1.jpg"></li>
		<li><img src="assets/images/ad2.jpg"></li>
		<li><img src="assets/images/ad3.png"></li>
		<li><img src="assets/images/ad4.png"></li>

	</ul>

	<div class="l">&lt;</div>
	<div class="r">&gt;</div>
</div>
<div class="shopMain">
	<div class="shopMain-title">
		<?php
		foreach ($good as $g) {
			?>
			<span><?php echo $g->name?></span>
			<?php
		}
		?>
		<span>周边商品</span>
	</div>
	<div class="shopMain-information">
		<ul>
			<?php
			foreach ($goods as $g) {
				?>
				<li class="shopMain-img">
					<a href="user/show_single?id=<?php echo $g->wid?>"><img src="assets/uploads/<?php echo $g->wpic;?>"></a>
					<div class="goods-title"><?php echo $g->wtitle;?></div>
					<br/>
				<span class="goods-price">
				<b>￥</b>
				<strong><?php echo $g->wprice;?></strong>
				</span>
<!--				<span class="goods-hits">-->
<!--					<b>收藏</b>-->
<!--					<strong>99</strong>-->
<!--				</span>-->
				</li>
				<?php
				}
			?>
			
		</ul>
	</div>
</div>
<script>
	$(".create").on("mouseover",function(){
		$(".banner-nav").addClass("show");
	})
	$(".cata").on("mouseover",function(){
		// $(".white").addClass("none");
		$(this).children("div.access").removeClass("none").addClass("show");
	})
	$(".cata").on('mouseout',function(){
		// console.log($(this .white));
		$(this).children("div.access").removeClass("show").addClass("none");
	})
	$(function () {
		$('.r').click(function () {
			$(".banner .a").animate({marginLeft:"-1349px"},5, function () {
				$(".banner .a>li").eq(0).appendTo($(".banner .a"));
				$(".banner .a").css('marginLeft','0px');
			});
		})
		$('.l').click(function () {
			$(".banner .a").css('marginLeft','-1349px');
			$(".banner .a>li").eq(3).prependTo($(".banner .a"));
			$(".banner .a").animate({marginLeft:"0px"},5);
		})
	})
</script>
</body>
</html>