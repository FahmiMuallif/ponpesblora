<?php

session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 

// Menghapus guru - Mapel
if ($module=='jadwalkelas' AND $act=='hapus'){
mysql_query("DELETE FROM jadwal WHERE id_jadwal='$_GET[idjadwal]' ");
  header('location:../../dashboard.php?module=jadwalkelas&act=editjadwal&id='.$_GET[id]);
}

// Input jadwal
elseif ($module=='jadwalkelas' AND $act=='input'){

	$idguru= $_POST[idguru];
	$idkelas= $_POST[idkelas];
	$hari = $_POST[harimengajar];
	$idruang=$_POST[idruang];
	$idmapel=$_POST[idmapel];
	$simpan=0;
	if (isset($_POST[idruang])) {
		
			// cek di tabel jadwal 
			//$carijadwallama=mysql_query("SELECT * FROM jadwal where id_kelas='$idkelas' and harimengajar='$hari' and jammengajar='$value'");
			$carijadwallama=mysql_query("SELECT * FROM jadwal where  harimengajar='$hari' and jammengajar='$_POST[jammengajar]' and id_ruang='$idruang'");
			$jadwal = mysql_fetch_array($carijadwallama);
			$hasil=mysql_num_rows($carijadwallama);
		
			if ($hasil==1) 
			{
				if ($jadwal[id_guru]!=$idguru)
				{
					$simpan++;
					echo "<script>alert('Data Gagal Disimpan. Ruangan Sudah Digunakan.')</script>";
					echo "<script>top.location='../../dashboard.php?module=jadwalkelas&act=editjadwal&id=$idkelas'</script>";
				}

			}  
			
	}
	
	
	
	if ($_POST[idmapel]!=0) {
		
			// cek di tabel jadwal 
			//$carijadwallama=mysql_query("SELECT * FROM jadwal where id_kelas='$idkelas' and harimengajar='$hari' and jammengajar='$value'");
			$carijadwallama=mysql_query("SELECT * FROM jadwal where  harimengajar='$hari' and jammengajar='$_POST[jammengajar]' and id_guru='$idguru'");
			
			while ($x=mysql_fetch_array($carijadwallama))
			{
				if ($x[id_mapel]!=$idmapel) 
				{
 
				  	$simpan++;
				  	echo "<script>alert('Data Gagal Disimpan. Pembimbing Tidak Mungkin Mengajar Materi Berbeda Secara Bersamaan.')</script>";
					echo "<script>top.location='../../dashboard.php?module=jadwalkelas&act=editjadwal&id=$idkelas'</script>";
				   
	
				} else if ($x[id_mapel]==$idmapel and $x[id_ruang]!=$idruang )
				{
					 $simpan++;
			  		echo "<script>alert('Data Gagal Disimpan. Pembimbing Tidak Mungkin Berada Di 2 Ruangan Secara Bersamaan.')</script>";
					echo "<script>top.location='../../dashboard.php?module=jadwalkelas&act=editjadwal&id=$idkelas'</script>";
			    
				
				} else if ($x[id_guru]!=$idguru and $x[id_ruang]==$idruang )
				{ 
					$simpan++;
			  		echo "<script>alert('Data Gagal Disimpan. Ruangan Sudah Digunakan Pembimbing Lain.')</script>";
					echo "<script>top.location='../../dashboard.php?module=jadwalkelas&act=editjadwal&id=$idkelas'</script>";
			    
				 
				} else
				{
				
				}
			
			}
			
		
			
			
	}
	
	
			
	
	if ($simpan==0) {
		
			  mysql_query("INSERT INTO jadwal (id_guru, id_mapel, id_kelas, id_ruang,  harimengajar, jammengajar, tahunajaran) 
	                       VALUES('$_POST[idguru]','$_POST[idmapel]', '$_POST[idkelas]',  '$_POST[idruang]', '$_POST[harimengajar]', '$_POST[jammengajar]', '$_SESSION[tahunajaran]')");
  			 echo "<script>top.location='../../dashboard.php?module=jadwalkelas&act=editjadwal&id=".$idkelas."'</script>";
		
	 
	} else {}
	

}


// update jadwal

elseif ($module=='jadwalkelas' AND $act=='update'){

	mysql_query("UPDATE jadwal SET
							 harimengajar='$_POST[harimengajar]',
							 jammengajar='$_POST[jammengajar]'
				WHERE id_jadwal=$_GET[id]");
								  
    header('location:../../dashboard.php?module=jadwal');
	
}


?>