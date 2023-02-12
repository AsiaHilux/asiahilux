<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php') ?>
<?php include('include/navigation.php') ?>

<?php

// echo "<pre>";print_r($formdata);die;
?>
<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card" style="margin-bottom: -3px;">
                                <div class="card-head">
                                    <header>
                                        <h3>Equipment Names</h3>
                                    </header>
                                    <div class="tools">
                                        <div class="btn-group">
                                            <a href="<?= base_url('index.php/car_detail/add_country_data'); ?>"><button type="button" class="btn btn-primary btn-raised">
                                                    Add
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="page_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-underline">
                                    <div class="card-head">
                                        <header>
                                            <h4>View Equipment Details</h4>
                                        </header>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="text" id="search" class="form-control" placeholder="Enter your keyword">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Display Name</th>
                                                        <th>Main Color</th>
                                                        <th>Side Color</th>
                                                        <th>Sidebar Logo</th>
                                                        <th>Fotter Logo</th>
                                                        <th>Address</th>
                                                        <th>Phone 1</th>
                                                        <th>Phone 2</th>
                                                        <th>Email</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tblbody">
                                                    <?php
                                                    $count = 1;
                                                    foreach ($formdata as $data) {
                                                        if ($data['domain_sidebar_pic']) {
                                                            $img1_url = '../../../../uploads/other_sites_data/' . $data['domain_sidebar_pic'];
                                                        } else {
                                                            $img1_url = '../../../../uploads/car_avatar_no_image.png';
                                                        }
                                                        if ($data['domain_footer_pic']) {
                                                            $img2_url = '../../../../uploads/other_sites_data/' . $data['domain_footer_pic'];
                                                        } else {
                                                            $img2_url = '../../../../uploads/car_avatar_no_image.png';
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td><?= $count ?></td>
                                                            <td><?= $data['domain_name'] ?></td>
                                                            <td><?= $data['display_name'] ?></td>
                                                            <td>
                                                                <svg width="40" height="40">
                                                                    <rect width="50" height="50" style="fill:<?= $data['domain_main_color'] ?>;" />
                                                                </svg>
                                                            </td>
                                                            <td>
                                                                <svg width="40" height="40">
                                                                    <rect width="40" height="40" style="fill:<?= $data['domain_side_color'] ?>;" />
                                                                </svg>
                                                            </td>
                                                            <td><img src="<?= $img1_url; ?>" style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-1 showpic"></td>
                                                            <td><img src="<?= $img2_url; ?>" style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-1 showpic"></td>
                                                            <td><?= $data['domain_address'] ?></td>
                                                            <td><?= $data['domain_phone1'] ?></td>
                                                            <td><?= $data['domain_phone2'] ?></td>
                                                            <td><?= $data['domain_email'] ?></td>
                                                            <td style="width: 20%;" class="text-center">
                                                                <a href="<?= base_url('index.php/car_detail/update_country_data/') . $data['id']; ?>">
                                                                    <button class="btn btn-primary glyphicon btn-responsive glyphicon-edit margin-2px"></button>
                                                                </a>&nbsp;&nbsp;
                                                                <a href="<?= base_url('index.php/car_detail/delete_country_data/') . $data['id']; ?>">
                                                                    <button name="btn_delete" class="btn btn-danger btn-responsive glyphicon glyphicon-remove"></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php $count++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="page_links" class="text-left">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include('include/footer.php'); ?>
                        </body>

                        </html>