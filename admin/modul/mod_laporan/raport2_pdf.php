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
height:20px;
padding-top:5px;
}
 

</style>';



    $xxx .= ' 
	<div align=center style="font-size:14pt; ">RAPORT SEMENTARA</div> 
	<div align=center style="font-size:14pt; "> TK SITI SULAECHAH </div>  
	
     <hr/><br/>
	 <div align=center style="font-size:14pt;  ">PENILAIAN PERKEMBANGAN PENDIDIKAN PLUS</div>  
	 <br/><br/><br/>
	 
 ';
  
	  $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$idsiswa=$r[id_siswa];
	$idkelas=$r[id_kelas];
	$namasiswa=$r[nama_lengkap];
	 
	 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%">
			<tr><td width="100">Nama Siswa</td><td>: '. $r[nama_lengkap].'</td></tr>';
		$xxx.= '<tr><td> Kelompok</td><td>: '.$r[tingkat].'</td></tr>';
		$xxx.= '<tr><td>Semester</td><td>: 2</td></tr>';
		$xxx.= '<tr><td>Tahun Ajaran</td><td>: '.$_SESSION[tahunajaran].'</td></tr>'; 
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
	 
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td width="30" align="center"><b>No</b></td>
				<td align="center"><b>Mata Pelajaran</b></td>
				 <td width="100" align="center"><b>Nilai</b></td>
			</tr>';
			 
			
			//siapkan kolom nilai  
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='2' ");
		
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  ");
				$jumlahnilai = mysql_num_rows($carinilai);
			
				if($jumlahnilai<1){
						mysql_query("INSERT INTO nilai (id_siswa,id_kelas, id_mapel) VALUES ('$r[id_siswa]','$r[id_kelas]','$mapel[id_mapel]')");
				}
			}
					
			// end siapkan kolom nilai	
			
			
			
			
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='2' ");	
			$no=1;
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  "); 
				$nilaiakhir="";
				while ($n=mysql_fetch_array($carinilai)) {
					
					if($n[nilai_akhir]>0 and $n[nilai_akhir]<60) {
						$nilaiakhir="K";
					} else if($n[nilai_akhir]>=60 and $n[nilai_akhir]<80) {
						$nilaiakhir="C";
					} else if($n[nilai_akhir]>=80 and $n[nilai_akhir]<=100) {
						$nilaiakhir="B";
					} else {
						$nilaiakhir="-";
					}
					$xxx.= '<tr>
						<td align="center">'.$no.'</td> 
						<td>'.$mapel[nama_mapel].'</td> 
						<td align="center">'.$nilaiakhir.' </td></tr>';
				}
					 
			$no++;	 
				
			}
			
			
		$xxx.= '<tr>
						<td align="center"> </td> 
						<td align="center"> <br/>Guru Kelas<br/><br/> </td> 
						<td align="center">  </td></tr>';

		$xxx.= '<tr>
						<td align="center"> </td> 
						<td align="center"> <br/>Orang Tua / Wali<br/><br/> </td> 
						<td align="center">  </td></tr>';
			
		$xxx.='</table>';
		 
		$xxx.='<br/><br/><br/><br/>';
	
		$xxx .= '<div align=right> Semarang, ...........................</div> 
		<div align=right style="margin-right:30px"> Kepala TK </div> 
		<br/> <br/><br/><br/>';  
			$xxx .= '<div align=right>( ................................... )</div>';
		
 
 
 $xxx.='<div style="page-break-after:always;"></div> ';
 
 $xxx .= ' 
	<div align=center style="font-size:14pt; ">RAPORT SEMENTARA</div> 
	<div align=center style="font-size:14pt; "> TK SITI SULAECHAH </div>  
	
     <hr/><br/>
	 <div align=center style="font-size:14pt;  ">PENILAIAN PERKEMBANGAN ANAK DIDIK </div>
 ';
  
	  $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$idsiswa=$r[id_siswa];
	$idkelas=$r[id_kelas];
	
	 
	 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%">
			<tr><td width="100">Nama Siswa</td><td>: '. $r[nama_lengkap].'</td></tr>';
		$xxx.= '<tr><td> Kelompok</td><td>: '.$r[tingkat].'</td></tr>';
		$xxx.= '<tr><td>Semester</td><td>: 2</td></tr>';
		$xxx.= '<tr><td>Tahun Ajaran</td><td>: '.$_SESSION[tahunajaran].'</td></tr>'; 
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
		$xxx.= '<div style="font-size:12pt; padding-bottom:5px; ">Informasi Perkembangan </div>';
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td colspan=2>Aspek Perkembangan dan Pencapaiannya</td>  
			</tr>';
			 
		 
			
		//siapkan kolom nilai  
		$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
						WHERE id_siswa='$idsiswa'
						AND id_kelas='$idkelas'
						AND semester='2' ");
		$jumlahnilaiperkembangan = mysql_num_rows($carinilaiperkembangan);
		
	 
		if($jumlahnilaiperkembangan<1){
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Agama dan Moral')");
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Motorik')");
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Bahasa')");
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Kognitif')");
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Sosial Emosi')");
			mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Seni')");
		}
			
		// end siapkan kolom nilai	
		
		
		
		 
		 
	 
		$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
					WHERE id_siswa='$idsiswa'
					AND id_kelas='$idkelas'
					AND semester='2' ");
		$no=1;
		while ($np=mysql_fetch_array($carinilaiperkembangan)) {
			
			$xxx.=' <tr>
				<td align=center width="20">'.$no.'</td> 
				<td>'.$np[nama_aspek].'</td> 
				</tr>';
				
			$xxx.=' <tr>
				<td align=center></td> 
				<td>'.$np[informasiperkembangan].'</td> 
				</tr>';
			$no++;
		}
					 
		$xxx.='</table>';
		
		$xxx.='<br/><br/>';
		
		
		
		$carisakit=mysql_query("SELECT * FROM absensi 
					WHERE id_siswa='$_GET[id]'
					AND tahunajaran='$_SESSION[tahunajaran]'
					AND keterangan='Sakit'
					AND (tgl_absensi like '%-01-%' or tgl_absensi like '%-02-%' or tgl_absensi like '%-03-%' or tgl_absensi like '%-04-%' or tgl_absensi like '%-05-%' or tgl_absensi like '%-06-%')");
		$jumlahsakit=mysql_num_rows($carisakit);
		
		 
		
		$cariijin=mysql_query("SELECT * FROM absensi 
					WHERE id_siswa='$_GET[id]'
					AND tahunajaran='$_SESSION[tahunajaran]'
					AND keterangan='Ijin'
					AND (tgl_absensi like '%-01-%' or tgl_absensi like '%-02-%' or tgl_absensi like '%-03-%' or tgl_absensi like '%-04-%' or tgl_absensi like '%-05-%' or tgl_absensi like '%-06-%')");
		$jumlahijin=mysql_num_rows($cariijin);
		
		
		$carialpa=mysql_query("SELECT * FROM absensi 
					WHERE id_siswa='$_GET[id]'
					AND tahunajaran='$_SESSION[tahunajaran]'
					AND keterangan='Tanpa Keterangan'
					AND (tgl_absensi like '%-01-%' or tgl_absensi like '%-02-%' or tgl_absensi like '%-03-%' or tgl_absensi like '%-04-%' or tgl_absensi like '%-05-%' or tgl_absensi like '%-06-%')");
		$jumlahalpa=mysql_num_rows($carialpa);
		
		
		$xxx.='<table class="tableku" width="100%">';
		$xxx.= '<tr>
						<td align="center" rowspan=3> <br/>Ketidak hadiran</td> 
						<td > Sakit </td> 
						<td align="center"> '.$jumlahsakit.' <span> </span> hari </td></tr>';
		$xxx.= '<tr> 
						<td > Izin </td> 
						<td align="center"> '.$jumlahijin.' <span> </span> hari </td></tr>';
		$xxx.= '<tr> 
						<td > Tanpa Keterangan </td> 
						<td align="center"> '.$jumlahalpa.' <span> </span> hari </td></tr>';
						
						
		$xxx.= '<tr>
						<td align="center"> <br/>Tanda Tangan</td> 
						<td > <br/>Guru Kelas<br/><br/> </td> 
						<td align="center">  </td></tr>';

		$xxx.= '<tr>
						<td align="center"> <br/>Nama dan Tanggal</td> 
						<td > <br/>Orang Tua / Wali<br/><br/> </td> 
						<td align="center">  </td></tr>';
			
		$xxx.='</table>';
		 
		$xxx.='<br/><br/><br/><br/>';
	
		$xxx .= '<div align=right> Semarang, ...........................</div> 
		<div align=right style="margin-right:30px"> Kepala TK </div> 
		<br/> <br/><br/><br/>';  
			$xxx .= '<div align=right>( ................................... )</div>';
 
 require_once("dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Laporan Data Semua Pelanggan per tgl ".$tgl.".pdf", array("Attachment" => 0));


 
?>
