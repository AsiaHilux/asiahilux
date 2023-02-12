<?php include('include/header.php'); ?>

<!-- end: HORIZONTAL MENU------------------------------------------------------------------------- -->



<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">

<div class="card card-tiles style-default-light">

    <!-- BEGIN BLOG POST HEADER -->
<div class="row style-primary">
    <div class="col-sm-12">
        <div class="card-body style-default-dark1">
            <input type="hidden" id="admin_id" value="<?= $admin_info[0]['admin_id']; ?>"/>
            <input type="hidden" id="user_id" value="<?= $arr_user[0]['user_id']; ?>"/>

            <div class="col-md-3">
                <button id="btn_upload_pic" style="display: none; position: absolute;" class="btn btn-default-dark btn-lg fa fa-upload"></button>
                <?php
                if ($arr_user[0]['user_pic']) {
                    ?>
                    <img id="admin_pic"
                         class="border-white img-responsive fix_img_size-width"
                         src="http://horizonvehicles.com/uploads/app_users/<?= $arr_user[0]['user_pic'] ?>"
                         alt="Admin's Profile Image"/>
                    <?php
                } else {
                    if($admin_info[0]['gender'] == "male")
                    {
                    ?>
                    <img id="admin_pic"
                         class="border-white img-responsive fix_img_size-width"
                         src="<?= base_url() ?>uploads/app_users/user_avatar_male.jpg" alt="Employee's Avatar Profile Image"/>
                    <?php
                    } else {
                    ?>
                    <img id="admin_pic"
                         class="border-white img-responsive fix_img_size-width"
                         src="<?= base_url() ?>uploads/app_users/user_avatar_female.jpg" alt="Employee's Avatar Profile Image"/>
                    <?php    
                    }
                } ?>
                <em style="font-size: 9px;">Max image upload size is 160 X 160 Pixels</em>

            </div>
            <div class="col-md-9">
                <h2 style="margin-top:0px;">
                    <strong>Name : <?php echo $arr_user[0]['first_name']. ' ' . $arr_user[0]['last_name']; ?></strong>
                </h2>
                <h3><strong>Official Email Id : <?php echo $arr_user[0]['official_id']; ?></strong></h3>
               
                
            </div>

        </div>
    </div><!--end .col -->

</div><!--end .row -->
<!-- END BLOG POST HEADER -->




<div class="row">

    <!-- BEGIN BLOG POST TEXT -->
    <div class="col-sm-9">
        <article class="style-default-bright">

            <div class="card-body">

                <div class="col-md-12">

                    <div class="panel-group" id="accordion6">
                        <div class="card panel expanded">
                            <div class="card-head card-head style-info collapsed" data-toggle="collapse" data-parent="#accordion6" data-target="#accordion6-1" aria-expanded="true">
                                <header>Account Information</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <form class="form">
                                <div id="accordion6-1" class="collapse in" aria-expanded="true">
                                    <div class="card-body style-primary">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <input type="text" value="<?php echo $admin_info[0]['first_name']. ' ' . $admin_info[0]['last_name']; ?>"   class="form-control" id="admin_name" disabled>
                                                    <label class="lable_font_size" for="admin_name">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $admin_info[0]['father_name'] ?>" class="form-control" id="father_name" disabled>
                                                    <label class="lable_font_size" for="father_name">Father Name</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php
                                                    $d = strtotime($admin_info[0]['dob']);
                                                    $dob = date('d-m-Y', $d);
                                                    ?>
                                                    <input type="text" value="<?php echo $dob; ?>" class="form-control" id="dob" disabled>
                                                    <label class="lable_font_size" for="dob">Date of birth</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $admin_info[0]['gender'] ?>" class="form-control" id="gender" disabled>
                                                    <label class="lable_font_size" for="gender">Gender </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <input type="text" value="<?php echo $admin_info[0]['country_name'] ?>" class="form-control" id="country_name" disabled>
                                                    <label class="lable_font_size" for="country_name">Country</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $admin_info[0]['city_name'] ?>" class="form-control" id="city_name" disabled>
                                                    <label class="lable_font_size" for="city_name">City</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <input type="text" value="<?php echo $admin_info[0]['address'] ?>" class="form-control" id="address" disabled>
                                                    <label class="lable_font_size" for="city_name">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $admin_info[0]['phone']; ?>" class="form-control" id="phone" disabled>
                                                    <label class="lable_font_size" for="phone">Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <input type="text" value="<?php echo $admin_info[0]['mobile']; ?>" class="form-control" id="mobile" disabled>
                                                    <label class="lable_font_size" for="mobile">Mobile</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $admin_info[0]['email'] ?>" class="form-control" id="email" disabled>
                                                    <label class="lable_font_size" for="email">Email</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <input type="text" value="<?php echo $admin_info[0]['cnic'] ?>"   class="form-control" id="cnic" disabled>
                                                    <label class="lable_font_size" for="cnic">CNIC</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div><!--end .panel -->

                </div>

            </div><!--end .col -->

    </div><!--end .card-body -->
    </article>

</div><!--end .col -->
<!-- END BLOG POST TEXT -->

