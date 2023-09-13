<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

  
if ($module=='mapel' AND $act=='hapus'){
  $hapus = mysql_query("DELETE FROM mapel WHERE id_mapel='$_GET[id]'");
  
  	 if($hapus){
			$_SESSION[sukses]="Data mata pelajaran berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran gagal dihapus";
	  }
		 
		 
  header('location:../../dashboard.php?module=mapel');
}








// Input Mapel
if ($module=='mapel' AND $act=='input'){
	
	
	 //validasi Kode Mapel -- kode mapel tidak boleh ada yang sama
  $cari=mysql_query("SELECT * FROM mapel WHERE kode_mapel='$_POST[kode_mapel]'");
  $jumlah=mysql_num_rows($cari);
  if($jumlah>0){
		$_SESSION[gagal]="Gagal menyimpan data mata pelajaran. Kode Mapel <b>".$_POST[kode_mapel]."</b> telah digunakan!"; 
		header('location:../../dashboard.php?module=mapel&act=tambahmapel');
		break;
  }
  
  
  
  $simpan = mysql_query("INSERT INTO mapel (id_mapel,
								  kode_mapel, 
  								nama_mapel,
								deskripsi_pencapaian, 
								tingkat, 
								tahunajaran) 
	                       VALUES('$_POST[id_mapel]', 
								'$_POST[kode_mapel]', 
						   		'$_POST[nama_mapel]',
								'$_POST[deskripsi]', 
								'$_POST[tingkat]', 
								'$_SESSION[tahunajaran]')");
	  if($simpan){
			$_SESSION[sukses]="Data mata pelajaran berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran ditambahkan";
	  }
		 
		 
  header('location:../../dashboard.php?module='.$module);
}

// Update Mapel
if ($module=='mapel' AND $act=='update'){
	
	
	//validasi Kode Mapel -- kode mapel tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM mapel WHERE kode_mapel='$_POST[kode_mapel]' and id_mapel<>'$_POST[id_mapel]'");
	  $jumlah=mysql_num_rows($cari);
	  
	  if($jumlah>0){			   

		    $_SESSION[gagal]="Gagal menyimpan data mata pelajaran. Kode mapel <b>".$_POST[kode_mapel]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=mapel&act=editmapel&id='.$_POST[id_mapel]);
			break;
	  }
	  
	  
    $simpan = mysql_query("UPDATE mapel SET kode_mapel     = '$_POST[kode_mapel]', 
								 nama_mapel     = '$_POST[nama_mapel]',
								 deskripsi_pencapaian     = '$_POST[deskripsi]', 
								 tingkat     	= '$_POST[tingkat]' 
                           WHERE id_mapel     = '$_POST[id_mapel]'");

	if($simpan){
			$_SESSION[sukses]="Data mata pelajaran berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran diupdate";
	  }
	  
  header('location:../../dashboard.php?module='.$module);
}



?>