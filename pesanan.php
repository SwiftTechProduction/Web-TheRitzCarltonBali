<?php 
include"include/conn.php";

session_start();
  if($_SESSION['LOGIN'] != 'OK'){
  header('location: indexs.php');

}
$id=$_SESSION["id"];
$tanggal=$_POST['tanggal'];
$jalur=$_POST['jalur'];
$sheet=$_POST['nokursi'];

$a=mysql_query("select * from jalur where KDjalur = $jalur");
$c = mysql_fetch_array($a);
$jam = $c['JamBerangkat'];
$harga = $c['Harga'];

$x=mysql_query("select * from pemesanan order by noTiket desc");
$z=mysql_fetch_array($x);
$tkt=$z['noTiket'];
$notiket=$tkt+1;

$cek=0;
$a1=mysql_query("select * from pemesanan");
while($data=mysql_fetch_array($a1)){
if($data['KDjalur']==$jalur&&$data['harga']==$harga&&$data['tanggal']==$tanggal&&$data['sheet']==$sheet&&$data['jam']==$jam){
$cek=1;
}
}
if($cek==1){ echo "<script>alert('maap kursi sudah ada yang memesan,silahkan pesan kembali'); document.location.href='tiketonline.php';</script>";}else
{

$q1=mysql_query("insert into pemesanan(noTiket,KDjalur,harga,tanggal,sheet,jam,idUser) values('$notiket','$jalur','$harga','$tanggal','$sheet','$jam','$id')");
if($q1){ echo "<script>alert('terima kasih sudah memesan data anda '); document.location.href='cetak-tiket.php?notiket=$notiket';</script>";
};
};
?>
