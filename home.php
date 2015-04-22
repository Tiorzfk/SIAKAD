
<div class="page-content-wrapper">
 
<div class="content">
<div class="social-wrapper">
<div class="social " data-pages="social">
 
<div class="jumbotron" data-pages="parallax" data-social="cover">
<div class="cover-photo">
<img alt="Cover photo" src="assets/img/demo/bg-login.jpg"/>
</div>
<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
<div class="inner">
<div class="pull-bottom bottom-left m-b-40">
<h5 class="text-white no-margin">Hai <?php echo $_SESSION['nama'] ?> anda login dengan hak akses sebagai <?php echo $_SESSION['level'] ?></h5>
<h1 class="text-white no-margin"><span class="semi-bold">Selamat</span> datang di halaman Pengelolaan SIAKAD</h1>
</div>
</div>
</div>
</div>
 

<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
<div class="feed">
 
<div class="day" data-social="day">
 
<div class="item no-border bg-transparent full-width" data-social="item">
 
<div class="container-fluid p-t-30 p-b-30 ">
<div class="row">
<div class="col-md-4">
<div class="container-xs-height">
<div class="row-xs-height">
<div class="social-user-profile col-xs-height text-center col-top">
<div class="thumbnail-wrapper d48 circular bordered b-white">
<img alt="Avatar" width="55" height="55" data-src-retina="assets/ava/tio.jpg" data-src="assets/ava/tio.jpg" src="assets/ava/tio.jpg">
</div>
<br>
<i class="fa fa-check-circle text-success fs-16 m-t-10"></i>
</div>
<div class="col-xs-height p-l-20">
<h3 class="no-margin">Tioreza Febrian</h3>
<p class="no-margin fs-16">is interested about the programing website</p>
<p class="hint-text m-t-5 small">Bandung | Student at SMK</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<p class="no-margin fs-16">Hi My Name is Tioreza Febrian, &amp; heres my project sistem informasi akademik</p>
<p class="hint-text m-t-5 small">I love reading people's about page especially those who are in the same industry as me.</p>
</div>
<?php
include "config/koneksi.php";
if($_SESSION['idta']=="all"){
$sql_news = "SELECT *from tr_siswa";
}else{
$idta=$_SESSION['idta'];
$sql_news = "SELECT *from tr_siswa where id_ta='$idta'";
}
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
$jmlsiswa=mysql_num_rows($qry_news);
?>
<div class="col-md-4">
<p class="m-b-5 small"><?php echo $jmlsiswa?> Siswa</p>
<ul class="list-unstyled ">

<?php
include "config/koneksi.php";
if($_SESSION['idta']=="all"){
$sql_news="SELECT nama,foto from tr_siswa limit 7";
}else{
$idta=$_SESSION['idta'];
$sql_news="SELECT nama,foto from tr_siswa
where id_ta='$idta' limit 7";
}
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$foto=$hsl_news['foto'];
$nama=$hsl_news['nama'];
?>
<li class="m-r-10">
<div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
<img width="35" height="35" data-src-retina="assets/siswa/<?php echo $foto ?>" data-src="assets/siswa/<?php echo $foto ?>" alt="<?php echo $nama ?>" src="assets/siswa/<?php echo $foto ?>">
</div>
</li>
<?php } ?>
<div class="thumbnail-wrapper d32 circular b-white">
<div class="bg-master text-center text-white"><span></span>
</div>
</div>
</li>
</ul>
<br>

<?php if($_SESSION['idta']=="all"){
echo "<p class='m-t-5 small'><a href='All-siswa'>More Siswa</a></p>";
}else{?>
<p class="m-t-5 small"><a href="siswa-<?php echo $_SESSION['ta'];?> ">More Siswa</a></p>
<?php } ?>
</div>
</div>
</div>
 
 