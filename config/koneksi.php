<?php
$server ="localhost";
$user ="root";
$passwd ="";
$dbs ="ak";
$konek=mysql_connect($server, $user, $passwd)
or die ("Gagal konek ke server MySQL".mysql_error());
$bukadb=mysql_select_db($dbs)
or die ("Gagal membuka database $dbs".mysql_error());
?>