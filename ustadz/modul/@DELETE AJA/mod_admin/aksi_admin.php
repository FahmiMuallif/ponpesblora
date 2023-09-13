<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if($module='pengguna' AND $act=='hapus_admin'){

	 
		 
	$hapus = mysql_query("DELETE FROM admin WHERE id_admin='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data admin berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data admin gagal dihapus";
	  }
		 
  
  	header('location:../../dashboard.php?module=pengguna');
 	 
	
}


// Input admin
if ($module='pengguna' and $act=='input'){
	
	  $lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 
	   
	  // Apabila ada gambar yang diupload
	  if (!empty($lokasi_file)){
		  
		  $ukuran_file = $_FILES["fupload"]["size"]; 
		  $tipe_file = $_FILES["fupload"]["type"];
		  
	  
		  if($ukuran_file >= (1024*1000)){
			   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
			   header('location:../../dashboard.php?module=pengguna&act=tambahadmin');
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=pengguna&act=tambahadmin');
		   break;
		}
 
 
		 
		   move_uploaded_file($lokasi_file,"../../../upload/foto_admin/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = "";
	  }
	  
	  
	  
	  //validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM admin WHERE username='$_POST[username]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){
		   $_SESSION[gagal]="Gagal menyimpan data admin. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			   header('location:../../dashboard.php?module=pengguna&act=tambahadmin');
			   break;
	  }
	  
	 
	 $pass = md5($_POST[password]);
	 
	  
     $simpan = mysql_query("INSERT INTO admin(nama_lengkap, 
									 alamat,
									 notelp, 
									 jenis_kelamin,
									 username,
									 password,
									 foto) 
                             VALUES(
							 '$_POST[nama_lengkap]', 
							 '$_POST[alamat]',
							 '$_POST[notelp]',
							 '$_POST[jk]',
							 '$_POST[username]',
                                    '$pass',
									'$nama_file_unik')");
      
	   if($simpan){
			$_SESSION[sukses]="Data admin berhasil ditambahkan";
	  }else{
			  $_SESSION[gagal]="Data admin gagal ditambahkan";
	  }
		  
	  header('location:../../dashboard.php?module='.$module);
  }
  
  
  

// Update admin
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
		 
		 
		 $ukuran_file = $_FILES["fupload"]["size"]; 
		  $tipe_file = $_FILES["fupload"]["type"];
	  
		  if($ukuran_file >= (1024*1000)){
			   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
				header('location:../../dashboard.php?module=pengguna&act=editadmin&id='.$_POST[id]);
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=pengguna&act=editadmin&id='.$_POST[id]);
		   break;
		}
		
		
		 if($_POST[fotolama]!="") {
				unlink("../../upload/foto_admin/$_POST[fotolama]"); 
		 }
		   move_uploaded_file($lokasi_file,"../../../upload/foto_admin/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = $_POST[fotolama];
	  }
  
  
	//validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM admin WHERE username='$_POST[username]' and id_admin<>'$_POST[id]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){			   

		    $_SESSION[gagal]="Gagal menyimpan data admin. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=admininistrasi&act=editadmin&id='.$_POST[id]);
			break;
	  }
	  
	  
  
    $simpan = mysql_query("UPDATE admin SET 
                                 nama_lengkap = '$_POST[nama_lengkap]', 
								 alamat = '$_POST[alamat]',
								 notelp = '$_POST[notelp]',
								 jenis_kelamin = '$_POST[jk]',
								 username= '$_POST[username]',
                                 password     = '$pass',
								 foto  ='$nama_file_unik' 
                           WHERE id_admin      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data admin berhasil diupdate";
    }else{
		$_SESSION[gagal]="Data admin gagal diupdate";
    }
 
  
  header('location:../../dashboard.php?module='.$module);
}
?>
