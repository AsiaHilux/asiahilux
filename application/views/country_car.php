
<?php
$csrf = array(
  'name' => $this->security->get_csrf_token_name(),
  'hash' => $this->security->get_csrf_hash()
);
// echo "<pre>";print_r($country_car);die;
?>
<main id="main">

  <div class="container mt-160">
    <div class="row">


      <?php include("left_side_bar.php"); ?>


      <div class="col-md-9 col-sm-12 w-80">
        <div class="main-content">

          <section class="breadcrumbs">
            <div class="d-flex justify-content-between align-items-center">
              <h6>
                <?php

                $string =  $_SERVER['REQUEST_URI'];
                $url1 = str_replace("-", " ", $string);
                $url = str_replace("/", " ", $url1);
                $cap_first_word =  ucwords($url);
                echo $cap_first_word;
                ?>

              </h6>
              <ol>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>
                  <?php

                  echo $cap_first_word;

                  ?>
                </li>
              </ol>
            </div>
          </section>




          <form action="<?php echo base_url() ?>search" method="POST" class="d-none d-md-block">
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
            <div class="search mb-3">
              <div class="input-group">
                <span class="input-group-text">Search Cars</span>
                <input type="" name="refrence_no" class="form-control" placeholder="Search With Car Stock Number For Example: 3223 ">

                <span class="input-group-text search-btn"><button class="btn btn-primary"><i class="fa fa-search"></i></button></span>
              </div>
            </div>
          </form>


          <div class="custom-search-form">
            <div class="row">
              <div class="col-md-12 col-sm-12">

                <?php include("top_search_bar.php"); ?>

              </div>
            </div>

          </div>



          <div class="full-banner mt-3">
            <img src="<?php echo base_url() ?>assets/images/Banner.jpg" class="img-fluid" alt="Banner Image" />
          </div>

          <div class="row sortby">
            <div class="col-md-8 col-sm-12 cars-found">
              <p><span><?php echo count($country_car); ?></span> Cars found</p>
            </div>



            <div class="col-md-4 col-sm-12 sort-by text-right">
              <div class="row">
                <label class="col-md-4 col-sm-4">Sort By:</label>
                <form action="<?php echo base_url() ?>search" method="POST" id="target" class="col-md-8 col-sm-8">
                  <input type="hidden" name="clearance_sale" value="<?php echo $clearance_sale ?>">
                  <input type="hidden" name="make_id" value="<?php echo $make_id ?>">
                  <input type="hidden" name="module" value="<?php echo $module ?>">
                  <input type="hidden" name="fuel" value="<?php echo $fuel ?>">
                  <input type="hidden" name="drivetrain" value="<?php echo $drivetrain ?>">
                  <input type="hidden" name="price_from" value="<?php echo $price_from ?>">
                  <input type="hidden" name="price_to" value="<?php echo $price_to ?>">
                  <input type="hidden" name="body_type" value="<?php echo $body_type ?>">
                  <input type="hidden" name="steering" value="<?php echo $steering ?>">
                  <input type="hidden" name="transmission" value="<?php echo $transmission ?>">
                  <input type="hidden" name="mileage_from" value="<?php echo $mileage_from ?>">
                  <input type="hidden" name="mileage_to" value="<?php echo $mileage_to ?>">
                  <input type="hidden" name="engine_capacity_from" value="<?php echo $engine_capacity_from ?>">
                  <input type="hidden" name="year_from" value="<?php echo $year_from ?>">
                  <input type="hidden" name="month_from" value="<?php echo $month_from ?>">
                  <input type="hidden" name="year_to" value="<?php echo $year_to ?>">
                  <input type="hidden" name="month_to" value="<?php echo $month_to ?>">
                  <input type="hidden" name="sort" value="<?php echo $sort ?>">
                  <input type="hidden" name="discounted" value="<?php echo $discounted ?>">
                  <input type="hidden" name="refrence_no" value="<?php echo $refrence_no ?>">
                  <input type="hidden" name="car_tag" value="<?php echo $car_tag ?>">
                  <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                  <select name="sort" id="sort" class="sort_filters form-control col-md-8 col-sm-8 pull-right" title="sort">


                    <option selected disabled>Select</option>
                    <option value="mileage_desc" <?php if ($_GET['sort'] == "mileage_desc") {
                                                    echo "selected";
                                                  } ?>>Mileage High to Low</option>
                    <option value="price_asc" <?php if ($_GET['sort'] == "price_asc") {
                                                echo "selected";
                                              } ?>>Price Low to High</option>
                    <option value="year_asc" <?php if ($_GET['sort'] == "year_asc") {
                                                echo "selected";
                                              } ?>>Year Old to New</option>
                    <option value="mileage_asc" <?php if ($_GET['sort'] == "mileage_asc") {
                                                  echo "selected";
                                                } ?>>Mileage Low to High</option>
                    <option value="year_desc" <?php if ($_GET['sort'] == "year_desc") {
                                                echo "selected";
                                              } ?>>Year New to Old</option>
                    <option value="sort_id_desc" <?php if ($_GET['sort'] == "sort_id_desc") {
                                                    echo "selected";
                                                  } ?>>New Arrivals</option>
                    <option value="price_desc" <?php if ($_GET['sort'] == "price_desc") {
                                                  echo "selected";
                                                } ?>>Price High to Low</option>
                  </select>
                </form>
              </div>
            </div>

          </div>






          <div class="car-list-outer">

            <?php if (!empty($country_car)) {
              foreach ($country_car as $car) {

                $make = $car['vm_name'];
                $remove_first_dash_in_name = str_replace('-', '', $car['model_name']);
                $car_name = $car['car_d_id'] . '/' . $make . '-' . $remove_first_dash_in_name;
                $remove_dot = str_replace('.', '-', $car_name);
                $remove_space = str_replace(' ', '-', $remove_dot);
                $all_small = strtolower($remove_space);
                $url =  base_url() . 'car-detail/' . $all_small;
            ?>
                <div class="car-list-item line-content">
                  <div class="row">
                    <div class="col-md-3 col-sm-3">
                      <div class="car-list-left">
                        <div class="car-list-img">
                          <?php
                                                $imges = null;
                                                if($car['car_d_id']){
                                                    $imges = $this->db->query("select hv_car_home_page_images.*  from hv_car_home_page_images  where hv_car_home_page_images.car_d_id=" . $car['car_d_id'] . " AND hv_car_home_page_images.featured_iamge = 1 ORDER BY hv_car_home_page_images.ID DESC ")->row_array();
                                                }

                                                if ($imges != null && $imges['stored_file_name'] == true) {
                                                    $img = $imges['stored_file_name'];
                                                } else {
                                                    $img = "No-image-found.jpg";
                                                }
                                                ?>

                          <a href="<?php echo $url; ?>"><img src="<?php echo base_url(); ?>uploads/thumbnail/<?php echo $img; ?>" class="img-fluid" alt="<?php echo $imges['stored_file_name']; ?>" /></a>
                        </div>
                        <div class="stock-id">
                          <p>Stock ID: <?php echo $car['VehicleNo']; ?></p>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-9 col-sm-9">
                      <div class="car-list-right">
                        <div class="row">

                          <div class="col-md-6 col-sm-6">
                            <?php

                            $car_full_name =  $car['vm_name'] . ' ' .  $car['model_name'];

                            ?>
                            <a href="<?php echo $url; ?>">
                              <h3><?php echo $car_full_name; ?></h3>
                            </a>
                          </div>



                        </div>

                        <div class="row">

                          <div class="col-md-4 col-sm-4">

                            <div class="item-price">
                              <p>Year: <?php if ($car['RegistrationYear'] == true) {
                                          echo $car['RegistrationYear'];
                                        } else {
                                          echo "-";
                                        } ?></p>
                              <p>Price: $<b class="red-text"><?php echo $car['carprice']; ?></b></p>

                              <a href="<?php echo $url; ?>">
                                <p>Total Price: <b class="red-text">ASK</b></p>
                              </a>

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

                                      <td colspan="2"><?php if ($car['Transmission'] == true) { ?>

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
                                                      }
                                        ?> </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                            </div>


                            <button type="button" class="btn inquiry-btn" id="inquiry_btn_click" data-carid="<?php echo $car['car_d_id']; ?>" data-makename="<? echo $car_full_name; ?>" data-stockid="<? echo $car['VehicleNo']; ?>" data-carprice="<? echo $car['carprice']; ?>" data-carimage="<? echo $img; ?>" data-year="<? echo $car['RegistrationYear']; ?>" data-price="<? echo $car['carprice']; ?>" data-mileage="<?php if ($car['Mileage'] == true) {
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
                                                                }
                              ?>" data-toggle="modal" data-target="#inquiry">
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




            <?php

            if ($country_car == true) { ?>

              <nav>
                <ul class="pagination pagin">
                </ul>
              </nav>

            <?php } else { ?>



            <?php }


            ?>



          </div>

          <div class="static-page export-info">

            <ul class="list-inline">

              <?php

              if ($country_car == true) { ?>
                <li>
                  <h6><?php echo $country_car[0]['country_name']; ?></h6>
                </li>
                <p><?php echo $country_car[0]['countries_description']; ?></p>
              <?php } else { ?>

                <li>
                  <h6><?php echo $url_country_name; ?></h6>
                </li>
                <p><?php echo $url_countries_description; ?></p>

              <?php }


              ?>







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
                      <form action="<?php echo base_url() ?>send-quick-inquiry" method="post">
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <div class="form-group">
                          <label for="name">Name <span class="red-text">*</span></label>
                          <input name="name" class="form-control" type="text" id="name" required placeholder="Name">

                          <input type="hidden" id="get_car_id" name="get_car_id">
                        </div>

                        <div class="form-group">
                          <label for="email">Email <span class="red-text">*</span></label>

                          <input name="email" class="form-control" type="text" id="email" pattern="[^ @]*@[^ @]*" required placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="phone">Phone <span class="red-text">*</span></label>

                          <input name="phone" class="form-control" type="text" id="phone" required placeholder="Phone">
                        </div>

                        <div class="form-group">
                          <label for="phone">Address <span class="red-text"></span></label>

                          <input name="address" class="form-control" type="text" id="address" placeholder="Aaddress">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Inquiry</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>





        </div>
        <!--Main Content End-->

      </div>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
  $(function() {
    $(document).on('click', '#inquiry_btn_click', function(e) {

      $('#get_car_id').val($(this).data('id'));
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

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
    //alert('reset click')
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
</script>