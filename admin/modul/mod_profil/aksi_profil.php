<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='profil' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

	  
 
  
  if (!empty($lokasi_file)){
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  
  
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module='.$module);
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module='.$module);
		   break;
		}
 
 
 
    
	unlink("../../../upload/".$_POST[logolama]);
	
	  $vdir_upload = "../../../upload/";
	  $vfile_upload = $vdir_upload . $nama_file_unik;
	   
	  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

	$nama_file_unik = $nama_file_unik;
  }else {
	 $nama_file_unik = $_POST[logolama];
  }
  

 
    $update = mysql_query("UPDATE profil SET nama_aplikasi = '$_POST[namaaplikasi]', 
									nama_ponpes = '$_POST[namaponpes]', 
								   tentangkami 	= '$_POST[tentangkami]',
                                   alamat 		= '$_POST[alamat]', 
                                   notelp       = '$_POST[notelp]',
								   email 	= '$_POST[email]',
                                   logo      	= '$nama_file_unik'
                             WHERE id_profil   	= '1'");
   
  
  if($update)
  {
	  $_SESSION['sukses']="Data profil berhasil diupdate.";
  }else
  {
	   $_SESSION['gagal']="Data profil gagal diupdate.";
  }
  
  
  header('location:../../dashboard.php?module='.$module);
}
?>
