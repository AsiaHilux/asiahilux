<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asia Hilux Management System</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/bootstrap.css?1422792965"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/materialadmin.css?1425466319"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194"/>
    <link type="text/css" rel="stylesheet"
          href="<?= base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286"/>


    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/libs/wizard/wizard.css?1425466601"/>
    <link type="text/css" rel="stylesheet"
          href="<?= base_url();?>assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858"/>
    <link type="text/css" rel="stylesheet"
          href="<?= base_url();?>assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666"/>
    <link type="text/css" rel="stylesheet"
          href="<?= base_url();?>assets/css/theme-default/libs/morris/morris.core.css?1420463396"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967"/>



    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/css/custom/nav-sub-menu.css"/>

    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/libs/select2/select2.css?1424887856"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/custom/custom_core.css"/>
    
    <link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />
    <link type="text/css" rel="stylesheet"
          href="<?= base_url();?>assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864">

</head>
<body class="menubar-hoverable header-fixed">


<!-- BEGIN HEADER-->
<header id="header">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand dropdown">
                    <div class="brand-holder dropdown"> <span class="text-lg text-bold text-primary">Asia Hilux Admin Panel</span>

                    </div>

                <li class="hidden-md hidden-lg">
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>


            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">


            <ul class="header-nav header-nav-profile">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ink-reaction"
                                        data-toggle="dropdown">


                        <?php
                        if ($arr_user[0]['user_pic']) {
                            ?>
                            <img src="https://horizonvehicles.com/uploads/app_users/<?= $arr_user[0]['user_pic'] ?>"
                                 alt="User's Avatar Profile Image"/>
                            <?php
                        } else { ?>
                            <img src="<?= base_url(); ?>assets/img/avatar1.png?1403934956"
                                 alt="<?php echo $arr_user[0]['first_name']; ?>"/>
                            <?php
                        } ?>
                        <span class="profile-info"> <?php echo $arr_user[0]['first_name'] . " " . $arr_user[0]['last_name']; ?>
                            <small><?= $arr_user[0]['user_role'] ?></small> </span> </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="<?= base_url() . 'index.php/'; ?>admin_profile/"><i
                                        class="md md-person text-danger"></i></i> My profile</a></li>
                        <li><a href="<?= base_url() . 'index.php/'; ?>login/logout"><i
                                        class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul>
                    <!--end .dropdown-menu -->
                </li>
                <!--end .dropdown -->
            </ul>
            <!--end .header-nav-profile -->
            
        </div>
        <!--end #header-navbar-collapse -->
    </div>
</header>

<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

   

    <!-- BEGIN CONTENT-->
    <div id="content">