<!-- BEGIN BLOG POST MENUBAR -->
<div class="col-md-3">
    <div class="card-body">

        <h4 class="text-light"><li class="fa fa-link pull-right"></li>Quick Links</h4>
        <!-- <button type="button" id="btn_edit_profile" class="btn btn-block ink-reaction btn-primary">Edit Profile</button> -->
        <button type="button" id="btn_change_password_dialog" class="btn btn-block ink-reaction btn-primary">Change Password</button>

    </div><!--end .card-body -->
</div><!--end .col -->
<!-- END BLOG POST MENUBAR -->

</div><!--end .row -->

</div>

<div class="modal fade" id="myModal-upload_pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Picture</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-head style-primary">
                            <header>Drag and drop uploader</header>
                        </div>
                        <div class="card-body no-padding">
                            <form action="<?php echo base_url().'index.php/';?>admin_profile/upload_admin_pic" class="dropzone dz-clickable" id="my-awesome-dropzone">
                                <input type="hidden" name="user_id" value="<?= $arr_user[0]['user_id']; ?>" />
                                <div class="dz-message">
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(Max file size 5MB.)</em>
                                </div>
                            </form>
                        </div><!--end .card-body -->
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal-change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Login Password</h4>
            </div>
            <div class="modal-body">
                <form id="myform2" class="form floating-label form-validation" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                <label for="current_password">Current password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                <label for="new_password">New Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="verify_password" name="verify_password" required>
                                <label for="verify_password">Verify Password</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div id="msg-success2" class="row col-md-12 col-md-offset-0" style="display: none;">
                        <div class="alert alert-callout alert-success" role="alert">
                        </div>
                    </div>
                    <div id="msg-error2" class="row col-md-12 col-md-offset-0" style="display: none;">
                        <div class="alert alert-callout alert-danger" role="alert">
                        </div>
                    </div>
                    <div id="result2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                &nbsp;
                <button id="btn_change_password" class="btn ink-reaction btn-raised btn-primary">
                    Save Changes
                </button>
                <img id="loader2" src="<?= base_url(); ?>assets/img/reload.GIF" style="display: none; width: 28px; height: 28px;" />
            </div>
        </div>
    </div>
</div>
<!-- Change myModal-change-password End -->


<?php include('include/footer.php'); ?>

<script src="<?= base_url(); ?>assets/js/libs/dropzone/dropzone.min.js"></script>

<script language="JavaScript">

    $('#demo-date-date').datepicker({autoclose: true, todayHighlight: true, format: "dd-mm-yyyy"});

    $("#admin_pic").on("mouseenter", function(){

        $("#btn_upload_pic").show();
    });
    $("#admin_pic").on("mouseleave", function(){

        $("#btn_upload_pic").hide();
    });

    $("#btn_upload_pic").on("mouseenter", function(){

        $(this).show();
    });
    $("#btn_upload_pic").on("mouseleave", function(){

        $(this).hide();
    });

    $("#btn_upload_pic").click(function(){
        $('#myModal-upload_pic').modal('show');
    });
    $('#myModal-upload_pic').on('hidden.bs.modal', function (e) {
        location.reload();
    });

    $("#btn_edit_profile_dialog").click(function(){

        $('#myModal-edit-info').modal('show');
    });

    $("#btn_change_password_dialog").click(function(){

        $('#myModal-change-password').modal('show');
    });

    $("#btn_save").click(function(){

        var form = $("#myform");

        var res = form.valid();

        if(res){

            var gender = "";

            if( $("#gender_male").is(':checked') )
            {
                gender = "Male";
            }
            if( $("#gender_female").is(':checked') )
            {
                gender = "Female";
            }

            var formdata = {
                'action'              : "edit",
                'user_id' : $("#user_id").val(),
                'first_name'          : $("#first_name").val(),
                'last_name'           : $("#last_name").val(),
                'gender'              : gender,
                'dob'                 : $("#dob").val(),
                'cnic'                : $("#cnic").val(),
                'nationality'         : $("#nationality").val(),
                'country_id'          : $("#country_id").val(),
                'city_name'           : $("#city_name").val(),
                'address'             : $("#address").val(),
                'phone'               : $("#phone").val(),
                'mobile'              : $("#mobile").val()
            }
            url = "<?= base_url() . 'index.php/'; ?>admin_profile/update";
            SendDataByAjax(url, formdata, "#loader", false, "#result", "#msg-success", "#msg-error");

        } else {
            alert('fill out the required fields.!!');
        }

    });

    $("#btn_change_password").click(function(){

        var form = $("#myform2");

        var res = form.valid();

        if(res){

            if( $("#new_password").val() == $("#verify_password").val() )
            {
                //
                var formdata = {
                    'current_password'  : $("#current_password").val(),
                    'new_password'      : $("#new_password").val()
                }
                url = "<?= base_url() . 'index.php/'; ?>admin_profile/change_password";
                SendDataByAjax(url, formdata, "#loader2", false, "#result2", "#msg-success2", "#msg-error2");
            } else {
                alert("New password and verify password are not matched.");
            }
            $("#current_password").val('');
            $("#new_password").val('');
            $("#verify_password").val('');

        } else {
            alert('fill out the required fields.!!');
        }

    });

    $('#myModal-edit-info').on('hidden.bs.modal', function (e) {
        location.reload();
    });



</script>

</body>
</html>