<!DOCTYPE html>
<html>
<head>
    <title>上传物品</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" type="text/css" href="assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/personal.css">
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
        <form  action="user/do_search" method="post" class="search">
            <input type="text" name="" id="input-search" placeholder="搜索">
            <input type="submit" name="" id="input-sub" value="搜  索">
        </form>
    </div>
</div>
<div class="nav-table">
    <div class="nav-cont">
        <div class="nav-title">
            全部分类
        </div>
        <a href="user/show_index">商城首页</a>
    </div>
</div>
<div class="content">
    <ul class="content-nav">
        <li><a href="javascript:;" class="sheet sheet-title unline">个人中心</a></li>
        <li><a href="user/show_personal" class="sheet sheet-con">个人信息</a></li>
        <li><a href="user/show_upload" class="sheet sheet-con">上传物品</a></li>
        <li><a href="user/show_mine" class="sheet sheet-con active">个人物品</a></li>
        <li><a href="user/show_collect" class="sheet sheet-con">收藏夹</a></li>
    </ul>
    <div class="user-info">
        <div class="user-title unline">
            <strong>更改物品信息</strong>
            <small>/ Update Items Information</small>
        </div>
            <?php
                    foreach($goods as $g){
            ?>
            <form id="user-change"  action="user/keep?id=<?php echo $g->wid;?>" method="post">
                <div class="change">
                    <label for="t">标题</label>
                    <input type="text" id="t" name="wtitle" value="<?php echo $g->wtitle;?>" placeholder="请输入标题">
                </div>
<!--                <div class="change">-->
<!--                    <label for="b" style="margin: 0 50px 0 0;">类型</label>-->
<!--                    <select id="b" name="cid">-->
<!---->
<!--                    </select>-->
<!--                    </select>-->
<!--                    <label for="a" style="margin: 0 50px 0 120px;">城市</label>-->
<!--                    <select id="a" name="city">-->
<!---->
<!--                    </select>-->
<!--                </div>-->
                <div class="change">
                    <label for="p">价格</label>
                    <input type="text" id="p" name="wprice" value="<?php echo $g->wprice;?>" placeholder="请输入价格">
                </div>
                <label for="c" style="float: left;">描述</label>
                <textarea id="c" name="wcon" value="" placeholder="请输入描述内容，描述真实，否则会被强制下架"><?php echo $g->wcon;?></textarea>


                <input type="submit" value="提交 更改" class="sub">
            </form>
        <?php
            }
        ?>

    </div>

</div>
</body>
</html>