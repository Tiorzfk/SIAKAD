 <?php session_start();
if((!$_SESSION['username'])and (!$_SESSION['password'] )){
header("Location: login/");
}
error_reporting(0);
include "header.php" ;
if ($_REQUEST[url]==''){
include "home.php";
}
else if ($_REQUEST[url]=='siswa'){
include "form_siswa.php";
}
else if ($_REQUEST[url]=='detail_siswa'){
include "detail_siswa.php";
}
else if ($_REQUEST[url]=='nilai'){
include "form_nilai.php";
}
else if ($_REQUEST[url]=='guru'){
include "form_guru.php";
}
else if ($_REQUEST[url]=='sk'){
include "form_sk.php";
}
else if ($_REQUEST[url]=='ta'){
include "form_ta.php";
}
include "footer.php";
?>
     