<!DOCTYPE html>
<html>
<head>
    <title>搜索</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
<div class="hmtop">
    <div class="hmtop-top">
        <div class="hmtop-left">
            <a href="user/show_personal"><?php echo $this->session->userdata('name')?></a>
            <a href="user/show_unindex">[注销]</a>
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

        <form class="search" action="user/do_search" method="post">
            <input type="text" name="search" id="input-search" placeholder="搜索" value="">
            <input type="submit" name="" id="input-sub" value="搜  索">
        </form>
    </div>
    <div class="nav-table">
        <div class="nav-cont">
            <div class="nav-title">
                全部分类
            </div>
            <a href="user/show_index">商城首页</a>
        </div>
    </div>
    <div class="search-content">
        <div class="search-nav">
            <a href="user/do_sear?sid=<?php echo $this->session->userdata('search');?>"id="up"><span>由低到高</span></a>
            <a href="user/do_sear?ssid=<?php echo $this->session->userdata('search');?>"><span>由高到低</span></a>
        </div>
        <ul class="search-con">
            <?php
            foreach($goods as $s){
                ?>
                <li>
                    <a href="user/show_single?id=<?php echo $s->wid;?>"><img src="assets/uploads/<?php echo $s->wpic;?>"></a>
                    <div class="search-title"><?php echo $s->wtitle;?></div>
                    <div class="search-price">￥<?php echo $s->wprice;?></div>
                    <div class="search-collect">点击图片查看</div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <script>


    </script>
</body>
</html>