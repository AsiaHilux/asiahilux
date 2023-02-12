<?php
if( isset($formdata) )
{
    $tag = "Edit";
    $id = $formdata[0]['dp_id'];
    $dp_content_about_us = $formdata[0]['dp_content_about_us'];
    $dp_content_privacy_policy = $formdata[0]['dp_content_privacy_policy'];
    $dp_content_terms_conditions = $formdata[0]['dp_content_terms_conditions'];
    
} 
else 
{
    $tag = "";
    $id = "";
    $dp_content_about_us = "";
    $dp_content_privacy_policy = "";
    $dp_content_terms_conditions = "";
    
}
?>
<div class="row">
    <div class="col-md-12">
            <div class="card card-underline">
                <div class="card-head">
                    <header><h4><?php
                    if($tag=="Edit") 
                        echo "Edit  Dynamic Pages Content"; 
                    else 
                        echo "Add New  Dynamic Pages Content"; ?></h4></header>
                </div>

                    <div class="card-body">

                        <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                            <a href="#" class="close" onclick='javascript:$("#msg-error").hide();'
                               aria-label="close">&times;</a>
                            <div></div>
                        </div>

                        <form id="myform" class="form form-validate">
                            
                            <h3>About Us Content:</h3>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="hidden" id="flag" value="<?= $tag ?>" class="form-control"
                                               placeholder="flag" required>
                                        <input type="hidden" class="form-control" id="dp_id"
                                               name="dp_id" value="<?= $id ?>">

                                        <div class="form-group">
                                            <textarea id="dp_content_about_us" name="dp_content_about_us" maxlength="20000"
                                                  class="form-control control-6-rows" spellcheck="false"
                                                  value="">

                                            </textarea>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <h3>Privacy Policy Content:</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       
                                        <div class="form-group">
                                            <textarea id="dp_content_privacy_policy" name="dp_content_privacy_policy" maxlength="20000"
                                                  class="form-control control-6-rows" spellcheck="false"
                                                  value="">

                                            </textarea>
                                          
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <h3>Terms & Conditions Content:</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       
                                        <div class="form-group">
                                            <textarea id="dp_content_terms_conditions" name="dp_content_terms_conditions" maxlength="20000"
                                                  class="form-control control-6-rows" spellcheck="false"
                                                  value="">

                                            </textarea>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div><!--end .card-body -->

                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <div class="btn-group">
                            <button id="btn_save" type="button" class="btn btn-primary btn-raised btn-loading-state"
                                    data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save
                            </button>
                        </div>
                    </div>
                </div><!--end .card-actionbar -->

            </div><!--end .panel -->

    </div><!--end .col -->
</div> <!-- end .row-->
<script type="text/javascript">

    
    $( '#dp_content_about_us' ).ckeditor();
    $( '#dp_content_privacy_policy' ).ckeditor();
    $( '#dp_content_terms_conditions' ).ckeditor();
    

                        $("#btn_save").click(function () {

                            var form = $("#myform");

                            var res = form.valid();

                            if (res) {

                                var formdata = {
                                    'dp_id': $("#dp_id").val(),
                                    'dp_content_about_us': $("#dp_content_about_us").val(),
                                    'dp_content_privacy_policy': $("#dp_content_privacy_policy").val(),
                                    'dp_content_terms_conditions': $("#dp_content_terms_conditions").val()
                                    
                                }
                                if ($('#flag').val() == "") {
                                    url = "<?= base_url() . 'index.php/'; ?>dynamic_pages/create";
                                    
                                }
                                else if ($('#flag').val() == "Edit") {
                                    url = "<?= base_url() . 'index.php/'; ?>dynamic_pages/update";
                                    
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
                                            $("#dp_id").val('');
                                            $("#dp_content_about_us").val('');
                                            $("#dp_content_privacy_policy").val('');
                                            $("#dp_content_terms_conditions").val('');
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