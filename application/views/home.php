<?php
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
$current_year = date('Y');
?>
<style>
    @media (min-width: 0px) and (max-width: 767px) {

        #hero,
        .five-grid,
        .export-info,
        .small-banner {
            display: none !important;
        }

        .content-outer {
            margin-top: 100px !important;
        }
    }
</style>
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Used <span>Toyota Hilux</span> For Sale
        </h1>

        <p>We are Thai used car dealers striving to provide our valued customers with the best possible service.<br>
            Our main priority is customer satisfaction and we work hard to achieve it. </p>

    </div>
</section>

<main id="main">
    <div class="container mt-5 content-outer">
        <div class="row">
            <div class="col-md-6 col-sm-12 center-main-content order-sm-1">
                <div class="main-content">
                    <form action="<?php echo base_url() ?>search" method="POST" class="">
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <div class="search mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Search Cars</span>
                                <input type="" name="refrence_no" class="form-control" placeholder="Search with Stock Number Example : 6194 ">

                                <span class="input-group-text search-btn"><button class="btn btn-primary"><i class="fa fa-search"></i></button></span>
                            </div>
                        </div>
                    </form>

                    <div class="five-grid mb-3">
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="five-grid-img">
                                    <a href="https://asiahilux.com/all-new-arrival"><img src="<?php echo base_url() ?>assets/images/Banner-Design-Hilux.webp" class="img-fluid" /></a>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="five-grid-img">
                                            <a href="https://asiahilux.com/car-type/double-cab"><img src="<?php echo base_url() ?>assets/images/f1.webp" class="img-fluid" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="five-grid-img">
                                            <a href="https://asiahilux.com/car-type/standard-cab"><img src="<?php echo base_url() ?>assets/images/f2.webp" class="img-fluid" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="five-grid-img">
                                            <a href="https://asiahilux.com/model/revo"><img src="<?php echo base_url() ?>assets/images/f3.webp" class="img-fluid" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="five-grid-img">
                                            <a href="https://asiahilux.com/brand/ford"><img src="<?php echo base_url() ?>assets/images/f4.webp" class="img-fluid" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="three-grid">
                        <div class="row">


                        </div>
                    </div>


                    <!--New Arrival Grid Start-->
                    <div class="custom-grid">
                        <div class="title">

                            <h3>New Arrival</h3>

                            <?php if ($get_all_cars == TRUE) { ?>
                                <a href="<?php echo base_url() ?>all-new-arrival">See All</a>
                            <?php } ?>

                        </div>
                        <div class="row">

                            <?php

                            foreach ($get_all_cars as $car) {

                                $make = $car['vm_name'];
                                $remove_first_dash_in_name = str_replace('-', '', $car['model_name']);
                                $car_name = $car['car_d_id'] . '/' . $make . '-' . $remove_first_dash_in_name;
                                $remove_dot = str_replace('.', '-', $car_name);
                                $remove_space = str_replace(' ', '-', $remove_dot);
                                $all_small = strtolower($remove_space);
                                $url =  base_url() . 'car-detail/' . $all_small;
                            ?>

                                <div class="col-md-3 col-sm-4">

                                    <a href="<?php echo $url; ?>">
                                        <div class="grid-item">
                                            <div class="item-img">
                                                <?php $img = base_url("asiahilux_admin/storage/app/images/car_images/" . $car["car_d_id"] . '/' . $car["stored_file_name"]); ?>
                                                <img src="<?php echo $img; ?>" class="img-fluid" alt="Asia Hilux Car Thumbnail Image" />
                                            </div>
                                            <div class="item-desc">
                                                <div class="item-title">
                                                    <p><?php echo $car['vm_name'] . ' ' . $car['model_name'] ?></p>
                                                </div>
                                                <div class="item-price">
                                                    <strong>Price: $<?php echo $car['carprice'] ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--New Arrival Grid End-->


                    <!--Discounted Grid Start-->
                    <div class="custom-grid">
                        <div class="title">

                            <h3>Discounted</h3>

                            <?php if ($discounted == TRUE) { ?>
                                <a href="<?php echo base_url() ?>all-discounted">See All</a>
                            <?php } ?>

                        </div>
                        <div class="row">

                            <?php

                            foreach ($discounted as $disCar) {

                                $make = $disCar['vm_name'];
                                $remove_first_dash_in_name = str_replace('-', '', $disCar['model_name']);
                                $car_name = $disCar['car_d_id'] . '/' . $make . '-' . $remove_first_dash_in_name;
                                $remove_dot = str_replace('.', '-', $car_name);
                                $remove_space = str_replace(' ', '-', $remove_dot);
                                $all_small = strtolower($remove_space);
                                $url =  base_url() . 'car-detail/' . $all_small;

                            ?>

                                <div class="col-md-3 col-sm-4">

                                    <a href="<?php echo $url; ?>">
                                        <div class="grid-item">
                                            <div class="item-img">

                                                <?php
                                                $img = base_url("asiahilux_admin/storage/app/images/car_images/" . $disCar["car_d_id"] . '/' . $disCar["stored_file_name"]);

                                                ?>
                                                <img src="<?= $img; ?>" class="img-fluid" alt="Asia Hilux Car Thumbnail Image" />
                                            </div>
                                            <div class="item-desc">
                                                <div class="item-title">
                                                    <p><?php echo $disCar['vm_name'] . ' ' . $disCar['model_name'] ?></p>
                                                </div>

                                                <div class="item-price">

                                                    <?php if ($disCar['cardisprice'] > 0) { ?>


                                                        <strong>Price: $<?php echo $disCar['cardisprice'] ?></strong>
                                                    <?php } else { ?>
                                                        <strong>Price: $<?php echo $disCar['carprice'] ?></strong>

                                                    <?php } ?>




                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php } ?>

                        </div>

                    </div>
                    <!--Discounted Grid End-->


                    <!--Clearance Grid Start-->
                    <div class="custom-grid">
                        <div class="title">

                            <h3>Clearance</h3>

                            <?php if ($clearance == TRUE) { ?>
                                <a href="<?php echo base_url() ?>all-clearance">See All</a>
                            <?php } ?>

                        </div>
                        <div class="row">

                            <?php

                            foreach ($clearance as $car) {

                                $make = $car['vm_name'];
                                $remove_first_dash_in_name = str_replace('-', '', $car['model_name']);
                                $car_name = $car['car_d_id'] . '/' . $make . '-' . $remove_first_dash_in_name;
                                $remove_dot = str_replace('.', '-', $car_name);
                                $remove_space = str_replace(' ', '-', $remove_dot);
                                $all_small = strtolower($remove_space);
                                $url =  base_url() . 'car-detail/' . $all_small;
                            ?>

                                <div class="col-md-3 col-sm-4">

                                    <a href="<?php echo $url; ?>">

                                        <div class="grid-item">
                                            <div class="item-img">

                                                <?php
                                                $img = base_url("asiahilux_admin/storage/app/images/car_images/" . $car["car_d_id"] . '/' . $car["stored_file_name"]);

                                                ?>
                                                <img src="<?= $img; ?>" class="img-fluid" alt="Asia Hilux Car Thumbnail Image" />
                                            </div>
                                            <div class="item-desc">
                                                <div class="item-title">
                                                    <p><?php echo $car['vm_name'] . ' ' . $car['model_name'] ?></p>
                                                </div>
                                                <div class="item-price">
                                                    <strong>Price: $<?php echo $car['carprice'] ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--Clearance Grid End-->

                    <div class="user-photo-gallery">
                        <div class="title">
                            <h3>Cars Photo Gallery</h3>
                        </div>
                        <div class="photo-gallery-inner">
                            <div class="row">
                                <?php
                                $count = 0;
                                foreach ($get_all_car_image as $row) {
                                    $img = base_url("asiahilux_admin/storage/app/images/car_images/" . $row["car_d_id"] . '/' . $row["stored_file_name"]);

                                ?>
                                    <a href="<?= $img; ?>" data-toggle="lightbox" data-gallery="gallery" class="col-md-3 col-sm-6">
                                        <img src="<?= $img; ?>" class="img-fluid">
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="static-page export-info">
                        <ul class="list-inline">
                            <p><?php echo $home_page_content; ?></p>
                        </ul>
                    </div>


                    <div class="car-reviews d-none">
                        <div class="title">
                            <h3>Car Reviews</h3>
                            <a href="#">See More</a>
                        </div>

                        <div class="car-reviews-inner">
                            <ul>
                                <li><a href="#">Used Mazda Spiano Cars for Sale</a></li>
                                <li><a href="#">Used Mazda Scrum Truck for Sale</a></li>
                                <li><a href="#">Used Ford F150 Cars for Sale</a></li>
                                <li><a href="#">Volkswagen Passat CC</a></li>
                                <li><a href="#">Volkswagen the Beetle</a></li>
                                <li><a href="#">Audi A6 Avant</a></li>
                                <li><a href="#">Lexus RX 270</a></li>
                                <li><a href="#">Audi Rs5</a></li>
                                <li><a href="#">USED LEXUS CARS IN ZAMBIA</a></li>
                                <li><a href="#">Used Cars in Guyana</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!--Main Content End-->
            </div>
            <?php include("left_side_bar.php"); ?>
            <div class="col-md-3 col-sm-12 right-sidebar order-sm-2">
                <div class="col-right">
                    <div class="search-cars">
                        <div class="title">
                            <img src="<?php echo base_url() ?>assets/images/icon_search01.png" />
                            <h5>Search Cars</h5>
                        </div>
                        <form action="<?php echo base_url() ?>search" method="POST">
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="form-group">
                                <select name="make_id" class="make_car js-select2 form-control">
                                    <option value="">Maker</option>
                                    <?php foreach ($manufacturer as $make) { ?>
                                        <option value='<?php echo $make['vm_id'] ?>'><?php echo $make['vm_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="module_list js-select2 form-control" name="module">
                                    <option value="">Model</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="js-select2 form-control" name="transmission">
                                    <option selected disabled>Transmission</option>
                                    <option value="1">Automatic</option>
                                    <option value="2">Manual</option>
                                    <option value="3">Automanual</option>
                                </select>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <select name="steering" class="js-select2 form-control">-->
                            <!--        <option selected disabled>RHD/LHD</option>-->
                            <!--        <option value="1">Left</option>-->
                            <!--        <option value="2">Right</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                            <div class="form-group">
                                <select class="js-select2 form-control" name="fuel">
                                    <option <?php if (empty($fuel)) echo "selected" ?> value="">Select Fuel</option>
                                    <option value="1">CNG</option>
                                    <option value="2">Diesel</option>
                                    <option value="3">Electric</option>
                                    <option value="4">LPG</option>
                                    <option value="5">Petrol</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="js-select2 form-control" name="body_type">
                                    <option selected disabled>Select Body type</option>
                                    <?php foreach ($car_bodytype_dropdown as $car_bodytype) { ?>
                                        <option value='<?= $car_bodytype['bodytype_id'] ?>'><?= $car_bodytype['bodytype_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-row date-selection">
                                <div class="form-group col-sm-5">
                                    <select name="year_from" class="js-select2 form-control">
                                        <option selected disabled>Min Year</option>
                                        <?php for ($i = $current_year; $i >= 1950; $i--) { ?>
                                            <option value="<?= $i ?>" <?php if (!empty($year_from) && $year_from == $i) echo "selected" ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <span class="text-white">To</span>
                                </div>
                                <div class="form-group col-sm-5">
                                    <select name="year_to" class="js-select2 form-control">
                                        <option selected disabled>Max Year</option>
                                        <?php for ($i = $current_year; $i >= 1950; $i--) { ?>
                                            <option value="<?= $i ?>" <?php if (!empty($year_from) && $year_from == $i) echo "selected" ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="" name="refrence_no" class="form-control" placeholder="Stock Number">
                            </div>
                            <button type="submit" id="form-submit" class="btn btn-primary btn-block" style="display: block !important">Search Cars</button>
                        </form>
                    </div>
                    <div class="mt-3 mb-3">
                        <a href="<?= base_url('uploads/pdf/schedule.pdf'); ?>" target="_blank"><img src="<?php echo base_url() ?>assets/images/shipping_schedule.jpg" class="img-fluid img-hover" /></a>
                    </div>
                    <div class="fb-msg">
                        <!-- <h5>Facebook Widget Area</h5> -->
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhiluxasia%2F&tabs=timeline&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
                <!--Col Right End-->
            </div>
        </div>
    </div>

    <div class="modal fade" id="ignismyModal" role="dialog">
        <div class="modal-dialog alert alert-success">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h3>Thank you for connecting us..</h3>
        </div>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.make_car').on('change', function() {

            var id = $(this).val()

            $.ajax({
                url: "<?php echo base_url() ?>home/get_models_by_make/" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    $('.module_list option').not('option:first').remove()
                    for (var i = 0; i < res.length; i++) {
                        $('.module_list').append('<option value="' + res[i]['m_id'] + '">' + res[i]['model_name'] + '</option>')
                    }

                }
            });
        });

    });


    <?php if ($this->session->flashdata('success')) : ?>
        <?php echo $this->session->flashdata('success'); ?>
    <?php endif ?>
</script>