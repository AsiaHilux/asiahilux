<?php
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
// echo "<pre>";print_r($get_selected_cars);die;
?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php if (empty($get_selected_cars)) : ?>
    <style>
        @media (min-width: 0px) and (max-width: 767px) {
            .left-sidebar {
                display: none !important;
            }
            #top_search_bar{
                display:none !important;
            }
            #filter_search_btn{
                display:block !important;
            }
        }
    </style>
<?php endif; ?>
    <style>
        @media (min-width: 0px) and (max-width: 767px) {
            .custom-search-form{
                display:none;
            }
            #filter_search_btn{
                display:block !important;
            }
        }
    </style>
<main id="main">

    <div class="container mt-160">
        <div class="row">
            <div class="col-md-9 col-sm-12 w-80 order-sm-last">
                <div class="main-content">

                    <section class="breadcrumbs">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>
                                <?php

                                $string =  $_SERVER['REQUEST_URI'];
                                $url1 = str_replace("-", " ", $string);
                                $url = str_replace("/", " ", $url1);
                                $cap_first_word =  ucwords($url);
                                //echo $cap_first_word;
                                echo 'Home/search';
                                ?>
                            </h6>
                            <ol>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li>Search</li>
                            </ol>
                        </div>
                    </section>


                    <form action="<?php echo base_url() ?>search" method="POST" class="d-none d-md-block">
                        <div class="search mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Search Cars</span>
                                <input type="" name="refrence_no" class="form-control" placeholder="Search With Car Stock Number For Example: 3223 ">

                                <span class="input-group-text search-btn"><button class="btn btn-primary"><i class="fa fa-search"></i></button></span>
                            </div>
                        </div>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                    </form>
                    <div class="full-banner mt-3">
                        <img src="<?= base_url() ?>assets/images/Banner.jpg" class="img-fluid" alt="Banner Image" />
                    </div>

                    <div class="row sortby">
                        <div class="col-sm-12">
                            <div class="col-sm-8 cars-found">
                                <p><span><?= count($get_selected_cars); ?></span> Cars found</p>
                            </div>
                            <div class="col-sm-4 mt-1 text-right" id="filter_search_btn" style="display:none;padding:7px;">
                                <a href="#" onclick="$('.custom-search-form').toggle()"><i class="fa fa-search"></i> &nbsp; Advance Search</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="custom-search-form mt-2">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <?php include("top_search_bar.php"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="car-list-outer" style="border:1px solid #e3e0e0;">

                        <?php
                        //echo "<pre>";print_r($get_selected_cars);die;
                        if (!empty($get_selected_cars) && is_array($get_selected_cars)) {
                            foreach ($get_selected_cars as $car) {
                                $make = $car['vm_name'];
                                $remove_first_dash_in_name = str_replace('-', '', $car['model_name']);
                                $car_name = $car['car_d_id'] . '/' . $make . '-' . $remove_first_dash_in_name;
                                $remove_dot = str_replace('.', '-', $car_name);
                                $remove_space = str_replace(' ', '-', $remove_dot);
                                $all_small = strtolower($remove_space);
                                $url =  base_url() . 'car-detail/' . $all_small;
                                $car_full_name =  $car['vm_name'] . ' ' .  $car['model_name'];
                                if ($car['stored_file_name'] != null && $car['stored_file_name'] == true) {
                                    $imgs = $car['car_d_id'].'/'.$car['stored_file_name'];
                                } else {
                                    $img = "No-image-found.jpg";
                                }
                        ?>
                                <div class="car-list-item line-content">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <div class="car-list-left">
                                                <div class="car-list-img">
                                                    <a href="<?= $url; ?>">
                                                        <img src="<?php echo base_url("asiahilux_admin/storage/app/images/car_images/".$imgs); ?>" class="img-fluid" alt="<?= $car['stored_file_name']; ?>" /></a>
                                                </div>
                                                <div class="stock-id">
                                                    <p>Stock ID: <?= $car['VehicleNo'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9 col-sm-9">
                                            <div class="car-list-right">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <a href="<?= $url; ?>">
                                                            <h3><?= $car_full_name; ?></h3>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-8">
                                                        <div class="item-price">
                                                            <p>Year: <?php if ($car['RegistrationYear']) {
                                                                            echo $car['RegistrationYear'];
                                                                        } else {
                                                                            echo "-";
                                                                        } ?></p>
                                                            <p>Price: $<b class="red-text"><?= $car['carprice'] ?></b></p>
                                                            <a href="<?= $url; ?>">
                                                                <p>Total Price: <b class="red-text">ASK</b></p>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 col-sm-4">
                                                        <div class="cars-list-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="2">Mileage</th>
                                                                            <th colspan="2">Engine</th>
                                                                            <th colspan="2">Trans</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="table-row">

                                                                            <td colspan="2">
                                                                                <?php if ($car['Mileage'] == true) {
                                                                                    echo $car['Mileage'] . 'km';
                                                                                } else {
                                                                                    echo "-";
                                                                                }
                                                                                ?>
                                                                            </td>

                                                                            <td colspan="2"><?php if ($car['EngineSize'] == true) {
                                                                                                echo $car['EngineSize'] . 'cc';
                                                                                            } else {
                                                                                                echo "-";
                                                                                            } ?></td>

                                                                            <td colspan="2">
                                                                                <?php if ($car['Transmission'] == true) {
                                                                                    if ($car['Transmission'] == 1) echo "Automatic";
                                                                                    else if ($car['Transmission'] == 2) echo "Manual";
                                                                                    else if ($car['Transmission'] == 3) echo "Automanual";
                                                                                } else {
                                                                                    echo "-";
                                                                                }
                                                                                ?> </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn inquiry-btn" id="inquiry_btn_click" data-carid="<?= $car['car_d_id']; ?>" data-makename="<?= $car_full_name; ?>" data-stockid="<?= $car['VehicleNo']; ?>" data-carprice="<?= $car['carprice']; ?>" data-carimage="<?= $img; ?>" data-year="<?= $car['RegistrationYear']; ?>" data-price="<?= $car['carprice']; ?>" data-mileage="<?php if ($car['Mileage'] == true) {
                                                                                                                                                                                                                                                                                                                                                                                                                                echo $car['Mileage'] . 'km';
                                                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                echo "-";
                                                                                                                                                                                                                                                                                                                                                                                                                            } ?>" data-engine="<?php if ($car['EngineSize'] == true) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $car['EngineSize'] . 'cc';
                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "-";
                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>" data-trans="<?php if ($car['Transmission'] == true) { ?>
															<?php if ($car['Transmission'] == 1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "Automatic";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
															<?php if ($car['Transmission'] == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "Manual";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
															<?php if ($car['Transmission'] == 3) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo "Automanual";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
															<?php } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "-";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>" data-toggle="modal" data-target="#inquiry">
                                                            <span>Inquiry</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <!--Car List Outer End-->
                    <div class="pagination-outer mt-3">
                        <nav>
                            <ul class="pagination pagin">
                            </ul>
                        </nav>
                    </div>
                    <div class="static-page export-info">
                        <ul class="list-inline">
                            <?php if ($car_models_content == NULL) { ?>
                                <p></p>
                            <?php } else { ?>
                                <p><?php echo $car_models_content; ?></p>
                            <?php } ?>
                            <?php if ($car_manufacturer_content == NULL) { ?>
                                <p></p>
                            <?php } else { ?>
                                <p><?php echo $car_manufacturer_content; ?></p>
                            <?php } ?>
                            <?php if ($car_bodytype_content == NULL) { ?>
                                <p></p>
                            <?php } else { ?>
                                <p><?php echo $car_bodytype_content; ?></p>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="modal" id="inquiry">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="height: auto;">
                                <div class="modal-header">
                                    <h4 class="modal-title">Inquiry</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="quick_inq_form">
                                        <div class="popup-description">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3" style="width: 35%">
                                                    <div class="car-list-left">
                                                        <div class="car-list-img">
                                                            <img src="" id="car_image" class="img-fluid" alt="Car Model Image" />
                                                        </div>
                                                        <div class="stock-id">
                                                            <p>Stock ID: <span id="stockid"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-sm-9" style="width: 65%">
                                                    <div class="car-list-right">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <h3 id="make_name"></h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-4">
                                                                <div class="item-price">
                                                                    <p>Year: <span id="year"></span></p>
                                                                    <p>Price: $<b class="red-text" id="price"></b></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-sm-8">
                                                                <div class="cars-list-table">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th colspan="2">Mileage</th>
                                                                                    <th colspan="2">Engine</th>
                                                                                    <th colspan="2">Trans</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="table-row">
                                                                                    <td colspan="2" id="mileage"></td>
                                                                                    <td colspan="2" id="engine"></td>
                                                                                    <td colspan="2" id="trans"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inquiry-form">
                                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input name="name" class="form-control" type="text" id="name" required placeholder="Name">
                                                            <input type="hidden" id="get_car_id" name="get_car_id">
                                                            <input name="portName" class="portName" type="hidden">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input name="email" class="form-control" type="text" id="email" pattern="[^ @]*@[^ @]*" required placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input name="phone" class="form-control" type="text" id="phone" required placeholder="Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mb-2">
                                                        <select name="country" class="form-control" required id="country_list">
                                                            <option value="">Select Your Country*</option>
                                                            <?php foreach ($countrys as $country) { ?>
                                                                <option value="<?= $country['hv_port_country_id'] ?>"><?= $country['country_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input name="address" class="form-control" type="text" id="address" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="submit" id="submit_inquiry" class="btn btn-primary" onclick="gtag_report_conversion()">Inquiry</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("left_side_bar.php"); ?>
        </div>
        <!--Main Content End-->
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $('#country_list').change(function() {
        var id = $(this).val();

        // if (id > 0) {
        //     $('#submit_inquiry').prop('disabled', false);
        // } else {
        //     $('#submit_inquiry').prop('disabled', true);
        // }
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
                            var price2 = parseInt($('#price').html());
                            $('.total_price').html(price + price2);
                            $('.portName').val(res[i]['arrival_port']);
                        }
                        $('.port_list').append('<tr class="border-bottom"><td>' + res[i]['arrival_port'] + '</td><td><div class="radio"><p class="port_name">' + res[i]['arrival_port'] + '</p></div></td><td><input class="delivery_destination" onclick="d_change(this)" type="radio" name="optradio" value=' + res[i]['total_price'] + ' ' + checked + '></td><td>$' + res[i]['total_price'] + '</td></tr>')
                    }

                }
            }

        });
    });

    function d_change(obj) {
        // alert();
        var id = parseInt($(obj).val());
        var dollersign = "$";
        var price2 = parseInt($('#price').html());

        $('.port_price').val(id);
        $('.portName').val($(obj).parent().parent().find('.radio').find('.port_name').html());
        $('.carprice').val(price2);
        $('.total_price').html(id + price2);
    }

    $(document).ready(function() {
        if ('<?= $make_id ?>' > 0) {
            let id = '<?= $make_id ?>';
            let model_id = 0;
            if ('<?= $module ?>' > 0) {
                model_id = '<?= $module ?>';
            }
            $.ajax({
                url: "<?= base_url() ?>home/get_models_by_make/" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    $('.module_list option').not('option:first').remove();
                    let html = '';
                    for (var i = 0; i < res.length; i++) {
                        let select_var = '';
                        if (model_id != 0 && model_id == res[i]['m_id']) {
                            select_var = 'selected';
                        }
                        html += `<option value="` + res[i]['m_id'] + `" ` + select_var + `>` + res[i]['model_name'] + `</option>`;
                    }
                    $('.module_list').append(html);
                }
            });
        }
        $('.make_car').on('change', function() {
            var id = $(this).val()
            $.ajax({
                url: "<?php echo base_url() ?>home/get_models_by_make/" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    $('.module_list option').not('option:first').remove()
                    for (var i = 0; i < res.length; i++) {
                        $('.module_list').append('<option value="' + res[i]['m_id'] + '">' + res[i]['model_name'] + '</option>')
                    }
                }
            });
        });
        $('#quick_inq_form').submit(function(e) {
            e.preventDefault();
            let name = $('[name="name"]').val();
            let get_car_id = $('[name="get_car_id"]').val();
            let email = $('[name="email"]').val();
            let phone = $('[name="phone"]').val();
            let address = $('[name="address"]').val();
            let portName = $('[name="portName"]').val();
            let port_price = $('input[name="optradio"]:checked').val();
            let country = $('[name="country"]').find(":selected").text();;
            let car_price = parseInt($('#price').html());
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/send_quick_inq'); ?>",
                data: {
                    name: name,
                    get_car_id: get_car_id,
                    email: email,
                    phone: phone,
                    portName: portName,
                    port_price: port_price,
                    country: country,
                    car_price: car_price,
                    address: address
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#inquiry').modal('hide');
                    Swal.fire(
                        'Inquiry Added!',
                        'Your inquiry has been submitted successfully!',
                        'success'
                    )
                }
            });
        });
    });
