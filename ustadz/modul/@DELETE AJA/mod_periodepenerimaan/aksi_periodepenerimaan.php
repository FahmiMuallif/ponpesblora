<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 

if  ($module=='periodepenerimaan' AND $act=='hapus_periodepenerimaan'){
  $hapus = mysql_query("DELETE FROM ".$module." WHERE id_periode='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data periodepenerimaan berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data periodepenerimaan gagal dihapus";
	}
	
	
  header('location:../../dashboard.php?module='.$module);
}




if  ($module=='periodepenerimaan' AND $act=='input'){
    $simpan = mysql_query("INSERT INTO periodepenerimaan 
				(id_periode, 
				nama_periode,
				tgl_mulai, 
				tgl_selesai,
				tgl_mulai_pendaftaran,
				tgl_selesai_pendaftaran,
				tgl_pengumuman,
				) VALUES('','$_POST[namaperiodepenerimaan]', '$_SESSION[tahunajaran]','$_POST[tingkat]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data periodepenerimaan berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data periodepenerimaan gagal ditambahkan";
	}
	
	header('location:../../dashboard.php?module='.$module);
}

if  ($module=='periodepenerimaan' AND $act=='updateperiodepenerimaan'){
    $simpan = mysql_query("UPDATE periodepenerimaan SET 
                                 namaperiodepenerimaan  = '$_POST[namaperiodepenerimaan]',
								 tingkat  = '$_POST[tingkat]'
								WHERE id_periodepenerimaan = '$_POST[id]'");
	if($simpan){
	  $_SESSION[sukses]="Data periodepenerimaan berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data periodepenerimaan gagal diupdate";
	}
	
	header('location:../../dashboard.php?module='.$module);
}



if  ($module=='periodepenerimaan' AND $act=='inputsiswa'){

    $simpan = mysql_query("INSERT INTO santri 
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[alamat]',
							 '$_POST[email]',
							 '$_POST[notelp]',
							 '$_POST[username]',
                             '$_POST[pass]',
							 '$_SESSION[tahunajaran]',
							 '$_POST[idperiodepenerimaan]',''
									)");
									
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data siswa gagal ditambahkan";
	}
	
     header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_POST[idperiodepenerimaan]);
  }
  
  
  
if ($module=='periodepenerimaan' AND $act=='updatesiswa'){
    $simpan = mysql_query("UPDATE siswa SET 
                                 periodepenerimaan  = '$_POST[idperiodepenerimaan]'
								WHERE nis = '$_POST[nis]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data siswa gagal diupdate";
	}
	
 header('location:../../dashboard.php?module='.$module);
}





if  ($module=='periodepenerimaan' AND $act=='hapus_siswa'){
	$hapus = mysql_query("DELETE FROM santri WHERE nis='$_GET[id]'");
	
	if($hapus){
	  $_SESSION[sukses]="Data siswa berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data siswa gagal dihapus";
	}
  		header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_GET[idperiodepenerimaan]);
}



if  ($module=='periodepenerimaan' AND $act=='update_siswa'){
	$idperiodepenerimaan=$_GET[idperiodepenerimaan];
	$simpan = mysql_query("UPDATE santri SET 
								  nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 alamat        = '$_POST[alamat]',
								 email        = '$_POST[email]',
								 notelp        = '$_POST[notelp]',
								 username      = '$_POST[username]', 
                                 password     = '$_POST[pass]',
								 periodepenerimaan		= '$idperiodepenerimaan' 
								WHERE nis      = '$_POST[nislama]'");
	
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}else{
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}
	
	
    header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_GET[idperiodepenerimaan]);
}


if ($module=='periodepenerimaan' AND $act=='updatewali'){
    $simpan = mysql_query("UPDATE periodepenerimaan SET 
                                 waliperiodepenerimaan  = '$_POST[waliperiodepenerimaan]'
								WHERE id_periodepenerimaan = '$_GET[idperiodepenerimaan]'");
	
	if($simpan){
	  $_SESSION[sukses]="Data wali periodepenerimaan berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data wali periodepenerimaan gagal diupdate";
	}
	
 header('location:../../dashboard.php?module='.$module);
}


if  ($module=='periodepenerimaan' AND $act=='inputwali'){
    $simpan = mysql_query("UPDATE periodepenerimaan SET 
                                 waliperiodepenerimaan  = '$_POST[waliperiodepenerimaan]'
								WHERE id_periodepenerimaan = '$_GET[idperiodepenerimaan]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data wali periodepenerimaan berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data wali periodepenerimaan gagal ditambahkan";
	}
	
	
 header('location:../../dashboard.php?module='.$module);
}


 
 
?>
