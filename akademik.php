﻿
<?php include "header.php"; ?>


<!--header strat here-->
<div class="banner1 agileits">
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
			       <h1 style="font-size:2.1em"><a href="index.php"><?php echo $namaponpes; ?></a></h1>
			    </div>
				 <div class="top-nav">
				 	 <span class="menu"> <img src="assets/images/icon.png" alt=""></span>	
				     <nav class="cl-effect-21" id="cl-effect-21">   		       											
							<ul class="res">
								<li><a href="tentangkami.php">Tentang Kami </a></li>
								<li><a href="akademik.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Sistem Pengajaran </a></li>
								<li><a href="berita.php">Berita & Informasi</a></li> 
								<li><a href="kontakkami.php">Kontak </a></li>
								<li><a href="login.php">Login Admin </a></li>
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



<!--tab start here-->
<script type="text/javascript" src="assets/js/colorfulTab.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        
        $("#colorful").colorfulTab();    
        
        $("#colorful-elliptic").colorfulTab({
            theme: "elliptic"
        }); 
       
       $("#colorful-flatline").colorfulTab({
            theme: "flatline"
        });    
        
        $("#colorful-background-image").colorfulTab({
            theme: "flatline",
            backgroundImage: "true",
            overlayColor: "#002F68",
            overlayOpacity: "0.8"
        });   
    
    });
  </script>
<!--tab start here-->
<!--about start here-->
<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="about-top">
				<h2>Pondok Pesantren Al Masyhuriyah</h2>
			</div>
		 </div>
	</div>
</div>
<!--about end here-->

<div class="about-layer1">
<div class="container">
		 
			<div class="col-lg-6">
			<h3 style="padding:5px 0px;">Sekilas Jadwal Pesantren</h3>
			<table class="table table-bordered table-striped">
				<tr><th width=200>Jam</th><th>Kegiatan</th></tr>
				<tr><td align="center">04.00-05.30</td><td>Tadarus Al Quran</td></tr>
				<tr><td align="center">06.00-14.00</td><td>Aktivitas Sekolah</td></tr> 
				<tr><td align="center">15.00-17.00</td><td>Materi Madrasah</td></tr> 
				<tr><td align="center">18.00-19.00</td><td>Materi Madrasah</td></tr> 
				<tr><td align="center">19.00-21.00</td><td>Materi Madrasah</td></tr> 
			</table>
			</div>
			<div class="col-lg-6">
			<h3 style="padding:5px 0px;">Kalender Akademik TA <?php echo $tahunajaran; ?></h3>
			<table class="table table-bordered table-striped">
				<tr><th width=200>Tanggal</th><th>Kegiatan</th></tr>
				<?php
				  $cari_kal = mysql_query("SELECT * FROM kalenderakademik 
							WHERE tahunajaran='$tahunajaran' 
							order by tgl_mulai ASC");
				  while($kal=mysql_fetch_array($cari_kal)){
						if($kal[tgl_mulai]==$kal[tgl_selesai]){
							echo "<tr><td align=center>".tgl_indo($kal[tgl_mulai])."</td><td>$kal[nama_kegiatan]</td></tr>";
						}  else {
							echo "<tr><td align=center>".tgl_indo($kal[tgl_mulai])." <br/>s/d <br/>".tgl_indo($kal[tgl_selesai])."</td><td>$kal[nama_kegiatan]</td></tr>";
						}
				  }
				 
				
				?>
			</table>
			</div>
 </div>
</div>

              <!-- end Bottom to top -->
		</div>
	</div>
</div>	
<!--team end here-->

<?php include "footer.php"; ?>