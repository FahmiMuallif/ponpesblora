<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 
 
if ($module=='pembayaransiswa' AND $act=='updatepembayaransiswa'){
	
	$idsiswa = $_POST[idsiswa];
	$idkelas = $_POST[idkelas]; 
	$idbiaya = $_POST[idbiaya];
	$tglbayar = $_POST[tglbayar];
	$jumlahbayar = $_POST[jumlahbayar];
	$idpembayaran = $_POST[idpembayaran];
	
	
	 
	
	$caribiayadetail= mysql_query("SELECT * FROM biayapendidikandetail 
									WHERE  id_biaya ='$idbiaya' ORDER by id_detailbiaya ASC ");
	 
	$x=0;
	while ($r=mysql_fetch_array($caribiayadetail)){
		
		if($idpembayaran[$x]==""){
	 
			$simpan = mysql_query("INSERT INTO pembayaransiswa (id_siswa, id_kelas, tahunajaran, id_biaya, angsuran_ke, tgl_bayar, jumlah_bayar, id_penerima)
								VALUES ('$idsiswa', '$idkelas', '$_SESSION[tahunajaran]', '$idbiaya', '$r[angsuran_ke]',  '$tglbayar[$x]', '$jumlahbayar[$x]', '$_SESSION[iduser]')");
			
		 
		} else {
			$simpan = mysql_query("UPDATE pembayaransiswa SET 
                                 tgl_bayar='$tglbayar[$x]',
								 jumlah_bayar='$jumlahbayar[$x]'
								WHERE id_pembayaran='$idpembayaran[$x]'");
		}
		  
	$x++;
	}    
  
	
	$_SESSION[sukses]="Data pembayaran santri berhasil diupdate";
	  
	header('location:../../dashboard.php?module=pembayaransiswa&act=kelolapembayaran&id='.$idsiswa);
}

?>
