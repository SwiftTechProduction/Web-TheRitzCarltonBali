<?php
    session_start();
    include"./include/conn.php";

    if($_SESSION['LOGIN'] != 'OK')
    {
        header('location: index.php');

    }
    
    $namanya=$_SESSION["nama"];
    $idnya=$_SESSION["id"];
  
    $notiket=$_GET['notiket'];
    $q1=mysql_query("select * from pemesanan where noTiket=$notiket");            
    $data=mysql_fetch_array($q1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>
                PO. ESTO
            </title>
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
        <div id="teks">

        <table>
            <?php
                $q1=mysql_query("select * from user where id = '$idnya'");
                while ($row=mysql_fetch_array($q1))
                {
                    $iduser=$row['id'];
                    $nama=$row['nama'];
                    $alamat=$row['alamat'];
                    $notelp=$row['telp'];
                    $a=crc32($data['noTiket']);
            ?>

            <form action="./pdf/print_pdf.php" method="post">
        <fieldset>
            <h3>
                Silahkan Cetak Tiket Pemesanan
            </h3>
  	
            <table width="100%">
                <tr>
                    <td colspan="3">
                        <strong>
                            <u>
                                DATA <?php echo strtoupper($namanya); ?>
                            </u>
                        </strong>
                    </td>
                </tr>  	  
	  
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $iduser; ?>
                    </td>
                </tr>
    
                <tr>
                    <td>
                        NAMA
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td>
                        <?php echo $nama; ?>
                    </td>
                </tr>	  
	  
                <tr>
                    <td>
                        ALAMAT
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $alamat; ?>
                    </td>
                </tr>
	  
                <tr>
                    <td>
                        No Telp
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td>
                        <?php echo $notelp; ?>
                    </td>
                </tr>    
	  
                <tr>
                    <td colspan="3">
                        <strong>
                            <br>
                                <u>
                                    JADWAL PEMBERANGKATAN
                                </u>
                        </strong>
                    </td>
                </tr>
	  
                <tr>
                    <td>
                        NO TIKET
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td> 
                        <?php echo $data['noTiket']; ?>
                    </td>
                </tr>
	  
                <tr>
                    <td>
                        Waktu
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td>
                        <?php echo $data['jam'];?>
                    </td>
                </tr>
	  
                <tr>
                    <td>
                        Kursi
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td>
                        <?php echo $data['sheet'];?>
                    </td>
                </tr>    
	  
                <tr>
                    <td>
                        Harga
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $data['harga'];?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        SN
                    </td>
                    
                    <td>
                        :
                    </td>
                    
                    <td>
                        <?php echo $a;?>
                    </td>
                </tr>  
	  
                <tr>
                    <td colspan="2">
                    </td>
                    <td>
                        <b>
                            **No SN akan divalidasi oleh PO. ESTO
                        </b>
                    </td>
                </tr>
            </table>
	  
            <input type="submit" value="Cetak Tiket">
            </fieldset>	  
            </form>	  
            <hr/>	

        <?php
        }
        ?>
        </table>
        <br>  
        </form>
        
        </div>
        </div>

        <div id="rightcontent">
            <strong>
                Cari Di Website 
            </strong><br/>
            
            <form id="searchthis" action="http://google.co.id/search" style="display:inline;" method="get">
                <input id="b-query" maxlength="255" name="q" size="17" type="text"/>
                <input id="b-searchbtn" value="Search" type="submit"/>
            </form>
	  
            <hr/>	
            <center>
                <img src="./images/mrc.png"/ width="215" height="150"><br/>
                    <i>
                        <font color="#666666" face="verdana">
                            <strong>
                                Powered By <br/>
                                ESTO
                            </strong>
                        </font>
                    </i>
            </center>
            <br/><br/>
        </div>
        
        <div id="clearer"></div>
        <div id="footer">
            2016 Copyright ESTO. All Right Reserved 
        </div>
        </div>
    </body>
</html>