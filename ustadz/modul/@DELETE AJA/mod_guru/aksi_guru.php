<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if($module=='guru' AND $act=='hapus_guru'){

	$querygurumapel="select * from gurumapel where id_guru='$_GET[id]'";
	$jumlah=mysql_num_rows(mysql_query($querygurumapel));
	
	 
	if($jumlah!="" and $jumlah >0) {
		$_SESSION[gagal]="Data ustadz gagal dihapus. Hapus dahulu jadwal ustadz."; 
		header('location:dashboard.php?module=guru'); 
	} else {
		
		 
	$hapus = mysql_query("DELETE FROM guru WHERE id_guru='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data ustadz berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data ustadz gagal dihapus";
	  }
		 
  
  	header('location:../../dashboard.php?module=guru');
 	} 
	
}


// Input guru
if ($module=='guru' and $act=='input'){
	
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
			   header('location:../../dashboard.php?module=guru&act=tambahguru');
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=guru&act=tambahguru');
		   break;
		}
		
		 
		   move_uploaded_file($lokasi_file,"../../../upload/foto_guru/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = "";
	  }
	  
	  
	   //validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM guru WHERE username='$_POST[username]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){
		   $_SESSION[gagal]="Gagal menyimpan data ustadz. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			   header('location:../../dashboard.php?module=guru&act=tambahguru');
			   break;
	  }
	  
	  
	 $pass = md5($_POST[password]);
     $simpan = mysql_query("INSERT INTO guru(nama_guru, 
									 alamat,
									 notelp, 
									 jenis_kelamin,
									 kompetensi,
									 riwayat_pendidikan,
									 foto, 
									 username,
									 password) 
                             VALUES(
							 '$_POST[nama_guru]', 
							 '$_POST[alamat]',
							 '$_POST[notelp]',
							 '$_POST[jk]',
							 '$_POST[kompetensi]',
                                    '$_POST[riwayatpendidikan]',
									'$nama_file_unik',
									'$_POST[username]',
									'$pass')");
      
	   if($simpan){
			$_SESSION[sukses]="Data ustadz berhasil ditambahkan";
	  }else{
			  $_SESSION[gagal]="Data ustadz gagal ditambahkan";
	  }
		  
	  header('location:../../dashboard.php?module='.$module);
  }
  
  
  

// Update guru
if ($module=='guru' AND $act=='update'){

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
			   header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
		   break;
		}
		
		
		 if($_POST[fotolama]!="") {
				unlink("../../upload/foto_guru/$_POST[fotolama]"); 
		 }
		   move_uploaded_file($lokasi_file,"../../../upload/foto_guru/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = $_POST[fotolama];
	  }
  
  
	if($_POST[passwordbaru]==""){
		$pass = $_POST[passwordlama];
	} else {
		$pass = md5($_POST[passwordbaru]);
	}
	
	//validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM guru WHERE username='$_POST[username]' and id_admin<>'$_POST[id]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){			   

		    $_SESSION[gagal]="Gagal menyimpan data ustadz. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
			break;
	  }
	  
  
    $simpan = mysql_query("UPDATE guru SET 
                                 nama_guru = '$_POST[nama_guru]', 
								 alamat = '$_POST[alamat]',
								 notelp = '$_POST[notelp]',
								 jenis_kelamin = '$_POST[jk]',
								 kompetensi= '$_POST[kompetensi]',
                                 riwayat_pendidikan     = '$_POST[riwayatpendidikan]',
								 foto  ='$nama_file_unik', 
								 username = '$_POST[username]',
								password = '$pass'
                           WHERE id_guru      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data ustadz berhasil diupdate";
    }else{
		$_SESSION[gagal]="Data ustadz gagal diupdate";
    }
 
  
  header('location:../../dashboard.php?module='.$module);
}
?>
