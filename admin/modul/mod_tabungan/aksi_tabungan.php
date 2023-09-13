<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
if($module=='tabungan' AND $act=='hapustabungan'){

	 
	$idsiswa = $_GET[ids];
	
	$hapus = mysql_query("DELETE FROM tabungan WHERE id_tabungan='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data transaksi tabungan berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data transaksi tabungan gagal dihapus";
	  }
		 
  
		header('location:../../dashboard.php?module='.$module.'&act=kelolapembayaran&id='.$idsiswa);
 	 
	
}

else if ($module=='tabungan' AND $act=='tambahtabungan'){
	
	$idsiswa = $_POST[idsiswa];
	$idkelas = $_POST[idkelas]; 
	$tahunajaran = $_POST[tahunajaran];
	$jenis = $_POST[jenis];
	
	//id_tabungan 	id_siswa 	id_kelas 	tahunajaran 	jenis_transaksi 	jumlah 	tgl_transaksi 	id_penerima 
		
	$simpan = mysql_query("INSERT INTO tabungan (id_siswa, id_kelas, tahunajaran, jenis_transaksi, jumlah, tgl_transaksi, id_penerima) VALUES ('$idsiswa','$idkelas','$tahunajaran','$jenis','$_POST[jumlah]','$_POST[tgl]','$_SESSION[idpengguna]')");
		
	  
	 
	
	if($simpan){
	  $_SESSION[sukses]="Data transaksi tabungan berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data transaksi tabungan gagal diupdate";
	}
	
 header('location:../../dashboard.php?module='.$module.'&act=kelolapembayaran&id='.$idsiswa);
}

?>
