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
            <a href="user/show_login">登录</a>
            <a href="user/show_reg" class="person">注册</a>

        </div>
        <div class="hmtop-right">
            <a href="user/show_unindex">商城首页</a>
            <a href="user/show_login" class="person">个人中心</a>
            <a href="user/show_login" class="person">收藏夹</a>
        </div>
    </div>
    <div class="wrap">
        <div class="logo">
            <img src="assets/images/logobig.png">
        </div>
        <!-- 搜索框 -->
        <form class="search">
            <input type="text" name="search" placeholder="搜索">
            <input type="submit" id="input-sub" value="搜  索">
        </form>
    </div>
</div>
<div class="nav-table">
    <div class="nav-cont">
        <div class="create nav-title">
            全部分类
        </div>
        <a href="user/show_unindex">商城首页</a>
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
                            <a class="link" href="user/show_login">
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

<div class="shopMain" style="height: 100px;">
    <div class="shopMain-title">

            <span>某城市</span>

        <span>周边商品</span>
    </div>
<!--    <div class="shopMain-information">-->
<!---->
<!--    </div>-->
</div>
<script>
//    $(".create").on("mouseover",function(){
//        $(".banner-nav").addClass("show");
//    })
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