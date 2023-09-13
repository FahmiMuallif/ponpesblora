<?php
session_start(); error_reporting(0);
include "../config/koneksi.php";
include "../config/library.php";
include "../config/class_paging.php";
include "../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];




if ($module=='walikelas' AND $act=='updatewali'){
	 
    $update = mysql_query("UPDATE kelas SET 
                                 walikelas  = '$_POST[walikelas]'
								WHERE id_kelas = '$_GET[idkelas]'");
								
	if($update){
	  $_SESSION[sukses]="Data wali kelas berhasil diupdate";
    }else{
	  $_SESSION[gagal]="Data wali kelas gagal diupdate";
	}
	   
    header('location:dashboard.php?module='.$module);
}



 

if  ($module=='walikelas' AND $act=='inputwali'){
    $insert = mysql_query("UPDATE kelas SET 
                                 walikelas  = '$_POST[walikelas]'
								WHERE id_kelas = '$_GET[idkelas]'");
								
    if($update){
	    $_SESSION[sukses]="Data wali kelas berhasil ditambahkan";
    }else{
		$_SESSION[gagal]="Data wali kelas gagal ditambahkan";
	}
 
	header('location:dashboard.php?module='.$module);
}



 
if ($module=='siswa' AND $act=='hapus_siswa'){
 $hapus = mysql_query("DELETE FROM siswa WHERE id_siswa='$_GET[id]'");
 
   if($hapus){
	  $_SESSION[sukses]="Data siswa berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data siswa gagal dihapus";
  }
  
  
  header('location:dashboard.php?module=siswa');
}

 
if ($module=='siswa' AND $act=='input'){

  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
       move_uploaded_file($lokasi_file,"../foto/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
	  
	
    $simpan = mysql_query("INSERT INTO siswa(nis, 
							nama_lengkap, 
							alamat, 
							email, 
							notelp, 
							password, 
							nama_wali, 
							alamat_wali, 
							email_wali, 
							notelp_wali,
							foto)
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[alamat]',
							 '$_POST[email]',
							 '$_POST[notelp]', 
							 '$_POST[pass]',
							'$_POST[namawali]',
							'$_POST[alamatwali]',
							'$_POST[emailwali]',
							'$_POST[notelpwali]',
							'$nama_file_unik')");
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data siswa gagal ditambahkan";
  }
     header('location:dashboard.php?module='.$module);
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

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
     
	 if($_POST[fotolama]!="") {
			unlink("../foto/$_POST[fotolama]"); 
	 }
       move_uploaded_file($lokasi_file,"../foto/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
  
  
    $simpan = mysql_query("UPDATE siswa SET 
									nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 alamat        = '$_POST[alamat]',
								 email        = '$_POST[email]',
								 notelp        = '$_POST[notelp]', 
                                 password     = '$pass', 
								 nama_wali     = '$_POST[namawali]', 
								 alamat_wali    = '$_POST[alamatwali]', 
								 email_wali     = '$_POST[alamatwali]', 
								 notelp_wali     = '$_POST[notelpwali]', 
								 foto 			= '$nama_file_unik'
								WHERE id_siswa     = '$_POST[idsiswa]'");
	
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
  }else{
	  $_SESSION[gagal]="Data siswa gagal diupdate";
  }
  
  
 header('location:dashboard.php?module='.$module);
}

 
 
// =============================================

if($module=='superadmin' AND $act=='hapussuperadmin'){
	
$hapus=mysql_query("DELETE FROM admins WHERE id_admin='$_GET[id]'");
 
  if($hapus){
	  $_SESSION[sukses]="Data super admin berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data super admin gagal dihapus";
  }
   header('location:dashboard.php?module=superadmin');
}

 


// Input admin
 if ($module=='superadmin' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto="";
  }
	
	
 $insert=mysql_query("INSERT INTO admins (id_admin,
  								username,
                                password,
                                nama_lengkap,
                                email,
								notelp,
								foto) 
	                       VALUES('$_POST[id_admin]',
						   		'$_POST[username]',
                                '$_POST[password]',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
								'$_POST[notelp]',
								'$foto')");
  if($insert){
	  $_SESSION[sukses]="Data super admin berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data super admin gagal ditambahkan";
  }
  header('location:dashboard.php?module='.$module);
}

 
// Update admin
if ($module=='superadmin' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $fotolama = $_POST[fotolama];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     unlink("../foto/$fotolama"); 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto=$fotolama;
  }  
  
  
if($_POST [password]=="") {
$pass = $_POST [passwordlama];
} else {
	$pass = md5 ($_POST [password]);
}

   $update= mysql_query("UPDATE admins SET 
								 username     = '$_POST[username]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]',
								foto 		 = '$foto'
                           WHERE id_admin     = '$_POST[id_admin]'");
	 if($update){
	  $_SESSION[sukses]="Data super admin berhasil diupdate";
  }else{
		  $_SESSION[gagal]="Data super admin gagal diupdate";
	  }

  header('location:dashboard.php?module='.$module);
}


// Update admin
if ($module=='editakunsuperadmin' AND $act=='update'){
  // Apabila password tidak diubah

    mysql_query("UPDATE admins SET 
								 username     = '$_POST[username]',
                                 password     = '$_POST[password]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]'  
                           WHERE id_admin     = '$_POST[id_admin]'");
	
  header('location:dashboard.php?module=home');
}


// Update admin
if ($module=='editakun' AND $act=='update'){
   
   // Apabila password tidak diubah
	$fotolama	= $_POST['fotolama'];
   
   	$lokasi_file    = $_FILES['fupload']['tmp_name'];
    $tipe_file      = $_FILES['fupload']['type'];
    $nama_file      = $_FILES['fupload']['name'];
    $acak           = rand(1,99);
    $nama_file_unik = $acak.$nama_file; 
	
	
   
	if($_POST [password]=="") {
		$pass = $_POST[passwordlama];
	} else {
		$pass = md5($_POST[password]);
	}

	if(! empty($lokasi_file))
	{
			unlink("../foto/".$fotolama); 
			move_uploaded_file($_FILES['fupload']['tmp_name'],"../foto/".$nama_file_unik);
		  $_SESSION[fotoadmin]=$nama_file_unik;
	} else 
	{
		$nama_file_unik = $fotolama;
	}		
		 
   $update= mysql_query("UPDATE admins SET  
                                 password     = '$pass', 
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 alamat 	  = '$_POST[alamat]',
								 jenis_kelamin	= '$_POST[jk]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]',
								 foto 		= '$nama_file_unik'
                           WHERE id_admin    = '$_POST[idadmin]'");
	 if($update){
	  $_SESSION[sukses]="Data akun berhasil diupdate";
  }else{
		  $_SESSION [gagal]="Data akun gagal diupdate";
	  }
	
	$_SESSION[namalengkapadmin]=$_POST[nama_lengkap];
  header('location:dashboard.php?module=editakun');
}



// =====================================================================================

if($module=='pengguna' AND $act=='hapuspengguna'){
	
$hapus=mysql_query("DELETE FROM pengguna WHERE id_pengguna='$_GET[id]'");
 
  if($hapus){
	  $_SESSION[sukses]="Data pengguna berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data pengguna gagal dihapus";
	  }
   header('location:dashboard.php?module=pengguna');
}

// Input admin
if ($module=='pengguna' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto="";
  }
	
	
	
 $insert=mysql_query("INSERT INTO pengguna (
  								username,
                                password,
                                nama_lengkap,
                                email,
								notelp,
								foto) 
	                       VALUES(
						   		'$_POST[username]',
                                '$_POST[password]',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
								'$_POST[notelp]',
								'$foto')");
								
								 
  if($insert){
	  $_SESSION[sukses]="Data pengguna berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data pengguna gagal ditambahkan";
  }
  header('location:dashboard.php?module='.$module);
}



// Update admin
if ($module=='pengguna' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $fotolama = $_POST[fotolama];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     unlink("../foto/$fotolama"); 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto=$fotolama;
  }  
  
  
if($_POST [password]=="") {
$pass = $_POST [passwordlama];
} else {
	$pass = md5 ($_POST [password]);
}

   $update= mysql_query("UPDATE pengguna SET 
								 username     = '$_POST[username]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]',
								foto 		 = '$foto'
                           WHERE id_pengguna     = '$_POST[id_pengguna]'");
	 if($update){
	  $_SESSION[sukses]="Data pengguna berhasil diupdate";
  }else{
		  $_SESSION[gagal]="Data pengguna gagal diupdate";
	  }

  header('location:dashboard.php?module='.$module);
}


// Update admin
if ($module=='editakunpengguna' AND $act=='update'){
  // Apabila password tidak diubah

    mysql_query("UPDATE pengguna SET 
								 username     = '$_POST[username]',
                                 password     = '$_POST[password]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]'  
                           WHERE id_pengguna     = '$_POST[id_pengguna]'");
	
  header('location:dashboard.php?module=home');
}



 

 

// Menghapus Admin
if($module=='pengasuh' AND $act=='hapuspengasuh'){
	
$hapus=mysql_query("DELETE FROM pengasuh WHERE id_pengasuh='$_GET[id]'");
 
  if($hapus){
	  $_SESSION[sukses]="Data pengasuh berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data pengasuh gagal dihapus";
	  }
   header('location:dashboard.php?module=pengasuh');
}


// Input admin
if ($module=='pengasuh' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto="";
  }
	
	
 $insert=mysql_query("INSERT INTO pengasuh (id_pengasuh,
  								username,
                                password,
                                nama_lengkap,
                                email,
								notelp,
								foto) 
	                       VALUES('$_POST[id_pengasuh]',
						   		'$_POST[username]',
                                '$_POST[password]',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
								'$_POST[notelp]',
								'$foto')");
  if($insert){
	  $_SESSION[sukses]="Data pengasuh berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data pengasuh gagal ditambahkan";
  }
  header('location:dashboard.php?module='.$module);
}



// Update admin
if ($module=='pengasuh' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $fotolama = $_POST[fotolama];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){ 
     unlink("../foto/$fotolama"); 
     move_uploaded_file($lokasi_file, "../foto/".$nama_file_unik);
	 $foto = $nama_file_unik;
  } else {
	  $foto=$fotolama;
  }  
  
  
if($_POST [password]=="") {
$pass = $_POST [passwordlama];
} else {
	$pass = md5 ($_POST [password]);
}

   $update= mysql_query("UPDATE pengasuh SET 
								 username     = '$_POST[username]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]',
								foto 		 = '$foto'
                           WHERE id_pengasuh     = '$_POST[id_pengasuh]'");
	 if($update){
	  $_SESSION[sukses]="Data pengasuh berhasil diupdate";
  }else{
		  $_SESSION[gagal]="Data pengasuh gagal diupdate";
	  }

  header('location:dashboard.php?module='.$module);
}


// Update admin
if ($module=='editakunpengasuh' AND $act=='update'){
  // Apabila password tidak diubah

    mysql_query("UPDATE pengasuh SET 
								 username     = '$_POST[username]',
                                 password     = '$_POST[password]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]',
								 notelp       = '$_POST[notelp]'  
                           WHERE id_pengasuh     = '$_POST[id_pengasuh]'");
	
  header('location:dashboard.php?module=home');
}


 
// Menghapus Mapel

if ($module=='mapel' AND $act=='hapus'){
  $hapus = mysql_query("DELETE FROM mapel WHERE id_mapel='$_GET[id]'");
  
  	 if($hapus){
			$_SESSION[sukses]="Data mata pelajaran berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran gagal dihapus";
	  }
		 
		 
  header('location:dashboard.php?module=mapel');
}



// Input Mapel
if ($module=='mapel' AND $act=='input'){
  $simpan = mysql_query("INSERT INTO mapel (id_mapel,
								  kode_mapel, 
  								nama_mapel,
								keterangan) 
	                       VALUES('$_POST[id_mapel]', 
								'$_POST[kode_mapel]', 
						   		'$_POST[nama_mapel]',
								'$_POST[keterangan]')");
	  if($simpan){
			$_SESSION[sukses]="Data mata pelajaran berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran ditambahkan";
	  }
		 
		 
  header('location:dashboard.php?module='.$module);
}

// Update Mapel
if ($module=='mapel' AND $act=='update'){
    $simpan = mysql_query("UPDATE mapel SET kode_mapel     = '$_POST[kode_mapel]', 
								 nama_mapel     = '$_POST[nama_mapel]',
								 keterangan     = '$_POST[keterangan]'   
                           WHERE id_mapel     = '$_POST[id_mapel]'");

	if($simpan){
			$_SESSION[sukses]="Data mata pelajaran berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data mata pelajaran diupdate";
	  }
	  
  header('location:dashboard.php?module='.$module);
}

 
 
//==============================================================================================================


// Menghapus berita
if ($module=='berita' and $act=='hapus'){

	$querygurumapel="select * from berita where id_berita='$_GET[id]'";
	$jumlah=mysql_num_rows(mysql_query($querygurumapel));
	
	 
	mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
  	header('location:dashboard.php?module=berita');
 	 
}

// Input berita
if ($module=='berita' and $act=='input'){


  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    // Apabila tipe gambar bukan jpeg akan tampil peringatan
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG</b>.<br>";
      	echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";	 		  
    }
    else{
      move_uploaded_file($lokasi_file,"foto_berita/$nama_file_unik");
      mysql_query("INSERT INTO berita(judul,
                                      isi_berita,
                                      jam,
                                      tanggal,
                                      hari,
                                      gambar) 
                              VALUES('$_POST[judul]',
                                     '$_POST[isi_berita]',
                                     '$jam_sekarang',
                                     '$tgl_sekarang',
                                     '$hari_ini',
                                     '$nama_file_unik')");
     header('location:dashboard.php?module='.$module);
   }
   }
   else{
     mysql_query("INSERT INTO berita(judul,
                                     isi_berita,
                                     jam,
                                     tanggal,
                                     hari) 
                             VALUES('$_POST[judul]',
                                    '$_POST[isi_berita]',
                                    '$jam_sekarang',
                                    '$tgl_sekarang',
                                    '$hari_ini')");
    header('location:dashboard.php?module='.$module);
  }
}



// Update berita
if ($module=='berita' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   isi_berita  = '$_POST[isi_berita]'  
                             WHERE id_berita   = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file_unik");
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   isi_berita  = '$_POST[isi_berita]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_berita   = '$_POST[id]'");
  }
  header('location:dashboard.php?module='.$module);
}
 
// Input riwayat
if ($module=='riwayat' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    // Apabila tipe gambar bukan jpeg akan tampil peringatan
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG</b>.<br>";
      	echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";	 		  
    }
    else{
      move_uploaded_file($lokasi_file,"foto_berita/$nama_file_unik");
      mysql_query("INSERT INTO riwayat(judul,
                                      isi,
                                      gambar) 
                              VALUES('$_POST[judul]',
                                     '$_POST[isi]',
                                     '$nama_file_unik')");
     header('location:dashboard.php?module='.$module);
   }
   }
   else{
     mysql_query("INSERT INTO riwayat(judul,
                                     isi) 
                             VALUES('$_POST[judul]',
                                    '$_POST[isi]')");
    header('location:dashboard.php?module='.$module);
  }
}


