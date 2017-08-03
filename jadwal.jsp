<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>PO. Esto</title>
        <link href="gaya.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"></meta>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <link rel="shortcut icon" href="favicon.png">

                <!-- Bootstrap 3.3.2 -->
                <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>

                <link rel="stylesheet" href="assets/css/animate.css"></link>
                <link rel="stylesheet" href="assets/css/font-awesome.min.css"></link>
                <link rel="stylesheet" href="assets/css/slick.css"></link>
                <link rel="stylesheet" href="assets/js/rs-plugin/css/settings.css"></link>

                <link rel="stylesheet" href="assets/css/styles.css"></link>


                <script type="text/javascript" src="assets/js/modernizr.custom.32033.js"></script>

                <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
                </head>
                <body>
                    <div class="pre-loader">
                        <div class="load-con">
                            <img src="assets/img/freeze/cropped-logo1.png" class="animated fadeInDown" alt="">
                                <div class="spinner">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                        </div>
                    </div>

                    <header>

                        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                            <div class="container" >
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header" >
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="fa fa-bars fa-lg"></span>
                                    </button>
                                    <a class="navbar-brand" href="index.jsp" >
                                        <img src="assets/img/freeze/cropped-logo1.png" alt="" class="logo" >
                                    </a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.jsp">Our Service</a>
                                        </li>
                                        <li><a href="about.jsp">About</a>
                                        </li>
                                        <li><a href="jadwal.jsp">Jadwal</a>
                                        </li>
                                        <li><a href="lokasi.jsp">Lokasi</a>
                                        </li>
                                        <li><a class="getApp" href="#getApp">Get App</a>
                                        </li>
                                        <li><a href="#support">Support</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container-->
                        </nav>

                        <div id="wrapper" >
                            <div id="header"></div>


                            <div id="bawahnav"></div>
                            <div id="clearer"></div>
                            <div id="leftcontent">
                                <div id="teks" ><h2><u><center>JADWAL BUS PO. ESTO </center></u></h2>
                                    <center>Ini adalah jadwal bus yang berangkat dari Salatiga setiap harinya.</center>  
                                    <br/><br/>
                                    <table align=center >
                                        <?php
                                        include"./include/conn.php";
                                        $q1=mysql_query("select * from jalur");
                                        ?>
                                        <b>

                                            <center>
                                                <h1><u>Insert Tiket</u></h1>
                                                <form action="InsertTiket" method="POST">
                                                    <table>
                                                        <tr>
                                                            <td>Kode</td>
                                                            <td>:</td>
                                                            <td><input type="text" name="kode" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kode Jalur</td>
                                                            <td>:</td>
                                                            <!--<td><select name="jalur"></select></td>-->
                                                            <td><input type="text" name="jalur" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Kursi</td>
                                                            <td>:</td>
                                                            <td><input type="text" name="noKursi" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jam Berangkat</td>
                                                            <td>:</td>
                                                            <td><input type="text" name="jam" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga</td>
                                                            <td>:</td>
                                                            <td><input type="text" name="harga" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="right"><input type="submit" value="SIMPAN" /></td>
                                                        </tr>
                                                    </table>
                                                </form>

                                                <h1><u>Data Tiket</u></h1>    
                                                <table class="ui selectable inverted table" border="1" cellpadding="5">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kode</th>
                                                            <th>Jalur</th>
                                                            <th>No Kursi</th>
                                                            <th>Jam Berangkat</th>
                                                            <th>Harga</th>
                                                            <th>Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <%-- start web service invocation --%>
                                                        <%
                                                            try 
                                                            {
                                                                service.BisService_Service service= new service.BisService_Service();
                                                                service.BisService port = service.getBisServicePort();
                                                                java.util.List<service.ModelTiket> result = port.getAllTiket();
                                                                for (int i=0; i<result.size(); i++) 
                                                                {
                                                                    out.println("<tr>");
                                                                    out.println("<td>" + (i + 1) + "</td>");
                                                                    out.println("<td>" + result.get(i).getKode()+ "</td>");
                                                                    out.println("<td>" + result.get(i).getJalur()+ "</td>");
                                                                    out.println("<td>" + result.get(i).getNoKursi()+ "</td>");
                                                                    out.println("<td>" + result.get(i).getJamBerangkat()+ "</td>");
                                                                    out.println("<td>" + result.get(i).getHarga()+ "</td>");
                            
                                                                    out.println("<td><a href='DeleteTiket?kode=" + result.get(i).getKode()+ "'>hapus</a></td>");
                                                                    out.println("</tr>");
                                                                }
                                                            } 
                                                            catch (Exception ex) 
                                                            {
                                                                out.println("Terjadi kesalahan");
                                                            }
                                                        %>
                                                        <%-- end web service invocation --%>
                                                    </tbody>
                                                </table>
                                            </center>

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

                                                                                                    <footer>
                                                                                                        <div class="container">
                                                                                                            <a href="#" class="scrollpoint sp-effect3">
                                                                                                                <img src="assets/img/freeze/cropped-logo1.png" alt="" class="logo">
                                                                                                            </a>
                                                                                                            <div class="social">
                                                                                                                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
                                                                                                                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
                                                                                                                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
                                                                                                            </div>
                                                                                                            <div class="rights">
                                                                                                                <p>Copyright &copy; 2016</p>
                                                                                                                <p>Website Designed by <a href="http://www.scoopthemes.com" target="_blank">Lukas Herdian W</a></p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </footer>


                                                                                                    </div>


                                                                                                    <script src="assets/js/jquery-1.11.1.min.js"></script>
                                                                                                    <script src="assets/js/bootstrap.min.js"></script>
                                                                                                    <script src="assets/js/slick.min.js"></script>
                                                                                                    <script src="assets/js/placeholdem.min.js"></script>
                                                                                                    <script src="assets/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
                                                                                                    <script src="assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
                                                                                                    <script src="assets/js/waypoints.min.js"></script>
                                                                                                    <script src="assets/js/scripts.js"></script>
                                                                                                    <script>
                                                                                                        $(document).ready(function ()
                                                                                                        {
                                                                                                            appMaster.preLoader();
                                                                                                        });
                                                                                                    </script>
                                                                                                    </body>
                                                                                                    </html>
