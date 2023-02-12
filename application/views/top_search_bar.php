<?php $current_year = date('Y');?>
<form action="<?= base_url()?>home/search" method="GET">
    <div class="form-row">
        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="make_car js-select2 form-control" name="make_id">
                <option <?php if(empty($make_id)) echo "selected"?> value="">Select Maker</option>
                <?php foreach ($manufacturer as $make) { ?>
                <option value='<?= $make['vm_id']?>' <?php if(!empty($make_id) && $make_id == $make['vm_id']) echo "selected"?>><?= $make['vm_name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="module_list js-select2 form-control" name="module">
                <option value="">Select Model</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="js-select2 form-control" name="fuel">
                <option <?php if(empty($fuel)) echo "selected"?> value="">Select Fuel</option>
                <option value="1" <?php if(!empty($fuel) && $fuel == 1) echo "selected"?>>CNG</option>
                <option value="2" <?php if(!empty($fuel) && $fuel == 2) echo "selected"?>>Diesel</option>
                <option value="3" <?php if(!empty($fuel) && $fuel == 3) echo "selected"?>>Electric</option>
                <option value="4" <?php if(!empty($fuel) && $fuel == 4) echo "selected"?>>LPG</option>
                <option value="5" <?php if(!empty($fuel) && $fuel == 5) echo "selected"?>>Petrol</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="js-select2 form-control" name="steering">
                <option <?php if(empty($steering)) echo "selected"?> value="">Select Steering</option>
                <option value="1" <?php if(!empty($steering) && $steering == 1) echo "selected"?>>Left</option>
                <option value="2" <?php if(!empty($steering) && $steering == 2) echo "selected"?>>Right</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="js-select2 form-control" name="body_type">
                <option <?php if(empty($body_type)) echo "selected"?> value="">Select Body type</option>
                <?php foreach ($car_bodytype_dropdown as $car_bodytype) { ?>
                <option value='<?= $car_bodytype['bodytype_id']?>' <?php if(!empty($body_type) && $body_type == $car_bodytype['bodytype_id']) echo "selected"?>><?= $car_bodytype['bodytype_name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="js-select2 form-control" name="transmission">
                <option <?php if(empty($transmission)) echo "selected"?> value="">Select Transmission</option>
                <option value="1" <?php if(!empty($transmission) && $transmission == 1) echo "selected"?>>Automatic</option>
                <option value="2" <?php if(!empty($transmission) && $transmission == 2) echo "selected"?>>Manual</option>
                <option value="3" <?php if(!empty($transmission) && $transmission == 3) echo "selected"?>>Automanual</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6">
            <select class="js-select2 form-control" name="engine_capacity_from">
                <option value="">Select Min Eng.cc</option>
                <option value="700" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 700) echo "selected"?>>700 cc</option>
                <option value="1000" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 1000) echo "selected"?>>1,000 cc</option>
                <option value="1500" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 1500) echo "selected"?>>1,500 cc</option>
                <option value="1800" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 1800) echo "selected"?>>1,800 cc</option>
                <option value="2000" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 2000) echo "selected"?>>2,000 cc</option>
                <option value="2500" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 2500) echo "selected"?>>2,500 cc</option>
                <option value="3000" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 3000) echo "selected"?>>3,000 cc</option>
                <option value="4000" <?php if(!empty($engine_capacity_from) && $engine_capacity_from == 4000) echo "selected"?>>4,000 cc</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6 combine">
            <select class="js-select2 form-control" name="price_from">
                <option value="">Min Price</option>
                <option value="500" <?php if(!empty($price_from) && $price_from == 500) echo "selected"?>>$500</option>
                <option value="750" <?php if(!empty($price_from) && $price_from == 750) echo "selected"?>>$750</option>
                <option value="1000" <?php if(!empty($price_from) && $price_from == 1000) echo "selected"?>>$1,000</option>
                <option value="1500" <?php if(!empty($price_from) && $price_from == 1500) echo "selected"?>>$1,500</option>
                <option value="2000" <?php if(!empty($price_from) && $price_from == 2000) echo "selected"?>>$2,000</option>
                <option value="2500" <?php if(!empty($price_from) && $price_from == 2500) echo "selected"?>>$2,500</option>
                <option value="3000" <?php if(!empty($price_from) && $price_from == 3000) echo "selected"?>>$3,000</option>
                <option value="3500" <?php if(!empty($price_from) && $price_from == 3500) echo "selected"?>>$3,500</option>
                <option value="4000" <?php if(!empty($price_from) && $price_from == 4000) echo "selected"?>>$4,000</option>
                <option value="4500" <?php if(!empty($price_from) && $price_from == 4500) echo "selected"?>>$4,500</option>
                <option value="5000" <?php if(!empty($price_from) && $price_from == 5000) echo "selected"?>>$5,000</option>
                <option value="6000" <?php if(!empty($price_from) && $price_from == 6000) echo "selected"?>>$6,000</option>
                <option value="7000" <?php if(!empty($price_from) && $price_from == 7000) echo "selected"?>>$7,000</option>
                <option value="8000" <?php if(!empty($price_from) && $price_from == 8000) echo "selected"?>>$8,000</option>
                <option value="9000" <?php if(!empty($price_from) && $price_from == 9000) echo "selected"?>>$9,000</option>
                <option value="10000" <?php if(!empty($price_from) && $price_from == 10000) echo "selected"?>>$10,000</option>
                <option value="15000" <?php if(!empty($price_from) && $price_from == 15000) echo "selected"?>>$15,000</option>
                <option value="20000" <?php if(!empty($price_from) && $price_from == 20000) echo "selected"?>>$20,000</option>
            </select>
            <span class="tiled">~</span>
            <select class="js-select2 form-control" name="price_to">
                <option value="">Max Price</option>
                <option value="500" <?php if(!empty($price_to) && $price_to == 500) echo "selected"?>>$500</option>
                <option value="750" <?php if(!empty($price_to) && $price_to == 750) echo "selected"?>>$750</option>
                <option value="1000" <?php if(!empty($price_to) && $price_to == 1000) echo "selected"?>>$1,000</option>
                <option value="1500" <?php if(!empty($price_to) && $price_to == 1500) echo "selected"?>>$1,500</option>
                <option value="2000" <?php if(!empty($price_to) && $price_to == 2000) echo "selected"?>>$2,000</option>
                <option value="2500" <?php if(!empty($price_to) && $price_to == 2500) echo "selected"?>>$2,500</option>
                <option value="3000" <?php if(!empty($price_to) && $price_to == 3000) echo "selected"?>>$3,000</option>
                <option value="3500" <?php if(!empty($price_to) && $price_to == 3500) echo "selected"?>>$3,500</option>
                <option value="4000" <?php if(!empty($price_to) && $price_to == 4000) echo "selected"?>>$4,000</option>
                <option value="4500" <?php if(!empty($price_to) && $price_to == 4500) echo "selected"?>>$4,500</option>
                <option value="5000" <?php if(!empty($price_to) && $price_to == 5000) echo "selected"?>>$5,000</option>
                <option value="6000" <?php if(!empty($price_to) && $price_to == 6000) echo "selected"?>>$6,000</option>
                <option value="7000" <?php if(!empty($price_to) && $price_to == 7000) echo "selected"?>>$7,000</option>
                <option value="8000" <?php if(!empty($price_to) && $price_to == 8000) echo "selected"?>>$8,000</option>
                <option value="9000" <?php if(!empty($price_to) && $price_to == 9000) echo "selected"?>>$9,000</option>
                <option value="10000" <?php if(!empty($price_to) && $price_to == 10000) echo "selected"?>>$10,000</option>
                <option value="15000" <?php if(!empty($price_to) && $price_to == 15000) echo "selected"?>>$15,000</option>
                <option value="20000" <?php if(!empty($price_from) && $price_to == 20000) echo "selected"?>>$20,000</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6 combine">
            <select class="js-select2 form-control" name="mileage_from">
                <option value="">Min Mileage</option>
                <option value="50000" <?php if(!empty($mileage_from) && $mileage_from == 50000) echo "selected"?>>50,000 km</option>
                <option value="80000" <?php if(!empty($mileage_from) && $mileage_from == 80000) echo "selected"?>>80,000 km</option>
                <option value="100000" <?php if(!empty($mileage_from) && $mileage_from == 100000) echo "selected"?>>100,000 km</option>
                <option value="150000" <?php if(!empty($mileage_from) && $mileage_from == 150000) echo "selected"?>>150,000 km</option>
                <option value="200000" <?php if(!empty($mileage_from) && $mileage_from == 200000) echo "selected"?>>200,000 km</option>
                <option value="300000" <?php if(!empty($mileage_from) && $mileage_from == 300000) echo "selected"?>>300,000 km</option>
            </select>
            <span class="tiled">~</span>
            <select class="js-select2 form-control" name="mileage_to" id="mileage_to">
                <option value="">Max Mileage</option>
                <option value="50000" <?php if(!empty($mileage_to) && $mileage_to == 50000) echo "selected"?>>50,000 km</option>
                <option value="80000" <?php if(!empty($mileage_to) && $mileage_to == 80000) echo "selected"?>>80,000 km</option>
                <option value="100000" <?php if(!empty($mileage_to) && $mileage_to == 100000) echo "selected"?>>100,000 km</option>
                <option value="150000" <?php if(!empty($mileage_to) && $mileage_to == 150000) echo "selected"?>>150,000 km</option>
                <option value="200000" <?php if(!empty($mileage_to) && $mileage_to == 200000) echo "selected"?>>200,000 km</option>
                <option value="300000" <?php if(!empty($mileage_to) && $mileage_to == 300000) echo "selected"?>>300,000 km</option>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6 combine">
            <select class="js-select2 form-control" name="year_from">
                <option value="">Min year</option>
                <?php for($i = $current_year ; $i>=1950; $i--){ ?>
                    <option value="<?= $i ?>" <?php if(!empty($year_from) && $year_from == $i) echo "selected"?>><?= $i ?></option>
                <?php } ?>
            </select>
            <span class="tiled">~</span>
            <select class="js-select2 form-control" name="month_from">
                <option value="">Month From</option>
                <?php for($i = 1; $i<=12; $i++){?>
                <option value="<?= $i ?>" <?php if(!empty($month_from) && $month_from == $i) echo "selected"?>><?= $i ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-lg-3 col-md-4 col-sm-6 combine">
            <select class="js-select2 form-control" name="year_to">
                <option value="">Max year</option>
                <?php for($i = $current_year ; $i>=1950; $i--){?>
                <option value="<?= $i ?>" <?php if(!empty($year_to) && $year_to == $i) echo "selected"?>><?= $i ?></option>
                <?php } ?>
            </select>
            <span class="tiled">~</span>
            <select class="js-select2 form-control" name="month_to">
                <option value="">Month To</option>
                <?php for($i = 1; $i<=12; $i++){?>
                <option value="<?= $i ?>" <?php if(!empty($month_to) && $month_to == $i) echo "selected"?>><?= $i ?></option>
                <?php } ?>
            </select>
        </div>
        <!--<div class="form-group col-lg-3 col-md-4 col-sm-6">-->
        <!--    <select class="js-select2 form-control" name="sort">-->
        <!--        <option value="">Sort By</option>-->
        <!--        <option value="price_asc"    <?php if (!empty($sort) && $sort == "price_asc") echo "selected"; ?>  >Price Low to High</option>-->
        <!--        <option value="price_desc"   <?php if (!empty($sort) && $sort == "price_desc") echo "selected"; ?> >Price High to Low</option>-->
        <!--        <option value="year_asc"     <?php if (!empty($sort) && $sort == "year_asc") echo "selected"; ?>   >Year Old to New</option>-->
        <!--        <option value="year_desc"    <?php if (!empty($sort) && $sort == "year_desc") echo "selected"; ?>  >Year New to Old</option>-->
        <!--        <option value="mileage_asc"  <?php if (!empty($sort) && $sort == "mileage_asc") echo "selected"; ?>>Mileage Low to High</option>-->
        <!--        <option value="mileage_desc" <?php if (!empty($sort) && $sort == "mileage_desc") echo "selected";?>>Mileage High to Low</option>-->
        <!--    </select>-->
        <!--</div>-->
        <div class="form-group col-lg-3 col-md-4 col-sm-6 combine">
            <select class="js-select2 form-control" name="wheel_type">
                <option value="">Wheel Drive</option>
                <option value="2wd"  <?php if (!empty($wheel_type) && $wheel_type == "2wd") echo "selected"; ?>  >2WD</option>
                <option value="4wd" <?php if (!empty($wheel_type) && $wheel_type == "4wd") echo "selected"; ?> >4WD</option>

            </select>
            <span class="tiled"></span>
            <select class="js-select2 form-control" name="sort">
                <option value="">Sort By</option>
                <option value="price_asc"    <?php if (!empty($sort) && $sort == "price_asc") echo "selected"; ?>  >Price Low to High</option>
                <option value="price_desc"   <?php if (!empty($sort) && $sort == "price_desc") echo "selected"; ?> >Price High to Low</option>
                <option value="year_asc"     <?php if (!empty($sort) && $sort == "year_asc") echo "selected"; ?>   >Year Old to New</option>
                <option value="year_desc"    <?php if (!empty($sort) && $sort == "year_desc") echo "selected"; ?>  >Year New to Old</option>
                <option value="mileage_asc"  <?php if (!empty($sort) && $sort == "mileage_asc") echo "selected"; ?>>Mileage Low to High</option>
                <option value="mileage_desc" <?php if (!empty($sort) && $sort == "mileage_desc") echo "selected";?>>Mileage High to Low</option>
            </select>
        </div>
    </div>
    <!--Form Row End-->

    <div class="collapse" id="moreDetails">
        <div class="card card-body">
            <div class="form-row panel">
            </div>
            <!--Form Row End-->
        </div>
    </div>
    <!--More Details-->

    <div class="col-sm-12">
        <div class="row">
            <div class="search-reset-btns">
                <!--<button type="reset" id="" class="btn btn-primary reset" onclick="test()">Reset</button>-->
                <button type="submit" id="form-submit" class="btn btn-primary filter-now">Search</button>
            </div>
        </div>
    </div>
</form>
<script>
//     $("#reset").click(function(){
//     });
//     function test(){
//         alert();
// 		let select = $('select');
//         $.each(select, function (i) {
//             console.log($(this).val());
//             $(this).val('');
//         });
//     }

</script>
