<!DOCTYPE html>
<html lang="ja">
<head>
<meta name="google-site-verification" content="_lkS_jT7-Ns0XDrA4PDCHHUfXMAART5GR1jyDf4ok2c" />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php if($name!=''){echo($name.' ');} ?>オンラインバー | Zoom Bar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php if($comment_small!=''){echo($comment_small);}else{echo('オンラインバーのサイトです。なじみの店、新しい店、イベント、出会い、オンラインバーを楽しんでください。');} ?>">
<meta name="keywords" content="オンライン,バー,二次会,飲み会">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/inview.css">
<script src="js/openclose.js"></script>
<!-- <script src="js/fixmenu_pagetop.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128215198-6">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128215198-6');
</script>
<!--[if lt IE 10]>
<style>
.up, .left, .right, .transform1, .transform2 {opacity:1;}
.upstyle, .leftstyle, .rightstyle, .transform1style, .transform2style {transition: 0s 0s;}
.up {bottom: 0px;}
.left {left: 0px;}
.right {right: 0px;}
.transform1 {transform: scaleX(1);}
</style>
<![endif]-->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<header>
<div class="inner">
<h1 id="logo" style="font-size: 2em;"><!-- <a href="index.html"> --><!-- Zoom Bar & Snack --><img src="images/logo.png" alt="Sample Club"><!-- </a> --></h1>
<p id="tel">オンライン バー<span class="tel">登録店舗／個人　募集中！ (無料)</span></p>
</div>
</header>

<!--PC用（901px以上端末）メニュー-->
<nav id="menubar">
<ul class="inner">
<li <?php if($_SERVER["REQUEST_URI"] == "" ||$_SERVER["REQUEST_URI"] == "/index.html") print "class=\"current\""; ?>><a href="index.html">HOME<span>ホーム</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/bar.html") print "class=\"current\""; ?>><a href="bar.html">BAR<span>店舗</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/cast.html") print "class=\"current\""; ?>><a href="cast.html">MEMBER<span>個人</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/system.html") print "class=\"current\""; ?>><a href="system.html">SYSTEM<span>システム</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/access.html") print "class=\"current\""; ?>><a href="access.html">ACCESS<span>アクセス</span></a></li>
<li <?php if(preg_match("/signup.html/",$_SERVER["REQUEST_URI"])) print "class=\"current\""; ?>><a href="signup.html">SING UP<span>登録</span></a></li>
</ul>
</nav>

<!--小さな端末用（900px以下端末）メニュー-->
<nav id="menubar-s">
<ul>
<li <?php if($_SERVER["REQUEST_URI"] == "" ||$_SERVER["REQUEST_URI"] == "/index.html") print "class=\"current\""; ?>><a href="index.html">HOME<span>ホーム</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/bar.html") print "class=\"current\""; ?>><a href="bar.html">BAR<span>店舗</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/cast.html") print "class=\"current\""; ?>><a href="cast.html">MEMBER<span>個人</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/system.html") print "class=\"current\""; ?>><a href="system.html">SYSTEM<span>システム</span></a></li>
<li <?php if($_SERVER["REQUEST_URI"] == "/access.html") print "class=\"current\""; ?>><a href="access.html">ACCESS<span>アクセス</span></a></li>
<li <?php if(preg_match("/signup.html/",$_SERVER["REQUEST_URI"])) print "class=\"current\""; ?>><a href="signup.html">SING UP<span>登録</span></a></li>
</ul>
</nav>