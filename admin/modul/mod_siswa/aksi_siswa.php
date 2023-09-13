<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if ($module=='siswa' AND $act=='hapus_siswa'){
 $hapus = mysql_query("DELETE FROM siswa WHERE id_siswa='$_GET[id]'");
 
   if($hapus){
	  $_SESSION[sukses]="Data siswa berhasil dihapus";
  }else{
		  $_SESSION[gagal]="Data siswa gagal dihapus";
  }
  
  
  header('location:../../dashboard.php?module=siswa');
}

 
if ($module=='siswa' AND $act=='input'){

  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
  //validasi NIS -- nis tidak boleh ada yang sama
  $carinis=mysql_query("SELECT * FROM siswa WHERE nis='$_POST[nis]'");
  $jumlahnis=mysql_num_rows($carinis);
  if($jumlahnis>0){
	   $_SESSION[gagal]="Gagal menyimpan. NIS <b>".$_POST[nis]."</b> telah digunakan!"; 
		   header('location:../../dashboard.php?module=siswa&act=tambahsiswa');
		   break;
  }
  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
	  
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  
  
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module=siswa&act=tambahsiswa');
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=siswaq&act=tambahsiswa');
		   break;
		}
		
		
     
       move_uploaded_file($lokasi_file,"../../../upload/foto_siswa/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
	  
	$pass=md5($_POST[pass]);
    $simpan = mysql_query("INSERT INTO siswa(nis, 
							nama_lengkap, 
							jenis_kelamin, 
							tempat_lahir, 
							tgl_lahir, 
							password, 
							nama_bapak, 
							pekerjaan_bapak, 
							nama_ibu, 
							pekerjaan_ibu,
							alamat_lengkap,
							notelp_ortu, 
							sekolah_asal,
							madin_asal,
							ponpes_asal, 
							foto,
							tgl_masuk,
							status)
                             VALUES('$_POST[nis]',
							 '$_POST[nama_lengkap]',
							 '$_POST[jk]',
							 '$_POST[tempatlahir]',
							 '$_POST[tgllahir]', 
							 '$pass',
							'$_POST[namabapak]',
							'$_POST[pekerjaanbapak]',
							'$_POST[namaibu]',
							'$_POST[pekerjaanibu]',
							'$_POST[alamat]',
							'$_POST[notelp]',
							'$_POST[sekolah_asal]',
							'$_POST[madin_asal]',
							'$_POST[ponpes_asal]',
							'$nama_file_unik',
							'$_POST[tglmasuk]',
							'$_POST[status]')");
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil ditambahkan";
  }else{
		  $_SESSION[gagal]="Data siswa gagal ditambahkan";
  }
     header('location:../../dashboard.php?module='.$module);
  }


  
  
  
