
<?php include "header.php"; ?>
<?php

	 if($_POST[sendLogin]=="Login"){
		 //cek login
		  
		  
			function antiinjection($data){
			  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
			  return $filter_sql;
			}

			$nis = antiinjection($_POST[nis]);
			$pass     = antiinjection(md5($_POST[password]));

			$login=mysql_query("SELECT * FROM siswa WHERE nis='$nis' AND password='$pass'");
			$ketemu=mysql_num_rows($login);
			$r=mysql_fetch_array($login);
			 
			// Apabila username dan password ditemukan
			if ($ketemu > 0){
			  
			  $_SESSION["idsiswa"]     = $r["id_siswa"]; 
			  
			  header('location:profilsiswa.php');
			}
			else{
			 $_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
			 header('location:index.php');

			}
				 }

?>
 
<div class="banner agileits">
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
								<li><a href="akademik.php">Sistem Pengajaran </a></li>
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
			<div class="banner-main">
				 <section class="slider">
					 <div class="flexslider">
						<ul class="slides">
						  <li>
						  	<div class="banner-main">			  
								   <h3>MENCETAK ILMUWAN YANG JUJUR DAN SANTUN</h3>
						            <p> </p>
								<div class="clearfix"> </div>
							</div>
						  </li>
						  <li>
						  	<div class="banner-main">			  
								   <h3>KESEDERHANAAN INDUK DARI KEBAJIKAN PERILAKU DUNIAWI DAN UKHRAWI</h3>
						           <p> </p>
								<div class="clearfix"> </div>
							</div>
						  </li>
						  <li>
						  	<div class="banner-main">			  
								   <h3>DILATIH UNTUK MENJADI SOSOK INDIVIDU YANG RAJIN BELAJAR DAN PEKERJA KERAS</h3>
						           <p> </p>
								<div class="clearfix"> </div>
							</div>
						  </li>		
						  <li>
						  	<div class="banner-main">			  
								   <h3>TERUS MENUNTUT ILMU SEPANJANG HAYAT DI KANDUNG BADAN</h3>
						           <p> </p>
								<div class="clearfix"> </div>
							</div>
						  </li>			  
					    </ul>
					 </div>
					 <div class="clearfix"> </div>
            </section>	
		 </div>
	 </div>
   </div>
</div>
<!--header end here-->
<!-- FlexSlider -->
				  <script defer src="assets/js/jquery.flexslider.js"></script>
				  <script type="text/javascript">
					$(function(){				 
					});
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
<!-- FlexSlider -->
<!--banner end here-->

<!--we do start here-->
<div class="we-do" style="padding-top:2em; padding-bottom: 2em;">
	<div class="container">
		<div class="we-do-main">
			   <h2>Sejarah Pondok Pesantren Al Masyhuriyah</h2>
			   <p align= "justify">Pondok Pesantren Al Masyhuriyah Putra dan Putri,  merupakan pondok pesantren yang memiliki proses pembelajaran dengan melakukan aktivitas keagamaan yang cukup hanyak diantaranya menghafal Al- Qur'an dan mempelajari kitab-kitab kuning dan aktivitas ibadah lainya. Sehingga pembiasaan tersebut jika dilakukan secara terus menerus dapat membentuk kepribadian yang sesuai dengan tujuan pendidikan pesantren sehingga menciptakan dan mengembangkan keperibadian muslim yuitu kepribadian yang bertaqwa dan yang beriman kepada Allah SWT berakhlak mulia, bermanfaat bagi masyarakat, mandiri dan teguh dalam kepribadian.</p>
			   
			   <a href="tentangkami.php">Lebih Lengkap Tentang Kami</a>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--we do end here-->


 

<!--pop-up-box-->
	  <script type="text/javascript" src="assets/js/modernizr.custom.53451.js"></script>  
	<link href="assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--pop-up-box-->
 
 
  <div class="contact" style="background-color:#000">
	<div class="container">
		<div class="contact-m
			<div class="contact-block1">
			 	<div class="col-md-6 contact-address">
			 	<h3>Login Orangtua / Wali Santri</h3>
			 	<p>Sistem Informasi Akademik untuk informasi kalender akademik, jadwal madrasah diniyyah, informasi keuangan, dan nilai semester. </p>
			 	 
		 	 			 
			 	</div>
			 	<div class="col-md-6 contact-block-left">
					<?php
						if($_SESSION[gagal]!=""){
							echo $_SESSION[gagal];
							$_SESSION[gagal]="";
							
						}
					?>
				 	<form action="index.php" method="post">
				 		<input type="text" placeholder="Nomor Induk Santri" required="" name="nis">
	                    <input type="password" class="email" placeholder="Password" name="password"> 
	                    <input type="submit" name="sendLogin" value="Login">
				 	</form>
			 	</div>
			 	<div class="clearfix"> </div>
			 </div>			 			 
			 
		</div>
	</div>
</div>
<!--contact end here-->


 <!--event start here-->
<div class="events">
	<div class="container">
		<div class="events-main">
			<div class="events-top">
				<h3>Berita dan Informasi</h3>
			</div>
			
			<?php
				
				$tampil=mysql_query("SELECT * FROM berita  ORDER BY id_berita DESC limit 0, 3");
				  
				while($r=mysql_fetch_array($tampil)){
					
					$tgl = substr($r[tanggal],8,2);
					$bulan = substr($r[tanggal],5,2);
					?>
					
					
						<div class="events-grid">
							<div class="col-md-2 event-month wthree">
								<h3><?php echo $tgl; ?></h3>
								<h4><?php echo getBulan2($bulan); ?></h4>
							</div>
							<div class="col-md-6 event-text">
								<h4><?php echo $r[judul]; ?></h4>
								<p><?php echo substr(strip_tags($r[isi_berita]),0,200); ?> ... </p>
								<a href="detilberita.php?id=<?php echo $r[id_berita]; ?>">Selengkapnya</a>
								<p> </p>
							</div>
							<div class="col-md-4 event-img">
								<div class="item item-type-move">
									 
									<div class="item-img">
											<img src="upload/foto_berita/<?php echo $r[gambar]; ?>" class="img-responsive" alt="" style="padding:5px; border:solid 1px #ccc; margin:0px 10px;">
									</div>
							</div>

							</div>
						   <div class="clearfix"> </div>
						</div>
					
		
					
					<?php
				}
				 
			?>
			

		
		</div>
	</div>
</div>
<!--event end here-->

<script src="assets/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
        speed: 300,
        namespace: "callbacks",
      });
    });
  </script>

 


<?php include "footer.php"; ?>