<?php
session_start(); error_reporting(0);

switch($_GET[act]){

  default:
  
    $edit=mysql_query("SELECT * FROM admins WHERE id_admin='$_SESSION[iduseradmin]'");
    $r=mysql_fetch_array($edit);
	?>
	
	 <nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li> 
                    <li><span> Edit Profil</span></li>       
                     </ul>

            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Edit Profil</span></h2> 
		
		<?php
		if($_SESSION[gagal] !="") {
			echo "<div class='alert alert-danger' role='alert'>
				<button class='close' data-dismiss='alert' type='button'>
				<span aria-hidden='true'>×</span>
				<span class='sr-only'>Close</span>
				</button>";
			echo $_SESSION[gagal];
			$_SESSION[gagal]="";   
			echo "</div>";
	
		} else if($_SESSION[sukses] !="") {
			echo "<div class='alert alert-success' role='alert'>
				<button class='close' data-dismiss='alert' type='button'>
				<span aria-hidden='true'>×</span>
				<span class='sr-only'>Close</span>
				</button>";
			echo $_SESSION[sukses];
			$_SESSION[sukses]="";   
			echo "</div>";
		}	 
		
		?>
		
	 
	 
	 
	  <form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./aksi.php?module=editakun&act=update' role="form" parsley-validate>
	 <input type=hidden name=idadmin value='<?php echo $r[id_admin]; ?>'>

	 
	 <div class="col-lg-6">	
	 
	 <h5>DATA ADMIN</h5>
	 
	
	  
	
	  <div class="form-group" >
		<label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap</label>
		<div class="col-sm-8">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $r[nama_lengkap];?>">
		</div>
	</div>
	
	<div class='form-group'>
		<label class='col-sm-4 control-label' > Jenis Kelamin </label>
		<div class='col-sm-8'>
				<select name="jk"  class='form-control required'>
					<option value="">-- Pilih Jenis Kelamin --</option>
					<option value="Laki-laki" <?php if ($r[jenis_kelamin]=="Laki-laki") { echo "selected=selected"; } else { echo ""; } ?> >Laki-laki</option>
					<option value="Perempuan" <?php if ($r[jenis_kelamin]=="Perempuan") { echo "selected=selected"; } else { echo ""; } ?>>Perempuan</option>
				</select>
		</div>
	</div>
	
	<div class="form-group" >
		<label for="nama_lengkap" class="col-sm-4 control-label">Alamat</label>
		<div class="col-sm-8">
		<input type="text" name="alamat" class="form-control" id="nama_lengkap" placeholder="Alamat" value="<?php echo $r[alamat];?>">
		</div>
	</div>
	
	  <div class="form-group" >
		<label for="notelp" class="col-sm-4 control-label">Nomor Telpon</label>
		<div class="col-sm-8">
		<input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telpon" value="<?php echo $r[notelp];?>">
		</div>
	</div>
	
	
	<div class="form-group" >
		<label for="email" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-8">
		<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $r[email];?>">
		</div>
	</div>
	
	
	<div class='form-group'>
		<label class='col-sm-4 control-label' >  </label>
		<div class='col-sm-8'>
				 
		</div>
	</div>
	
		 <h5>DATA AKUN LOGIN</h5>
		 
		    <div class="form-group" >
		<label for="username" class="col-sm-4 control-label">Username</label>
		<div class="col-sm-8">
		<input type="text" name="username" class="form-control required" id="username" placeholder="Username" value="<?php echo $r[username];?>" disabled=disabled>
		</div>
	</div>
	
	
	<div class="form-group" >
		<label for="password" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-8">
		<input type="text" name="password" class="form-control " id="password" placeholder="Password"> 
		<input type="hidden" name="passwordlama" class="form-control required" id="password" placeholder="Password" value="<?php echo $r[password];?>">
		*kosongkan jika tidak ingin mengganti password
		</div>
	</div>
	
	<div class='form-group'>
		<label class='col-sm-4 control-label' >  </label>
		<div class='col-sm-8'>
				 
		</div>
	</div>
	
	
	 
	<div class='form-group'>
		<label class='col-sm-4 control-label' >  </label>
		<div class='col-sm-8'>
				 
		</div>
	</div>
	
	<div class="form-group">
    	<div class="col-sm-offset-4 col-sm-8">
      		<input type="submit" class="btn btn-success" value="Update"> 
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()'>
    	</div>
  	</div>
	
	</div>
	<div class="col-lg-6">	
	<div class='form-group'>
		<label class='col-sm-4 control-label' > Foto</label>
		<div class='col-sm-8'>
		<?php
		if($r[foto]!="")
		{
			echo "<img src='../foto/".$r[foto]."' class='img-responsive' width=150><br/>";
		} else 
		{
			echo "<img src='../foto/noimage.jpg' class='img-responsive' width=150><br/>";
		}
		?>
				<input type=hidden name='fotolama'  value="<?php echo $r[foto]; ?>">
				 <input type="file" name='fupload' class='' > 
		</div>
	</div>
	
	</div>
		</form>
		
		</div>
            </div>
            </div>
     </div> 
		

		  
	<?php	
    break;
  
  
}

?>