if ($module=='siswa' AND $act=='updatesiswa'){
	
	
	
	if($_POST[passbaru]==""){
		$pass = $_POST[passlama];
	} else {
		$pass = md5($_POST[passbaru]);
	}
	
	
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
	//validasi NIS -- nis tidak boleh ada yang sama
	  $carinis=mysql_query("SELECT * FROM siswa WHERE nis='$_POST[nisbaru]' and id_siswa<>'$_POST[idsiswa]'");
	  $jumlahnis=mysql_num_rows($carinis);
	  if($jumlahnis>0){			   

		    $_SESSION[gagal]="Gagal menyimpan. NIS <b>".$_POST[nisbaru]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
			break;
	  }
	  
   

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
	  
	  $ukuran_file = $_FILES["fupload"]["size"]; 
	  $tipe_file = $_FILES["fupload"]["type"];
	  if($ukuran_file >= (1024*1000)){
		   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
		   header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
		   break;
	  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=siswa&act=editsiswa&id='.$_POST[idsiswa]);
		   break;
		}
		
     
	 if($_POST[fotolama]!="") {
			unlink("../../upload/foto_siswa/$_POST[fotolama]"); 
	 }
       move_uploaded_file($lokasi_file,"../../../upload/foto_siswa/$nama_file_unik");
	   $nama_file_unik =  $nama_file_unik;
  } else {
	   $nama_file_unik = "";
  }
  
  
    $simpan = mysql_query("UPDATE siswa SET 
									nis      = '$_POST[nisbaru]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
								 jenis_kelamin        = '$_POST[jk]',
								 tempat_lahir        = '$_POST[tempatlahir]',
								 tgl_lahir        = '$_POST[tgllahir]', 
                                 password     = '$pass', 
								 nama_bapak     = '$_POST[namabapak]', 
								 pekerjaan_bapak    = '$_POST[pekerjaanbapak]', 
								 nama_ibu     = '$_POST[namaibu]', 
								 pekerjaan_ibu     = '$_POST[pekerjaanibu]', 
								 alamat_lengkap     = '$_POST[alamat]',
								 notelp_ortu     = '$_POST[notelp]',
								 sekolah_asal     = '$_POST[sekolah_asal]',
								 madin_asal     = '$_POST[madin_asal]',
								 ponpes_asal     = '$_POST[ponpes_asal]',
								 foto 			= '$nama_file_unik',
								 tgl_masuk		='$_POST[tglmasuk]', 
								 status			= '$_POST[status]' 
								WHERE id_siswa     = '$_POST[idsiswa]'");
	
  if($simpan){
	  $_SESSION[sukses]="Data siswa berhasil diupdate";
  }else{
	  $_SESSION[gagal]="Data siswa gagal diupdate";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}





  
if ($module=='siswa' AND $act=='ubahstatus'){
	
	$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
	$siswa=mysql_fetch_array($carisiswa);
	$statusLama = $siswa[status];
	
	if($statusLama=="aktif"){
		$statusBaru = "keluar";
	} else if($statusLama=="keluar"){
		$statusBaru = "lulus";
	} else if($statusLama=="lulus"){
		$statusBaru = "aktif";
	}
	
	 $simpan = mysql_query("UPDATE siswa SET  
								 status			= '$statusBaru' 
								WHERE id_siswa     = '$_GET[id]'");
								
  
	
  if($simpan){
	  $_SESSION[sukses]="Status siswa berhasil diubah";
  }else{
	  $_SESSION[gagal]="Status siswa gagal diubah";
  }
  
  
 header('location:../../dashboard.php?module='.$module);
}







else if($module=='siswa' AND $act=='export'){
	
	/** Include PHPExcel */
	require_once '../../../config/PHPExcel.php';

	$conn = new PDO("mysql:host=localhost; dbname=tabunganpondok2; charset=utf8", "root", "root"); 

	// Create new PHPExcel object
	//echo date('H:i:s') , " Create new PHPExcel object" , EOL;
	$objPHPExcel = new PHPExcel();	
	
	$objPHPExcel->getProperties()->setCreator("")
								 ->setLastModifiedBy("")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");
								 

	//find row and column size in DB
	try
	{		
		$query = $conn->query('SELECT * FROM siswa order by id_siswa asc');			
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	$rowSize = $query->rowCount();
	$columnSize = $query->columnCount();
	$result = $query->fetchAll();

	// Add column names to spreadsheet
	// column names must be updated here as per table	
	// id_siswa 	nis 	status 	tgl_masuk 	nama_lengkap 	jenis_kelamin 	tempat_lahir 	tgl_lahir 	password 	foto 	alamat_lengkap  	nama_bapak 	pekerjaan_bapak 	nama_ibu 	pekerjaan_ibu 	notelp_ortu 	sekolah_asal 	madin_asal 	ponpes_asal 
	
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', 'id_siswa')
	            ->setCellValue('B1', 'nis')
	            ->setCellValue('C1', 'status')
	            ->setCellValue('D1', 'tgl_masuk')
				->setCellValue('E1', 'nama_lengkap')
				->setCellValue('F1', 'jenis_kelamin')
				->setCellValue('G1', 'tempat_lahir')
				->setCellValue('H1', 'tgl_lahir')
				->setCellValue('I1', 'password')
				->setCellValue('J1', 'foto')
				->setCellValue('K1', 'alamat_lengkap')
				->setCellValue('L1', 'nama_bapak')
				->setCellValue('M1', 'pekerjaan_bapak')
				->setCellValue('N1', 'nama_ibu')
				->setCellValue('O1', 'pekerjaan_ibu')
				->setCellValue('P1', 'notelp_ortu')
				->setCellValue('Q1', 'sekolah_asal')
				->setCellValue('R1', 'madin_asal')
				->setCellValue('S1', 'ponpes_asal') ;
	
	$objPHPExcel->getActiveSheet()->setTitle('datasiswa');


	//column names in bold text
	$row = $objPHPExcel->getActiveSheet()->getRowIterator(1)->current();
	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false);
	foreach ($cellIterator as $cell)
	   $cell->getStyle()->getFont()->setBold(true);

	// column names must be updated here as per table
	$columns_array = array('id_siswa', 'nis', 'status', 'tgl_masuk', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'password', 'foto', 'alamat_lengkap ', 'nama_bapak', 'pekerjaan_bapak', 'nama_ibu', 'pekerjaan_ibu', 'notelp_ortu', 'sekolah_asal', 'madin_asal', 'ponpes_asal');	

	//adding data to spreadsheet
	for($i=1; $i<=$rowSize; $i++)
	{
		$c = 'A';  //to be used in cell name
		for ($j=1; $j<=$columnSize; $j++, $c++)
		{
			$cell_name = $c.($i+1);			
			$column_name = $columns_array[$j-1];

			//uncomment echo command to verify cell names and their respective values 
			//echo $cell_value.'---------'.$result[$i-1][$column_name].'<br>';			

			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell_name, $result[$i-1][$column_name]);
		}
	}

	// Uncomment commands to Rename worksheet
	//echo date('H:i:s') , " Rename worksheet" , EOL;
	//$objPHPExcel->getActiveSheet()->setTitle('Simple');

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

		$objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));

		$sheet = $objPHPExcel->getActiveSheet();
		$cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(true);
		/** @var PHPExcel_Cell $cell */
		foreach ($cellIterator as $cell) {
			$sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
		}
	}


	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="datasiswa.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	
	
}




