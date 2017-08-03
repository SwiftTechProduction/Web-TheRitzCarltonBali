<?php
include "./include/conn.php";
$psw=$_POST["psw"];
$psw2=$_POST["psw2"];
$nama=$_POST["nama"];
$email=$_POST["email"];
$hp=$_POST["hp"];
$alamat=$_POST["alamat"];

if($psw2!=$psw){
echo"<script>alert('Konfirmasi password salah');
document.location.href='daftar.php'; </script>\n";
}

if($psw=="" || $psw2=="" || $nama=="" || $email=="" || $hp=="" || $alamat=="" ){
echo"<script>alert('Data yang anda masukkan tidak lengkap, silahkan lengkapi data anda');
document.location.href='daftar.php'; </script>\n";
}
else
$sql="select * from user order by id desc";
$stmt=mysql_query($sql);
$data = mysql_fetch_array($stmt);
$idusr = $data['id']; 
$iduser = $idusr + 1;
$psw=$_POST["psw"];
{$input="insert into user(id,nama,alamat,telp,pass,email) VALUES('$iduser','$nama','$alamat','$hp','$psw','$email')";
$hasil=mysql_query($input);
if (hasil)
{
echo"<script>alert('Pendaftaran Berhasil,Cek Data Anda');
document.location.href='berhasil-daftar2.php?id=$email&pas=$psw2'; </script>\n";}
else
{echo"<script>alert('Pendaftaran Gagal');
document.location.href='daftar.php'; </script>\n";}
}

?>
