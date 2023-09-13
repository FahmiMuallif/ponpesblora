<?php
session_start(); 
error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

   
if ($module=='editakun' AND $act=='update'){
	
	if($_POST[passwordbaru]==""){
		$pass = $_POST[passwordlama];
	} else {
		$pass = md5($_POST[passwordbaru]);
	}
	
	

	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 

	  // Apabila ada gambar yang diupload
	  if (!empty($lokasi_file)){
		 
		 if($_POST[fotolama]!="") {
				unlink("../../upload/foto_pengguna/$_POST[fotolama]"); 
		 }
		   move_uploaded_file($lokasi_file,"../../../upload/foto_pengguna/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = $_POST[fotolama];
	  }
  
  
  
    $simpan = mysql_query("UPDATE pengguna SET 
                                 nama_lengkap = '$_POST[nama_lengkap]', 
								 alamat = '$_POST[alamat]',
								 notelp = '$_POST[notelp]',
								 jenis_kelamin = '$_POST[jk]',
								 username= '$_POST[username]',
                                 password     = '$pass',
								 foto  ='$nama_file_unik' 
                           WHERE id_pengguna      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data pengguna berhasil diupdate";
		 
		  $_SESSION["namalengkap"]  = $_POST["nama_lengkap"]; 
		  $_SESSION["foto"]     	= $nama_file_unik; 
		  
    }else{
		$_SESSION[gagal]="Data pengguna gagal diupdate";
    }
 
  
  header('location:../../dashboard.php?module='.$module);
}
?>
