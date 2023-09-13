 

<?php
$aksi="modul/mod_kontakkami/aksi_kontakkami.php";
switch($_GET[act]){
 
  default:
     
	  	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kontak Kami </h1>
                        <p class="title-description"> Baca, Jawab Kontak Kami</p>
                    </div>
                    <section class="section">
                      
	';
	
	
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
		 
	   echo "
		  <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
				 
		 
		 <div class='table-responsive'>  ";
				
		 
    echo " 
		  <table id='sample-table-1' class='table table-hovered table-striped'>
			<thead>
			<tr>
				<th width=80>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Tanggal</th>
				<th width=150>Aksi</th>
			</tr></thead>";
 

    $tampil=mysql_query("SELECT * FROM kontakkami ORDER BY id_kontak DESC "); 
	 
	 
	
    $no= 1;   
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td>
                <td>$r[nama]</td>
				<td>$r[email]</td>
                <td>$r[subjek]</td>
                <td>$tgl</td>
                <td align='center'>";  
				
				if($r[jawaban]=="")
				{
					echo "<a href='?module=kontakkami&act=balasemail&id=$r[id_kontak]' title='Belum Dijawab' class='btn btn-sm btn-warning btn-flat' ></i> Jawab</a> ";
				} else 
				{
					echo "<a href='?module=kontakkami&act=balasemail&id=$r[id_kontak]' title='Sudah Dijawab' class='btn btn-sm btn-success btn-flat' >Lihat</a> ";
				}
				
				?> 
				<form method="POST" action="<?php echo $aksi.'?module=kontakkami&act=hapus&id='.$r[id_kontak]; ?>"  accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger btn-flat" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Kontak Kami" data-message="Apakah Anda Yakin Akan Menghapus Data Kontak Kami <?php echo $r[email];?> ?">
        			Hapus
    				</button>
				</form>

			 <?php		
			 
		echo "</td></tr>";
               
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
	
	
	
	
	
	
	
	

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM kontakkami WHERE id_kontak='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

	 
	   	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kontak Kami </h1>
                        <p class="title-description"> Balas Pesan Kontak Kami</p>
                    </div>
                    <section class="section">
                     
					<div class="card">
					<div class="card-block">
						<div class="card-title-block"> 
						</div>
						<section class="example"> ';
	
	
    echo " 
		
          <form method=POST action='?module=kontakkami&act=kirimemail' class='form-horizontal' parsley-validate >";
          ?>
		  
		  <input type='hidden' name='id' value='<?php echo $r[id_kontak]; ?>'>
		   <div class='form-group row' >
				<label class='col-sm-3 control-label no-padding-right' > Kepada </label>
				<div class='col-sm-4'>
					   <input type=text name='email' class='form-control'  value='<?php echo $r[email]; ?>'>  
				</div>
			</div>
			
			 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Subjek </label>
				<div class='col-sm-4'>
					   <input type=text name='subjek' class='form-control'  value='<?php echo $r[subjek]; ?>'>  
				</div>
			</div>
			
			<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Pesan </label>
				<div class='col-sm-7'>
					   <textarea name='pesan' class='form-control'><?php if($r[jawaban]=="") { echo "<br><br><br><br>
----------------------------------------------------------------------------------------------------------------------
  ".$r[pesan]; } else { echo $r[jawaban]; } ?>
					   
					   
					   </textarea>					   
				</div>
			</div>
			
           
		    <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' >  </label>
				<div class='col-sm-4'>
					     <input type=submit value=Kirim class="btn btn-success btn-flat">
						 <input type=button value=Batal onclick=self.history.back() class="btn btn-warning btn-flat"> 
						 
                            
				</div>
			</div>	
			
			</form>
 
  </section>
	</div>
    </section>
	</article>
		
	<?php		
     break;
    
	
	
	
	
	
  case "kirimemail":
   
   include "../../../config/koneksi.php";
	session_start(); error_reporting(0);
	
	mysql_query("UPDATE kontakkami SET jawaban='$_POST[pesan]' WHERE id_kontak='$_POST[id]'");
	
	
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: email@yahoo.com");
    $_SESSION['sukses']="Email berhasil dikirim";
	echo "<meta http-equiv='refresh' content='0; url=dashboard.php?module=kontakkami'>";
	 
	    
    break;  
}
?>
