 
<?php

if($_GET['module']=="" or $_GET['module']=="home") {
	
	 
	
	
	?>
	
		
                 <article class="content dashboard-page">
                    <div class="title-block">
                        <h1 class="title"> Dashboard </h1>
                        <p class="title-description"> User Profile</p>
                    </div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col col-lg-3 ">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title">  </h4>
                                            
                                        </div>
                                        <div class="row row-sm stats-container">
										<?php 
										
										echo "<img src='../upload/foto_guru/".$_SESSION[foto]."' width='100%'>";
										?>

									   
										 </div>
                                    </div>
                                </div>
                            </div>
							
							
							
							
                            <div class="col col-lg-9"> 
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> PROFILE </h4>
                                            
                                        </div>
                                     
                                        <div class="tab-content">
										
										<?php 
										 $edit = mysql_query("SELECT * FROM guru WHERE id_guru='$_SESSION[idadmin]'");
										$r    = mysql_fetch_array($edit);
										?>
	
									<table class="table table-condensed">
										<tr> 
											<td width="30%"> Nama Lengkap</td> 
											<td> <?php echo $r[nama_guru]; ?> </td>
										</tr>
									
										<tr> 
											<td> Jenis Kelamin</td> 
											<td> <?php echo $r[jenis_kelamin]; ?> </td>
										</tr>
										
										<tr> 
											<td> Alamat</td> 
											<td> <?php echo $r[alamat]; ?> </td>
										</tr>
										
										<tr> 
											<td> No.Telp. </td> 
											<td> <?php echo $r[notelp]; ?> </td>
										</tr>
										
										<tr> 
											<td> Kompetensi Mengajar </td> 
											<td> <?php echo $r[kompetensi]; ?> </td>
										</tr>
										
										<tr> 
											<td> Riwayat Pendidikan </td> 
											<td> <?php echo $r[riwayat_pendidikan]; ?> </td>
										</tr>
										
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
 

else if ($_GET['module']=="lappelanggaran"){
	include "modul/mod_laporan/laporan_pelanggaran.php";
}

else if ($_GET['module']=="jadwalguru"){
	include "modul/mod_jadwalguru/jadwalguru.php";
}

else if ($_GET['module']=="siswa"){
	include "modul/mod_siswa/siswa.php";
}

else if ($_GET['module']=="mapel"){
	include "modul/mod_mapel/mapel.php";
}

else if ($_GET['module']=="nilai"){
	include "modul/mod_nilai/nilai.php";
}
?>