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
    <link rel="stylesheet" type="text/css" href="assets/css/single.css">
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
                <li><a href="admin_user/"><span>管理员</span></a></li>
                <li><a href="admin_user/login"><span>[退出]</span></a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="single-content">
    <?php
    foreach($id as $i) {
        ?>
        <img src="assets/uploads/<?php echo $i->wpic;?>">
        <div class="single-info">
            <div class="single-title">
                <?php echo $i->wtitle;?>
            </div>
            <div class="single-con">
                <span>卖家昵称：<?php echo $i->uname;?></span><br/>
                <span>卖家电话：<?php echo $i->utel;?></span><br/>
                <span>所在城市：<?php echo $i->name;?></span><br/>
                <span>价格：<span class="spc">￥<?php echo $i->wprice;?></span></span><br/>
                <span>商品描述：<?php echo $i->wcon;?></span>
            </div>
            <span id="back" class="col" style="cursor: pointer;">返回</span>
        </div>
        <?php
    }
    ?>
</div>
<script>
    $("#back").on("click",function(){
        window.history.go(-1);
    })
</script>



</body>
</html>