else if($module=='siswa' AND $act=='impor'){
	
	
	
	if( isset($_POST["submit"]) )
	{		

		$conn = new PDO("mysql:host=localhost; dbname=tabunganpondok2; charset=utf8", "root", "root"); 
		//  Include PHPExcel_IOFactory 
		include '../../../config/PHPExcel/IOFactory.php';

		//saving xlsx file
		$inputFileName = $_FILES['file']['tmp_name'];

		//  Read your Excel workbook
		try
		{
		    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
		    $objPHPExcel = $objReader->load($inputFileName);
		}
		catch(Exception $e)
		{
		    die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		
		  

		//  Loop through each row of the worksheet in turn
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
		    //  Read a row of data into an array
		    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

		    //  Insert row data array into your database of choice here
		    try
		    {
				 
		    	$query = $conn->prepare('INSERT INTO siswa (id_siswa, nis, status, tgl_masuk, nama_lengkap, jenis_kelamin, tempat_lahir, tgl_lahir, password, foto, alamat_lengkap, nama_bapak, pekerjaan_bapak, nama_ibu, pekerjaan_ibu, notelp_ortu, sekolah_asal, madin_asal, ponpes_asal)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		    	$query->execute( array($rowData[0][0], $rowData[0][1], $rowData[0][2], $rowData[0][3], $rowData[0][4], $rowData[0][5], $rowData[0][6], $rowData[0][7], $rowData[0][8], $rowData[0][9], $rowData[0][10], $rowData[0][11], $rowData[0][12], $rowData[0][13], $rowData[0][14], $rowData[0][15], $rowData[0][16], $rowData[0][17], $rowData[0][18]));
				
				 
				
				if(!query) {
					$query = $conn->prepare('UPDATE siswa SET  
									nis = ?, 
									status = ?, 
									tgl_masuk = ?, 
									nama_lengkap = ?, 
									jenis_kelamin = ?, 
									tempat_lahir = ?, 
									tgl_lahir = ?, 
									password = ?, 
									foto = ?, 
									alamat_lengkap = ?, 
									nama_bapak = ?, 
									pekerjaan_bapak = ?, 
									nama_ibu = ?, 
									pekerjaan_ibu = ?, 
									notelp_ortu = ?, 
									sekolah_asal = ?, 
									madin_asal = ?, 
									ponpes_asal = ? WHERE id_siswa= ?');
					$query->execute( array($rowData[0][1], $rowData[0][2], $rowData[0][3], $rowData[0][4], $rowData[0][5], $rowData[0][6], $rowData[0][7],  $rowData[0][8], $rowData[0][9], $rowData[0][10], $rowData[0][11], $rowData[0][12],  $rowData[0][13], $rowData[0][14], $rowData[0][15], $rowData[0][16], $rowData[0][17], $rowData[0][18], $rowData[0][0]) );
				
				}
				 
				
		    }
		    catch(PDOException $e)
		    {
				
				$e->getMessage(); 
				 
		    	 
		    }

		     
 
		}

		 
	}
	
	 $_SESSION[sukses]="Data berhasil diimpor";
 
  
  header('location:../../dashboard.php?module='.$module);
	
	
	
}


?>
