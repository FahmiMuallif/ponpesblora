<?php


session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];


  
// Menghapus pelanggaransantri
if ($module=='pelanggaransiswa' and $act=='hapus_pelanggaran'){  
	$hapus = mysql_query("DELETE FROM pelanggaransantri WHERE id_pelanggaran='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data pelanggaran santri berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data pelanggaran santri gagal dihapus";
	  }
	   
  	header('location:../../dashboard.php?module=pelanggaransiswa');
 	 
}


 
else if ($module=='pelanggaransiswa' and $act=='input'){


	$carikelas = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
				WHERE siswa.id_siswa=riwayatkelas.id_siswa 
				AND riwayatkelas.id_kelas=kelas.id_kelas 
				AND siswa.id_siswa='$_POST[idsiswa]'");
	$k=mysql_fetch_array($carikelas);
	
     $simpan =  mysql_query("INSERT INTO pelanggaransantri(id_siswa,
									id_kelas, 
                                      id_jenispelanggaran,
                                      tgl_pelanggaran,
									  tahunajaran, 
									  catatan) 
                              VALUES('$_POST[idsiswa]',
									'$k[id_kelas]',
									 '$_POST[idjenis]',
									 '$_POST[tanggal]',
									 '$_SESSION[tahunajaran]', 
									 '$_POST[catatan]')");
    
	if($simpan){
			$_SESSION[sukses]="Data pelanggaran santri berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data pelanggaran santri gagal ditambahkan";
	  }
	  
	  
    header('location:../../dashboard.php?module='.$module);
   
}

 
else if ($module=='pelanggaransiswa' AND $act=='update'){
    
	$carikelas = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
				WHERE siswa.id_siswa=riwayatkelas.id_siswa 
				AND riwayatkelas.id_kelas=kelas.id_kelas 
				AND siswa.id_siswa='$_POST[idsiswa]'");
	$k=mysql_fetch_array($carikelas);
	
    $simpan = mysql_query("UPDATE pelanggaransantri SET id_siswa = '$_POST[idsiswa]',
									id_kelas='$k[id_kelas]', 
                                   id_jenispelanggaran = '$_POST[idjenis]',
									tgl_pelanggaran = '$_POST[tanggal]',
									catatan = '$_POST[catatan]'
                             WHERE id_pelanggaran   = '$_POST[id]'");
  
	  if($simpan){
			$_SESSION[sukses]="Data pelanggaran santri berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data pelanggaran santri gagal diupdate";
	  }
	  
	  
  header('location:../../dashboard.php?module='.$module);
}
   

?>