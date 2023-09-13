<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kontakkami
if ($module=='kontakkami' AND $act=='hapus'){
  $hapus=mysql_query("DELETE FROM kontakkami WHERE id_kontak='$_GET[id]'");
  
  if($hapus)
  {
	  $_SESSION['sukses']="Data pelanggan berhasil dihapus.";
  }else
  {
	   $_SESSION['gagal']="Data pelanggan gagal dihapus.";
  }
  
  
  header('location:../../dashboard.php?module='.$module);
}
?>
