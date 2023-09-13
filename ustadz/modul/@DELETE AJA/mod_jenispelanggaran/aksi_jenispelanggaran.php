<?php

session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


   
// Menghapus jenispelanggaran
if ($module=='jenispelanggaran' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM jenispelanggaran WHERE id_jenispelanggaran='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data jenis pelanggaran berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data jenis pelanggaran gagal dihapus";
	  }
	   
  	header('location:../../dashboard.php?module=jenispelanggaran');
 	 
}


// Input jenispelanggaran
if ($module=='jenispelanggaran' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO jenispelanggaran(tipe_pelanggaran,
									  nama_pelanggaran,
                                      deskripsi_pelanggaran,
                                      sanksi,
                                      pemberi_sanksi) 
                              VALUES('$_POST[tipe]',
                                     '$_POST[namapelanggaran]',
									 '$_POST[deskripsi]',
									 '$_POST[sanksi]', 
                                     '$_POST[pemberisanksi]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data jenis pelanggaran berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data jenis pelanggaran gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module=jenispelanggaran');
   
}

// Update jenispelanggaran
if ($module=='jenispelanggaran' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE jenispelanggaran SET tipe_pelanggaran      = '$_POST[tipe]',
                                   nama_pelanggaran = '$_POST[namapelanggaran]',
                                   deskripsi_pelanggaran      = '$_POST[deskripsi]',
									sanksi = '$_POST[sanksi]',
									pemberi_sanksi = '$_POST[pemberisanksi]'
                             WHERE id_jenispelanggaran   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data jenis pelanggaran berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data jenis pelanggaran gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module=jenispelanggaran');
}
   
   

?>