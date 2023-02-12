<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asia Hilux Management System - Login</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">


<!-- BEGIN LOGIN SECTION -->
<section class="section-account">


    <div class="card contain-sm style-transparent">


        <div class="card-body">

            <p style="text-align: center;"><img src="<?= base_url();?>assets/img/car_logo.png"></p>
            <h2 style="text-align: center;"><b>Asia Hilux Management System</b></h2>
            <div class="row">




                <div class="col-lg-offset-2 col-lg-8">

                    <div class="alert alert-danger" style= "border: 1px solid red; display: <?php if(isset($style)) echo $style; else echo 'none'; ?>;" role="alert">
                        <?php if(isset($msg)) echo $msg; ?>
                    </div>
                    

                    <br/><br/>

                    <form class="form form-validate" action="<?= base_url().'index.php/login/verify_user_login/'; ?>" accept-charset="utf-8" method="post" novalidate>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" required>
                            <label for="email">Enter Your Email Here </label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" required data-rule-minlength="2">
                            <label for="password">Enter Your Password Here</label>

                            

                        </div>




                        <div class="row">
                            <div class="col-xs-0 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>

                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-md-12">
                                <button class="btn btn-block btn-raised btn-primary" type="submit">Login</button>
                            </div><!--end .col -->
                            <br>
                            <br>
                           
                        </div><!--end .row -->



                    </form>


                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
<!-- END LOGIN SECTION -->

<!-- BEGIN JAVASCRIPT -->



<script src="<?= base_url(); ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/App.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppCard.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppForm.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?= base_url(); ?>assets/js/core/source/AppVendor.js"></script>
<script src="<?= base_url(); ?>assets/js/core/demo/Demo.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?= base_url();?>assets/js/core/demo/DemoUIMessages.js"></script>
<script src="<?= base_url();?>assets/js/libs/toastr/toastr.js"></script>

<!-- END JAVASCRIPT -->

</body>
</html>
