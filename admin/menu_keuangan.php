 <aside class="sidebar">
				
	<div class="sidebar-container">
		<div class="sidebar-header">
			<div class="brand" style="line-height: 40px;">
			   <center><img src="../upload/<?php echo $logo; ?>" width="80px" style="padding-top:10px"> </center><?php echo strtoupper($namaaplikasi); ?></div>
		</div>
		
		<nav class="menu">
			<ul class="nav metismenu" id="sidebar-menu">
				<li <?php if($_GET[module]=="home") { echo "class=active";}   ?>>
					<a href="dashboard.php?module=home"> <i class="fa fa-home"></i> Dashboard </a>
				</li>
				 
				
			 
				
				
				 
				
				 
				
				 <li <?php if($_GET[module]=="biayapendidikan" 
							or $_GET[module]=="tabungan"
							or $_GET[module]=="pembayaransiswa"   ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-table"></i> Keuangan <i class="fa arrow"></i> </a>
					<ul>
						<li <?php if($_GET[module]=="biayapendidikan") { echo "class='active'";}   ?>> <a href="dashboard.php?module=biayapendidikan">
								Komponen Biaya 
							</a> </li>
						<li <?php if($_GET[module]=="pembayaransiswa") { echo "class='active'";}   ?>> <a href="dashboard.php?module=pembayaransiswa">
								Pembayaran Siswa
							</a> </li>
						
						<li <?php if($_GET[module]=="tabungan") { echo "class='active'";}   ?>> <a href="dashboard.php?module=tabungan">
								Tabungan Siswa
							</a> </li>
							
							
					</ul>
				</li>  
				
				 
				
				<li <?php if($_GET[module]=="lapnilai" 
							or $_GET[module]=="lappembayaran" 
							or $_GET[module]=="lappelanggaran"   ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-file"></i> Laporan <i class="fa arrow"></i> </a>
					<ul>
						 
							
							 <li <?php if($_GET[module]=="lappembayaran") { echo "class='active'";}   ?>> <a href="dashboard.php?module=lappembayaran">
								Lap. Pembayaran
							</a> </li>  
							
						 
						
					</ul>
				</li>
				 
			</ul>
		</nav>
	</div>
   
</aside>
				