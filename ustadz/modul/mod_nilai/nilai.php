 
<?php
switch($_GET[act]){

  default:

    echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Nilai </h1>
                        <p class="title-description"> Daftar Kelas dan Mata Pelajaran</p>
                    </div>
                    <section class="section"> ';
					
					
	 if($_SESSION[sukses]!="")
	 {
		echo " <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['sukses']."</div>";
	 	$_SESSION[sukses]="";  
	 } else if($_SESSION[gagal]!="")
	 {
	 	echo " <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['gagal']."</div>";
	 	$_SESSION[gagal]="";  
	 }
	 
 
	
    echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						  
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive' >  ";
		  
		  
	 
	
	
        echo "  
		  <table id='sample-table-1'  class='table table-striped table-hovered'>
		  <thead>
          <tr>
			  <th width=50>no</th>
			  <th>Tingkat</th>
			  <th>Nama Kelas </th> 
			  <th>Mata Pelajaran </th> 
			  <th width=230> Kelola Nilai </th>
		  </tr>
		  </thead><tbody>"; 
		  
	  
   
	
    $tampil=mysql_query("SELECT * FROM jadwal, kelas  
						where jadwal.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_guru='$_SESSION[idadmin]' 
						and jadwal.id_kelas=kelas.id_kelas "); 
	 
    $no= 1;  
    while ($r=mysql_fetch_array($tampil)){
		
	 
		 $carimapel=mysql_query("select * from jadwal, mapel  
						where jadwal.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_guru='$_SESSION[idadmin]' 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.id_mapel='$r[id_mapel]'");
						
		$mapel=mysql_fetch_array($carimapel);
	  
       echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$r[tingkat]</td>
				<td align='center'> $r[namakelas] </td>
				  ";
		
		 
		 
        echo " <td> $mapel[nama_mapel] </a>  </td>
		
		<td ><a href=?module=nilai&act=kelolanilai&id=$r[id_jadwal]&semester=1 class='btn btn-sm btn-info' title='Kelola Nilai Semester 1'> Semester 1</a> 
		
		<a href=?module=nilai&act=kelolanilai&id=$r[id_jadwal]&semester=2 class='btn btn-sm btn-info' title='Kelola Nilai Semester 2'> Semester 2</a>
		
		";
		
		
		echo"  </td></tr>";
      $no++;
    }
    echo "</table> ";
	
	 
					
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>
	";
	
 
    break;
  

	
	
	 
	
	
	
	
	

   case "kelolanilai":
   
   $carijadwal = mysql_query("SELECT * FROM jadwal, kelas, mapel  
				where jadwal.id_kelas=kelas.id_kelas 
				and jadwal.id_mapel=mapel.id_mapel  
				and jadwal.id_jadwal='$_GET[id]'  ");
				
   $jadwal=mysql_fetch_array($carijadwal);
   
   $idmapel=$jadwal[id_mapel];
   $idkelas=$jadwal[id_kelas];
   $namakelas=$jadwal[namakelas];
   $tingkat=$jadwal[tingkat];
   
  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Nilai </h1>
                        <p class="title-description">  Tingkat <?php echo $tingkat; ?> Kelas <?php echo $namakelas; ?>  Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?> Semester <?php echo $_GET[semester]; ?>  <br/> Mata Pelajaran <?php echo $jadwal[nama_mapel]; ?></p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
    <?php 	 
		 
     
		  
   if($_SESSION[gagal] !="") {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[gagal];
		 $_SESSION[gagal]="";   
		echo "</div>";
	
	} else if($_SESSION[sukses] !="") {
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[sukses];
		 $_SESSION[sukses]="";   
		echo "</div>";
	}	 
	
	
         echo " <div class='table-responsive'>
		  <table id='datatable_demo' class='table table-striped'>
		  <thead>
          <tr>
			<th>no</th>
			<th>nis</th>
			<th>nama santri</th>
			<th width=100>Nilai</th>
			 
		  </tr>
		  </thead><tbody>";

	echo "<form method='post' action='modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilai'> ";
	
	
    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas
					AND kelas.id_kelas='$jadwal[id_kelas]' 
					ORDER BY siswa.nis ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
		
		//SIAPKAN NILAI KOSONG 
		$carinilai = mysql_query("SELECT * FROM nilai 
							WHERE id_siswa='$r[id_siswa]'
							AND id_kelas='$idkelas' 
							AND id_mapel='$idmapel' 
							AND semester='$_GET[semester]'");
		$jumlah=mysql_num_rows($carinilai);
							
		if($jumlah>0){
			// do nothing
		} else {
			mysql_query("INSERT INTO nilai (id_siswa, id_kelas, id_mapel, semester)
							VALUES ('$r[id_siswa]', '$idkelas', '$idmapel', '$_GET[semester]')");
		}
				
		
		  
		$carinilai = mysql_query("SELECT * FROM nilai 
							WHERE id_siswa='$r[id_siswa]'
							AND id_kelas='$idkelas' 
							AND id_mapel='$idmapel' 
							AND semester='$_GET[semester]'");
		$nilai=mysql_fetch_array($carinilai);
		if($nilai[nilai_akhir]!=0){
			$nak=$nilai[nilai_akhir];
		} else {
			$nak="";
		}
		 
      echo "<tr><td align='center'>$no</td>
                <td align='center'>$r[nis]</td>
                <td >$r[nama_lengkap]</td>
				 <td align='center'>
				 <input type='hidden' name='semester[]' value='$_GET[semester]'>
				 <input type='hidden' name='idjadwal[]' value='$_GET[id]'>
				 <input type='hidden' name='idsiswa[]' value='$r[id_siswa]'>
				 <input type='hidden' name='idkelas[]' value='$r[id_kelas]'>
				 <input type='hidden' name='idmapel[]' value='$idmapel'>
				 <input type='number' name='nilai[]' class='inputnilai' value='$nak'></td> 
                 </tr>";
      $no++;
    }
    echo "</tbody></table>
	
	<input type='submit' class='btn btn-success pull-right' value='Simpan'>
	</form>
	</div>
	 	</section>
	</div>
    </section>
	</article>
	";


   break;
   
   
   
   
}

?>
