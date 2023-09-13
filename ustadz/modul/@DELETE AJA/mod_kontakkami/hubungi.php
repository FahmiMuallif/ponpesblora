
<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>

	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=home">Home</a>
		</li>
		<li class="active">Kelola Pesan<li> 
	</ul><!-- /.breadcrumb -->

	
</div>


<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">

<?php
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Hubungi Kami
  default:
    echo "<div class='box box-primary'>
		 <div class='box-header ui-sortable-handle' style='cursor: move;'>
			<i class='fa fa-envelope'></i>
			<h3 class='box-title'>Pesan Masuk</h3>
			 
		</div>

		<div class='box-body'> ";
		
	
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
		 
    echo " <div class='table-responsive'>
		  <table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
          <tr><th width=80>No</th><th>Nama</th><th>Email</th><th>Subjek</th><th>Tanggal</th><th width=170>Aksi</th></tr></thead>";
 

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC ");

    $no = 1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td>";  
				
				if($r[jawaban]=="")
				{
					echo "<a href='?module=hubungi&act=balasemail&id=$r[id_hubungi]' title='Belum Dijawab' class='btn btn-sm btn-warning btn-flat' ><i class='fa fa-send'></i> Jawab</a> ";
				} else 
				{
					echo "<a href='?module=hubungi&act=balasemail&id=$r[id_hubungi]' title='Sudah Dijawab' class='btn btn-sm btn-success btn-flat' ><i class='fa fa-eye'></i> Lihat</a> ";
				}
				
				?> 
				<form method="POST" action="<?php echo $aksi.'?module=hubungi&act=hapus&id='.$r[id_hubungi]; ?>"  accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger btn-flat" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Kontak Kami" data-message="Apakah Anda Yakin Akan Menghapus Data Kontak Kami <?php echo $r[email];?> ?">
        			<i class='fa fa-trash'></i> Hapus
    				</button>
				</form>

			 <?php		
			 
		echo "</td></tr>";
               
    $no++;
    }
    echo "</table></div>
	
	</div> <!-- end box body -->
	<div class='box-footer clearfix no-border'>
	 
	
	</div> 
</div> <!-- end-box-->

	</div>
	</div>
	</div>
	</section>
	";
     
    break;
	
	
	
	
	
	
	
	

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

    echo "<div class='box box-primary'>
		 <div class='box-header ui-sortable-handle' style='cursor: move;'>
			<i class='fa fa-envelope'></i>
			<h3 class='box-title'>Jawab Pesan</h3>
			 
		</div>

		<div class='box-body'>
		
		
          <form method=POST action='?module=hubungi&act=kirimemail' class='form-horizontal' parsley-validate >";
          ?>
		  
		  <input type='hidden' name='id' value='<?php echo $r[id_hubungi]; ?>'>
		   <div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' > Kepada </label>
				<div class='col-sm-4'>
					   <input type=text name='email' class='form-control'  value='<?php echo $r[email]; ?>'>  
				</div>
			</div>
			
			 <div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' > Subjek </label>
				<div class='col-sm-4'>
					   <input type=text name='subjek' class='form-control'  value='<?php echo $r[subjek]; ?>'>  
				</div>
			</div>
			
			<div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' > Pesan </label>
				<div class='col-sm-7'>
					   <textarea name='pesan' class='form-control'><?php if($r[jawaban]=="") { echo "<br><br><br><br>
----------------------------------------------------------------------------------------------------------------------
  ".$r[pesan]; } else { echo $r[jawaban]; } ?>
					   
					   
					   </textarea>					   
				</div>
			</div>
			
           
		    <div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' >  </label>
				<div class='col-sm-4'>
					     
						 <input type=button value=Batal onclick=self.history.back() class="btn btn-warning btn-flat"> 
						 <input type=submit value=Kirim class="btn btn-success btn-flat">
                            
				</div>
			</div>	
			
			</form>

</div> <!-- end box body -->
	<div class='box-footer clearfix no-border'>
	 
	
	</div> 
</div> <!-- end-box-->

	</div>
	</div>
	</div>
	</section>			
	<?php		
     break;
    
	
	
	
	
	
  case "kirimemail":
   
   include "../../../config/koneksi.php";
	session_start(); error_reporting(0);
	
	mysql_query("UPDATE hubungi SET jawaban='$_POST[pesan]' WHERE id_hubungi='$_POST[id]'");
	
	
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: email@artfurniture.com");
    $_SESSION['sukses']="Email berhasil dikirim";
	echo "<meta http-equiv='refresh' content='0; url=media.php?module=hubungi'>";
	 
	    
    break;  
}
?>