</script>

<script type="text/javascript">
    //Pagination
    pageSize = 20;
    incremSlide = 5;
    startPage = 0;
    numberPage = 0;
    var pageCount = $(".line-content").length / pageSize;
    var totalSlidepPage = Math.floor(pageCount / incremSlide);

    for (var i = 0; i < pageCount; i++) {
        $(".pagin").append('<li class="page-item"><a class="page-link go_to_top">' + (i + 1) + '</a></li> ');
        if (i > pageSize) {
            $(".pagin li").eq(i).hide();
        }
    }
    var prev = $("<li/>").addClass("page-item prev").html('<span aria-hidden="true" class="page-link go_to_top">&laquo;</span>').click(function() {
        startPage -= 5;
        incremSlide -= 5;
        numberPage--;
        slide();
    });
    prev.hide();

    var next = $("<li/>").addClass("page-item next").html('<span aria-hidden="true" class="page-link go_to_top">&raquo;</span>').click(function() {
        startPage += 5;
        incremSlide += 5;
        numberPage++;
        slide();
    });
    $(".pagin").prepend(prev).append(next);
    $(".pagin li").first().find("a").addClass("current");
    slide = function(sens) {
        $(".pagin li").hide();

        for (t = startPage; t < incremSlide; t++) {
            $(".pagin li").eq(t + 1).show();
        }
        if (startPage == 0) {
            next.show();
            prev.hide();
        } else if (numberPage == totalSlidepPage) {
            next.hide();
            prev.show();
        } else {
            next.show();
            prev.show();
        }
    }
    showPage = function(page) {
        $(".line-content").hide();
        $(".line-content").each(function(n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).show();
        });
    }

    showPage(1);
    $(".pagin li a").eq(0).addClass("current");
    $(".pagin li a").click(function() {
        $(".pagin li a").removeClass("current");
        $(this).addClass("current");
        showPage(parseInt($(this).text()));
    });
    $('.go_to_top').click(function() {
        var body = $("html, body");
        body.stop().animate({
            scrollTop: 200
        }, 500, 'swing', function() {});
    });

    $(".reset").click(function() {
        $(':input', '#contact')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected')
    });

    $('.sort_filters').change(function() {
        $("#target").submit();

    })
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('click', '#inquiry_btn_click', function(e) {
            // $('#submit_inquiry').prop('disabled', true);
            var car_id = $(this).data('carid');
            $('#get_car_id').val(car_id);
            var carimage = $(this).data('carimage');
            var carimages = "https://asiahilux.com/uploads/thumbnail/" + carimage;
            $("#car_image").attr("src", carimages);
            var makename = $(this).data('makename');
            $('#make_name').html($(this).data('makename'));
            var stockid = $(this).data('stockid');
            $('#stockid').html($(this).data('stockid'));
            $('#year').html($(this).data('year'));
            $('#price').html($(this).data('carprice'));
            $('#mileage').html($(this).data('mileage'));
            $('#engine').html($(this).data('engine'));
            $('#trans').html($(this).data('trans'));
        });
    });
    
    $(document).ready(function () {
	    var url = window.location.href;
	    let get_url = url.split('?')[1];
	    get_url = get_url.split('&');
	    let current_pram;
	    let current_value;
	    let update_url = '?';
	    let count = 1;
	    $.each(get_url, function (indexInArray, valueOfElement) { 
	       current_pram = valueOfElement.split('=')[0];
	       current_value = valueOfElement.split('=')[1];
	       if(current_value != ''){
	           if(count > 1){
	               update_url = update_url + '&'
	           }
    	       update_url = update_url + valueOfElement;
    	       count++;
	       }
		});
		window.history.pushState({"html":'search',"pageTitle":'search'},"", update_url);

    });
</script>
