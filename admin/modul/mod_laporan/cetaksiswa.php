<?php
session_start(); error_reporting(0);
error_reporting(0);
 	include "../../../config/koneksi.php";
 
	include "../../../config/fungsi_indotgl.php";
	include "../../../config/fungsi_rupiah.php";
	
	 
 
 

$xxx='<style>

body{
	margin:40px 70px 40px 70px;
}

.tableku {
border-collapse:collapse; 
}

* {
font-size:11px;
}
.tableku td{
border-collapse:collapse;
border:1px solid #666666;
font-size:10px;
padding-left:6px;
padding-right:6px;
height:18px;
 
}
 

</style>';

 
		
			$cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
			$profil=mysql_fetch_array($cari);
	 	 
 $xxx .= ' 
	
	<div align=center style="font-size:14pt; ">'.$profil[nama_ponpes].' </div> 
	<div align=center style="font-size:14pt; "> TAHUN AJARAN '.$_SESSION[tahunajaran].'</div>  	
	<br/><br/>
     <hr/><br/>
	 
	 <div align=center style="font-size:14pt; ">DATA SISWA</div> ';
  
  
     $edit = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
     $r    = mysql_fetch_array($edit);
	
	 
		$xxx.= '<br/><br/>';
		
		 if($r[foto]==""){
			$xxx.='<center><img src="../../../upload/foto_siswa/noimage.jpg" width=150></center>';
		} else {
			$xxx.='<center><img src="../../../upload/foto_siswa/'.$r[foto].'" width=150></center>';
		}  
	 
		$xxx.=' <br/><br/><table class="tableku" width="100%"> 
			<tr><td width=25%>NIS</td><td>'.$r[nis].'</td></tr>
			<tr><td>Status</td><td>'.$r[status].'</td></tr> 
			<tr><td>Tanggal Mulai Masuk</td><td>'.$r[tgl_masuk].'</td></tr> 
			<tr><td>Nama Lengkap</td><td>'.$r[nama_lengkap].'</td></tr>
			<tr><td>Jenis Kelamin</td><td>'.$r[jenis_kelamin].'</td></tr>
			<tr><td>Tempat Lahir</td><td>'.$r[tempat_lahir].'</td></tr>
			<tr><td>Tanggal Lahir</td><td>'.$r[tgl_lahir].'</td></tr>
			<tr><td>Alamat </td><td>'.$r[alamat_lengkap].'</td></tr>
			<tr><td>No. Telp.</td><td>'.$r[notelp_ortu].'</td></tr> 
			</table>';
			
			$xxx.=' <br/><br/><table class="tableku" width="100%">   
			<tr><td width=25%>Nama Bapak</td><td>'.$r[nama_bapak].'</td></tr>
			<tr><td>Pekerjaan Bapak</td><td>'.$r[pekerjaan_bapak].'</td></tr>
			<tr><td>Nama Ibu</td><td>'.$r[nama_ibu].'</td></tr>
			<tr><td>Pekerjaan Ibu</td><td>'.$r[pekerjaan_ibu].'</td></tr>
			</table>';
			
			
			
			
		$xxx.=' <br/><br/><h4>RIWAYAT PENDIDIKAN</h4>
		<table class="tableku" width="100%"> 
			<tr><td width=25%>SMP/MTs/SD/MI asal</td><td>'.$r[sekolah_asal_ibu].'</td></tr>
			<tr><td>Madin/TPQ</td><td>'.$r[madin_asal].'</td></tr>
			<tr><td>Pondok Pesantren</td><td>'.$r[ponpes_asal].'</td></tr>
			 
			</table>';
			 
			
  
	  
		 
		$xxx.='<br/><br/><br/><br/>';
	 
 
 $tgl = date("Y-m-d");
 require_once("dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Data Siswa ".$r[nis]." ".$r[nama_lengkap].".pdf", array("Attachment" => 0));


 
?>
