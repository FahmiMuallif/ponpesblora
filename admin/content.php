 
<?php

if($_GET['module']=="" or $_GET['module']=="home") {
	
	$tampilguru=mysql_query("SELECT * FROM guru ORDER BY id_guru DESC"); 
	$jumlahguru=mysql_num_rows($tampilguru);
	
	$tampiladmin=mysql_query("SELECT * FROM admin ORDER BY id_admin DESC"); 
	$jumlahadmin=mysql_num_rows($tampiladmin);
	
	$caricari = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas 
					AND kelas.tahunajaran='$_SESSION[tahunajaran]'");
	$jumlahsiswa=mysql_num_rows($caricari);
	
	
	$carilulus = mysql_query("SELECT * FROM siswa where status='lulus'");
	$jumlahlulus=mysql_num_rows($carilulus);
	
	
	
	/*$jumlahterlambat=0;
	while($siswa=mysql_fetch_array($caricari)) {
		
		$caricari = mysql_query("SELECT * FROM pembayaransiswa 
					where id_siswa='$siswa[id_siswa]' 
					AND tahunajaran='$_SESSION[tahunajaran]'");
	} */
				
	
	$tampilkelas=mysql_query("SELECT * FROM kelas where tahunajaran='$_SESSION[tahunajaran]' ORDER BY tingkat ASC, namakelas ASC"); 
	$jumlahkelas=mysql_num_rows($tampilkelas);
	
	
	 $tampilpelanggaran = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY pelanggaransantri.id_pelanggaran DESC  ");
  
    
	$jumlahpelanggaran=mysql_num_rows($tampilpelanggaran);
	
	
	
	?>
	
		
                 <article class="content dashboard-page">
                    <div class="title-block">
                        <h1 class="title"> Dashboard </h1>
                        <p class="title-description"> Statistik</p>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-5 stats-col">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Statistik <?php echo $_SESSION[tahunajaran]; ?></h4>
                                            
                                        </div>
                                        <div class="row row-sm stats-container">
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-th-large"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> <?php echo $jumlahkelas; ?> </div>
                                                    <div class="name"> Kelas </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
											<div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-users"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> <?php echo $jumlahsiswa; ?> </div>
                                                    <div class="name"> Santri </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-user"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> <?php echo $jumlahguru; ?> </div>
                                                    <div class="name"> Ustadz </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            
                                            
                                             
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-exclamation-triangle"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> <?php echo $jumlahpelanggaran; ?> </div>
                                                    <div class="name"> Pelanggaran </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
							
							
							 <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-trophy"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> <?php echo $jumlahlulus; ?> </div>
                                                    <div class="name"> Total Siswa Lulus </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
							
							
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
							
							
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-7 history-col"> 
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Kontak Kami </h4>
                                            
                                        </div>
                                     
                                        <div class="tab-content">
 
									  <table class='table table-condensed table-hovered'>
										<thead>
										<tr>
											<th width=80>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Subject</th> 
											<th>AKSI</th> 
										</tr></thead> 
 
	<?php 
    
     
	 $tampil=mysql_query("SELECT * FROM kontakkami ORDER BY id_kontak DESC limit 0,5"); 
	 
	
    $no= ($posisi-$limit) +1;   
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td>
                <td>$r[nama]</td>
				<td>$r[email]</td>
                <td>$r[subjek]</td>
				<td align='center'>";  
				
				if($r[jawaban]=="")
				{
					echo "<a href='?module=kontakkami&act=balasemail&id=$r[id_kontak]' title='Belum Dijawab' class='btn btn-sm btn-warning btn-flat' ></i> Jawab</a> ";
				} else 
				{
					echo "<a href='?module=kontakkami&act=balasemail&id=$r[id_kontak]' title='Sudah Dijawab' class='btn btn-sm btn-success btn-flat' >Lihat</a> ";
				}
			 
		echo "</td></tr>";
		$no++;
	}
	?>
											</table>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                  </article>
              

			  
			  
	<?php
}

else if ($_GET['module']=="editakun"){
	include "modul/mod_editakun/editakun.php";
}


else if ($_GET['module']=="profil"){
	include "modul/mod_profil/profil.php";
}

else if ($_GET['module']=="pengguna"){
	include "modul/mod_pengguna/pengguna.php";
}

 

else if ($_GET['module']=="tabungan"){
	include "modul/mod_tabungan/tabungan.php";
}

else if ($_GET['module']=="berita"){
	include "modul/mod_berita/berita.php";
}

else if ($_GET['module']=="halaman"){
	include "modul/mod_halaman/halaman.php";
}

else if ($_GET['module']=="kontakkami"){
	include "modul/mod_kontakkami/kontakkami.php";
}

else if ($_GET['module']=="guru"){
	include "modul/mod_guru/guru.php";
}

else if ($_GET['module']=="siswa"){
	include "modul/mod_siswa/siswa.php";
}


else if ($_GET['module']=="tahunajaran"){
	include "modul/mod_tahunajaran/tahunajaran.php";
}


else if ($_GET['module']=="kalenderakademik"){
	include "modul/mod_kalenderakademik/kalenderakademik.php";
}

else if ($_GET['module']=="database"){
	include "modul/database/database.php";
}

else if ($_GET['module']=="kelas"){
	include "modul/mod_kelas/kelas.php";
}

else if ($_GET['module']=="ruang"){
	include "modul/mod_ruang/ruang.php";
}


else if ($_GET['module']=="penempatansiswa"){
	include "modul/mod_penempatansiswa/penempatansiswa.php";
}

else if ($_GET['module']=="mapel"){
	include "modul/mod_mapel/mapel.php";
}


else if ($_GET['module']=="jadwalkelas"){
	include "modul/mod_jadwalkelas/jadwalkelas.php";
}


else if ($_GET['module']=="jadwalguru"){
	include "modul/mod_jadwalguru/jadwalguru.php";
}


else if ($_GET['module']=="nilai"){
	include "modul/mod_nilai/nilai.php";
}


else if ($_GET['module']=="biayapendidikan"){
	include "modul/mod_biayapendidikan/biayapendidikan.php";
}

else if ($_GET['module']=="pembayaransiswa"){
	include "modul/mod_pembayaransiswa/pembayaransiswa.php";
}


else if ($_GET['module']=="tatatertib"){
	include "modul/mod_tatatertib/tatatertib.php";
}



else if ($_GET['module']=="jenispelanggaran"){
	include "modul/mod_jenispelanggaran/jenispelanggaran.php";
}

else if ($_GET['module']=="pelanggaransiswa"){
	include "modul/mod_pelanggaransiswa/pelanggaransiswa.php";
}

else if ($_GET['module']=="lapnilai"){
	include "modul/mod_laporan/laporan_nilai.php";
}

else if ($_GET['module']=="lappembayaran"){
	include "modul/mod_laporan/laporan_pembayaran.php";
}

else if ($_GET['module']=="lappelanggaran"){
	include "modul/mod_laporan/laporan_pelanggaran.php";
}

?>