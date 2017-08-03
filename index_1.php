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
    <ul>
     <li><a href="index.php" id="aktif">Home</a></li>
      <li><a href="lokasi.php">Lokasi</a></li>
      <li><a href="jadwal.php">Jadwal</a></li>
      <li><a href="about.php">about</a></li> 
    </ul>
  </div>
<div id="bawahnav"></div>
<div id="clearer"></div>
<div id="baner"> 
<?php
	include "./include/conn.php"; 
	include "./gallery.php";
	?>
</div>
<div id="leftcontent"><br>
	
	<br>
		<div id="teks"><h2><u>Promo</u></h2>
	<table><tbody valign="top"><tr><td>
		Promo untuk bulan ini adalah.....
		</br>
		<h2>Setiap Pembelian 10 Tiket Dengan Nama dan tujuan yang sama bisa ditukarkan dengan 1 tiket Gratis
	</td></tr></tbody></table>
</table>
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
		?>
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
