<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus halaman
if ($module=='halaman' AND $act=='hapus'){
  $hapus=mysql_query("DELETE FROM halaman WHERE id_halaman='$_GET[id]'");
    if($hapus)
  {
	  $_SESSION['sukses']="Data halaman berhasil dihapus.";
  }else
  {
	   $_SESSION['gagal']="Data halaman gagal dihapus.";
  }
  
  header('location:../../dashboard.php?module='.$module);
}

// Input halaman
elseif ($module=='halaman' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
	$tgl=date('Y-m-d');


  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    move_uploaded_file($lokasi_file,"../../../upload/foto_halaman/$nama_file_unik");

    $tambah=mysql_query("INSERT INTO halaman(judul,
                                    isi,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi]',
                                   '$tgl',
                                   '$nama_file_unik')");
  }
  else{
    $tambah=mysql_query("INSERT INTO halaman(judul,
                                    isi,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi]',
                                   '$tgl')");
  }
  
   if($tambah)
  {
	  $_SESSION['sukses']="Data halaman berhasil ditambahkan.";
  }else
  {
	   $_SESSION['gagal']="Data halaman gagal ditambahkan.";
  }
  
  header('location:../../dashboard.php?module='.$module);
}

// Update halaman
elseif ($module=='halaman' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    $edit=mysql_query("UPDATE halaman SET judul       = '$_POST[judul]',
                                   isi  = '$_POST[isi]'  
                             WHERE id_halaman   = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"../../../upload/foto_halaman/$nama_file_unik");
    $edit=mysql_query("UPDATE halaman SET judul       = '$_POST[judul]',
                                   isi  = '$_POST[isi]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_halaman   = '$_POST[id]'");
  }
   if($edit)
  {
	  $_SESSION['sukses']="Data halaman berhasil diupdate.";
  }else
  {
	   $_SESSION['gagal']="Data halaman gagal diupdate.";
  }
  
  header('location:../../dashboard.php?module='.$module);
}
?>
