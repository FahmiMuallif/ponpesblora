<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
if ($module=='nilai' AND $act=='updatenilai'){
	
	$semester = $_POST[semester];
	$idjadwal = $_POST[idjadwal];
	$idsiswa = $_POST[idsiswa]; 
	$idkelas = $_POST[idkelas]; 
	$idmapel = $_POST[idmapel]; 
	$nilai = $_POST[nilai]; 
	
	for($x=0; $x<sizeof($idsiswa); $x++){
		$simpan=mysql_query("UPDATE nilai SET nilai_akhir='$nilai[$x]'
							WHERE (id_siswa='$idsiswa[$x]' 
							and id_kelas='$idkelas[$x]' 
							and id_mapel='$idmapel[$x]' 
							and semester='$semester[$x]')");
	}
		 
	
	if($simpan){
	  $_SESSION[sukses]="Data nilai siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data nilai siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module=nilai&act=kelolanilai&id='.$idjadwal[0].'&semester='.$semester[0]);
}


 


else if ($module=='nilai' AND $act=='updatenilaiperkembangan1'){
	
	$idsiswa = $_POST[idsiswa]; 
	 
	  
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai1]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Agama dan Moral'
					AND semester='1'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai2]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Motorik'
					AND semester='1'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai3]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Bahasa'
					AND semester='1'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai4]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Kognitif'
					AND semester='1'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai5]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Sosial Emosi'
					AND semester='1'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai6]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Seni'
					AND semester='1'");	
	 	
	
	if($simpan){
	  $_SESSION[sukses]="Data nilai siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data nilai siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module=nilai&act=kelolanilai1&id='.$idsiswa);
}

else if ($module=='nilai' AND $act=='updatenilaiperkembangan2'){
	
	$idsiswa = $_POST[idsiswa]; 
	
 
	  
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai1]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Agama dan Moral'
					AND semester='2'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai2]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Motorik'
					AND semester='2'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai3]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Bahasa'
					AND semester='2'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai4]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Kognitif'
					AND semester='2'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai5]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Sosial Emosi'
					AND semester='2'");	
	$simpan = mysql_query("UPDATE informasiperkembangan SET  
					 informasiperkembangan ='$_POST[nilai6]' 
					WHERE id_siswa='$idsiswa' 
					AND id_kelas='$_POST[idkelas]' 
					AND nama_aspek='Seni'
					AND semester='2'");	
	 	
	
	if($simpan){
	  $_SESSION[sukses]="Data nilai siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data nilai siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module=nilai&act=kelolanilai2&id='.$idsiswa);
}


?>
