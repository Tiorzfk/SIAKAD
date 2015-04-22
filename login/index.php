 <?php error_reporting(0);
session_start();
if(($_SESSION['username'])and ($_SESSION['password'] )){
header("Location: ../");
}?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<meta charset="utf-8"/>
<title>Login - Sistem Informasi Akademik</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="apple-touch-icon" href="../icon.png">
<link rel="apple-touch-icon" sizes="76x76" href="../icon.png">
<link rel="apple-touch-icon" sizes="120x120" href="../icon.png">
<link rel="apple-touch-icon" sizes="152x152" href="../icon.png">
<link rel="icon" type="image/x-icon" href="../icon.png"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../pages/css/pages-icons.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="../pages/css/pages.css" rel="stylesheet" type="text/css"/>
<!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="../pages/css/windows.chrome.fix.css" />'
    }
    </script>

<script type="text/javascript">
var ajaxRequest;
function getAjax() //fungsi cek apakah web browser mendukung AJAX
{
  try
  {
    // Opera 8.0+, Firefox, Safari
    ajaxRequest = new XMLHttpRequest();
  }
  catch (e)
  {
    // Internet Explorer Browsers
    try
    {
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) 
    {
      try
      {
        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e)
      {
        // Something went wrong
        alert("Your browser broke!");
        return false;
      }
    }
  }
}
var myajax;
 function ambilta(id_ta){     
 myajax = buatajax();     
 var url="../ambilta.php";    
 url=url+"?idd="+id_ta;     
 url=url+"&sid="+Math.random();     
 myajax.onreadystatechange=stateChanged;     
 myajax.open("GET",url,true);     
 myajax.send(null); 
 }  
 
function buatajax(){     
if (window.XMLHttpRequest){         
return new XMLHttpRequest();     
}    
 if (window.ActiveXObject){         
 return new ActiveXObject("Microsoft.XMLHTTP");     
 }    
 return null; 
 }  
 
function stateChanged(){
var data;     
if (myajax.readyState==4){         
data=myajax.responseText;        
if(data.length>0){             
document.getElementById("ta").value = data      
}else{             
document.getElementById("ta").value = "";         
}  
}
 }
 </script>
</head>
<body class="fixed-header   ">
 
<div class="login-wrapper ">
 
<div class="bg-pic">
 
<img src="../assets/img/demo/bg-login.jpg" data-src="../assets/img/demo/bg-login.jpg" data-src-retina="../assets/img/demo/bg-login.jpg" alt="" class="lazy">
 
 <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
<h2 class="semi-bold text-white">
Sistem Informasi Akademik untuk SMK</h2>
<p class="small">
Sebelum Mengakses Halaman Pengelolaan Sistem Informasi Akademik ini Anda harus login terlebih dahulu login , login ini memiliki 3 level diantaranya admin,guru,dan siswa.
</p>
</div>
 
</div>
 
 
<div class="login-container bg-white">
<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
<img src="../assets/img/logo.png" alt="logo" data-src="../assets/img/logo.png" data-src-retina="../assets/img/logo_2x.png" width="78" height="22">
<p class="p-t-35">Sign into your account</p>
 
<form id="form-login" class="p-t-15" role="form" action="+login.php" method="post">
 
<div class="form-group form-group-default">
<label>Username</label>
<div class="controls">
<input type="text" name="username" placeholder="User Name" class="form-control" required>
</div>
</div>

<div class="form-group form-group-default">
<label>Password</label>
<div class="controls">
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
</div>
 
<div class="row">
<p class="p-t-35">Pilih Tahun Ajaran</p>
<div class="col-md-6 no-padding">
<select name="idta" class="full-width" onchange=ambilta(this.value) data-init-plugin="select2" required>
<option value="">-Pilih Tahun Ajaran-</option>
<option value="all">Tampilkan semua siswa</option>
<?php
include "../config/koneksi.php";
$minta = "SELECT * FROM tr_tahun_ajaran ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo"<option value=$hasil[id_ta]>$hasil[tahun_ajaran]</option>";
}
?>
</select>
</div>
<input type="hidden" class="form-control" id="ta" name="ta">
</div>
 
<button class="btn btn-primary btn-cons m-t-10" type="submit" name="Login">Sign in</button>
</form>
 
<div class="pull-bottom sm-pull-bottom">
<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
<div class="col-sm-3 col-md-2 no-padding">
</div>
</div>
</div>
</div>
</div>
 
</div>

<script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-bez/jquery.bez.min.js"></script>
<script src="../assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap-select2/select2.min.js"></script>
<script type="text/javascript" src="../assets/plugins/classie/classie.js"></script>
<script src="../assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
 
 
<script src="../pages/js/pages.min.js"></script>
 
 
<script src="../assets/js/scripts.js" type="text/javascript"></script>
 
<script>
    $(function()
    {
      $('#form-login').validate()
    })
    </script>
</body>

<!-- Mirrored from pages.revox.io/latest/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jan 2015 06:26:01 GMT -->
</html>