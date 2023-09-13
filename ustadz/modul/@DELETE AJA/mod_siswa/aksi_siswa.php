<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if ($module=='siswa' AND $act=='hapus_siswa'){
 $hapus = mysql_query("DELETE FROM siswa WHERE id_siswa='$_GET[id]'");
 
   if($hapus){
	  $_SESSION[sukses]="Data siswa berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data siswa gagal dihapus";
  }
  
  
  header('location:../../dashboard.php?module=siswa');
}

 
if ($module=='siswa' AND $act=='input'){

  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
  //validasi NIS -- nis tidak boleh ada yang sama
  $carinis=mysql_query("SELECT * FROM siswa WHERE nis='$_POST[nis]'");
  $jumlahnis=mysql_num_rows($carinis);
  if($jumlahnis>0){
	   $_SESSION[gagal]="Gagal menyimpan. NIS <b>".$_POST[nis]."</b> telah digunakan!"; 
		   header('location:../../dashboard.php?module=siswa&act=tambahsiswa');
		   break;
  }
  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
	  
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  
  
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module=siswa&act=tambahsiswa');
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=siswaq&act=tambahsiswa');
		   break;
		}
		
		
     
       move_uploaded_file($lokasi_file,"../../../upload/foto_siswa/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
	  
	$pass=md5($_POST[pass]);
    $simpan = mysql_query("INSERT INTO siswa(nis, 
							nama_lengkap, 
							jenis_kelamin, 
							tempat_lahir, 
							tgl_lahir, 
							password, 
							nama_bapak, 
							pekerjaan_bapak, 
							nama_ibu, 
							pekerjaan_ibu,
							alamat_lengkap,
							notelp_ortu, 
							sekolah_asal,
							madin_asal,
							ponpes_asal, 
							foto,
							tgl_masuk,
							status)
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[jk]',
							 '$_POST[tempatlahir]',
							 '$_POST[tgllahir]', 
							 '$pass',
							'$_POST[namabapak]',
							'$_POST[pekerjaanbapak]',
							'$_POST[namaibu]',
							'$_POST[pekerjaanibu]',
							'$_POST[alamat]',
							'$_POST[notelp]',
							'$_POST[sekolah_asal]',
							'$_POST[madin_asal]',
							'$_POST[ponpes_asal]',
							'$nama_file_unik',
							'$_POST[tglmasuk]',
							'$_POST[status]')");
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data siswa gagal ditambahkan";
  }
     header('location:../../dashboard.php?module='.$module);
  }


  
  
  
if ($module=='siswa' AND $act=='updatesiswa'){
	
	
	
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
  
  
	//validasi NIS -- nis tidak boleh ada yang sama
	  $carinis=mysql_query("SELECT * FROM siswa WHERE nis='$_POST[nisbaru]' and id_siswa<>'$_POST[idsiswa]'");
	  $jumlahnis=mysql_num_rows($carinis);
	  if($jumlahnis>0){			   

		    $_SESSION[gagal]="Gagal menyimpan. NIS <b>".$_POST[nisbaru]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
			break;
	  }
	  
   

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
		   break;
		}
		
     
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
								 nama_bapak     = '$_POST[namabapak]', 
								 pekerjaan_bapak    = '$_POST[pekerjaanbapak]', 
								 nama_ibu     = '$_POST[namaibu]', 
								 pekerjaan_ibu     = '$_POST[pekerjaanibu]', 
								 alamat_lengkap     = '$_POST[alamat]',
								 notelp_ortu     = '$_POST[notelp]',
								 sekolah_asal     = '$_POST[sekolah_asal]',
								 madin_asal     = '$_POST[madin_asal]',
								 ponpes_asal     = '$_POST[ponpes_asal]',
								 foto 			= '$nama_file_unik',
								 tgl_masuk		='$_POST[tglmasuk]', 
								 status			= '$_POST[status]' 
								WHERE id_siswa     = '$_POST[idsiswa]'");
	
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
  }else{
	  $_SESSION[gagal]="Data siswa gagal diupdate";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}





  
if ($module=='siswa' AND $act=='ubahstatus'){
	
	$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
	$siswa=mysql_fetch_array($carisiswa);
	$statusLama = $siswa[status];
	
	if($statusLama=="aktif"){
		$statusBaru = "keluar";
	} else if($statusLama=="keluar"){
		$statusBaru = "lulus";
	} else if($statusLama=="lulus"){
		$statusBaru = "aktif";
	}
	
	 $simpan = mysql_query("UPDATE siswa SET  
								 status			= '$statusBaru' 
								WHERE id_siswa     = '$_GET[id]'");
								
  
	
  if($simpan){
	  $_SESSION[sukses]="Status siswa berhasil diubah";
  }else{
	  $_SESSION[gagal]="Status siswa gagal diubah";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}


?>
