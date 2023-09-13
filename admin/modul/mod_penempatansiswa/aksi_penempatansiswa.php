<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
 
if($module=='penempatansiswa' AND $act=='hapus_penempatan'){
  
  $hapus = mysql_query("DELETE FROM riwayatkelas WHERE id_riwayat='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data penempatan santri berhasil dihapus";
	}else{
	  $_SESSION[gagal]="Data penempatan santri gagal dihapus";
	}	
  header('location:../../dashboard.php?module='.$module);
}


 
if ($module=='penempatansiswa' AND $act=='input'){

	$caririwayat = mysql_query("SELECT * FROM riwayatkelas WHERE id_tahunajaran='$_SESSION[tahunajaran]' AND id_siswa='$_POST[idsiswa]'");
	
	$jumlah = mysql_num_rows($caririwayat);
	if($jumlah>0){
		$riwayat=mysql_fetch_array($caririwayat);
		$idkelas=$riwayat[id_kelas];
		
		$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$idkelas'");
		$kelas=mysql_fetch_array($carikelas); 
		$namakelas=$kelas[namakelas];
				
		$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_POST[idsiswa]'");
		$siswa=mysql_fetch_array($carisiswa); 
		$namasiswa=$siswa[nama_lengkap];
		
		
		$_SESSION[gagal]="Data penempatan gagal disimpan. <b>".$namasiswa."</b>  telah ditempatkan dikelas <b>".$namakelas."</b>.";
		header('location:../../dashboard.php?module='.$module);
		break;
	}
	
    $simpan = mysql_query("INSERT INTO riwayatkelas (id_tahunajaran, id_kelas, id_siswa)
                             VALUES('$_SESSION[tahunajaran]',
							 '$_POST[idkelas]',
							 '$_POST[idsiswa]')");
  if($simpan){
	  $_SESSION[sukses]="Data penempatan santri berhasil ditambahkan.";
  }else{
		  $_SESSION[gagal]="Data penempatan santri gagal ditambahkan.";
  }
     header('location:../../dashboard.php?module='.$module);
  }


  
  
  
if ($module=='penempatansiswa' AND $act=='update'){

	//var_dump($_POST[idsiswa]); break;
	 
    $update = mysql_query("UPDATE riwayatkelas SET id_kelas='$_POST[idkelas]'
								WHERE id_riwayat='$_POST[idriwayatlama]'");
			
			
  if($update){
	  $_SESSION[sukses]="Data penempatan santri berhasil diupdate.";
  }else{
		  $_SESSION[gagal]="Data penempatan santri gagal diupdate.";
  }
     header('location:../../dashboard.php?module='.$module.'&act=editpenempatan&id='.$_POST[idriwayatlama]);
  }


?>
