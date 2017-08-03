<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>
            Luxury Bali Resorts | The Ritz - Carlton, Bali
        </title>
        <link href="<?php echo base_url('gaya.css') ?>" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="shortcut icon" href="<?php echo base_url('favicon.png')?>">

            <!-- Bootstrap 3.3.2 -->
            <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>"></link>

            <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>"></link>
            <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>"></link>
            <link rel="stylesheet" href="<?php echo base_url('assets/css/slick.css') ?>"></link>
            <link rel="stylesheet" href="<?php echo base_url('assets/js/rs-plugin/css/settings.css') ?>"></link>

            <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>"></link>


            <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.custom.32033.js') ?>"></script>

            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->


    </head>
    <body>
        <div class="pre-loader">
            <div class="load-con">
                <img src="<?php echo base_url('assets/img/freeze/cropped-logo1.png') ?>" class="animated fadeInDown" alt="">
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
                            <img src="<?php echo base_url('assets/img/freeze/cropped-logo1.png') ?>" alt="" class="logo" >
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
                <div>

                    <div class="container" >
                        <h3>Kamar Data</h3>
                        <br />
                        <button class="btn btn-success" onclick="add_kamar()"><i class="glyphicon glyphicon-plus"></i> Add Kamar</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        <br />
                        <br />
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Kamar</th>
                                    <th>Nama Kamar</th>
                                    <th>Lantai Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga</th>


                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Kamar</th>
                                    <th>Nama Kamar</th>
                                    <th>Lantai Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga</th>>

                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
                    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>


                    <script type="text/javascript">

                            var save_method; //for save method string
                            var table;

                            $(document).ready(function ()
                            {

                                //datatables
                                table = $('#table').DataTable({
                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                                    "order": [], //Initial no order.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {
                                        "url": "<?php echo site_url('kamar/ajax_list') ?>",
                                        "type": "POST"
                                    },
                                    //Set column definition initialisation properties.
                                    "columnDefs": [
                                        {
                                            "targets": [-1], //last column
                                            "orderable": false, //set not orderable
                                        },
                                    ],
                                });

                                //datepicker
                                $('.datepicker').datepicker({
                                    autoclose: true,
                                    format: "yyyy-mm-dd",
                                    todayHighlight: true,
                                    orientation: "top auto",
                                    todayBtn: true,
                                    todayHighlight: true,
                                });

                                //set input/textarea/select event when change value, remove class error and remove text help block 
                                $("input").change(function () {
                                    $(this).parent().parent().removeClass('has-error');
                                    $(this).next().empty();
                                });
                                $("textarea").change(function () {
                                    $(this).parent().parent().removeClass('has-error');
                                    $(this).next().empty();
                                });
                                $("select").change(function () {
                                    $(this).parent().parent().removeClass('has-error');
                                    $(this).next().empty();
                                });

                            });



                            function add_kamar()
                            {
                                save_method = 'add';
                                $('#form')[0].reset(); // reset form on modals
                                $('.form-group').removeClass('has-error'); // clear error class
                                $('.help-block').empty(); // clear error string
                                $('#modal_form').modal('show'); // show bootstrap modal
                                $('.modal-title').text('Add Kamar'); // Set Title to Bootstrap modal title
                            }

                            function edit_kamar(id)
                            {
                                save_method = 'update';
                                $('#form')[0].reset(); // reset form on modals
                                $('.form-group').removeClass('has-error'); // clear error class
                                $('.help-block').empty(); // clear error string

                                //Ajax Load data from ajax
                                $.ajax({
                                    url: "<?php echo site_url('kamar/ajax_edit/') ?>/" + id,
                                    type: "GET",
                                    dataType: "JSON",
                                    success: function (data)
                                    {

                                        $('[name="id"]').val(data.id);
                                        $('[name="kode_kamar"]').val(data.kode_kamar);
                                        $('[name="nama_kamar"]').val(data.nama_kamar);
                                        $('[name="lantai_kamar"]').val(data.lantai_kamar);
                                        $('[name="harga"]').val(data.harga);

                                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                                        $('.modal-title').text('Edit Kamar'); // Set title to Bootstrap modal title

                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error get data from ajax');
                                    }
                                });
                            }

                            function reload_table()
                            {
                                table.ajax.reload(null, false); //reload datatable ajax 
                            }

                            function save()
                            {
                                $('#btnSave').text('saving...'); //change button text
                                $('#btnSave').attr('disabled', true); //set button disable 
                                var url;

                                if (save_method == 'add')
                                {
                                    url = "<?php echo site_url('kamar/ajax_add') ?>";
                                } else
                                {
                                    url = "<?php echo site_url('kamar/ajax_update') ?>";
                                }

                                // ajax adding data to database
                                $.ajax({
                                    url: url,
                                    type: "POST",
                                    data: $('#form').serialize(),
                                    dataType: "JSON",
                                    success: function (data)
                                    {

                                        if (data.status) //if success close modal and reload ajax table
                                        {
                                            $('#modal_form').modal('hide');
                                            reload_table();
                                        } else
                                        {
                                            for (var i = 0; i < data.inputerror.length; i++)
                                            {
                                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                            }
                                        }
                                        $('#btnSave').text('save'); //change button text
                                        $('#btnSave').attr('disabled', false); //set button enable 


                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error adding / update data');
                                        $('#btnSave').text('save'); //change button text
                                        $('#btnSave').attr('disabled', false); //set button enable 

                                    }
                                });
                            }

                            function delete_kamar(id)
                            {
                                if (confirm('Are you sure delete this data?'))
                                {
                                    // ajax delete data to database
                                    $.ajax({
                                        url: "<?php echo site_url('kamar/ajax_delete') ?>/" + id,
                                        type: "POST",
                                        dataType: "JSON",
                                        success: function (data)
                                        {
                                            //if success reload ajax table
                                            $('#modal_form').modal('hide');
                                            reload_table();
                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                            alert('Error deleting data');
                                        }
                                    });

                                }
                            }

                    </script>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="modal_form" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title">Kamar Form</h3>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="form" class="form-horizontal">
                                        <input type="hidden" value="" name="id"/> 
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ID</label>
                                                <div class="col-md-9">
                                                    <input name="id" placeholder="ID" class="form-control" type="text" >
                                                        <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Kode Kamar</label>
                                                <div class="col-md-9">
                                                    <input name="kode_kamar" placeholder="Kode Kamar" class="form-control" type="text">
                                                        <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Kamar</label>
                                                <div class="col-md-9">
                                                    <input name="nama_kamar" placeholder="Nama Kamar" class="form-control" type="text">
                                                        <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Lantai Kamar</label>
                                                <div class="col-md-9">
                                                    <textarea name="lantai_kamar" placeholder="Lantai Kamar" class="form-control"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tipe Kamar</label>
                                                <div class="col-md-9">
                                                    <textarea name="tipe_kamar" placeholder="Tipe Kamar" class="form-control"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Harga</label>
                                                <div class="col-md-9">
                                                    <textarea name="harga" placeholder="Harga" class="form-control"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

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
                                                            <img src="<?php echo base_url('assets/img/freeze/cropped-logo1.png') ?>" alt="" class="logo">
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


                                                <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/slick.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/placeholdem.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/rs-plugin/js/jquery.themepunch.plugins.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/waypoints.min.js') ?>"></script>
                                                <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
                                                <script>
                                        $(document).ready(function ()
                                        {
                                            appMaster.preLoader();
                                        });
                                                </script>
                                                </body>
                                                </html>
