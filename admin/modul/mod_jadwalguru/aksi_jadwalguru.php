<?php

session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


   
// Menghapus jadwalguru
if ($module=='jadwalguru' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM jadwalguru WHERE id_jadwalguru='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data jadwalguruan berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data jadwalguruan gagal dihapus";
	  }
	   
  	header('location:../../dashboard.php?module=jadwalguru');
 	 
}


// Input jadwalguru
if ($module=='jadwalguru' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO jadwalguru( 
									  nama_jadwalguru,
                                      keterangan) 
                              VALUES('$_POST[namajadwalguru]',
									 '$_POST[keterangan]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data jadwalguruan berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data jadwalguruan gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module=jadwalguru');
   
}

// Update jadwalguru
if ($module=='jadwalguru' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE jadwalguru SET 
                                   nama_jadwalguru = '$_POST[namajadwalguru]',
                                   keterangan      = '$_POST[keterangan]' 
                             WHERE id_jadwalguru   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data jadwalguruan berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data jadwalguruan gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module=jadwalguru');
}
   
   

?>