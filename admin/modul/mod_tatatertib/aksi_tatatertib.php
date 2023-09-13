<?php

session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


 if ($module=='tatatertib' AND $act=='update'){
   
   
		   $lokasi_file    = $_FILES['fupload']['tmp_name'];
		  $tipe_file      = $_FILES['fupload']['type'];
		  $nama_file      = $_FILES['fupload']['name'];
		  $acak           = rand(1,99);
		  $nama_file_unik = $acak.$nama_file; 

		  

		  // Apabila ada gambar yang diupload
		  if (!empty($lokasi_file)){ 
			 unlink ("../../../upload/".$_POST[filelama]);
			 move_uploaded_file($lokasi_file, "../../../upload/".$nama_file_unik);
			  
			 $file = $nama_file_unik;
		  } else {
			  $file=$_POST[filelama];
		  }
		  
  
    $simpan = mysql_query("UPDATE tatatertibsantri SET isi_tatatertib  = '$_POST[isi]',
                                   file_tatatertib = '$file'   
                             WHERE id_tatatertib   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data tata tertib berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data tata tertib gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module='.$module);
}




?>