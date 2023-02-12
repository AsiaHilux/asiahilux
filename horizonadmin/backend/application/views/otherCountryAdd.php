<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php');

if ($action == 'create') {
    $url = base_url('index.php/car_detail/post_country_data');
    $header_text = 'Add New Country Detail';
} elseif ($action == 'update') {
    $url = base_url('index.php/car_detail/update_country_dat_post');
    $header_text = 'Update Country Detail';
}

//echo "<pre>";print_r($car_detail);die;
if (isset($country_data) && !empty($country_data)) {
    $domain_name = $country_data['domain_name'];
    $display_name = $country_data['display_name'];
    $domain_main_color = $country_data['domain_main_color'];
    $domain_side_color = $country_data['domain_side_color'];
    $domain_sidebar_pic = $country_data['domain_sidebar_pic'];
    $domain_footer_pic = $country_data['domain_footer_pic'];
    $domain_address = $country_data['domain_address'];
    $domain_phone1 = $country_data['domain_phone1'];
    $domain_phone2 = $country_data['domain_phone2'];
    $domain_email = $country_data['domain_email'];
    $domain_address = $country_data['domain_address'];
    $rc_site_key = $country_data['rc_site_key'];
    $rc_secret_key = $country_data['rc_secret_key'];
    $id = $country_data['id'];
} else {
    $domain_name = $display_name = $domain_main_color = $domain_side_color = $domain_sidebar_pic = $domain_footer_pic = $domain_address = $domain_phone1 = $domain_phone2 = $domain_email = $domain_address = $id = $rc_site_key = $rc_secret_key = '';
}
?>
<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div id="page_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card panel card-underline">
                                    <div class="card-head">
                                        <header>
                                            <h3><?= $header_text; ?></h3>
                                        </header>
                                    </div>
                                    <div>
                                        <div class="card-body">

                                            <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                                                <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                                                <div></div>
                                            </div>

                                            <form method="POST" action="<?= $url; ?>" id="car_form" enctype="multipart/form-data" class="form form-validate">
                                                <?php if ($id) { ?>
                                                    <input type="hidden" value="<?= $id ?>" name="country_id">
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="set_data[domain_name]" value="<?= $domain_name; ?>" required>
                                                            <label for="Car Price">
                                                                Domain Orignal Name
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="set_data[display_name]" value="<?= $display_name; ?>" required>
                                                            <label for="Car Price">
                                                                Domain Display Name
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <input type="color" class="form-control" id="VehicleNo" name="set_data[domain_main_color]" value="<?= $domain_main_color; ?>" required>
                                                            <label for="VehicleNo">
                                                                Main Color
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <input type="color" class="form-control" id="Chassis" name="set_data[domain_side_color]" value="<?= $domain_side_color; ?>" required>
                                                            <label for="Chassis">
                                                                Side Color
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Mileage" name="set_data[domain_email]" value="<?= $domain_email; ?>" required>
                                                            <label for="Mileage">
                                                                Email
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="ModelCode" name="set_data[domain_address]" value="<?= $domain_address; ?>" required>
                                                            <label for="ModelCode">
                                                                Address
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="VersionClass" name="set_data[domain_phone1]" value="<?= $domain_phone1; ?>" required>
                                                            <label for="VersionClass">
                                                                Phone 1
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="EngineCode" name="set_data[domain_phone2]" value="<?= $domain_phone2; ?>" required>
                                                            <label for="EngineCode">
                                                                Phone 2
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="ModelCode" name="set_data[rc_site_key]" value="<?= $rc_site_key; ?>" required>
                                                            <label for="ModelCode">
                                                                Recapcha Site Key
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="ModelCode" name="set_data[rc_secret_key]" value="<?= $rc_secret_key; ?>" required>
                                                            <label for="ModelCode">
                                                                Recapcha Secret Key
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="sidebar" accept="image/*">
                                                            <label for="Mileage">
                                                                Attached Domain Sidebar Image
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="footer" accept="image/*">
                                                            <label for="Mileage">
                                                                Attached Domain Footer Image
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-actionbar">
                                            <div class="card-actionbar-row">
                                                <button onclick="$('#car_form').submit();" type="button" class="btn btn-primary btn-raised btn-loading-state">Save Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('include/footer.php'); ?>
                    </body>

                    </html>