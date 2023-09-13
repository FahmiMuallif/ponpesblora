<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if ($module=='calonsantri' AND $act=='hapus_calonsantri'){
 $hapus = mysql_query("DELETE FROM calonsantri WHERE id_calonsantri='$_GET[id]'");
 
   if($hapus){
	  $_SESSION[sukses]="Data calonsantri berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data calonsantri gagal dihapus";
  }
  
  
  header('location:../../dashboard.php?module=calonsantri');
}

 
if ($module=='calonsantri' AND $act=='input'){

  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
       move_uploaded_file($lokasi_file,"../../../upload/foto_calonsantri/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
	  
	
    $simpan = mysql_query("INSERT INTO calonsantri(nis, 
							nama_lengkap, 
							alamat, 
							email, 
							notelp, 
							password, 
							nama_wali, 
							alamat_wali, 
							email_wali, 
							notelp_wali,
							foto)
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[alamat]',
							 '$_POST[email]',
							 '$_POST[notelp]', 
							 '$_POST[pass]',
							'$_POST[namawali]',
							'$_POST[alamatwali]',
							'$_POST[emailwali]',
							'$_POST[notelpwali]',
							'$nama_file_unik')");
  if($simpan){
	  $_SESSION[sukses]="Data calonsantri berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data calonsantri gagal ditambahkan";
  }
     header('location:../../dashboard.php?module='.$module);
  }


  
  
  
if ($module=='calonsantri' AND $act=='updatecalonsantri'){
	
	if($_POST[passbaru]==""){
		$pass = $_POST[passlama];
	} else {
		$pass = md5($_POST[passbaru]);
	}
	
	
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
	 if($_POST[fotolama]!="") {
			unlink("../../upload/foto_calonsantri/$_POST[fotolama]"); 
	 }
       move_uploaded_file($lokasi_file,"../../../upload/foto_calonsantri/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
  
  
    $simpan = mysql_query("UPDATE calonsantri SET 
									nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 alamat        = '$_POST[alamat]',
								 email        = '$_POST[email]',
								 notelp        = '$_POST[notelp]', 
                                 password     = '$pass', 
								 nama_wali     = '$_POST[namawali]', 
								 alamat_wali    = '$_POST[alamatwali]', 
								 email_wali     = '$_POST[alamatwali]', 
								 notelp_wali     = '$_POST[notelpwali]', 
								 foto 			= '$nama_file_unik'
								WHERE id_calonsantri     = '$_POST[idcalonsantri]'");
	
  if($simpan){
	  $_SESSION[sukses]="Data calonsantri berhasil diupdate";
  }else{
	  $_SESSION[gagal]="Data calonsantri gagal diupdate";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}
?>
