<?php
if (isset($formdata)) {
    $tag = "Edit";
    $m_id = $formdata[0]['m_id'];
    $vm_id = $formdata[0]['vm_id'];
    $model_name = $formdata[0]['model_name'];
    $active = $formdata[0]['active'];
    $Title = $formdata[0]['Title'];
    $Keywords = $formdata[0]['Keywords'];
    $Description = $formdata[0]['Description'];
    $car_models_content = $formdata[0]['car_models_content'];
    
    
    
    
} else {
    $tag = "";
    $m_id = "";
    $vm_id = "";
    $model_name = "";
    $active = "1";
    $Title = "";
    $Keywords = "";
    $Description = "";
    $car_models_content = "";
    
    
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card panel card-underline">
            <div class="card-head">
                <header><h3><?php
                        if ($tag == "Edit")
                            echo "Edit Car Model";
                        else
                            echo "Add New Car Model"; ?></h3></header>

            </div>
            <div>

                <div class="card-body">

                    <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                        <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                        <div></div>
                    </div>

                    <form id="myform" class="form form-validate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control" id="vm_id" name="vm_id" required="true">
                                        <option value=""></option>
                                    </select>
                                    <label for="vm_id">
                                        Select Car Manufacturer Names *
                                    </label>
                                    <input type="hidden" id="flag" value="<?= $tag ?>" class="form-control"
                                           placeholder="flag">
                                    <input type="hidden" class="form-control" id="m_id" name="m_id"
                                           value="<?= $m_id ?>">
                                </div>
                            </div>
                       
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="model_name" name="model_name"
                                           value="<?php echo $model_name; ?>"
                                           maxlength="500" data-toggle="tooltip" data-placement="bottom"
                                           data-trigger="hover"
                                           data-original-title="Maximum 500 characters allowed"
                                           required>
                                    <label for="model_name">
                                    Car Model Name *
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">

                        

                        <div class="col-sm-4">
                                <div class="form-group">
                                    <textarea class="form-control" id="Title" name="Title" maxlength="60000" data-toggle="tooltip" data-placement="bottom"
                                    data-trigger="hover"
                                    data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Title; ?></textarea>
                                    <label for="Title">
                                       Title
                                    </label>
                                </div>
                        </div>
                    
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <textarea class="form-control" id="Keywords" name="Keywords" maxlength="60000" data-toggle="tooltip" data-placement="bottom"
                                    data-trigger="hover"
                                    data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Keywords; ?></textarea>
                                    <label for="Keywords">
                                       Keywords
                                    </label>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <textarea class="form-control" id="Description" name="Description" maxlength="60000" data-toggle="tooltip" data-placement="bottom"
                                    data-trigger="hover"
                                    data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Description; ?></textarea>
                                    <label for="Description">
                                       Description
                                    </label>
                                </div>
                        </div>
                        
                        
                           
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="car_models_content" name="car_models_content" maxlength="60000" data-toggle="tooltip" data-placement="bottom"
                                    data-trigger="hover"
                                    data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $car_models_content; ?></textarea>
                                    <label for="car_models_content">
                                       Content
                                    </label>
                                </div>
                        </div>
                        
                        
                    </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="checkbox-inline checkbox-styled">
                                    <input type="checkbox" id="active"
                                           name="active" <?php if ($active == "1") echo "checked"; else echo ""; ?>><span>Active</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div><!--end .card-body -->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button id="btn_save" type="button" class="btn btn-primary btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save</button>
                    </div>

                </div><!--end .card-actionbar -->

            </div>

        </div><!--end .panel -->


    </div><!--end .col -->
</div> <!-- end .row-->

<script type="text/javascript">

    populate_CarManufacturer_Dropdown();

    var vm_id = "<?= $vm_id ?>";
    var tag = "";
$('#model_name').on('keypress', function (event) {
                            var regex = new RegExp("^-");
                            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                            if (regex.test(key)) {
                               event.preventDefault();
                               return false;
                            }
                        });
    function populate_CarManufacturer_Dropdown() {
        var url = "<?= base_url() . 'index.php/'; ?>car_manufacturer/select_active";
        $.getJSON(url, function (result) {
            $.each(result, function (i, field) {
                for (j = 0; j < field.length; j++) {
                    if (vm_id == field[j].vm_id) {
                        tag = 'selected="selected"';
                    }

                    $('#vm_id').append('<option value = "' + field[j].vm_id + '" ' + tag + '>' + field[j].vm_name + '</option>');

                    tag = "";
                }

            });
        }).fail(function (xhr) {

            if (xhr.status == "404") {
                alert("Your login session has been expired. Please login again.");
                location.reload();
            } else if (xhr.status == "0") {

                alert("No connection available.");
            } else {

                alert(xhr.responseText);
            }
        });
    }


    $("#btn_save").click(function () {

        var form = $("#myform");

        var res = form.valid();

        if (res) {

            var status = "";

            if ($("#active").is(':checked')) {
                status = "1";
            } else {
                status = "0";
            }

            var formdata = {
                'vm_id': $("#vm_id").val(),
                'm_id': $("#m_id").val(),
                'model_name': $("#model_name").val(),
                'Title': $("#Title").val(),
                'Keywords': $("#Keywords").val(),
                'Description': $("#Description").val(),
                'car_models_content': $("#car_models_content").val(),
                'active': status
            }
            if ($('#flag').val() == "") {
                url = "<?= base_url() . 'index.php/'; ?>car_model/create";
                
            }
            else if ($('#flag').val() == "Edit") {
                url = "<?= base_url() . 'index.php/'; ?>car_model/update";
                
            }
            

            $(this).button('loading');
            $("#msg-error").hide();

            SendDataByAjax3(
                url, formdata,
                function (result) {
                    var result_array = JSON.parse(result);

                    $("#btn_save").button('reset');
                    window.scroll(0, 0);
                    if (result_array.res) {
                        toastr.success('Record Saved', 'Successful');
                        if ($('#flag').val() == "Edit") {
                            $("#btn_show_new").show();
                            $("#btn_show_view").hide();
                            load_view(null);
                        }
                        $("#flag").val('');
                        $("#vm_id").val('');
                        $("#m_id").val('');
                        $("#model_name").val('');
                        $("#Title").val('');
                        $("#Keywords").val('');
                        $("#Description").val('');
                        $("#car_models_content").val('');
                    } else {

                        if (result_array.status == "404") {
                            alert("Your login session has been expired. Please login again.");
                            location.reload();
                        }
                        else if (result_array.status == "403") {
                            alert("You don't have permission to perform this action.");
                            location.reload();
                        }
                        else if (result_array.status == "500") {
                            $("#msg-error").children('div').html(result_array.msg);
                            $("#msg-error").show();
                        } else {
                            $("#msg-error").children('div').html(result_array.msg);
                            $("#msg-error").show();
                        }
                    }
                }
            );


        } else {
            alert('fill out the required fields.!!');
        }

    });

  

</script>