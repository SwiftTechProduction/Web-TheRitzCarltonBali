<?php
  session_start();
include"./include/conn.php";

  if($_SESSION['LOGIN'] != 'OK'){
  header('location: index.php');

}
  $namanya=$_SESSION["nama"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PO. ESTO</title>
<link href="gaya.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="header"></div>
<div id="menu">

<?php
 $menu=1;
 include "topmenu.php";
?>
  </div>
<div id="bawahnav"></div>
<div id="clearer"></div>
<div id="leftcontent">
<div id="teks"><center><h2>Selamat Datang <?php echo "$namanya"; ?><br><br>Silahkan Mengisi Form Berikut untuk Pesan Tiket</h2></center>

<form method="post" action="pesanan.php" name="formdaftar">


<center><h2 align="center"><font color="#666666">JALUR YANG TERSEDIA </font></h2></center>
<table>
<?php
$q1=mysql_query("select * from jalur");
?>
<tr>
<th>KODE</th>
<th>KOTA ASAL</th>
<th>KOTA TUJUAN</th>
<th>JAM BERANGKAT</th>
<th>HARGA</th>
</tr>
<?php
while ($row=mysql_fetch_array($q1)){
$kode=$row['KDjalur'];
$kotaasal=$row['KotaAsal'];
$kotatujuan=$row['KotaTujuan'];
$jamberangkat=$row['JamBerangkat'];
$harga=$row['Harga'];
?>
<tr>
<td><?php echo $kode;?></td>
<td><?php echo $kotaasal;?></td>
<td><?php echo $kotatujuan;?></td>
<td><?php echo $jamberangkat;?></td>
<td><?php echo $harga;?></td>
</tr>
<?php
}
?>

</table>

<table>


<tr><td>Pesan untuk Tanggal</td> <td>:</td><td>
    <input type="date" name="tanggal" size="10"/> <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.formdaftar.tanggal);return false;" ></a></td></tr>
<tr><td>Pilih Tujuan</td><td>:</td><td>
<select name="jalur">
<option value="1">1.TERONG SALATIGA-SEMARANG</option>
<option value="2">2.STROBERY SALATIGA-BANDUNG</option>
<option value="3">3.KIWI SALATIGA-BOGOR</option>
<option value="4">4.WORTEL SALATIGA JAKARTA</option>
<option value="5">5.MIX SALATIGA-SURABAYA</option>
</select>
</tr>
<tr>
<td>Pilih No Kursi</td><td>:</td>
<td>
<?php
echo'<select name="nokursi">';
for($i=1;$i<=50;$i++){
echo'<option value= "'.$i.'" >'. $i.' </option>';
}
?>
</select>
</td>
</tr>
</table>
<br>
<table valign="right"><tr><td><input type="submit" name="simpan" value="booking"></td><td><input type="reset" value="batal"></td></tr>
</table><br>
  
</form>
</div>
</div>
<div id="rightcontent"><strong>Cari Di Website </strong><br/>
	  <form id="searchthis" action="http://google.co.id/search" style="display:inline;" method="get">
	  <input id="b-query" maxlength="255" name="q" size="17" type="text"/>
	  <input id="b-searchbtn" value="Search" type="submit"/>
	  </form>
	  <hr/>	
	  <center><h3>Denah Tempat Duduk Penumpang</h3></center>
	  <center><img src="./images/sit.jpg"/ width="215" height="430"><br/>
	  <hr/>
	  <center><img src="./images/mrc.png"/ width="215" height="150"><br/>
	  <i><font color="#666666" face="verdana"><strong>Powered By <br/>ESTO</strong></font></i></center>
	  <br/><br/>
</div>
<div id="clearer"></div>
<div id="footer">2016 Copyright ESTO. All Right Reserved </div>
</div>
</body>
</html>