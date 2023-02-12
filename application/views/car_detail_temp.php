
<?php
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
// echo "<pre>";print_r($csrf);die;
// echo "<pre>";print_r($make['vm_name']);die;

?>
<style>
    @media (min-width: 0px) and (max-width: 767px) {
        .carleft-sidebar {
            display: none;
        }
    }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<main id="main">
    <div id="dtl_page" class="container mt-160 detail-page">
        <div class="alert alert-success" role="alert" style="display:none;">
            This is a success alert—check it out!
        </div>
        <div class="alert alert-danger" role="alert" style="display:none;">
            This is a success alert—check it out!
        </div>
        <div class="row">
            <div class="col-md-2 carleft-sidebar">
                <div class="list">
                    <div class="list-title" style="background-color:#2e3192 !important;">
                        <span>Related Cars</span>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($getSameCarModels as $side_car) {
                        $side_make = $side_car['vm_name'];
                        $remove_first_dash_in_name = str_replace('-', '', $side_car['model_name']);
                        $side_car_name = $side_car['car_d_id'] . '/' . $side_make . '-' . $remove_first_dash_in_name;
                        $remove_dot = str_replace('.', '-', $side_car_name);
                        $remove_space = str_replace(' ', '-', $remove_dot);
                        $all_small = strtolower($remove_space);
                        $side_url =  base_url() . 'car-detail/' . $all_small;
                    ?>
                        <div class="col-md-12">
                            <a href="<?= $side_url; ?>">
                                <div class="grid-item p-0">
                                    <div class="item-img">
                                        <?php
                                        if ($side_car['stored_file_name'] == true) {
                                            $img = $side_car['stored_file_name'];
                                        } else {
                                            $img = "No-image-found.jpg";
                                        }
                                        ?>
                                        <img src="<?= base_url('uploads/thumbnail/' . $img); ?>" class="img-fluid" alt="Asia Hilux Car Thumbnail Image" />
                                    </div>
                                    <div class="item-desc">
                                        <div class="item-title">
                                            <p><?= $side_car['vm_name'] . ' ' . $side_car['model_name'] ?></p>
                                        </div>
                                        <div class="item-price">
                                            <strong>Price: $<?= $side_car['carprice'] ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-8 mid_d_pg">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="detail-top-content-left pl-3" style="background-color:#2e3192 !important;color:white;">
                            <div class="stock-id" style="float:right;padding:3px;">
                                <p>Stock Id: <?= $get_car_detail['VehicleNo'] ?></p>
                            </div>
                            <h4> <?= $make['vm_name'] ?>
                                <?php if ($get_car_detail['model_name'] == true) echo $get_car_detail['model_name'];
                                else echo " "; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="detail-page-left-side" style="margin-top:3px;">
                    <div class="detail-page-gallery">
                        <div class="carousel-container ">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $no = 0;
                                    foreach ($car_images as $img) {
                                        if ($no == 0) {
                                            $class = 'active';
                                        } else {
                                            $class = '';
                                        } ?>
                                        <div class="carousel-item <?= $class; ?>" data-slide-number="<?= $img['s_no']; ?>">
                                            <?php if ($img['stored_file_name'] == true) {
                                                $imgs = $img['car_d_id'] . '/' . $img['stored_file_name'];
                                            } else {
                                                $imgs = "No-image-found.jpg";
                                            } ?>
                                            <img src="<?= base_url(); ?>/uploads/<?= $imgs ?>" class="d-block w-100" alt="<?= $imgs ?>" data-remote="<?= base_url(); ?>/uploads/<?= $imgs ?>" data-type="image" data-toggle="lightbox" data-gallery="example-gallery" />
                                        </div>
                                    <?php $no++;
                                    } ?>
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $no = 0;
                                    foreach ($car_images_thumb as $row) { ?>
                                        <?php
                                        if ($no == 0) {
                                            $class = 'active';
                                        } else {
                                            $class = '';
                                        } ?>
                                        <div class="carousel-item <?= $class; ?>">
                                            <div class="row">
                                                <?php $s_no = 0;
                                                foreach ($row as $images) { ?>
                                                    <?php
                                                    if ($s_no == 0) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    } ?>
                                                    <?php if ($images['stored_file_name'] == true) {
                                                        $imgs = $images['car_d_id'] . '/' . $images['stored_file_name'];;
                                                    } else {
                                                        $imgs = "No-image-found.jpg";
                                                    } ?>
                                                    <div id="carousel-selector-<?= $images['s_no']; ?>" class="col-2 col-sm-2 px-1 py-2 <?= $selected; ?>" data-target="#myCarousel" data-slide-to="<?= $images['s_no']; ?>">
                                                        <img src="<?= base_url(); ?>/uploads/<?= $imgs ?>" class="img-fluid" alt="..." />
                                                    </div>
                                                <?php $s_no++;
                                                } ?>
                                            </div>
                                        </div>
                                    <?php $no++;
                                    } ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="detail-page-table">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center col-bg">
                                <thead>
                                    <tr>
                                        <th colspan="4">
                                            <h6><?= $make['vm_name'] . $get_car_detail['model_name']; ?> - Car Details</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Stock Id:</b></td>
                                        <td><?= $get_car_detail['VehicleNo'] ?></td>
                                        <td><b>Body type:</b></td>
                                        <td>
                                            <?php if ($get_car_detail['Bodytype'] == true) { ?>

                                                <?php if ($get_car_detail['Bodytype'] == 1) {
                                                    echo "Coupe";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 2) {
                                                    echo "Convertible";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 3) {
                                                    echo "Hatchback";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 4) {
                                                    echo "Sedan";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 5) {
                                                    echo "Wagon";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 6) {
                                                    echo "SUV";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 7) {
                                                    echo "Pick up";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 8) {
                                                    echo "Van";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 9) {
                                                    echo "Truck";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 10) {
                                                    echo "Mini Bus";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 11) {
                                                    echo "Bus 20 Seats";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 15) {
                                                    echo "Mini Van";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 16) {
                                                    echo "Machinery";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 17) {
                                                    echo "Bus";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 18) {
                                                    echo "Mini Vehicle";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 20) {
                                                    echo "Unspecified";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 25) {
                                                    echo "Part";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 26) {
                                                    echo "Motorcycle";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 27) {
                                                    echo "Tractor";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 28) {
                                                    echo "Forklift";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 29) {
                                                    echo "Other(Private)";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 30) {
                                                    echo "Electronics";
                                                } ?>

                                                <?php if ($get_car_detail['Bodytype'] == 31) {
                                                    echo "Others";
                                                } ?>

                                            <?php } else {
                                                echo "-";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Fuel:</b></td>
                                        <td><?php if ($get_car_detail['Fuel'] == true) { ?>
                                                <?php if ($get_car_detail['Fuel'] == 1) {
                                                    echo "CNG";
                                                } ?>

                                                <?php if ($get_car_detail['Fuel'] == 2) {
                                                    echo "Diesel";
                                                } ?>

                                                <?php if ($get_car_detail['Fuel'] == 3) {
                                                    echo "Electric";
                                                } ?>

                                                <?php if ($get_car_detail['Fuel'] == 4) {
                                                    echo "LPG";
                                                } ?>

                                                <?php if ($get_car_detail['Fuel'] == 5) {
                                                    echo "Petrol";
                                                } ?>
                                            <?php } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Transmission:</b></td>
                                        <td><?php if ($get_car_detail['Transmission'] == true) { ?>
                                                <?php if ($get_car_detail['Transmission'] == 1) {
                                                    echo "Automatic";
                                                } ?>

                                                <?php if ($get_car_detail['Transmission'] == 2) {
                                                    echo "Manual";
                                                } ?>

                                                <?php if ($get_car_detail['Transmission'] == 3) {
                                                    echo "Automanual";
                                                } ?>

                                            <?php } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Steering:</b></td>
                                        <td><?php if ($get_car_detail['Steering'] == true) { ?>
                                                <?php if ($get_car_detail['Steering'] == 1) {
                                                    echo "Left";
                                                } ?>

                                                <?php if ($get_car_detail['Steering'] == 2) {
                                                    echo "Right";
                                                } ?>

                                            <?php } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Weight:</b></td>
                                        <td><?php if ($get_car_detail['Weight'] == true) {
                                                echo $get_car_detail['Weight'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Model Code:</b></td>
                                        <td><?php if ($get_car_detail['ModelCode'] == true) {
                                                echo $get_car_detail['ModelCode'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Version Class:</b></td>
                                        <td><?php if ($get_car_detail['VersionClass'] == true) {
                                                echo $get_car_detail['VersionClass'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Engine Code:</b></td>
                                        <td><?php if ($get_car_detail['EngineCode'] == true) {
                                                echo $get_car_detail['EngineCode'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Mileage:</b></td>
                                        <td><?php if ($get_car_detail['Mileage'] == true) {
                                                echo $get_car_detail['Mileage'] . ' km';
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Engine Size:</b></td>
                                        <td><?php if ($get_car_detail['EngineSize'] == true) {
                                                echo $get_car_detail['EngineSize'] . ' cc';
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Registration Year:</b></td>
                                        <td><?php if ($get_car_detail['RegistrationYear'] == true) {
                                                echo $get_car_detail['RegistrationYear'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Registration Month:</b></td>
                                        <td><?php if ($get_car_detail['RegistrationMonth'] == true) {
                                                echo $get_car_detail['RegistrationMonth'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Manufacture Year:</b></td>
                                        <td><?php if ($get_car_detail['ManufactureYear'] == true) {
                                                echo $get_car_detail['ManufactureYear'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Manufacture Month:</b></td>
                                        <td><?php if ($get_car_detail['ManufactureMonth'] == true) {
                                                echo $get_car_detail['ManufactureMonth'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Ext Color:</b></td>
                                        <td><?php if ($get_car_detail['Ext_Color'] == true) {
                                                echo $get_car_detail['Ext_Color'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Wheel Drive:</b></td>
                                        <td><?php if ($get_car_detail['WheelDrive'] == true) {
                                                echo $get_car_detail['WheelDrive'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Location:</b></td>
                                        <td><?php if ($get_car_detail['Location'] == true) {
                                                echo $get_car_detail['Location'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Dimension:</b></td>
                                        <td><?php if ($get_car_detail['Dimension'] == true) {
                                                echo $get_car_detail['Dimension'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Doors</b></td>
                                        <td><?php if ($get_car_detail['Doors'] == true) {
                                                echo $get_car_detail['Doors'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>M3:</b></td>
                                        <td><?php if ($get_car_detail['M3'] == true) {
                                                echo $get_car_detail['M3'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                        <td><b>Seats</b></td>
                                        <td><?php if ($get_car_detail['Seats'] == true) {
                                                echo $get_car_detail['Seats'];
                                            } else {
                                                echo "-";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Chassis No:</b></td>
                                        <td colspan="3"><?php if ($get_car_detail['Chassis'] == true) {
                                                            echo $get_car_detail['Chassis'];
                                                        } else {
                                                            echo "-";
                                                        } ?></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="detail-page-table">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">
                                        <h6>Accessories</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td <?php if ($get_car_detail['CDPlayer'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['CDPlayer'] == 1) { ?>
                                            CD Player
                                        <?php } else { ?>
                                            CD Player
                                        <?php } ?></td>

                                    <td <?php if ($get_car_detail['SunRoof'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['SunRoof'] == 1) { ?>
                                            Sun Roof
                                        <?php } else { ?>
                                            Sun Roof
                                        <?php } ?></td>

                                    <td <?php if ($get_car_detail['LeatherSeat'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['LeatherSeat'] == 1) { ?>
                                            Leather Seat
                                        <?php } else { ?>
                                            Leather Seat
                                        <?php } ?></td>


                                    <td <?php if ($get_car_detail['AlloyWheels'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['AlloyWheels'] == 1) { ?>
                                            Alloy Wheels
                                        <?php } else { ?>
                                            Alloy Wheels
                                        <?php } ?></td>

                                </tr>
                                <tr>
                                    <td <?php if ($get_car_detail['PowerSteering'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['PowerSteering'] == 1) { ?>
                                            Power Steering
                                        <?php } else { ?>
                                            Power Steering
                                        <?php } ?></td>

                                    <td <?php if ($get_car_detail['PowerWindow'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['PowerWindow'] == 1) { ?>
                                            Power Window
                                        <?php } else { ?>
                                            Power Window
                                        <?php } ?></td>

                                    <td <?php if ($get_car_detail['AC'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['AC'] == 1) { ?>
                                            AC
                                        <?php } else { ?>
                                            AC
                                        <?php } ?></td>

                                    <td <?php if ($get_car_detail['ABS'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['ABS'] == 1) { ?>
                                            ABS
                                        <?php } else { ?>
                                            ABS
                                        <?php } ?></td>
                                </tr>
                                <tr>

                                    <td <?php if ($get_car_detail['Airbag'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['Airbag'] == 1) { ?>
                                            Air bag
                                        <?php } else { ?>
                                            Air bag
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['Radio'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['Radio'] == 1) { ?>
                                            Radio
                                        <?php } else { ?>
                                            Radio
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['CDChanger'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['CDChanger'] == 1) { ?>
                                            CD Changer
                                        <?php } else { ?>
                                            CD Changer
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['DVD'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['DVD'] == 1) { ?>
                                            DVD
                                        <?php } else { ?>
                                            DVD
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td <?php if ($get_car_detail['TV'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['TV'] == 1) { ?>
                                            TV
                                        <?php } else { ?>
                                            TV
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['PoweSeat'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['PoweSeat'] == 1) { ?>
                                            Powe Seat
                                        <?php } else { ?>
                                            Powe Seat
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['BackTire'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['BackTire'] == 1) { ?>
                                            Back Tire
                                        <?php } else { ?>
                                            Back Tire
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['WheelSpanner'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['WheelSpanner'] == 1) { ?>
                                            Wheel Spanner
                                        <?php } else { ?>
                                            Wheel Spanner
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td <?php if ($get_car_detail['GrillGuard'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['GrillGuard'] == 1) { ?>
                                            Grill Guard
                                        <?php } else { ?>
                                            Grill Guard
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['RearSpoiler'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['RearSpoiler'] == 1) { ?>
                                            Rear Spoiler
                                        <?php } else { ?>
                                            Rear Spoiler
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['CentralLocking'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['CentralLocking'] == 1) { ?>
                                            Central Locking
                                        <?php } else { ?>
                                            Central Locking
                                        <?php } ?>
                                    </td>

                                    <td <?php if ($get_car_detail['Jack'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['Jack'] == 1) { ?>
                                            Jack
                                        <?php } else { ?>
                                            Jack
                                        <?php } ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td <?php if ($get_car_detail['SpareTire'] == 1) {
                                            echo "class='active-td'";
                                        } ?>><?php if ($get_car_detail['SpareTire'] == 1) { ?>
                                            Spare Tire
                                        <?php } else { ?>
                                            Spare Tire
                                        <?php } ?>
                                    </td>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="detail-page-right-side">
                    <form action="<?= base_url() ?>send-inquiry" method="post">
                        <div class="card mb-3">
                            <div class="card-header"><span>Total Price Calculator</span></div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="b-bottom">
                                                <td colspan="2">Vehicle Price</td>
                                                <td align="right">
                                                    <h6>
                                                        <?php $c_price = 0;
                                                        if ($get_car_detail['cardisprice'] > 0) { ?>
                                                            <strike>$<?= $get_car_detail['carprice'] ?></strike>
                                                            <b>$<?= $get_car_detail['cardisprice'] ?></b>
                                                        <?php $c_price = $get_car_detail['cardisprice'];
                                                        } else { ?>
                                                            <b>$<?= $get_car_detail['carprice'] ?></b>
                                                        <?php $c_price = $get_car_detail['carprice'];
                                                        } ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Destination Country</td>
                                                <td>
                                                    <select name="country" class="form-control" required id="country_list">
                                                        <option value="">Select Your Country*</option>
                                                        <?php foreach ($countrys as $country) { ?>
                                                            <option value="<?= $country['hv_port_country_id'] ?>"><?= $country['country_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Arrival Port</th>
                                                <th>Delivery Destination</th>
                                                <th>Select</th>
                                                <!-- <th>Service Details</th> -->
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="port_list">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Total Price:</td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td>CIF</td> -->
                                                <td><strong>$</strong><strong class="total_price"></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header"><span>Inquiry</span></div>
                            <div class="card-body">
                                <div class="col-lg-12">

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <label for="name">Name <span class="red-text">*</span></label> -->
                                                <input name="name" class="form-control" type="text" id="name" required placeholder="Name">
                                                <input name="car_d_id" type="hidden" value="<?= $get_car_detail['car_d_id'] ?>">
                                                <input name="country_name" class="country_name" type="hidden">
                                                <input name="car_name" type="hidden" value="<?= $get_car_detail['carname'] ?>">
                                                <input name="portName" class="portName" type="hidden">
                                                <input name="carprice" class="carprice" type="hidden">
                                                <input name="port_price" class="port_price" type="hidden">
                                                <input name="port_search_mac" type="hidden" value="32600">
                                                <input name="redirect" type="hidden" value="<?= $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ?>">
                                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <label for="email">Email <span class="red-text">*</span></label> -->
                                                <input name="email" class="form-control" type="text" id="email" pattern="[^ @]*@[^ @]*" required placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <label for="phone">Phone <span class="red-text">*</span></label> -->
                                                <input name="phone" class="form-control" type="text" id="phone" required placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <div class="form-group"><label for="phone">Address <span class="red-text"></span></label> -->
                                                <input name="address" class="form-control" type="text" id="address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        <button type="submit" id="form-submit" class="btn btn-primary mt-2 mb-3" style="width:100%;">Send Inquiry <br><span><small>(<?= count($inquiry); ?> people are inquiring)</small></span></button>
                                        <a href="https://api.whatsapp.com/send/?phone=66633031732&amp;text&amp;app_absent=0" target="_blank">
                                            <button type="button" class="btn" style="width:100%;background-color: #01e675;">
                                                <i class="fa fa-whatsapp"></i> Whatsapp
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="<?= base_url('uploads/qr_code/front_end_qrcode.jpeg') ?>" class="img-fluid" style="width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2 carright-sidebar">
                <div class="list">
                    <div class="list-title" style="background-color:#2e3192 !important;">
                        <span>Recommended Cars</span>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($getDiffCarModels as $side_car) {
                        $side_make = $side_car['vm_name'];
                        $remove_first_dash_in_name = str_replace('-', '', $side_car['model_name']);
                        $side_car_name = $side_car['car_d_id'] . '/' . $side_make . '-' . $remove_first_dash_in_name;
                        $remove_dot = str_replace('.', '-', $side_car_name);
                        $remove_space = str_replace(' ', '-', $remove_dot);
                        $all_small = strtolower($remove_space);
                        $side_url =  base_url() . 'car-detail/' . $all_small; ?>
                        <div class="col-md-12">
                            <a href="<?= $side_url; ?>">
                                <div class="grid-item p-0">
                                    <div class="item-img">
                                        <?php if ($side_car['stored_file_name'] == true) {
                                            $img = $side_car['stored_file_name'];
                                        } else {
                                            $img = "No-image-found.jpg";
                                        } ?>
                                        <img src="<?= base_url('uploads/thumbnail/' . $img); ?>" class="img-fluid" alt="Asia Hilux Car Thumbnail Image" />
                                    </div>
                                    <div class="item-desc">
                                        <div class="item-title">
                                            <p><?= $side_car['vm_name'] . ' ' . $side_car['model_name'] ?></p>
                                        </div>
                                        <div class="item-price">
                                            <strong>Price: $<?= $side_car['carprice'] ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')) { ?>
            $('.alert-success').html('<?= $this->session->flashdata('success'); ?>').show();
        <?php } elseif ($this->session->flashdata('error')) { ?>
            $('.alert-danger').html('<?= $this->session->flashdata('error'); ?>').show();
        <?php } ?>
    });
    setTimeout(function() {
        $('.alert-success').hide();
        $('.alert-danger').hide();
    }, 4000);
    $('#country_list').change(function() {
        var id = $(this).val();

        $('.country_name').val($(this).children("option:selected").html());
        $.ajax({
            url: "https://asiahilux.com/home/get_port_by_country/" + id,
            type: 'GET',
            //crossdomain: true,
            dataType: 'json', // added data type
            //contentType: 'application/x-www-form-urlencoded',
            success: function(res) {

                $('.port_list tr').remove();
                if (!$.trim(res)) {
                    $('.port_list').append('<tr class="border-bottom"><td colspan="5">No Port Found in this Country</td></tr>')
                } else {
                    for (var i = 0; i < res.length; i++) {
                        var checked = "";
                        if (i == 0) {
                            checked = "checked";
                            var price = parseInt(res[i]['total_price']);
                            $('.total_price').html(price + <?= $c_price; ?>);
                            //alert(res[i]['arrival_port']);
                            $('.portName').val(res[i]['arrival_port']);
                            $('.carprice').val(<?= $c_price; ?>);
                            $('.port_price').val(price);
                        }
                        var service_details = '';
                        if (res[i]['service_details'] == '' || res[i]['service_details'] == null) {
                            service_details = '-----';
                        } else {
                            service_details = res[i]['service_details'];
                        }
                        var delivery_destination = '';
                        if (res[i]['delivery_destination'] == '' || res[i]['delivery_destination'] == null) {
                            delivery_destination = '-----';
                        } else {
                            delivery_destination = res[i]['delivery_destination'];
                        }
                        $('.port_list').append('<tr class="border-bottom"><td>' + res[i]['arrival_port'] + '</td><td><div class="radio"><p class="port_name">' + res[i]['arrival_port'] + '</p></div></td><td><input class="delivery_destination" type="radio" name="optradio" value=' + res[i]['total_price'] + ' ' + checked + '></td><td>$' + res[i]['total_price'] + '</td></tr>')
                    }
                    $('.delivery_destination').change(function() {
                        var id = parseInt($(this).val());
                        var dollersign = "$";

                        $('.port_price').val(id);
                        $('.portName').val($(this).parent().parent().find('.radio').find('.port_name').html());
                        $('.carprice').val(<?= $c_price; ?>);
                        $('.total_price').html(id + <?= $c_price; ?>);
                    });
                }
            }

        });
    });
</script>