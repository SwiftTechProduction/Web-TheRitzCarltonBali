<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@ page import="tools.Koneksi" %>
<%@page import="java.util.List"%>
<%@page import="model.Kamar"%>
<%@page import="controller.KamarController"%>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>
            Luxury Bali Resorts | The Ritz - Carlton, Bali
        </title>
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
            <%
                System.out.println(new Koneksi().getKoneksi() + "\n");
                KamarController kc = new KamarController();
                Kamar kamar = new Kamar();
                //List<Kamar> data = kc.getAllKamars();
                //String ide = request.getParameter("id");
                //Kamar data2 = kc.getKamarById(ide);
            %>

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
                            <li><a href="index.xhtml">Our Service</a>
                            </li>
                            <li><a href="index.xhtml">Hotel Overview</a>
                            </li>
                            <li><a href="AllKamar.jsp">Rooms And Suites</a>
                            </li>
                            <li><a href="booking.jsp">Reserve Now</a>
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
                    <center>
                        <div class="form">
                            <form action="proses_kamar" method="POST">
                                <table class="table table-hover">
                                    <tr><td colspan="2"><strong>Silahkan Update</strong></td></tr>
                                    <%
                                        String id = request.getParameter("id");
                                        List<Kamar> data = kc.get_update(id);
                                        
                                        for (Kamar kmr : data) 
                                        {
                                            out.println("<tr>");
                                            out.println("<td>ID :</td>");
                                            out.println("<td><input type=text name=id readonly=readonly value=" + kmr.getId() + "></td>");
                                            out.println("</tr>");
                                            
                                            out.println("<tr>");
                                            out.println("<td>Kode Kamar :</td>");
                                            out.println("<td><input type=text name=kode_kamar value=" + kmr.getKode_kamar() + "></td>");
                                            out.println("</tr>");

                                            out.println("<tr>");
                                            out.println("<td>Nama Kamar :</td>");
                                            out.println("<td><input type=text name=nama_kamar value=" + kmr.getNama_kamar() + "></td>");
                                            out.println("</tr>");

                                            out.println("<tr>");
                                            out.println("<td>Lantai Kamar :</td>");
                                            out.println("<td><input type=text name=lantai_kamar value=" + kmr.getLantai_kamar() + "></td>");
                                            out.println("</tr>");

                                            out.println("<tr>");
                                            out.println("<td>Tipe Kamar</td>");
                                            out.println("<td><input type=text name=tipe_kamar value=" + kmr.getTipe_kamar() + "></td>");
                                            out.println("</tr>");

                                            out.println("<tr>");
                                            out.println("<td>Harga :</td>");
                                            out.println("<td><input type=text name=harga value=" + kmr.getHarga() + "></td>");
                                            out.println("</tr>");
                                        }


                                    %>
                                    <tr>
                                        <td colspan="2"><input class="btn btn-info" type="submit" name="tombol" value="update"></td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                        <%-- start web service invocation --%>

                        <%-- end web service invocation --%>
                        </tbody>
                        </table>
                    </center>
                    <br></br>

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
                                            <hr>

                                                <i><font color="#666666" face="verdana"><strong>Powered By <br/>The Ritz - Carlton</strong></font></i></center>
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
