<?php
session_start(); error_reporting(0);
error_reporting(0);
 	include "../../../config/koneksi.php";
 
	include "../../../config/fungsi_indotgl.php";
	include "../../../config/fungsi_rupiah.php";
	
	$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_GET[kelas]'");
		$k=mysql_fetch_array($carikelas);
		$tingkat=strtoupper($k[tingkat]);
		$namakelas=strtoupper($k[namakelas]);
		
 
	
		$tglAwal = tgl_indo($_GET[tglAwal]);
		$tglAkhir = tgl_indo($_GET[tglAkhir]);
 
 

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
	<div align=center style="font-size:14pt; ">LAPORAN PELANGGARAN</div> 
	<div align=center style="font-size:14pt; ">'.$profil[nama_ponpes].' </div> 
	<div align=center style="font-size:14pt; "> TAHUN AJARAN '.$_SESSION[tahunajaran].'</div>  	
	<br/><br/>
     <hr/><br/>';
 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%"> ';
		if($_GET[kelas]=="Semua"){
			$xxx.= ' '; 
		} else {
			$xxx.= '<tr><td> Tingkat / Kelas</td><td>: '.$tingkat.' / '.$namakelas.'</td></tr>'; 
		}
		$xxx.= '<tr><td> Tanggal Pelanggaran </td><td>: '.$tglAwal.' s/d '.$tglAkhir.'</td></tr>'; 
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
	 
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td width="20" align="center" bgcolor="#ccc"><b>No</b></td>
				<td width="60" align="center" bgcolor="#ccc"><b>Tgl Pelanggaran</b></td>
				<td align="center" bgcolor="#ccc"><b>Nama Siswa</b></td>
				 <td width="100" align="center" bgcolor="#ccc"><b>Pelanggaran</b></td>
				 <td width="160" align="center" bgcolor="#ccc"><b>Catatan</b></td>
			</tr>';
			 
			
 
			
			
	$tglmulai = $_GET[tglAwal];
	$tglselesai = $_GET[tglAkhir]; 
    
	if($_GET[kelas]=="Semua"){
	   
	   
	   
	    $tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]'
							AND (pelanggaransantri.tgl_pelanggaran >= '$tglmulai' AND  pelanggaransantri.tgl_pelanggaran <= '$tglselesai')");
  
   } else {
	    $tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaran.id_kelas='$_POST[kelas]' 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]'
							AND (pelanggaransantri.tgl_pelanggaran >= '$tglmulai' AND  pelanggaransantri.tgl_pelanggaran <= '$tglselesai')");
  
   }
  
	  
	$no=1; 
 
    while ($r=mysql_fetch_array($tampil)){
		 

  
       $xxx.='<tr><td align="center">'.$no.'</td> 
				<td align="center">'.$r[tgl_pelanggaran].'</td>
				<td >'.$r[nama_lengkap].'</td>
				<td align="center">'.$r[nama_pelanggaran].'</td>
				<td ><b>Tipe pelanggan </b>: '.$r[tipe_pelanggaran].'<br/>
				<b>Sanksi </b>: '.$r[sanksi].'<br/>
				<b>Pemberi sanksi </b>: '.$r[pemberi_sanksi].'<br/>
				<b>Pembinaan atau feedback </b>: '.$r[catatan].'</td>
				</tr>';
		 
        $no++;
    }
    $xxx.='  
    	</table>';
		
		 
		 
		$xxx.='<br/><br/><br/><br/>';
	 
 
 $tgl = date("Y-m-d");
 require_once("dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Laporan Pelanggaran Kelas".$namakelas." ".$tglAwal." sampai ".$tglAkhir.".pdf", array("Attachment" => 0));


 
?>
