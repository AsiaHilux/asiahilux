<style>
    .btn-dark {
        background-color: black !important;
    }

    @media (min-width: 0px) and (max-width: 767px) {
        .small-banner,.left_side_btn {
            display: none !important;
        }
        .show_hide {
            display: block !important;
        }
    }
</style>
<div class="col-md-3 col-sm-12 left-sidebar order-sm-first">
    <div class="col-left">
        <div class="small-banner mb-4">
            <a href="https://asiahilux.com/all-new-arrival"><img src="<?php echo base_url() ?>/assets/images/Hlux.gif" alt="" class="img-fluid img-hover" /></a>
        </div>


        <div class="list list-with-icon">
            <div class="list-title">
                <h3>Search By Make</h3>
            </div>
            <ul class="list-group thumb_mb">
                <?php
                $count = 1;
                foreach ($get_make_count as $row) {
                    $small = strtolower($row['vm_name']);
                    $fac = ucfirst($small);
                    $fac_1 = str_replace(" ", "-", $fac);
                    $fac_1 = str_replace("/", "-", $fac_1);
                    $fac_1 = str_replace("(", "-", $fac_1);
                    $fac_1 = str_replace(")", "-", $fac_1);
                ?>
                    <li <?php if ($count > 5) echo 'class="show_hide" style="display:none;"'; ?>>
                        <img src="<?php echo base_url() ?>uploads/make_logos/<?php echo $row['stored_file_name']; ?>" alt="icon" />
                        <a href="<?php echo base_url() ?>brand/<?= $small; ?>"><?= $fac; ?><b>(<?= $row['make_count']; ?>)</b>
                        </a>
                    </li>
                <?php $count++;
                } ?>
                <?php if (count($get_search_by_type_list_Count) > 5) { ?>
                    <button class="btn-dark text-white btn-block left_side_btn" type="button" onclick="showHideFxn(this)" data-show="0">Show More</button>
                <?php } ?>
            </ul>
        </div>

        <?php if (!empty($get_make_count_country)) { ?>
            <div class="list list-with-icon-globe">
                <div class="list-title">
                    <h3>Search By Inventory Location</h3>
                </div>
                <ul class="list-group thumb_mb">
                    <?php
                    $count = 1;
                    foreach ($get_make_count_country as $row) {
                    ?>
                        <li><a href="<?php echo base_url(); ?>country/<?php echo $row['country_name'] ?>" <?php if ($count > 5) echo 'class="show_hide" style="display:none;"'; ?>><img src="<?php echo base_url() ?>assets/images/<?php echo $row['stored_file_name']; ?>" alt="<?php echo $row['country_name']; ?>" /> <?php echo $row['country_name']; ?> <b>(<?php echo $row['country_count']; ?>)</b></a> </li>

                    <?php
                        $count++;
                    } ?>
                    <?php if (count($get_make_count_country) > 5) { ?>
                        <button class="btn-dark text-white btn-block left_side_btn" type="button" onclick="showHideFxn(this)" data-show="0">Show More</button>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <div class="list list-with-icon">
            <div class="list-title">
                <h3>Search By Model</h3>
            </div>
            <ul class="list-group thumb_mb">
                <?php
                $count = 1;
                foreach ($get_model_count as $row) {
                    $string = $row['model_name'];
                    $car_model_name = str_replace(" ", "-", $string);
                    $small = strtolower($car_model_name);
                    $fac = strtolower($string);
                    $fac1 = ucfirst($fac);
                    $small = str_replace("/", "-", $small);
                    $small = str_replace("(", "-", $small);
                    $small = str_replace(")", "-", $small);
                ?>
                    <li <?php if ($count > 5) echo 'class="show_hide" style="display:none;"'; ?>>
                        <img src="<?php echo base_url() ?>assets/images/Convertible-179x79.png" alt="Search by type icon" />
                        <a href="<?php echo base_url() ?>model/<?= $small; ?>"><?php echo $fac1; ?><b>(<?php echo $row['make_count']; ?>)</b>
                        </a>
                    </li>
                <?php $count++;
                } ?>
                <?php if (count($get_search_by_type_list_Count) > 5) { ?>
                    <button class="btn-dark text-white btn-block left_side_btn" type="button" onclick="showHideFxn(this)" data-show="0">Show More</button>
                <?php } ?>
            </ul>
        </div>

        <div class="list">
            <div class="list-title">
                <h3>Search By Price</h3>
            </div>
            <ul class="list-group thumb_mb">
                <li>
                    <a href="<?php echo base_url() ?>price-under/8000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">Under $8000</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>by-price/8000/12000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">$8000 - $12000</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>by-price/12000/15000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">$12000 - $15000</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>by-price/15000/20000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">$15000 - $20000</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>by-price/20000/25000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">$20000 - $25000</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>price-over/25000"><img src="<?php echo base_url() ?>uploads/make_logos/dollarimage.png" alt="Search By Price Icon Image" class="search-by-price-icon-image">Over $25000</a>
                </li>
            </ul>
        </div>

        <div class="list list-with-icon">
            <div class="list-title">
                <h3>Search By Type</h3>
            </div>
            <ul class="list-group thumb_mb">
                <?php
                $count = 1;
                foreach ($get_search_by_type_list_Count as $row) {
                    $string = $row['bodytype_name'];
                    $car_body_type = str_replace(" ", "-", $string);
                    $small_cbt = strtolower($car_body_type);
                ?>
                    <li <?php if ($count > 5) echo 'class="show_hide" style="display:none;"'; ?>>
                        <img src="<?php echo base_url() ?>assets/images/Convertible-179x79.png" alt="Search by type icon" />
                        <a href="<?php echo base_url() ?>car-type/<?php echo $small_cbt; ?>"><?php echo $row['bodytype_name']; ?><b>(<?php echo $row['make_count']; ?>)</b>
                        </a>
                    </li>

                <?php $count++;
                } ?>
                <?php if (count($get_search_by_type_list_Count) > 5) { ?>
                    <button class="btn-dark text-white btn-block left_side_btn" type="button" onclick="showHideFxn(this)" data-show="0">Show More</button>
                <?php } ?>
            </ul>
        </div>

        <div class="list">
            <div class="list-title">
                <h3>Asia Hilux Bangkok</h3>
            </div>
            <ul class="list-group">
                <li><i class="fa fa-map-marker"></i> 114 SOI PETCHKASEM 112, NONGKANGPLU, NONGKHAM, BANGKOK</li>
                <li><i class="fa fa-phone"> </i><a href="tel:+66633031732"> +66 6330 31732</a>
                <li>
                <li><i class="fa fa-phone"> </i><a href="tel:+66633031735"> +66 6330 31735</a>
                <li>
            </ul>
        </div>

    </div>
</div>

<script>
    function showHideFxn(obj) {
        let show = $(obj).data('show');
        if (show == 0) {
            $(obj).text('Show Less');
            $(obj).data('show', 1);
            $(obj).closest('.list-group').find('.show_hide').fadeIn();
        } else if (show == 1) {
            $(obj).text('Show More');
            $(obj).data('show', 0);
            $(obj).closest('.list-group').find('.show_hide').fadeOut();
        }
    }
</script>