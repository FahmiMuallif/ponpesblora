<?php

session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


   
// Menghapus ruang
if ($module=='ruang' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM ruang WHERE id_ruang='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data ruangan berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data ruangan gagal dihapus";
	  }
	   
  	header('location:../../dashboard.php?module=ruang');
 	 
}


// Input ruang
if ($module=='ruang' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO ruang( 
									  nama_ruang,
                                      keterangan) 
                              VALUES('$_POST[namaruang]',
									 '$_POST[keterangan]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data ruangan berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data ruangan gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module=ruang');
   
}

// Update ruang
if ($module=='ruang' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE ruang SET 
                                   nama_ruang = '$_POST[namaruang]',
                                   keterangan      = '$_POST[keterangan]' 
                             WHERE id_ruang   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data ruangan berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data ruangan gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module=ruang');
}
   
   

?>