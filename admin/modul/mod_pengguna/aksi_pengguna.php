<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if($module='pengguna' AND $act=='hapus_pengguna'){

	 
		 
	$hapus = mysql_query("DELETE FROM pengguna WHERE id_pengguna='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data pengguna berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data pengguna gagal dihapus";
	  }
		 
  
  	header('location:../../dashboard.php?module=pengguna');
 	 
	
}


// Input pengguna
if ($module='pengguna' and $act=='input'){
	
	  $lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 

	  // Apabila ada gambar yang diupload
	  if (!empty($lokasi_file)){
		 
		   move_uploaded_file($lokasi_file,"../../../upload/foto_pengguna/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = "";
	  }
	  
	  
	 
		$pass = md5($_POST[password]);
	 
	  
     $simpan = mysql_query("INSERT INTO pengguna(nama_lengkap, 
									 alamat,
									 notelp, 
									 jenis_kelamin,
									 username,
									 password,
									 foto,
									 hak_akses,
									 status) 
                             VALUES(
							 '$_POST[nama_lengkap]', 
							 '$_POST[alamat]',
							 '$_POST[notelp]',
							 '$_POST[jk]',
							 '$_POST[username]',
                                    '$pass',
									'$nama_file_unik',
									'$_POST[hakakses]',
									'Aktif')");
      
	   if($simpan){
			$_SESSION[sukses]="Data pengguna berhasil ditambahkan";
	  }else{
			  $_SESSION[gagal]="Data pengguna gagal ditambahkan";
	  }
		  
	  header('location:../../dashboard.php?module='.$module);
  }
  
  
  

// Update pengguna
if ($module='pengguna' AND $act=='update'){
	
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
								 foto  ='$nama_file_unik',
								 hak_akses = '$_POST[hakakses]',
								 status = '$_POST[status]'
                           WHERE id_pengguna      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data pengguna berhasil diupdate";
    }else{
		$_SESSION[gagal]="Data pengguna gagal diupdate";
    }
 
  
  header('location:../../dashboard.php?module='.$module);
}
?>