// Update riwayat
if ($module=='riwayat' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE riwayat SET judul       = '$_POST[judul]',
                                   isi  = '$_POST[isi]'  
                             WHERE id_riwayat   = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_riwayat/$nama_file");
    mysql_query("UPDATE riwayat SET judul       = '$_POST[judul]',
                                   isi  = '$_POST[isi]',
                                   gambar      = '$nama_file'   
                             WHERE id_riwayat   = '$_POST[id]'");
  }
  header('location:dashboard.php?module='.$module);
}
   
   
// ==========================================================================================  

// Menghapus kalenderakademik
if ($module=='kalenderakademik' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM kalenderakademik WHERE id_kalenderakademik='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data kalenderakademik berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data kalenderakademik gagal dihapus";
	  }
	  
	  
	  
  	header('location:dashboard.php?module=kalenderakademik');
 	 
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
	  
	  
    header('location:dashboard.php?module='.$module);
   
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
	  
	  
  header('location:dashboard.php?module='.$module);
}
   
   
   
//==========================================================================================================================

// Menghapus guru
if($module=='guru' AND $act=='hapus_guru'){

	$querygurumapel="select * from gurumapel where id_guru='$_GET[id]'";
	$jumlah=mysql_num_rows(mysql_query($querygurumapel));
	
	 
	if($jumlah!="" and $jumlah >0) {
		$_SESSION[gagal]="Data guru gagal dihapus. Hapus dahulu jadwal guru."; 
		header('location:dashboard.php?module=guru'); 
	} else {
		
		 
	$hapus = mysql_query("DELETE FROM guru WHERE id_guru='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data guru berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data guru gagal dihapus";
	  }
		 
  
  	header('location:dashboard.php?module=guru');
 	} 
	
}


