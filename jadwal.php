<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PO. Esto</title>
<link href="gaya.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="header"></div>

<div id="menu">
    <ul>
     <li><a href="index.php">Home</a></li>
      <li><a href="lokasi.php">Lokasi</a></li>
      <li><a href="jadwal.php" id="aktif">Jadwal</a></li>
      <li><a href="about.php">about</a></li>

    </ul>
  </div>
<div id="bawahnav"></div>
<div id="clearer"></div>
<div id="leftcontent">
<div id="teks"><h2><u><center>JADWAL BUS PO. ESTO </center></u></h2>
<center>Ini adalah jadwal bus yang berangkat dari Salatiga setiap harinya.</center>  
<br/><br/>
<table align=center>
<?php
include"./include/conn.php";
$q1=mysql_query("select * from jalur");
?>
<b>
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
</b>
<?php
}
?>
</table>
<BR><BR>
<center><h2>Keselamatan Anda Adalah Prioritas Kami <BR><BR> PO. Esto | 2015<h2></center>
<br>

</div>
</div>
<div id="rightcontent"><strong>Cari Di Website </strong><br/>
<form method="get" action="http://www.google.com/search" target="_blank">
<table align="left" cellpadding="0">
<tbody>
<tr>
<td nowrap="nowrap">
<input name="q" size="25" maxlength="255" value="" type="text">
</tr>
<tr>
<td align="left">
<input name="submit" value="Search" type="submit">
</td>
</tr>
<tr><td><hr></td></tr>
</tbody>
</table>
</form>
<br/><br/>
		<?php
		include "./login.html";
		?><hr>
	  <center><img src="./images/mrc.png"/ width="215" height="150"><br/>
	  <i><font color="#666666" face="verdana"><strong>Powered By <br/>ESTO</strong></font></i></center>
	  <br/><br/>
</div>
<div id="clearer"></div>
<div id="footer">2016 Copyright ESTO. All Right Reserved </div>
</div>
</body>
</html>
