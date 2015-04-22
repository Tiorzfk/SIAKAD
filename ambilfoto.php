<?php
include "config/koneksi.php";
$id = $_GET['id']; 
if($id){ 
$minta = "SELECT foto FROM tr_siswa where id_siswa=$id";
$eksekusi = mysql_query($minta);
$hasil=mysql_fetch_array($eksekusi);
?>

<div class="col-sm-12">
<div class="panel panel-default">
<div class="panel-heading separator">
<div class="panel-title">Foto Siswa
</div>
</div>
<div class="panel-body">
<p><?php echo "<img src='assets/siswa/".$hasil['foto']."' width='200px' height='200px'>"; ?> </p>
</div>
</div>
</div>
</div>
<?php } ?>

