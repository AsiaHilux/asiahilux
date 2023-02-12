<?php include('include/header.php'); ?>
<?php  include('include/nav/vehicle.php')?>
<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-underline">
                                <div class="card-head">
                                    <header><h3>Inquiry List</h3></header>

                                </div><!--end .card-head -->
                                <div class="card-body">

                                    <div class="row">
                                        <form class="form form-validate" id="myform2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group date" id="demo_start_date">
                                                        <div class="input-group-content">
                                                            <input type="text" class="form-control" autocomplete="off" id="start_date"
                                                                   name="start_date" placeholder="Start Date *" value=""
                                                                   required>
                                                        </div>
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span></div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group date" id="demo_end_date">
                                                        <div class="input-group-content">
                                                            <input type="text" class="form-control" id="end_date"
                                                                   name="end_date" placeholder="End Date *" value=""
                                                                   required>
                                                        </div>
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <div class="form-group">
                                                <button type="button" id="btn_view_by_range"
                                                        class="btn ink-reaction btn-raised btn-primary">View
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="text"  id="search" class="form-control" placeholder="Enter your keyword">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                    <table id="example3" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>SN#.</th>
                                            <th>Car Name</th>
                                            <th>Inquiry Name</th>
                                            <th>Inquiry City/Country</th>
                                            <th>Inquiry Port</th>
                                            <th>Inquiry Phone</th>
                                            <th>Inquiry Email</th>
                                            <th>Inquiry Address</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tblbody">
                                        </tbody>
                                    </table>
                                    </div>

                                </div><!--end .card-body -->
                                
                            </div><!--end .card -->
                        </div><!--end .col -->

                    </div> <!-- end .row-->
                   

                    <?php include('include/footer.php'); ?>

                    <script>

                        $("#search").keyup(function () {
                            var value = this.value.toLowerCase().trim();

                            $("table tr").each(function (index) {
                                if (!index) return;
                                $(this).find("td").each(function () {
                                    var id = $(this).text().toLowerCase().trim();
                                    var not_found = (id.indexOf(value) == -1);
                                    $(this).closest('tr').toggle(!not_found);
                                    return not_found;
                                });
                            });
                        });


                        $('#demo_start_date').datepicker({autoclose: true, todayHighlight: true, format: "dd-mm-yyyy"});
                        $('#demo_end_date').datepicker({autoclose: true, todayHighlight: true, format: "dd-mm-yyyy"});


                        //////////////////////////////////
                        function loadInquiry_list_ByRange() {
                            var start_date = $("#start_date").val();
                            var end_date = $("#end_date").val();

                            $("#tblbody").empty();
                            var url = "<?= base_url() . 'index.php/'; ?>Inquiry_list/select_by_range?start_date="+start_date+"&end_date="+end_date;
                            $.getJSON(url, function (result) {

                                $.each(result, function (i, field) {
                                    var status = "";
                                    if (field.length == 0) {
                                        $('#tblbody').append('<tr><td>No record found</td></tr>');
                                    } else {
                                        var sn = 1;
                                        for (j = 0; j < field.length; j++) {
                                            

                                            $('#tblbody').append('<tr><td>' + sn + '</td><td>' + field[j].carname + '</td><td>' + field[j].inquiry_name + '</td><td>' + field[j].inquiry_city + " - " + field[j].inquiry_country +  '</td><td>' + field[j].inquiry_port + '</td><td>' + field[j].inquiry_phone + '</td><td>' + field[j].inquiry_email + '</td><td>' + field[j].inquiry_address + '</td><td>'+field[j].created_at+'</td></tr>');

                                            sn += 1;
                                        }
                                    }

                                });
                            });



                            $("#flag").val('');
                        }


                        $("#btn_view_by_range").click(function () {

                            var form = $("#myform2");

                            var res = form.valid();

                            if (res) {
                                loadInquiry_list_ByRange();
                            } else {
                                alert('fill out the required fields.!!');
                            }

                        });




                        $("#btn_print_report").click(function(){

                                var start_date = $("#start_date").val();
                                var end_date = $("#end_date").val();

                                url = "<?= base_url() . 'index.php/'; ?>Inquiry_list/generate_report?start_date="+start_date+"&end_date="+end_date;
                                window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=5%, left=0%, width=600, height=800");

                        });

                        ///////////////////////
                        $('#example3').on('click', 'img.showpic', function() {

                            var img_src = $(this).attr("src");

                            $("#book_image").attr("src",img_src);

                            $('#myModal-picshow').modal('show');
                        });


                    </script>
                    </body>
                    </html>