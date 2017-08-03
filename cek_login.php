<?php
    /* session_start untuk memastikan file ini terhubung dalam session */
    session_start();
    include './include/conn.php';        
    /* Cek apakah username dan password yang diinput user cocok dengan data yg tersimpan pada table users */
    
    /* Data username dan password yang diinput oleh user melalui form */
    $data_username = mysql_real_escape_string($_POST['user']);
    $data_password = mysql_real_escape_string($_POST['pwd']); 

    $query=mysql_query("SELECT * FROM user WHERE email='$data_username' and pass='$data_password'");
    $row=mysql_fetch_array($query);
    $usernamex= $row['email'];
    $namax= $row['nama'];
    $iduserx = $row['id'];		 

    if($row)
    {
        $_SESSION['LOGIN'] = 'OK';
        $_SESSION["username"]=$usernamex; 
        $_SESSION["nama"]=$namax;          
        $_SESSION["id"]=$iduserx;
        header('Location: tiketonline.php');	
    }
    
    else
    {
        echo "<script>alert('Maaf Email / Password tidak dikenal!!'); document.location.href='index.php';</script>";
    }  
?>