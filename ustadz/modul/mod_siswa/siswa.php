 
<?php
switch($_GET[act]){

  default:

    echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Lihat Data Santri  </h1>
                        <p class="title-description"> Daftar Kelas</p>
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
			  <th>Tugas Mengajar </th> 
			  <th width=150> Aksi </th>
		  </tr>
		  </thead><tbody>"; 
		  
	  
   
	
    $tampil=mysql_query("SELECT * FROM jadwal, kelas  
						where jadwal.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_guru='$_SESSION[idadmin]' 
						and jadwal.id_kelas=kelas.id_kelas
						GROUP BY jadwal.id_kelas"); 
	 
    $no= 1;  
    while ($r=mysql_fetch_array($tampil)){
	
		 $carimapel=mysql_query("select * from jadwal, mapel  
						where jadwal.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_guru='$_SESSION[idadmin]' 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.id_kelas='$r[id_kelas]'"); 
		while($mapel=mysql_fetch_array($carimapel)){
			$mapels.=$mapel[nama_mapel].",";
		}
		 $mapels=substr($mapels,0,-1);
	  
       echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$r[tingkat]</td>
				<td align='center'> $r[namakelas] </td>
				  ";
		
		 
		 
        echo " <td> $mapels </a>  </td>
		
		<td ><a href=?module=siswa&act=lihatsiswa&id=$r[id_kelas] class='btn btn-sm btn-info' title='Lihat Siswa'> Lihat Data Santri</a>";
		 ?>
	               
		   
				
		 		   
        <?php    echo"  </td></tr>";
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
  

	
	
	 
	
	
	
	
	

   case "lihatsiswa":
   
   $carikelas = mysql_query("SELECT * FROM kelas where id_kelas='$_GET[id]' ");
   $kelas=mysql_fetch_array($carikelas); 
   $namakelas=$kelas[namakelas];
   $tingkat=$kelas[tingkat];
  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Data Santri <font size='6'> <?php echo $tingkat; ?> Kelas <?php echo $namakelas; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Lihat Detail Data Santri  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
    <?php 	 
		 
   
     echo " <br/><br/>";
		  
		  
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
			<th>JK</th>
			<th>alamat</th>
			<th width=150>aksi</th>
		  </tr>
		  </thead><tbody>";


    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas
					AND kelas.id_kelas='$_GET[id]' 
					ORDER BY siswa.nis ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
		
		if($r[jenis_kelamin]=="Laki-laki"){
			$jk="L";
		} else {
			$jk="P";
		}
      echo "<tr><td align='center'>$no</td>
                <td align='center'>$r[nis]</td>
                <td >$r[nama_lengkap]</td>
				 <td >$jk</td>
                <td >$r[alamat_lengkap]</td>
               <td align='center'> ";
			   
		?>
		
		<button onclick="showAjaxModal('detailsiswa.php?id=<?php echo $r[id_siswa]; ?>');"  class='btn btn-sm btn-info' title='Detail'>  Detail</button> 
			   
		 	
		
	<?php	
	  echo " </td>  </tr>";
      $no++;
    }
    echo "</tbody></table></div>
	 	</section>
	</div>
    </section>
	</article>
	";


   break;
   
   
   
   
}

?>
