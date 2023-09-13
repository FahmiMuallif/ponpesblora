<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus hubungi
if ($module=='hubungi' AND $act=='hapus'){
  $hapus=mysql_query("DELETE FROM hubungi WHERE id_hubungi='$_GET[id]'");
  
  if($hapus)
  {
	  $_SESSION['sukses']="Data pelanggan berhasil dihapus.";
  }else
  {
	   $_SESSION['gagal']="Data pelanggan gagal dihapus.";
  }
  
  
  header('location:../../media.php?module='.$module);
}
?>
