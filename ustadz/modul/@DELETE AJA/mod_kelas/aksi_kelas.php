<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
 

if  ($module=='kelas' AND $act=='hapus_kelas'){
  $hapus = mysql_query("DELETE FROM ".$module." WHERE id_".$module."='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data kelas berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data kelas gagal dihapus";
	}
	
	
  header('location:../../dashboard.php?module='.$module);
}




if  ($module=='kelas' AND $act=='input'){
	
	//validate walikelas
	$cariwalikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' AND 
								walikelas='$_POST[walikelas]'");
								
	$jumlah=mysql_num_rows($cariwalikelas);
	$kelas = mysql_fetch_array($cariwalikelas);
	
	if($jumlah>0){
		$cariguru = mysql_query("SELECT * FROM guru WHERE id_guru='$_POST[walikelas]' ");
		$guru = mysql_fetch_array($cariguru);
		
		$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$kelas[id_kelas]' ");
		$k = mysql_fetch_array($carikelas);
		
		$_SESSION[gagal]="Data kelas gagal ditambahkan. <b>".$guru[nama_guru]."</b> telah ditugaskan sebagai walikelas di kelas <b>".$k[namakelas]."</b>.";
		header('location:../../dashboard.php?module='.$module);
		
		break;
	}
	
	
    $simpan = mysql_query("INSERT INTO kelas (id_kelas, namakelas, tahunajaran, tingkat, walikelas) VALUES('','$_POST[namakelas]', '$_SESSION[tahunajaran]','$_POST[tingkat]','$_POST[walikelas]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data kelas berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data kelas gagal ditambahkan";
	}
	
	header('location:../../dashboard.php?module='.$module);
}