// Input guru
if ($module=='guru' and $act=='input'){
     $simpan = mysql_query("INSERT INTO guru(nama_guru,
                                     nip,
									 alamat,
									 notelp,
                                     email,
									 username,
									 password) 
                             VALUES(
							 '$_POST[nama_guru]',
							 '$_POST[nip]',
							 '$_POST[alamat]',
							 '$_POST[notelp]',
							 '$_POST[email]',
							 '$_POST[username]',
                                    '$_POST[password]')");
      
	   if($simpan){
			$_SESSION[sukses]="Data guru berhasil ditambahkan";
	  }else{
			  $_SESSION[gagal]="Data guru gagal ditambahkan";
	  }
		  
	  header('location:dashboard.php?module='.$module);
  }
  
  
  

// Update guru
if ($module=='guru' AND $act=='update'){

    $simpan = mysql_query("UPDATE guru SET 
                                 nama_guru = '$_POST[nama_guru]',
								 nip = '$_POST[nip]',
								 alamat = '$_POST[alamat]',
								 notelp = '$_POST[notelp]',
								 email = '$_POST[email]',
								 username= '$_POST[username]',
                                 password     = '$_POST[password]' 
                           WHERE id_guru      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data guru berhasil diupdate";
    }else{
		$_SESSION[gagal]="Data guru gagal diupdate";
    }
 
  
  header('location:dashboard.php?module='.$module);
}

 
//==========================================================================================================================

