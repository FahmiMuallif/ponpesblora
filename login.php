<?php 
session_start();
error_reporting(0);

include "config/koneksi.php";

 $cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
  while($r=mysql_fetch_array($cari)){
	  $namaaplikasi = $r['nama_aplikasi'];
		$namaponpes = $r['nama_ponpes'];
		$alamat = $r['alamat']; 
		$notelp = $r['notelp']; 	  
		$logo = $r['logo'];
  }
 
 
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $namaponpes; ?></title>
		 <link rel="shortcut icon" href="upload/<?php echo $logo; ?>">
		
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="admin/assets/css/vendor.css">
		<link href="admin/assets/plugins/parsley/validation.css" rel="stylesheet" type="text/css">
		<link href="admin/assets/css/app-green.css" rel="stylesheet" type="text/css">
       
 
	<style>
	#bg {
	  position: fixed; 
	  top: 0; 
	  left: 0; 
		
	  /* Preserve aspet ratio */
	  min-width: 100%;
	  min-height: 100%;
	}
	
	.form-control::-moz-placeholder {
			font-style: normal !important;
			color: #d7dde4;
			 
		}
		
		.input-group .form-control {
			padding-left: 10px;
		}
	</style>
	   
    </head>

	
    <body >
	<img src="admin/haikal1.jpg" id="bg" alt="">
        <div>
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                             
							<img src="upload/<?php echo $logo; ?>" width="100px" align="left">  <?php echo strtoupper($namaaplikasi); ?><br/><small><?php echo strtoupper($namaponpes); ?></small></h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">LOGIN TO CONTINUE</p>
			
			<?php	
		    if($_SESSION['gagal']!="")
			{
				echo '<div class="alert alert-danger fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  '.$_SESSION['gagal'].'
				</div>';
				$_SESSION['gagal']="";
			}
			?>
			
                        <form id="login-form" action="cek_login.php" method="POST" parsley-validate>
                            <div class="form-group"> <label for="username">Username</label> <input type="text" class="form-control underlined required" name="username" id="username" placeholder="Username" > </div>
                            <div class="form-group"> <label for="password">Password</label> <input type="password" class="form-control underlined required" name="password" id="password" placeholder="Password" > </div>
                             
                            <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Login</button> </div>
                             
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                     
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
     
        <script src="admin/assets/js/vendor.js"></script>
        <script src="admin/assets/js/app.js"></script>
		
	
	<script src="admin/assets/plugins/parsley/parsley.min.js"></script>
	<script src="admin/assets/plugins/parsley/messages.id.js"></script>

	<script>
        
	 
	
		$(document).ready(function(){
			 $(".alert").delay(7000).addClass("in").fadeOut("slow");
		});
	
	</script>
	
	
    </body>

</html>



 