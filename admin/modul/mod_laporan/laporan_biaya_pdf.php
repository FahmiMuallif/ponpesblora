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
		
		$query = mysql_query("SELECT * FROM biayapendidikan WHERE id_biaya='$_GET[komponenbiaya]' ");
		$result = mysql_fetch_array($query);
		$namabiaya = strtoupper($result[nama_biaya]);
	
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
	<div align=center style="font-size:14pt; ">LAPORAN PEMBAYARAN SISWA</div> 
	<div align=center style="font-size:14pt; ">'.$profil[nama_ponpes].' </div> 
	<div align=center style="font-size:14pt; "> TAHUN AJARAN '.$_SESSION[tahunajaran].'</div>  	
	<br/><br/>
     <hr/><br/>';
 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%"> ';
		$xxx.= '<tr><td> Tingkat / Kelas</td><td>: '.$tingkat." / ".$namakelas.'</td></tr>';
		$xxx.= '<tr><td> Biaya Pendidikan</td><td>: '.$namabiaya.'</td></tr>'; 
		$xxx.= '<tr><td> Tanggal Pembayaran </td><td>: '.$tglAwal.' s/d '.$tglAkhir.'</td></tr>'; 
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
	 
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td width="30" align="center" bgcolor="#ccc"><b>No</b></td>
				<td width="70" align="center" bgcolor="#ccc"><b>NIS</b></td>
				<td align="center" bgcolor="#ccc"><b>Nama Siswa</b></td>
				 <td width="100" align="center" bgcolor="#ccc"><b>Tgl Bayar</b></td>
				 <td width="100" align="center" bgcolor="#ccc"><b>Jumlah Bayar</b></td>
			</tr>';
			 
			
 
			
			
	$tglmulai = $_GET[tglAwal];
	$tglselesai = $_GET[tglAkhir]; 
    $tampil = mysql_query("SELECT * FROM pembayaransiswa WHERE id_kelas='$_GET[kelas]' AND tahunajaran='$_SESSION[tahunajaran]' AND (tgl_bayar >= '$tglmulai' AND tgl_bayar <= '$tglselesai') AND id_biaya='$_GET[komponenbiaya]'");
  
	  
	$no=1; 
	$total = 0;
    while ($r=mysql_fetch_array($tampil)){
		 
		$carisiswa = mysql_query("SELECT * FROM siswa
					where id_siswa=$r[id_siswa] ");
  
		$siswa=mysql_fetch_array($carisiswa);
  
       $xxx.='<tr><td align="center">'.$no.'</td> 
				<td align="center">'.$siswa[nis].'</td>
				<td >'.$siswa[nama_lengkap].'</td>
				<td align="center">'.$r[tgl_bayar].'</td>
				<td align="center">'.format_rupiah($r[jumlah_bayar]).'</td>
				</tr>';
		$total = $total + $r[jumlah_bayar];
        $no++;
    }
    $xxx.='<tr> <td colspan="4" align="center">TOTAL</td><td align="center">'.format_rupiah($total).'</td></tr>  
    	</table>';
		
		 
		 
		$xxx.='<br/><br/><br/><br/>';
	 
 
 $tgl = date("Y-m-d");
 require_once("dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Laporan Pembayaran Siswa Kelas".$namakelas." ".$tglAwal." sampai ".$tglAkhir.".pdf", array("Attachment" => 0));


 
?>
