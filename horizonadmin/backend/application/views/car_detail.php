<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php'); ?>
<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-bottom: -3px;">
                            
                                <div class="card-head">
                                    <header><h3>Car Details</h3></header>
                                    <div class="tools">
                                        <div class="btn-group">
                                            <a href="<?= base_url() . 'index.php/'; ?>car_detail/add_new_car/" 
                                                    class="btn btn-primary btn-raised btn-loading-state"
                                                    data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">
                                                Add Car Details
                                            </a>

                                            <!--<button id="btn_show_view" type="button"-->
                                            <!--        class="btn btn-default btn-raised btn-loading-state"-->
                                            <!--        data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">-->
                                            <!--    View Car Details-->
                                            <!--</button>-->

                                        </div>
                                    </div>
                                </div><!--end .card-head -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                    </div><!-- en .row -->

                    <div id="page_content">

                    </div>

                    <?php include('include/footer.php'); ?>
                    
                   
                    <script type="text/javascript">
                        $("#btn_show_new").show();
                        $("#btn_show_view").hide();

                        var $btn = $("#btn_show_view");

                        load_view($btn);

                        function load_view($btn) {
                            //
                            $("#page_content").load
                            ("<?= base_url() . 'index.php/'; ?>car_detail/load_view/", function (responseTxt, statusTxt, xhr) {


                                if (statusTxt == "success") {
                                   
                                    $btn.button('reset');
                                    $("#btn_show_new").show();
                                    $("#btn_show_view").hide();
                                }
                                if (statusTxt == "error") {
                                    $btn.button('reset');
                                    if (xhr.status == "404") {
                                        alert("Your login session has been expired. Please login again.");
                                        location.reload();
                                    }
                                    if (xhr.status == "403") {
                                        alert("You don't have permission to perform this action.");
                                    }
                                }
                            });
                        }

                        function load_from($btn) {
                            //
                            $("#page_content").load("<?= base_url() . 'index.php/'; ?>car_detail/load_new/", function (responseTxt, statusTxt, xhr) {

                                if (statusTxt == "success") {
                                    
                                    $btn.button('reset');
                                    $("#btn_show_new").hide();
                                    $("#btn_show_view").show();
                                }
                                if (statusTxt == "error") {
                                    $btn.button('reset');
                                    if (xhr.status == "404") {
                                        alert("Your login session has been expired. Please login again.");
                                        location.reload();
                                    }
                                    if (xhr.status == "403") {
                                        alert("You don't have permission to perform this action.");
                                    }
                                }
                            });

                        }

                        $("#btn_show_new").click(function () {
                            var $btn = $(this);
                            load_from($btn);
                        });

                       

                        $("#btn_show_view").click(function() {
    
                                var $btn = $(this);
                                var entry_name = $("#entry_name").val();
                                
                                if(entry_name == "temporary_entry")
                                {
                                    var r = confirm("Do you really want to cancel car detail entry?");
                                    if (r == true) {
                                        
                                        var formdata_d = {
                                            'car_d_id'    : $('#car_d_id').val()
                                        }
                                        url = "<?= base_url() . 'index.php/'; ?>car_detail/delete_temporary";
                                        SendDataByAjax3(
                                            url, formdata_d,
                                            function(result)
                                            {
                                                var result_array = JSON.parse(result);
                                                if( result_array.res )
                                                {   
                                                    console.log("Temporary car detail is deleted");
                                                } else {
                                                    console.log( result_array.msg );
                                                }
                                                
                                                load_view($btn);
                                            }
                                        );
                                    }
                                } else {
                                    load_view($btn);
                                }
                });
                        

                    </script>

                    </body>
                    </html>