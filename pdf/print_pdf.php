<?php
  session_start();
$SN=$_SESSION["id"];
$USER=$_SESSION["nama"];
$no=$_GET['notiket'];
include "connect.php";
include ('class.ezpdf.php');
$pdf = new Cezpdf('a4','landscape');
		// Atur margin
		$pdf->ezSetCmMargins(2, 3, 3, 3);

		$pdf->addObject($all, 'all');
		$pdf->closeObject();
		
    $sql = mysql_query("SELECT * FROM pemesanan where noTiket='$no'"); 	 	
		$r = mysql_fetch_array($sql);
      $jalur=$r['KDjalur'];
      $nokursi=$r['sheet'];
      $hari=$r['tanggal']; 
      $harga=$r['harga'];   
		 	   
    $sqlx = mysql_query("SELECT * FROM user where id='$SN'; ");     	
		$i = 1;
		$d = mysql_fetch_array($sqlx); 		 
			$data[$i]=array('Nama Lengkap'=>$d['nama'], 
      	 	 	  'User Name'=>$USER,
							'Email'=>$d['email'],
							'HP'=>$d['telp'],
							'Alamat'=>$d['alamat'],              
              'NO SN'=>crc32($no), 	 	 	
							'Jalur'=>$jalur,
							'Harga Tiket'=>$harga,							
							'No Kursi'=>$nokursi,
							'Hari'=>$hari

							);					
			$i++;	
		
		$pdf->ezStartText(100, 557, 12);
		$pdf->ezStartText2(500, 557, 12);
		$pdf->ezStartPageNumbers(35, 15, 10);
		$pdf->ezTable($data, '', '', '');
		$pdf->ezStream();
?>