if  ($module=='kelas' AND $act=='updatekelas'){
	
	//validate walikelas
	$cariwalikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' AND 
								walikelas='$_POST[walikelas]' and id_kelas<>'$_POST[id]'");
								
	$jumlah=mysql_num_rows($cariwalikelas);
	$kelas = mysql_fetch_array($cariwalikelas);
	
	if($jumlah>0){
		$cariguru = mysql_query("SELECT * FROM guru WHERE id_guru='$_POST[walikelas]' ");
		$guru = mysql_fetch_array($cariguru);
		
		$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$kelas[id_kelas]' ");
		$k = mysql_fetch_array($carikelas);
		
		$_SESSION[gagal]="Data kelas gagal diupdate. <b>".$guru[nama_guru]."</b> telah ditugaskan sebagai walikelas di kelas <b>".$k[namakelas]."</b>.";
		header('location:../../dashboard.php?module='.$module);
		
		break;
	}
	
	
    $simpan = mysql_query("UPDATE kelas SET 
                                 namakelas  = '$_POST[namakelas]',
								 tingkat  = '$_POST[tingkat]', 
								 walikelas = '$_POST[walikelas]' 
								WHERE id_kelas = '$_POST[id]'");
	if($simpan){
	  $_SESSION[sukses]="Data kelas berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data kelas gagal diupdate";
	}
	
	header('location:../../dashboard.php?module='.$module);
}




if  ($module=='kelas' AND $act=='inputsiswa'){

    $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
       move_uploaded_file($lokasi_file,"../../../upload/foto_siswa/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
	  
	
    $simpan = mysql_query("INSERT INTO siswa(nis, 
							nama_lengkap, 
							jenis_kelamin, 
							tempat_lahir, 
							tgl_lahir, 
							password, 
							nama_wali, 
							alamat_wali, 
							email_wali, 
							notelp_wali,
							foto,
							tgl_masuk,
							status)
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[jk]',
							 '$_POST[tempatlahir]',
							 '$_POST[tgllahir]', 
							 '$_POST[pass]',
							'$_POST[namawali]',
							'$_POST[alamatwali]',
							'$_POST[emailwali]',
							'$_POST[notelpwali]',
							'$nama_file_unik',
							'$_POST[tglmasuk]',
							'$_POST[status]')");
		
		$idsiswa=mysql_insert_id();
							
		mysql_query("INSERT INTO riwayatkelas(id_siswa, id_kelas) 
								VALUES('$idsiswa','$_POST[idkelas]')");
		
									
	if($simpan){
	  $_SESSION[sukses]="Data santri berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data santri gagal ditambahkan";
	}
	
     header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_POST[idkelas]);
  }
  
  
  
if ($module=='kelas' AND $act=='update_siswa'){
   
   
   
   if($_POST[passbaru]==""){
		$pass = $_POST[passlama];
	} else {
		$pass = md5($_POST[passbaru]);
	}
	
	
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
	 if($_POST[fotolama]!="") {
			unlink("../../upload/foto_siswa/$_POST[fotolama]"); 
	 }
       move_uploaded_file($lokasi_file,"../../../upload/foto_siswa/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
  
  
  
   $simpan = mysql_query("UPDATE siswa SET 
								 nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 jenis_kelamin        = '$_POST[jk]',
								 tempat_lahir        = '$_POST[tempatlahir]',
								 tgl_lahir        = '$_POST[tgllahir]', 
                                 password     = '$pass', 
								 nama_wali     = '$_POST[namawali]', 
								 alamat_wali    = '$_POST[alamatwali]', 
								 email_wali     = '$_POST[alamatwali]', 
								 notelp_wali     = '$_POST[notelpwali]', 
								 foto 			= '$nama_file_unik',
								 tgl_masuk     = '$_POST[tglmasuk]',
								 status    	   = '$_POST[status]'
								WHERE id_siswa     = '$_POST[idsiswa]'");
			
			
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data siswa gagal diupdate";
	}
	
   header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_POST[idkelas]);
}





if  ($module=='kelas' AND $act=='hapus_siswa'){
	
 
	$hapus = mysql_query("DELETE FROM siswa WHERE id_siswa='$_GET[id]'");
	
	mysql_query("DELETE FROM riwayatkelas WHERE id_siswa='$_GET[id]' AND id_kelas='$_GET[idkelas]'");
	
	if($hapus){
	  $_SESSION[sukses]="Data santri berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data santri gagal dihapus";
	}
  		header('location:../../dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_GET[idkelas]);
}



 


if ($module=='kelas' AND $act=='updatewali'){
    $simpan = mysql_query("UPDATE kelas SET 
                                 walikelas  = '$_POST[walikelas]'
								WHERE id_kelas = '$_GET[idkelas]'");
	
	if($simpan){
	  $_SESSION[sukses]="Data wali kelas berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data wali kelas gagal diupdate";
	}
	
 header('location:../../dashboard.php?module='.$module);
}


if  ($module=='kelas' AND $act=='inputwali'){
    $simpan = mysql_query("UPDATE kelas SET 
                                 walikelas  = '$_POST[walikelas]'
								WHERE id_kelas = '$_GET[idkelas]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data wali kelas berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data wali kelas gagal ditambahkan";
	}
	
	
 header('location:../../dashboard.php?module='.$module);
}



if  ($module=='penempatansiswa' AND $act=='input'){
    if($_POST[idkelas] and $_POST[idsiswa] and $_POST[idriwayatlama]=="") {
		
		//CEK APAKAH SISWA TELAH DIINPUT PADA KELAS YANG SAMA
		$caridatalama=mysql_query("select * from riwayatkelas WHERE id_kelas='$_POST[idkelas]' and id_siswa = '$_POST[idsiswa]'");
		
		$jumlah=mysql_num_rows($caridatalama);
		if($jumlah>0){
			 $_SESSION[gagal]="Penempatan santri gagal dilakukan. Santri telah ditempatkan pada kelas yang dimaksud.";
			 header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
			 break;
		}
		//END CEK
		
		//CEK APAKAH SISWA SUDAH DITEMPATKAN PADA KELAS PADA TAHUN AJARAN INI
		$cari=mysql_query("select * from riwayatkelas WHERE id_siswa = '$_POST[idsiswa]'");
		while($hasil=mysql_fetch_array($cari)){
			$idkelas=$hasil['id_kelas'];

			$cariinfokelas=mysql_query("select * from kelas WHERE id_kelas = '$idkelas' AND tahunajaran='$_SESSION[tahunajaran]'");
			if(mysql_num_rows($cariinfokelas)>0){
				$_SESSION[gagal]="Penempatan santri gagal dilakukan. Santri telah ditempatkan pada tahun ajaran ini.";
				header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
				break 2;
			}
		
		}
		//END CEK
		
		
		
		$simpan = mysql_query("INSERT INTO riwayatkelas (id_kelas, id_siswa) VALUES('$_POST[idkelas]','$_POST[idsiswa]' )");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil ditambahkan";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal ditambahkan";
		}
		
		header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
	} else if($_POST[idkelas] and $_POST[idsiswa] and $_POST[idriwayatlama]!="") {
		
		//CEK APAKAH SISWA TELAH DIINPUT PADA KELAS YANG SAMA
		$caridatalama=mysql_query("select * from riwayatkelas WHERE id_kelas='$_POST[idkelas]' and id_siswa = '$_POST[idsiswa]'");
		
		$jumlah=mysql_num_rows($caridatalama);
		if($jumlah>0){
			 $_SESSION[gagal]="Penempatan santri gagal dilakukan. Santri telah ditempatkan pada kelas yang dimaksud.";
			 header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
			 break;
		} 
		//END CEK

		//CEK APAKAH SISWA SUDAH DITEMPATKAN PADA KELAS PADA TAHUN AJARAN INI
		$cari=mysql_query("select * from riwayatkelas WHERE id_siswa = '$_POST[idsiswa]'");
		while($hasil=mysql_fetch_array($cari)){
			$idkelas=$hasil['id_kelas'];

			$cariinfokelas=mysql_query("select * from kelas WHERE id_kelas = '$idkelas' AND tahunajaran='$_SESSION[tahunajaran]'");
			if(mysql_num_rows($cariinfokelas)>0){
				$_SESSION[gagal]="Penempatan siswa gagal dilakukan. Siswa telah ditempatkan pada tahun ajaran ini.";
				header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
				break 2;
			}
		
		}
		//END CEK
		
		
		$simpan = mysql_query("UPDATE riwayatkelas 
					SET id_kelas = '$_POST[idkelas]', 
					id_siswa = '$_POST[idsiswa]' WHERE id_riwayat='$_POST[idriwayatlama]'");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil diupdate";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal diupdate";
		}
		
		header('location:../../dashboard.php?module=kelas&&act=kelolasiswa&id='.$_POST[idkelas]);
	}
}
 
 
 
if  ($module=='penempatansiswa' AND $act=='update'){
   if($_POST[idkelas] and $_POST[idsiswa] and $_POST[idriwayatlama]!="") {
		
		 
		
		$simpan = mysql_query("UPDATE riwayatkelas 
					SET id_kelas = '$_POST[idkelas]', 
					id_siswa = '$_POST[idsiswa]' WHERE id_riwayat='$_POST[idriwayatlama]'");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil diupdate";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal diupdate";
		}
		
		header('location:../../dashboard.php?module='.$module);
	}
}
 
 
?>
