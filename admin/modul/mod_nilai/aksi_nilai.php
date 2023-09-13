<?php
session_start(); 
error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
if ($module=='nilai' AND $act=='updatenilai1'){
	
	$idsiswa = $_POST[idsiswa]; 
	
	$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'  ");	
 
	while($mapel = mysql_fetch_array($carimapel)) {
	 
	$ok = "nilai".$mapel[id_mapel];
	$simpan = mysql_query("UPDATE nilai SET  
					 nilai_akhir='$_POST[$ok]' 
					WHERE id_mapel='$mapel[id_mapel]' AND id_siswa='$idsiswa' and semester='1'");	 
	}
	  
	 
	
	if($simpan){
	  $_SESSION[sukses]="Data nilai siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data nilai siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module=nilai&act=kelolanilai1&id='.$idsiswa);
}



else if ($module=='nilai' AND $act=='updatenilai2'){
	
	$idsiswa = $_POST[idsiswa]; 
	
	$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'  ");	
 
	while($mapel = mysql_fetch_array($carimapel)) {
	 
	$ok = "nilai".$mapel[id_mapel];
	$simpan = mysql_query("UPDATE nilai SET  
					 nilai_akhir='$_POST[$ok]' 
					WHERE id_mapel='$mapel[id_mapel]' AND id_siswa='$idsiswa' and semester='2'");	 
	}
	  
	 
	
	if($simpan){
	  $_SESSION[sukses]="Data nilai siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data nilai siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module=nilai&act=kelolanilai2&id='.$idsiswa);
}




?>
