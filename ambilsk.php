<div class="panel-heading separator">
<div class="panel-title">Data Penilaian
</div>
<?php
include "config/koneksi.php";
$id = $_GET['q']; 
if($id){ 
$minta = "SELECT tr_kelas.id_kp from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kelas.id_kp=tr_kp_keahlian.id_kp
where id_siswa='$id'";
$eksekusi = mysql_query($minta);
$hasil=mysql_fetch_array($eksekusi);
$id_kp=$hasil['id_kp'];
}

$i=0;
include "config/koneksi.php";
$minta = "SELECT * FROM tr_standar_kompetensi where id_kp='$id_kp' ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi)){?>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label class=""><?php echo $hasil['nama_sk'];?></label>
<input type="hidden" class="form-control" value="<?php echo $hasil['id_sk'];?>" name="id_sk[<?php echo $i ?>]">
<input type="text" class="form-control" value="0" name="nilai[<?php echo $i?>]" required>
<input type="hidden" class="form-control" value="<?php echo $i?>" name="hitung[<?php echo $i?>]">
</div>
</div>
</div>
<?php $i++;} ?>