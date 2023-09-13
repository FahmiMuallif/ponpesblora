<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

  
// Menghapus kalenderakademik
if ($module=='kalenderakademik' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM kalenderakademik WHERE id_kalenderakademik='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data kalenderakademik berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data kalenderakademik gagal dihapus";
	  }
	  
	  
	  
  	header('location:../../dashboard.php?module=kalenderakademik');
 	 
}


// Input kalenderakademik
if ($module=='kalenderakademik' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO kalenderakademik(nama_kegiatan,
                                      deskripsi_kegiatan,
                                      tahunajaran,
                                      tgl_mulai,
                                      tgl_selesai) 
                              VALUES('$_POST[judul]',
                                     '$_POST[isi_kalenderakademik]',
									 '$_SESSION[tahunajaran]', 
                                     '$_POST[tglmulai]',
                                     '$_POST[tglselesai]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data kalenderakademik berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data kalenderakademik gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module='.$module);
   
}

// Update kalenderakademik
if ($module=='kalenderakademik' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE kalenderakademik SET nama_kegiatan       = '$_POST[judul]',
                                   deskripsi_kegiatan  = '$_POST[isi_kalenderakademik]',
                                   tgl_mulai      = '$_POST[tglmulai]', 
								   tgl_selesai = '$_POST[tglselesai]'   
                             WHERE id_kalenderakademik   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data kalenderakademik berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data kalenderakademik gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module='.$module);
}
?>
