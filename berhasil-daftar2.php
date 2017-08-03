<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>
            PO. Esto
        </title>
        
        <link href="gaya.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div id="wrapper">
        <div id="header"></div>

        <div id="menu">
        
            <ul>
                <li>
                    <a href="index.php" id="aktif">
                        Home
                    </a>
                </li>
      
                <li>
                    <a href="lokasi.php">
                        Lokasi
                    </a>
                </li>
      
                <li>
                    <a href="jadwal.php">
                        Jadwal
                    </a>
                </li>
      
                <li>
                    <a href="about.php">
                        about
                    </a>
                </li> 
            </ul>
        </div>

        <div id="bawahnav"></div>
        <div id="clearer"></div>
        <div id="leftcontent">
        <div id="teks"><hr/>

        <?php 
            $user=$_GET['id'];
            $psw=$_GET['pas'];
        ?>
        
        <strong>
            Terima kasih anda telah bergabung dengan PO. Esto,
            <br> Mohon Diingat Email dan Password Anda.
            </br>
        </strong>
            <br/>
	  
            <form action="" method="post">
                <table width="10">
                    <tr>
                        <td>Email : 
                            <?php echo $user;?>
                        </td>
                    <tr>
                        <td>Password : 
                            <?php echo $psw;?>
                        </td>
                </table> 
            </form>
            
            <a href="./index.php">
                Klik disini untuk Login
            </a> 
	<hr/>	
        </div>
        </div>

        <div id="rightcontent">
            <strong>
                Cari Di Website 
            </strong>
            <br/>
	  
            <hr/>	
            <center>
                <img src="./images/mrc.png"/ width="215" height="150"><br/>
                <i>
                    <font color="#666666" face="verdana">
                        <strong>Powered By <br/>ESTO</strong>
                    </font>
                </i>
            </center>
            <br></br>
        </div>
        <div id="clearer"></div>
            <div id="footer">
                2016 Copyright ESTO. All Right Reserved 
            </div>
        </div>
    </body>
</html>