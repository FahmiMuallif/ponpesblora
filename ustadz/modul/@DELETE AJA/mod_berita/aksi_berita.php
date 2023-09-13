<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET[module];
$act=$_GET[act];



// Menghapus berita
if ($module=='berita' and $act=='hapus'){

	$querygurumapel="select * from berita where id_berita='$_GET[id]'";
	$jumlah=mysql_num_rows(mysql_query($querygurumapel));
	
	 
	$hapus = mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
	  
	  if($hapus)
	  {
		  $_SESSION['sukses']="Data berita berhasil dihapus.";
	  }else
	  {
		   $_SESSION['gagal']="Data berita gagal dihapus.";
	  }
	  
  	header('location:../../dashboard.php?module=berita');
 	 
}

// Input berita
if ($module=='berita' and $act=='input'){


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
		   header('location:../../dashboard.php?module=berita&act=tambahberita');
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=berita&act=tambahberita');
		   break;
		}
		
      move_uploaded_file($lokasi_file,"../../../upload/foto_berita/$nama_file_unik");
      $simpan = mysql_query("INSERT INTO berita(judul,
                                      isi_berita,
                                      jam,
                                      tanggal,
                                      hari,
                                      gambar) 
                              VALUES('$_POST[judul]',
                                     '$_POST[isi_berita]',
                                     '$jam_sekarang',
                                     '$tgl_sekarang',
                                     '$hari_ini',
                                     '$nama_file_unik')");
     
   
   }
   else{
    $simpan =  mysql_query("INSERT INTO berita(judul,
                                     isi_berita,
                                     jam,
                                     tanggal,
                                     hari) 
                             VALUES('$_POST[judul]',
                                    '$_POST[isi_berita]',
                                    '$jam_sekarang',
                                    '$tgl_sekarang',
                                    '$hari_ini')");
    
  }
  
	  if($simpan)
	  {
		  $_SESSION['sukses']="Data berita berhasil ditambahkan.";
	  }else
	  {
		   $_SESSION['gagal']="Data berita gagal ditambahkan.";
	  }
	  header('location:../../dashboard.php?module='.$module);
  
}



// Update berita
if ($module=='berita' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
	  
	  
    $update= mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   isi_berita  = '$_POST[isi_berita]'  
                             WHERE id_berita   = '$_POST[id]'");
  }
  else{
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  
  
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module=berita&act=editberita&id='.$_POST[id]);
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=berita&act=editberita&id='.$_POST[id]);
		   break;
		}
		
		
    move_uploaded_file($lokasi_file,"../../../upload/foto_berita/$nama_file_unik");
    $update=mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   isi_berita  = '$_POST[isi_berita]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_berita   = '$_POST[id]'");
  }
  
  if($update)
  {
	  $_SESSION['sukses']="Data berita berhasil diupdate.";
  }else
  {
	   $_SESSION['gagal']="Data berita gagal diupdate.";
  }
  
  header('location:../../dashboard.php?module='.$module);
}
 
?>
