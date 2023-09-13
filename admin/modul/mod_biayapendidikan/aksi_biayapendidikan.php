<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
// Menghapus biayapendidikan
if ($module=='biayapendidikan' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM biayapendidikan WHERE id_biaya='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data biaya pendidikan berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data biaya pendidikan gagal dihapus";
	  } 
  	header('location:../../dashboard.php?module=biayapendidikan');
 	 
}


// Input biayapendidikan
if ($module=='biayapendidikan' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO biayapendidikan(nama_biaya,
                                      deskripsi_biaya,
									  besar_biaya,
                                      tahunajaran,
									  tingkat) 
                              VALUES('$_POST[namabiaya]',
									'$_POST[deskripsi]',
                                     '$_POST[besaran]',
									 '$_SESSION[tahunajaran]',
									 '$_POST[tingkat]')");
    
	if($simpan){
			$_SESSION[sukses]="Data biaya pendidikan berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data biaya pendidikan gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module='.$module);
   
}

// Update biayapendidikan
if ($module=='biayapendidikan' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE biayapendidikan SET nama_biaya       = '$_POST[namabiaya]',
                                   deskripsi_biaya  = '$_POST[deskripsi]',
                                   besar_biaya  = '$_POST[besaran]',
								   tingkat  = '$_POST[tingkat]'
                             WHERE id_biaya   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data biaya pendidikan berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data biaya pendidikan gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module='.$module);
}
   


// Input biayapendidikan
if ($module=='biayapendidikan' and $act=='inputdetail'){

 	
     $simpan =  mysql_query("INSERT INTO biayapendidikandetail (id_biaya,
                                      angsuran_ke,
									  tagihan,
                                      tgl_terlambat) 
                              VALUES('$_POST[idbiaya]',
									'$_POST[angsuranke]',
                                     '$_POST[besartagihan]',
									 '$_POST[tglterlambat]')");
    
	if($simpan){
			$_SESSION[sukses]="Detail biaya pendidikan berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Detail biaya pendidikan gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module=biayapendidikan&act=kelolatagihan&id='.$_POST[idbiaya]);
   
}



if ($module=='biayapendidikan' AND $act=='updatedetail'){


	 

   
    $simpan = mysql_query("UPDATE biayapendidikandetail SET angsuran_ke       = '$_POST[angsuranke]',
                                   tagihan  = '$_POST[besartagihan]',
                                   tgl_terlambat  = '$_POST[tglterlambat]'
                             WHERE id_detailbiaya   = '$_POST[idbiayadetail]'");
  
	if($simpan){
			$_SESSION[sukses]="Detail biaya pendidikan berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Detail biaya pendidikan gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module=biayapendidikan&act=kelolatagihan&id='.$_POST[idbiaya]);
}
   


?>
