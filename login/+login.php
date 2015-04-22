<?php session_start();
include "../config/koneksi.php";

#jika ditekan tombol login

if(isset($_POST['Login'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$idta = $_POST['idta'];
$ta = $_POST['ta'];
$ta2=preg_replace("/\//","-",$ta);
$sql =mysql_query("SELECT * FROM tr_login WHERE username='$username' &&
password='$password'");
$num = mysql_num_rows($sql);
if($num==1) {
$c = mysql_fetch_array($sql);
$_SESSION['username'] = $c['username'];
$_SESSION['password'] = $c['password'];
$_SESSION['nama'] = $c['nama'];
$_SESSION['nama_lengkap'] = $c['nama_lengkap'];

$_SESSION['level'] = $c['level'];
$_SESSION['idta'] = $idta;
$_SESSION['ta'] = $ta2;
$_SESSION['foto'] = 'assets/ava/' . $c['foto'];
if($_SESSION['idta']=="all"){
header('Location:../All-Tahun-Ajaran');
}else{
header('Location:../Tahun-Ajaran-'.$ta2);
}
} 
else {
// jika login salah //
echo "<div class='col-md-13 sm-p-t-15'>
<div class='alert alert-danger' role='alert'>
<button class='close' data-dismiss='alert'></button>
<strong>Error: </strong>Username atau password yang anda masukan salah
</div>
</div>";
include "index.php";
}
}
?>