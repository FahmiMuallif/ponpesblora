

<?php include "header.php"; ?>
<?php if($_SESSION[idsiswa]!="") { ?>

 
<div class="banner1 agileits">
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
			       <h1 style="font-size:2.1em"><a href="profilsiswa.php"><?php echo $namaponpes; ?></a></h1>
			    </div>
				 <div class="top-nav">
				 	 <span class="menu"> <img src="assets/images/icon.png" alt=""></span>	
				     <nav class="cl-effect-21" id="cl-effect-21">   		       											
							<ul class="res">
								<li><a href="profilsiswa.php">Profile </a></li>
								<li><a href="akademiksiswa.php">Akademik</a></li>
								<li><a href="keuangansiswa.php" >Keuangan</a></li> 
								<li><a href="tabungansiswa.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Tabungan </a></li>
								<li><a href="tatatertibsiswa.php" >Tata Tertib </a></li>
								
								<li><a href="logout.php" >Logout </a></li>								
							</ul>
						</nav>
						<!-- script-for-menu -->
										 <script>
										   $( "span.menu" ).click(function() {
											 $( "ul.res" ).slideToggle( 300, function() {
											 // Animation complete.
											  });
											 });
										</script>
						<!-- /script-for-menu -->
		
				 </div>
				<div class="clearfix"> </div>
			</div>			
	    </div>
   </div>
</div>
<!--header end here-->
<!--banner end here-->
<!--contact start here-->
<div class="contact">
	<div class="container">
		<div class="contact-main">	
			<div class="contact-top">
				<h2>Tabungan Siswa </h2> 
				<p>Tahun Ajaran <?php echo $tahunajaran; ?></p>
			</div>		 			 
			
			<div>
			
			</div>
			<div class="contact-block1">
			 	<div class="col-md-3 contact-address">
			 	 <?php
					$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_SESSION[idsiswa]'");
					$siswa=mysql_fetch_array($carisiswa);
					if($siswa[foto]!=""){
						$siswa[foto]=$siswa[foto];
					} else {
						$siswa[foto]="noimage.jpg";
					}
				 ?>
				 <center><img src="upload/foto_siswa/<?php echo $siswa[foto]; ?>" class="img-responsive" width="60%"></center>
				 
			 	</div>
			 	<div class="col-md-9 contact-block-left">
				 
				  


			<?php 
			 $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$tahunajaran' 
							AND siswa.id_siswa='$_SESSION[idsiswa]'");
    $r    = mysql_fetch_array($edit);
	
	 
	?>

 

         
            
                    
    	 
		  
		  
	 

	  <table class="table table-striped table-bordered"> 
			<tr>
				<th>No</th>
				<th>Tgl Transaksi</th>
				<th>Jenis Transaksi</th>
				<th>Jumlah </th>
				<th>Saldo Akhir</th> 
			</tr>
			
			<?php 
			
			 
			$caritabungan = mysql_query("SELECT * FROM tabungan 
		WHERE tahunajaran='$r[tahunajaran]' 
		AND id_siswa='$_SESSION[idsiswa]'
		AND id_kelas='$r[id_kelas]' ");
		
		
			$no=1;
			while($t = mysql_fetch_array($caritabungan)) {
				 
				  
					if($t[jenis_transaksi]=="debet") {
						$debet=$debet+$t[jumlah];
					} else if($t[jenis_transaksi]=="kredit") {
						$kredit=$kredit+$t[jumlah];
					}
					
				  
				$saldo = $debet-$kredit;
		
				echo "<tr>
						<td align=center>$no</td>
						<td align=center>$t[tgl_transaksi]</td>
						<td align=center>$t[jenis_transaksi]</td>
						<td align=center>".format_rupiah($t[jumlah])."</td>
						<td align=center>".format_rupiah($saldo)."</td> </tr>"; 
				$no++;
				
			}
			
			
			?>
			
		 </table>
		 
	 
	
<br/> <br/>  
	
	
	</div>
			 














				 
			 	</div>
			 	<div class="clearfix"> </div>
			 </div>			 	
				<!-- AIzaSyAQ1xRdc7rVHJ54He94xJb-Enc4B-4PT-E  -->
	 </div>
	</div>
</div>
<!--contact end here-->

<?php } else {
	$_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
	header('location:index.php');
} ?>

<?php include "footersiswa.php"; ?>