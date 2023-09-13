<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if($module=='tahunajaran' AND $act=='hapus'){
  $hapus = mysql_query("DELETE FROM tahunajaran WHERE id_tahunajaran='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data tahun ajar berhasil dihapus";
	}else{
	  $_SESSION[gagal]="Data tahun ajar gagal dihapus";
	}	
  header('location:../../dashboard.php?module='.$module);
}




 
if  ($module=='tahunajaran' AND $act=='input'){
	
	$ta1=$_POST[namatahunajaran1];
	$ta2=$_POST[namatahunajaran2];
	
	$gabung=$ta1."/".$ta2;
	
	if($ta1==$ta2){
		$_SESSION[gagal]="Data tahun ajaran <b>".$gabung."</b> gagal ditambahkan. Tahun awal dan tahun akhir tidak boleh sama.";
		header('location:../../dashboard.php?module=tahunajaran&act=tambahtahunajaran');
		break;
	}
	
	$cari = mysql_query("SELECT * FROM tahunajaran WHERE namatahunajaran='$gabung'");
	$jumlah=mysql_num_rows($cari);
	
	if($jumlah>0){
		$_SESSION[gagal]="Data tahun ajar gagal ditambahkan. Nama tahun ajaran <b>".$gabung."</b> telah digunakan.";
		header('location:../../dashboard.php?module=tahunajaran&act=tambahtahunajaran');
		break;
	}
	
    $simpan = mysql_query("INSERT INTO tahunajaran (id_tahunajaran, namatahunajaran, status) VALUES('','$gabung', '$_POST[status]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data tahun ajar berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data tahun ajar gagal ditambahkan";
	}
  
  
 header('location:../../dashboard.php?module='.$module);
}




if  ($module=='tahunajaran' AND $act=='updatetahunajaran'){
	
	$ta1=$_POST[namatahunajaran1];
	$ta2=$_POST[namatahunajaran2];
	
	$gabung=$ta1."/".$ta2;
	
	if($ta1==$ta2){
		$_SESSION[gagal]="Data tahun ajaran <b>".$gabung."</b> gagal ditambahkan. Tahun awal dan tahun akhir tidak boleh sama.";
		header('location:../../dashboard.php?module=tahunajaran&act=edittahunajaran&id='.$_POST[id]);
		break;
	}
	
	$cari = mysql_query("SELECT * FROM tahunajaran WHERE namatahunajaran='$gabung' and id_tahunajaran<>'$_POST[id]'");
	$jumlah=mysql_num_rows($cari);
	
	if($jumlah>0){
		$_SESSION[gagal]="Data tahun ajar gagal diupdate. Nama tahun ajaran <b>".$gabung."</b> telah digunakan.";
		header('location:../../dashboard.php?module=tahunajaran&act=edittahunajaran&id='.$_POST[id]);
		break;
	}
	
	
    $simpan = mysql_query("UPDATE tahunajaran SET 
                                 namatahunajaran  = '$gabung',
								 status = '$_POST[status]'
								WHERE id_tahunajaran = '$_POST[id]'");
								
	if($simpan){
		$_SESSION[sukses]="Data tahun ajar berhasil diupdate";
	}else{
		$_SESSION[gagal]="Data tahun ajar gagal diupdate";
	}
 header('location:../../dashboard.php?module='.$module);
}



if ($module=='tahunajaran' AND $act=='ubahstatus'){
	
	$caritahunajaran = mysql_query("SELECT * FROM tahunajaran WHERE id_tahunajaran='$_GET[id]'");
	$tahunajaran=mysql_fetch_array($caritahunajaran);
	$statusLama = $tahunajaran[status];
	$namatahunajaran=$tahunajaran[namatahunajaran];
	
	if($statusLama=="aktif"){
		$statusBaru = "nonaktif";
	} else if($statusLama=="nonaktif"){
		$statusBaru = "aktif"; 
	} 
	
	 $simpan = mysql_query("UPDATE tahunajaran SET  
								 status			= '$statusBaru' 
								WHERE id_tahunajaran = '$_GET[id]'");
								
	if($statusBaru=="aktif") {
		 mysql_query("UPDATE tahunajaran SET  
								 status			= 'nonaktif' 
								WHERE id_tahunajaran<>'$_GET[id]'");
		$_SESSION[tahunajaran]=$namatahunajaran;
	}
	
	
  if($simpan){
	  $_SESSION[sukses]="Status tahunajaran berhasil diubah";
  }else{
	  $_SESSION[gagal]="Status tahunajaran gagal diubah";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}



?>
