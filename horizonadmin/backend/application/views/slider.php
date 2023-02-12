<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php') ?>
<style>
    .img-responsive
    {
  display: block;
  max-width: 100%;
  max-width: 560px;
  width: auto;
  height: auto;
}
</style>

<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form form-validate" method="POST" enctype="multipart/form-data"
                                  action="<?= base_url() . 'index.php/' ?>slider/update">
<div class="card" style="margin-bottom: -3px;">
  
                                    <div class="card-head">
                                        <header>
                                            <h3>Upload Home Page Slider (Size restricted Width: 1920 Pixel and Height: 500 Pixel. Format allowed are jpg | jpeg | png | gif)</h3>
                                        </header>
                                    </div>
                                    <div class="card-body">

                                       

                                        <div class="row">

                                           <div class="col-xs-12 col-md-12">

                                                <span id="btn_upload_pic" style="display: none; position: absolute;"
                                                      class="btn btn-default btn-lg fa fa-upload"><b>Upload Home Page Slider Image </b></span>
                                                <?php
                                                if ($arr_current_company[0]['company_web_slider']) {
                                                    ?>
                                                    <img id="slider_image" class="border-white img-responsive auto-width"
                                                         src="../../../../uploads/slider/<?= $arr_current_company[0]['company_web_slider'] ?>"
                                                          alt="Website Slider Image"/>
                                                    <?php
                                                } else { ?>
                                                    <img id="slider_image" class="border-white img-responsive auto-width"
                                                         src="../../../../uploads/slider/default_slider_image.jpg"
                                                          alt="Defualt Website Slider Image"/>
                                                    <?php
                                                } ?>

                                            </div>

                                        </div>


                                       
                                    </div>
                                    <!--end .card-body -->

                                    
                                </div>
                                <!--end .card -->
                            </form>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Upload Slider</h4>
                                    <em>( Max file size 5MB, Size restricted Width: 1920 Pixel and Height: 500 Pixel & Image format allowed are jpg | jpeg | png | gif )</em>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="card col-md-12">
                                            <div class="card-head style-primary">
                                                <header>Drag and drop uploader</header>
                                            </div>
                                            <div class="card-body no-padding">
                                                <form
                                                        action="<?php echo base_url() . 'index.php/'; ?>slider/upload_web_slider"
                                                        class="dropzone dz-clickable" id="my-awesome-dropzone">

                                                    <div class="dz-message">
                                                        <h3>Drop files here or click to upload.</h3>
                                                        <em>(Max file size 5MB & Image format allowed are jpg | jpeg | png | gif)</em>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--end .card-body -->
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include('include/footer.php'); ?>
                    <script src="<?= base_url(); ?>assets/js/libs/dropzone/dropzone.min.js"></script>
                    <script>
                      

                        $("#slider_image").on("mouseenter", function () {

                            $("#btn_upload_pic").show();
                        });
                        $("#slider_image").on("mouseleave", function () {

                            $("#btn_upload_pic").hide();
                        });

                        $("#btn_upload_pic").on("mouseenter", function () {

                            $(this).show();
                        });
                        $("#btn_upload_pic").on("mouseleave", function () {

                            $(this).hide();
                        });

                        $("#btn_upload_pic").click(function () {
                            $('#myModal-del').modal('show');
                        });
                        $('#myModal-del').on('hidden.bs.modal', function (e) {
                            location.reload();
                        });


                    </script>

                    </body>
                    </html>
