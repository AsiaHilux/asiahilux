<?php include('include/header.php'); ?>


<style>
    table {
        width: 95%;
        height: 95%;
        border-collapse: collapse;
        margin: 2% auto;

    }

    td {
        width: 100px;
        height: 100px;
        text-align: right;
        padding: 4px;
        border: 1px solid #e2e0e0;
        font-size: 18px;

    }

    th {
        height: 80px;
        padding-bottom: 8px;
        background: #321D55;
        font-size: 16px;
        text-align: center;
        color: #ffffff;
    }

    .prev_sign a, .next_sign a {
        color: #ffffff;
        text-decoration: none;
        margin: 5px;
    }

    tr.week_name {
        font-size: 16px;
        font-weight: 400;
        color: red;
        width: 10px;
        background-color: #efe8e8;
    }

    .highlight {
        background-color: #84389c;
        color: white;
        height: 100px;

    }

    #chartdiv {
        width: 100%;
        height: 500px;
        font-size: 11px;
    }

    .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
    }

    /*--------------------------------------------new css---------------------------------------------------*/
    /* liScroll styles */

    .tickercontainer {
        /* the outer div with the black border */
        border: 1px solid #000;
        background: #fff;
        width: 738px;
        height: 27px;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .tickercontainer .mask {
        /* that serves as a mask. so you get a sort of padding both left and right */
        position: relative;
        left: 10px;
        top: 8px;
        width: 718px;
        overflow: hidden;
    }

    ul.newsticker {
        /* that's your list */
        position: relative;
        left: 750px;
        font: bold 10px Verdana;
        list-style-type: none;
        margin: 0;
        padding: 0;

    }

    ul.newsticker li {
        float: left; /* important: display inline gives incorrect results when you check for elem's width */
        margin: 0;
        padding: 0;
        background: #fff;
    }

    ul.newsticker a {
        white-space: nowrap;
        padding: 0;
        color: #ff0000;
        font: bold 10px Verdana;
        margin: 0 50px 0 0;
    }

    ul.newsticker span {
        margin: 0 10px 0 0;
    }

    #class_wise_std td{
        width: 20px;
        height: auto;
        text-align: center;
        padding: 2px;
        border: 1px solid #e2e0e0;
        font-size: 15px;
        font-weight: 500;
    }

    #class_wise_std th{
        height: 35px;
        padding-bottom: 0px;
        background: #321D55;
        font-size: 14px;
        text-align: center;
        color: #ffffff;
    }

    .scrollit {
        overflow-y: scroll;
        min-height:265px;
    }
    /*--------------------------------------------new css---------------------------------------------------*/


</style>

<link type="text/css" rel="stylesheet"
      href="../../assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666"/>
<link type="text/css" rel="stylesheet"
      href="../../assets/css/theme-default/libs/fullcalendar/fullcalendar.css?1425466619"/>


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>

<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>


<![endif]-->
<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="row">


                        <div class="col-lg-offset-0 col-md-4">

                            <div class="card">

                                <div class="card-body">

                                    <a href="<?= base_url(); ?>index.php/car_manufacturer/">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <h1 class="pull-right text-success"><i class="md md-directions-car"><?php echo $totalCarMakes['0']['totalCarMakes']; ?></i></h1>
                                         <strong class="text-xl">Total Car Makes</strong><br>
                                        <span class="opacity-50">In Asia Hilux Website</span>
                                     </div>
                                     </a>


                                </div>
                                <!--end .card-body -->
                            </div>
                            <!--end .card -->
                        </div>
                        <!--end .col -->

                        <div class="col-lg-offset-0 col-md-4">

                            <div class="card">

                                <div class="card-body">
                                    <a href="<?= base_url(); ?>index.php/car_model/">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <h1 class="pull-right text-success"><i class="md md-directions-car"><?php echo $totalCarModels['0']['totalCarModels']; ?></i></h1>
                                        <strong class="text-xl">Total Car Models</strong><br>
                                        <span class="opacity-50">In Asia Hilux Website</span>
                                     </div>
                                    </a>

                                </div>
                                <!--end .card-body -->
                            </div>
                            <!--end .card -->
                        </div>
                        <!--end .col -->

                        <div class="col-lg-offset-0 col-md-4">

                            <div class="card">

                                <div class="card-body">
                                    <a href="<?= base_url(); ?>index.php/car_detail/">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <h1 class="pull-right text-success"><i class="md md-directions-car"><?php echo $totalCarDetails['0']['totalCarDetails']; ?></i></h1>
                                        <strong class="text-xl">Total Cars</strong><br>
                                        <span class="opacity-50">In Asia Hilux Website</span>
                                     </div>
                                     </a>


                                </div>
                                <!--end .card-body -->
                            </div>
                            <!--end .card -->
                        </div>
                        <!--end .col -->
                    </div>

                    <?php include('include/footer.php'); ?>
                    <script src="<?= base_url(); ?>assets/js/libs/amcharts.js"></script>
                    <script src="<?= base_url(); ?>assets/js/libs/serial.js"></script>
                    <script src="<?= base_url(); ?>assets/js/libs/farrukh_graphs/canvasjs.min.js"></script>
                    <script src="../../assets/js/libs/moment/moment.min.js"></script>


                    



                    
                    </body>
                    </html>