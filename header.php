<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<meta charset="utf-8"/>
<title>Tioreza - Sistem Informasi Akademik</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="apple-touch-icon" href="icon.png">
<link rel="apple-touch-icon" sizes="76x76" href="icon.png">
<link rel="apple-touch-icon" sizes="120x120" href="icon.png">
<link rel="apple-touch-icon" sizes="152x152" href="icon.png">
<link rel="icon" type="image/x-icon" href="icon.png"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />

<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/jquery-datatable/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<!--[if lt IE 9]>
            <link href="assets/plugins/mapplic/css/mapplic-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->

<script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
</head>
<body class="fixed-header  dashboard ">
 
<nav class="page-sidebar" data-pages="sidebar">
 
<div class="sidebar-overlay-slide from-top" id="appMenu">
<div class="row">
<div class="col-xs-6 no-padding">
<a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
</a>
</div>
<div class="col-xs-6 no-padding">
<a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
</a>
</div>
</div>
<div class="row">
<div class="col-xs-6 m-t-20 no-padding">
<a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
</a>
</div>
<div class="col-xs-6 m-t-20 no-padding">
<a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
</a>
</div>
</div>
</div>
 
 
<div class="sidebar-header">
<img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
<div class="sidebar-header-controls">
<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
</button>
<button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
</button>
</div>
</div>
 
<?php
include "config/koneksi.php";
$sql_news = "SELECT *from tr_siswa";
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
$yoah=mysql_num_rows($qry_news);
?>
<?php
include "config/koneksi.php";
$sql_news = "SELECT *from tr_nilai";
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
$nilai=mysql_num_rows($qry_news);
?>
<?php
include "config/koneksi.php";
$sql_news = "SELECT *from tr_guru";
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
$guru=mysql_num_rows($qry_news);
?>
<?php
include "config/koneksi.php";
$sql_news = "SELECT *from tr_standar_kompetensi";
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
$sk=mysql_num_rows($qry_news);
?>
<div class="sidebar-menu">
 
<ul class="menu-items">
<li class="m-t-30 open">
<a href="./" class="detailed">
<span class="title">Home</span>
<span class="details">12 New Updates</span>
</a>
<span class="icon-thumbnail bg-success"><i class="pg-home"></i></span>
</li>

<li class="">
<?php if($_SESSION['idta']=="all"){
echo "<a href='All-siswa' class='detailed'>";
}else{?>
<a href="siswa-<?php echo $_SESSION['ta'];?>" class="detailed">
<?php } ?>
<span class="title">Siswa</span>
<span class="details"><?php echo $yoah ?> Siswa</span>
</a>
<span class="icon-thumbnail"><i class="fs-14 sl-user-follow"></i></span>
</li>
<li class="">
<?php if($_SESSION['idta']=="all"){
echo "<a href='All-nilai' class='detailed'>";
}else{?>
<a href="nilai-<?php echo $_SESSION['ta'];?>" class="detailed">
<?php } ?>
<span class="title">Nilai</span>
<span class="details"><?php echo $nilai ?> Nilai</span>
</a>
<span class="icon-thumbnail"><i class="fs-14 fa fa-paint-brush"></i></i></span>
</li>
<li class="">
<a href="guru" class="detailed">
<span class="title">Guru</span>
<span class="details"><?php echo $guru ?> Guru</span>
</a>
<span class="icon-thumbnail"><i class="fs-14 sl-user-follow"></i></span>
</li>
<li class="">
<a href="Standar-Kompetensi" class="detailed">
<span class="title">Standar Kompetensi</span>
<span class="details"><?php echo $sk ?> Standar Kompetensi</span>
</a>
<span class="icon-thumbnail"><i class="fs-14 pg-cupboard"></i></span>
</li>
<li class="">
<a href="Tahun-Ajaran" class="detailed">
<span class="title">Tahun Ajaran</span>
</a>
<span class="icon-thumbnail"><i class="fs-14 pg-cupboard"></i></span>
</li>
<li class="">
<a href="javascript:;"><span class="title">Menu Levels</span>
<span class="arrow"></span></a>
<span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
<ul class="sub-menu">
<li>
<a href="javascript:;">Level 1</a>
<span class="icon-thumbnail">L1</span>
</li>
<li>
<a href="javascript:;"><span class="title">Level 2</span>
<span class="arrow"></span></a>
<span class="icon-thumbnail">L2</span>
<ul class="sub-menu">
<li>
<a href="javascript:;">Sub Menu</a>
<span class="icon-thumbnail">Sm</span>
</li>
<li>
<a href="ujavascript:;">Sub Menu</a>
<span class="icon-thumbnail">Sm</span>
</li>
</ul>
</li>
</ul>
</li>
</ul>
<div class="clearfix"></div>
</div>
 
</nav>
 
 
 
<div class="page-container">
 
<div class="header ">
 
<div class="pull-left full-height visible-sm visible-xs">
 
<div class="sm-action-bar">
<a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
<span class="icon-set menu-hambuger"></span>
</a>
</div>
 
</div>
 
<div class="pull-right full-height visible-sm visible-xs">
 
<div class="sm-action-bar">
<a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
<span class="icon-set menu-hambuger-plus"></span>
</a>
</div>
 
</div>
 
 
<div class=" pull-left sm-table">
<div class="header-inner">
<div class="brand inline">
<img src="assets/img/logo2.png" alt="logo" data-src="assets/img/logo2.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
</div>

<ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
<li class="p-r-15 inline">
<div class="dropdown">
<a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
<span class="bubble"></span>
</a>
<li class="p-r-15 inline">
<a href="#" class="icon-set clip "></a>
</li>
<li class="p-r-15 inline">
<a href="#" class="icon-set grid-box"></a>
</li>
</ul>
  

</div>
</div>
<div class=" pull-right">
<div class="header-inner">
<a href="login/logout.php" class="btn-link icon-fs-14 pg-power m-l-20 sm-no-margin hidden-sm hidden-xs" onclick="return confirm('Apakah anda yakin akan logout?')"></a>
</div>
</div>
<div class=" pull-right">
 
<div class="visible-lg visible-md m-t-10">
<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
<span class="semi-bold"><?php echo $_SESSION['nama'] ?></span>
</div>
<div class="thumbnail-wrapper d32 circular inline m-t-5">
<img src="<?php echo $_SESSION['foto'] ?>" alt="<?php echo $_SESSION['nama'] ?>" data-src="<?php echo $_SESSION['foto'] ?>" data-src-retina="<?php echo $_SESSION['foto'] ?>" width="32" height="32">
</div>
</div>
 
</div>
</div>