// Menghapus guru - Mapel
if  ($module=='jadwalkelas' AND $act=='hapus'){
mysql_query("DELETE FROM jadwalkelas WHERE id_jadwalkelas='$_GET[idjadwalkelas]' ");
  header('location:dashboard.php?module=jadwalkelas&act=editjadwal&id='.$_GET[id]);
}

// Input jadwal
if ($module=='jadwalkelas' AND $act=='input'){

 
	$idguru= $_POST[idguru];
	$idkelas= $_POST[idkelas];
	$hari = $_POST[harimengajar]; 
	$idmapel=$_POST[idmapel];
	$simpan=0;
 
	
	if ($_POST[idmapel]!=0) {
		
			
			$carijadwallama=mysql_query("SELECT * FROM jadwalkelas where harimengajar='$hari' and jammengajar='$_POST[jammengajar]' and id_guru='$idguru'");
			
			while ($x=mysql_fetch_array($carijadwallama))
			{
				if ($x[id_mapel]==$idmapel) 
				{
 
				  	$simpan++;
				  	echo "<script>alert('Data Gagal Disimpan. Guru Tidak Mungkin Mengajar Materi Berbeda Secara Bersamaan.')</script>";
					echo "<script>top.location='dashboard.php?module=jadwalkelas&act=editjadwal&id=$idkelas'</script>";
				   
	
				}  else
				{
				
				}
			
			}
			
		
			
			
	}
	
	
			
	
	if ($simpan==0) {
		
			  mysql_query("INSERT INTO jadwalkelas (id_guru, id_mapel, id_kelas, harimengajar, jammengajar, tahunajaran) 
	                       VALUES('$_POST[idguru]','$_POST[idmapel]', '$_POST[idkelas]', '$_POST[harimengajar]', '$_POST[jammengajar]', '$_SESSION[tahunajaran]')");
  			 echo "<script>top.location='dashboard.php?module=jadwalkelas&act=editjadwal&id=".$idkelas."'</script>";
		
	 
	} else {}
	

}


// update jadwal

if ($module=='jadwalkelas' AND $act=='update'){

	mysql_query("UPDATE jadwalkelas SET
							 harimengajar='$_POST[harimengajar]',
							 jammengajar='$_POST[jammengajar]'
				WHERE id_jadwalkelas=$_GET[id]");
								  
    header('location:dashboard.php?module=jadwal');
	
}

//============================================================================================================================

if ($module=='kelas' AND $act=='updatesiswa'){
    $simpan = mysql_query("UPDATE siswa SET 
                                 kelas  = '$_POST[idkelas]'
								WHERE nis = '$_POST[nis]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data siswa gagal diupdate";
	}
	
 header('location:dashboard.php?module='.$module);
}




if  ($module=='kelas' AND $act=='input'){
    $simpan = mysql_query("INSERT INTO kelas (id_kelas, namakelas, tahunajaran, tingkat) VALUES('','$_POST[namakelas]', '$_SESSION[tahunajaran]','$_POST[tingkat]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data kelas berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data kelas gagal ditambahkan";
	}
	
	header('location:dashboard.php?module='.$module);
}

if  ($module=='kelas' AND $act=='updatekelas'){
    $simpan = mysql_query("UPDATE kelas SET 
                                 namakelas  = '$_POST[namakelas]',
								 tingkat  = '$_POST[tingkat]'
								WHERE id_kelas = '$_POST[id]'");
	if($simpan){
	  $_SESSION[sukses]="Data kelas berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data kelas gagal diupdate";
	}
	
	header('location:dashboard.php?module='.$module);
}

if  ($module=='kelas' AND $act=='inputsiswa'){

    $simpan = mysql_query("INSERT INTO santri 
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[alamat]',
							 '$_POST[email]',
							 '$_POST[notelp]',
							 '$_POST[username]',
                             '$_POST[pass]',
							 '$_SESSION[tahunajaran]',
							 '$_POST[idkelas]',''
									)");
									
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data siswa gagal ditambahkan";
	}
	
     header('location:dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_POST[idkelas]);
  }

if  ($module=='kelas' AND $act=='hapus_siswa'){
	$hapus = mysql_query("DELETE FROM santri WHERE nis='$_GET[id]'");
	
	if($hapus){
	  $_SESSION[sukses]="Data siswa berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data siswa gagal dihapus";
	}
  		header('location:dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_GET[idkelas]);
}

if  ($module=='kelas' AND $act=='update_siswa'){
	$idkelas=$_GET[idkelas];
	$simpan = mysql_query("UPDATE santri SET 
								  nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 alamat        = '$_POST[alamat]',
								 email        = '$_POST[email]',
								 notelp        = '$_POST[notelp]',
								 username      = '$_POST[username]', 
                                 password     = '$_POST[pass]',
								 kelas		= '$idkelas' 
								WHERE nis      = '$_POST[nislama]'");
	
	if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}else{
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
	}
	
	
    header('location:dashboard.php?module='.$module.'&act=kelolasiswa&id='.$_GET[idkelas]);
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
	
 header('location:dashboard.php?module='.$module);
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
	
	
 header('location:dashboard.php?module='.$module);
}



if  ($module=='kelas' AND $act=='hapus_kelas'){
  $hapus = mysql_query("DELETE FROM ".$module." WHERE id_".$module."='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data kelas berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data kelas gagal dihapus";
	}
	
	
  header('location:dashboard.php?module='.$module);
}




// =====================================================================================================================================


if  ($module=='tahunajaran' AND $act=='input'){
    $simpan = mysql_query("INSERT INTO tahunajaran (id_tahunajaran, namatahunajaran, status) VALUES('','$_POST[namatahunajaran]', '$_POST[status]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data tahun ajar berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data tahun ajar gagal ditambahkan";
	}
  
  
 header('location:dashboard.php?module='.$module);
}

if  ($module=='tahunajaran' AND $act=='updatetahunajaran'){
    $simpan = mysql_query("UPDATE tahunajaran SET 
                                 namatahunajaran  = '$_POST[namatahunajaran]',
								 status = '$_POST[status]'
								WHERE id_tahunajaran = '$_POST[id]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data tahun ajar berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data tahun ajar gagal diupdate";
	}
 header('location:dashboard.php?module='.$module);
}


if($module=='tahunajaran' AND $act=='hapus'){
  $hapus = mysql_query("DELETE FROM tahunajaran WHERE id_tahunajaran='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data tahun ajar berhasil dihapus";
	}else{
	  $_SESSION[gagal]="Data tahun ajar gagal dihapus";
	}	
  header('location:dashboard.php?module='.$module);
}


if  ($module=='penempatansiswa' AND $act=='input'){
    if($_POST[idkelas] and $_POST[idsiswa] and $_POST[idriwayatlama]=="") {
		$simpan = mysql_query("INSERT INTO riwayatkelas (id_kelas, id_siswa) VALUES('$_POST[idkelas]','$_POST[idsiswa]' )");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil ditambahkan";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal ditambahkan";
		}
		
		header('location:dashboard.php?module='.$module);
	} else if($_POST[idkelas] and $_POST[idsiswa] and $_POST[idriwayatlama]!="") {
		$simpan = mysql_query("UPDATE riwayatkelas 
					SET id_kelas = '$_POST[idkelas]', 
					id_siswa = '$_POST[idsiswa]' WHERE id_riwayat='$_POST[idriwayatlama]'");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil diupdate";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal diupdate";
		}
		
		header('location:dashboard.php?module='.$module);
	}
}
 
 
if($module=='penempatansiswa' AND $act=='hapus_penempatan'){
  $hapus = mysql_query("DELETE FROM riwayatkelas WHERE id_riwayat='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data penempatansiswa berhasil dihapus";
	}else{
	  $_SESSION[gagal]="Data penempatansiswa gagal dihapus";
	}	
  header('location:dashboard.php?module='.$module);
}



// ==========================================================================================  

// Menghapus jadwalpesantren
if ($module=='jadwalpesantren' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM jadwalpesantren WHERE id_jadwalpesantren='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data jadwalpesantren berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data jadwalpesantren gagal dihapus";
	  }
	  
	  
	  
  	header('location:dashboard.php?module=jadwalpesantren');
 	 
}


// Input jadwalpesantren
if ($module=='jadwalpesantren' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO jadwalpesantren(nama_kegiatan,
                                      deskripsi_kegiatan,
                                      tahunajaran,
                                      waktu_kegiatan) 
                              VALUES('$_POST[judul]',
                                     '$_POST[isi_jadwalpesantren]',
									 '$_SESSION[tahunajaran]', 
                                     '$_POST[waktukegiatan]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data jadwalpesantren berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data jadwalpesantren gagal ditambahkan";
	  }
	  
	  
    header('location:dashboard.php?module='.$module);
   
}

// Update jadwalpesantren
if ($module=='jadwalpesantren' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE jadwalpesantren SET nama_kegiatan       = '$_POST[judul]',
                                   deskripsi_kegiatan  = '$_POST[isi_jadwalpesantren]',
                                   waktu_kegiatan      = '$_POST[waktukegiatan]'   
                             WHERE id_jadwalpesantren   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data jadwalpesantren berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data jadwalpesantren gagal diupdate";
	  }
	  
	  
  header('location:dashboard.php?module='.$module);
}
   
   
   //=======================================================================
   
   if ($module=='tatatertib' AND $act=='update'){
   
   
		   $lokasi_file    = $_FILES['fupload']['tmp_name'];
		  $tipe_file      = $_FILES['fupload']['type'];
		  $nama_file      = $_FILES['fupload']['name'];
		  $acak           = rand(1,99);
		  $nama_file_unik = $acak.$nama_file; 

		  

		  // Apabila ada gambar yang diupload
		  if (!empty($lokasi_file)){ 
			 unlink ("../file/".$_POST[filelama]);
			 move_uploaded_file($lokasi_file, "../file/".$nama_file_unik);
			  
			 $file = $nama_file_unik;
		  } else {
			  $file=$_POST[filelama];
		  }
		  
  
    $simpan = mysql_query("UPDATE tatatertibsantri SET isi_tatatertib       = '$_POST[isi]',
                                   file_tatatertib = '$file'   
                             WHERE id_tatatertib   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data tata tertib berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data tata tertib gagal diupdate";
	  }
	  
	  
  header('location:dashboard.php?module='.$module);
}
   
   //==========================================================================
   
   
   
// Menghapus jenispelanggaran
if ($module=='jenispelanggaran' and $act=='hapus'){  
	$hapus = mysql_query("DELETE FROM jenispelanggaran WHERE id_jenispelanggaran='$_GET[id]'");
	
	if($hapus){
			$_SESSION[sukses]="Data jenispelanggaran berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data jenispelanggaran gagal dihapus";
	  }
	   
  	header('location:dashboard.php?module=jenispelanggaran');
 	 
}


// Input jenispelanggaran
if ($module=='jenispelanggaran' and $act=='input'){

 
     $simpan =  mysql_query("INSERT INTO jenispelanggaran(tipe_pelanggaran,
									  nama_pelanggaran,
                                      deskripsi_pelanggaran,
                                      sanksi,
                                      pemberi_sanksi) 
                              VALUES('$_POST[tipe]',
                                     '$_POST[namapelanggaran]',
									 '$_POST[deskripsi]',
									 '$_POST[sanksi]', 
                                     '$_POST[pemberisanksi]' )");
    
	if($simpan){
			$_SESSION[sukses]="Data jenispelanggaran berhasil ditambahkan";
	  }else{
			$_SESSION[gagal]="Data jenispelanggaran gagal ditambahkan";
	  }
	  
	  
    header('location:dashboard.php?module='.$module);
   
}

// Update jenispelanggaran
if ($module=='jenispelanggaran' AND $act=='update'){
   
    $simpan = mysql_query("UPDATE jenispelanggaran SET tipe_pelanggaran      = '$_POST[tipe]',
                                   nama_pelanggaran = '$_POST[namapelanggaran]',
                                   deskripsi_pelanggaran      = '$_POST[deskripsi]',
									sanksi = '$_POST[sanksi]',
									pemberi_sanksi = '$_POST[pemberisanksi]'
                             WHERE id_jenispelanggaran   = '$_POST[id]'");
  
	if($simpan){
			$_SESSION[sukses]="Data jenispelanggaran berhasil diupdate";
	  }else{
			$_SESSION[gagal]="Data jenispelanggaran gagal diupdate";
	  }
	  
	  
  header('location:dashboard.php?module='.$module);
}
   
   
   
//============================================================================================================================
 




if  ($module=='kelompok' AND $act=='input'){
    $simpan = mysql_query("INSERT INTO kelompok (id_kelompok, namakelompok, tahunajaran, tingkat) VALUES('','$_POST[namakelompok]', '$_SESSION[tahunajaran]','$_POST[tingkat]' )");
	
	if($simpan){
	  $_SESSION[sukses]="Data kelompok berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data kelompok gagal ditambahkan";
	}
	
	header('location:dashboard.php?module='.$module);
}

if  ($module=='kelompok' AND $act=='updatekelompok'){
    $simpan = mysql_query("UPDATE kelompok SET 
                                 namakelompok  = '$_POST[namakelompok]',
								 tingkat  = '$_POST[tingkat]'
								WHERE id_kelompok = '$_POST[id]'");
	if($simpan){
	  $_SESSION[sukses]="Data kelompok berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data kelompok gagal diupdate";
	}
	
	header('location:dashboard.php?module='.$module);
}
 
  
if ($module=='kelompok' AND $act=='updatewali'){
    $simpan = mysql_query("UPDATE kelompok SET 
                                 pengasuh  = '$_POST[walikelompok]'
								WHERE id_kelompok = '$_GET[idkelompok]'");
	
	if($simpan){
	  $_SESSION[sukses]="Data wali kelompok berhasil diupdate";
	}else{
		  $_SESSION[gagal]="Data wali kelompok gagal diupdate";
	}
	
 header('location:dashboard.php?module='.$module);
}


if  ($module=='kelompok' AND $act=='inputwali'){
    $simpan = mysql_query("UPDATE kelompok SET 
                                 pengasuh  = '$_POST[walikelompok]'
								WHERE id_kelompok = '$_GET[idkelompok]'");
								
	if($simpan){
	  $_SESSION[sukses]="Data wali kelompok berhasil ditambahkan";
	}else{
		  $_SESSION[gagal]="Data wali kelompok gagal ditambahkan";
	}
	
	
 header('location:dashboard.php?module='.$module);
}



if  ($module=='kelompok' AND $act=='hapus_kelompok'){
  $hapus = mysql_query("DELETE FROM kelompok WHERE id_kelompok='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data kelompok berhasil dihapus";
	}else{
		  $_SESSION[gagal]="Data kelompok gagal dihapus";
	}
	
	
  header('location:dashboard.php?module='.$module);
}


// ================================================

if  ($module=='penempatansantri' AND $act=='input'){
	
	if($_POST[idkelompok] and $_POST[idsiswa] and $_POST[idriwayatlama]=="") {
		$simpan = mysql_query("INSERT INTO riwayatkelompok (id_kelompok, id_siswa) VALUES('$_POST[idkelompok]','$_POST[idsiswa]' )");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil ditambahkan";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal ditambahkan";
		}
		
		header('location:dashboard.php?module='.$module);
	} else if($_POST[idkelompok] and $_POST[idsiswa] and $_POST[idriwayatlama]!="") {
		$simpan = mysql_query("UPDATE riwayatkelompok 
					SET id_kelompok = '$_POST[idkelompok]', 
					id_siswa = '$_POST[idsiswa]' WHERE id_riwayat='$_POST[idriwayatlama]'");
		
		
		if($simpan){
		  $_SESSION[sukses]="Data Penempatan berhasil diupdate";
		}else{
			  $_SESSION[gagal]="Data Penempatan gagal diupdate";
		}
		
		header('location:dashboard.php?module='.$module);
	}
    
	
}
 
 
if($module=='penempatansantri' AND $act=='hapus_penempatan'){
  $hapus = mysql_query("DELETE FROM riwayatkelompok WHERE id_riwayat='$_GET[id]'");
  
  if($hapus){
	  $_SESSION[sukses]="Data penempatansantri berhasil dihapus";
	}else{
	  $_SESSION[gagal]="Data penempatansantri gagal dihapus";
	}	
  header('location:dashboard.php?module='.$module);
}






?>