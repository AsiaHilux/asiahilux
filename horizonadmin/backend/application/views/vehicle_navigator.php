<?php include('include/header.php'); ?>
<!-- start: HORIZONTAL MENU----------------------------------------------------------- -->
<?php  include('include/nav/vehicle.php')?>
<!-- end: HORIZONTAL MENU------------------------------------------------------------- -->

<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
<div class="col-lg-offset-0 col-md-12">



        <div class="card">



            <div class="card-body">


                <div class="col-md-6">

                    <a href="<?= base_url(). 'index.php/';?>car_manufacturer/"><div class="card">
                        <div class="card-body style-default-light ">
                            <div class="row">
                                
                                <div class="col-md-3 col-xs-12">
                                <img class="img-circle img-responsive pull-left " src="../../assets/img/navigator/car-manufacturing.png" alt="">
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <h4 class="navigator">Car Manufacturer</h4>
                                    <p class="navigator">Create Car Manufacturers</p>
                                </div>
                            </div>

                        </div>

                    </div></a>
                </div>

                <div class="col-md-6">

                    <a href="<?= base_url(). 'index.php/';?>car_model/"><div class="card">
                        <div class="card-body style-default-light ">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-circle img-responsive pull-left " src="../../assets/img/navigator/car.png" alt="">
                                </div>
                                <div class="col-md-9">
                                    <h4 class="navigator">Car Model</h4>
                                    <p class="navigator">Create Car Models</p>
                                </div>
                            </div>

                        </div>

                    </div></a>
                </div>

                <div class="col-md-6">

                    <a href="<?= base_url(). 'index.php/';?>car_detail/"><div class="card">
                            <div class="card-body style-default-light ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-circle img-responsive pull-left " src="../../assets/img/navigator/insurance.png" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="navigator">Car Details</h4>
                                        <p class="navigator">Create Car Details</p>
                                    </div>
                                </div>

                            </div>

                        </div></a>


                </div>
                
              
            </div>

            </div> <!--end .card-body -->


        </div> <!--end .card -->



<?php include('include/footer.php'); ?>


</body>
</html>