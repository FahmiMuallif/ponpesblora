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

$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_GET[kelas]'");
		$k=mysql_fetch_array($carikelas);
		$tingkat=strtoupper($k[tingkat]);
		$namakelas=strtoupper($k[namakelas]);
		
		$carimapel= mysql_query("SELECT * FROM mapel WHERE 
						id_mapel='$_GET[mapel]'");
 
		$mapel=mysql_fetch_array($carimapel);
		$namamapel=strtoupper($mapel[nama_mapel]); 
		
			$cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
			$profil=mysql_fetch_array($cari);
	
	 	 
 $xxx .= ' 
	<div align=center style="font-size:14pt; ">LAPORAN NILAI</div> 
	<div align=center style="font-size:14pt; ">'.$profil[nama_ponpes].' </div> 
	<div align=center style="font-size:14pt; "> TAHUN AJARAN '.$_SESSION[tahunajaran].'</div>  	
	<br/><br/>
     <hr/><br/>';
 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%">
			<tr><td width="100">Kelas</td><td>: '. $namakelas.'</td>
			<td> Mata Pelajaran</td><td>: '.$namamapel.'</td></tr>';
		$xxx.= '<tr><td> Tingkat</td><td>: '.$tingkat.'</td> 
		<td> Semester</td><td>: '.$_GET[smt].'</td></tr>';
		  
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
	 
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td width="30" align="center" bgcolor="#ccc"><b>No</b></td>
				<td width="70" align="center" bgcolor="#ccc"><b>NIS</b></td>
				<td align="center" bgcolor="#ccc"><b>Nama Siswa</b></td>
				 <td width="100" align="center" bgcolor="#ccc"><b>Nilai</b></td>
			</tr>';
			 
			
 
			
			
			     
        $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas
					AND kelas.id_kelas='$_GET[kelas]' 
					ORDER BY siswa.nis ASC");
  
			$no=1;
			while($hasil = mysql_fetch_array($tampil)) {
				 
				 $carinilai = mysql_query("SELECT * FROM nilai
					where id_siswa=$hasil[id_siswa] 
					AND id_kelas='$_GET[kelas]' 
					AND id_mapel='$_GET[mapel]'
					AND semester='$_GET[smt]'");
  
				$nilai=mysql_fetch_array($carinilai);
				if($nilai[nilai_akhir]!=0){
					$nak=$nilai[nilai_akhir];
				} else {
					$nak="";
				}
		
				$xxx.=' <tr><td align="center">'.$no.'</td> 
				<td align="center">'.$hasil[nis].'</td>
				<td >'.$hasil[nama_lengkap].'</td>
				<td align="center">'.$nak.'</td>';
				
					 
			$no++;	 
				
			}
			
		 
			
		$xxx.='</table>';
		 
		$xxx.='<br/><br/><br/><br/>';
	 
 
 $tgl = date("Y-m-d");
 require_once("dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Raport Sementara ".$namasiswa." ".$tgl.".pdf", array("Attachment" => 0));


 
?>
