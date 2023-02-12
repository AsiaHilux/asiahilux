<main id="main">
  
	<div class="container mt-160 pb-5">
		<div class="row">
		<div class="col-md-3 col-sm-12 left-sidebar">
				<div class="col-left">
						<div class="small-banner mb-4">
							
							<a href="#"><img src="<?php echo base_url()?>/assets/images/sbt_360_view_photos.gif" alt="" class="img-fluid img-hover" /></a>
						</div>
				
					<div class="list">
					<div class="list-title">
						<h3>Asia Hilux Bangkok</h3>
                       
					</div>
						<ul class="list-group col-left-address">
							<li><a href="#"><i class="fa fa-map-marker"></i>  114 SOI PETCHKASEM 112, NONGKANGPLU, NONGKHAM, BANGKOK</a><li>
							<li><i class="fa fa-phone"> </i>  +66 6330 31732<li>
                            <li><i class="fa fa-phone"> </i>  +66 6330 31735<li>
						</ul>
					</div>
				
					<div class="list list-with-icon">
					<div class="list-title">
						<h3>Search By Make</h3>
					</div>
						<ul class="list-group">
                            <?php foreach ($get_make_count as $row) { 
                             $small = strtolower($row['vm_name']);
                             $fac = ucfirst($small);
                            ?> 
                                
                                <a href="<?php echo base_url()?>brand/<?php echo $small;?>">
                                    <li><img src="<?php echo base_url()?>uploads/make_logos/<?php echo $row['stored_file_name']; ?>" alt=" <?php echo $row['stored_file_name'];?>" /> <?php echo $fac;?> <b>(<?php echo $row['make_count'];?>)</b><li>
                                </a>
                            <?php } ?>
                        </ul>
					</div>
					
					<div class="list list-with-icon-globe">
					<div class="list-title">
						<h3>Search By Inventory Location</h3>
					</div>
						<ul class="list-group">

						<?php foreach ($get_make_count_country as $row) {?>
						
						
                                
                                
                                   
							<a href="<?php echo base_url();?>country/<?php echo $row['country_name']?>">
                                    
                                    
									<li><img src="<?php echo base_url()?>assets/images/<?php echo $row['stored_file_name']; ?>" alt="<?php echo $row['country_name']; ?>" /> <?php echo $row['country_name']; ?> <b>(<?php echo $row['country_count']; ?>)</b><li>
                                        
                                </a>
                                
                            <?php } ?>

							
						</ul>
					</div>
					
					<div class="list">
					<div class="list-title">
						<h3>Search By Price</h3>
					</div>
						<ul class="list-group">
                           
                            <li>
                                <a href="<?php echo base_url()?>price-under/500">
                                    Under $500
                                </a>
                            </li>
							<li>
                                <a href="<?php echo base_url()?>by-price/500/1000">
                                   $500 - $1,000
                                </a>
                            
							</li> 
                            <li>
                            <a href="<?php echo base_url()?>by-price/1000/1500">
                                   $1,000 - $1,500
                                </a>
                            </li>  
                            <li>
                            <a href="<?php echo base_url()?>by-price/1500/2000">
                                    $1,500 - $2,000
                                </a>
                            </li>
                            <li>
                            <a href="<?php echo base_url()?>by-price/2000/2500">
                             $2,000 - $2,500
                            </a>
                            </li>
                            <li>
                            <a href="<?php echo base_url()?>by-price/2500/4000">
                            $2,500 - $4,000
                            </a>
                            </li>
                            <li>
                            <a href="<?php echo base_url()?>price-over/4000">
                              Over $4,000
                            </a>
                            </li>
							
						</ul>
					</div>
					
					<div class="list">
					<div class="list-title">
						<h3>Search By Discount</h3>
					</div>
						<ul class="list-group">
							<li>
                                <a href="<?php echo base_url()?>car-discount/500/5000">
                                   $500 - $5,000
                                </a>
							</li> 
							<li>
                                <a href="<?php echo base_url()?>car-discount/5000/10000">
								$5,000 - $10,000
                                </a>
							</li> 
							<li>
                                <a href="<?php echo base_url()?>car-discount/10000/15000">
                                   $10,000 - $15,000
                                </a>
							</li> 
							<li>
                                <a href="<?php echo base_url()?>car-discount/15000/20000">
                                   $15,000 - $20,000
                                </a>
							</li> 
							<li>
                                <a href="<?php echo base_url()?>car-discount/20000/25000">
								$20,000 - $25,000
                                </a>
							</li> 
							<li>
                                <a href="<?php echo base_url()?>car-discount/25000/30000">
								$25,000 - $30,000
                                </a>
							</li> 
							
						</ul>
					</div>
					
					<div class="list list-with-icon">
					<div class="list-title">
						<h3>Search By Type</h3>
					</div>
						<ul class="list-group">
                            
                            <?php foreach ($get_search_by_type_list_Count as $row) {
								
								$string= $row['bodytype_name'];
								$car_body_type = str_replace(" ", "-", $string);
								$small_cbt = strtolower($car_body_type);

							 ?>

							<li>
								<img src="<?php echo base_url()?>assets/images/Convertible-179x79.png" alt="Search by type icon" />

								<a href="<?php echo base_url()?>car-type/<?php echo $small_cbt;?>"><?php echo $row['bodytype_name'];?><b>(<?php echo $row['make_count']; ?>)</b>
								</a>
							</li>

							<?php } ?>
                        
						</ul>
					</div>
					
				</div>
			</div>
			
			<div class="col-md-9 col-sm-12 w-80">
				<div class="main-content">
				
				<section class="breadcrumbs">
					<div class="d-flex justify-content-between align-items-center">
					  <h6>Our Staff</h6>
					  <ol>
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li>Our Staff</li>
					  </ol>
					</div>
				</section>
				
				<div class="static-page">
				
					<div class="our-staff">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<p>With our head office in Yokohama Japan and 33 regional offices in major countries, SBT CO., LTD.
										has over 1000 staffs around the globe. We never compromise on cultivation of our staffs to ensure 
										the best quality of services for our loyal customers.</p>
										<h6>How do we ensure the quality of our service?</h6>
										<p>Before shipping, all vehicles go through our extensive maintenance procedure. Our skilled and
										experienced staffs clean every vehicle before it gets ready to be shipped.</p>
										<p>We have technical experts in our yard staffs. They perform complete diagnoses of the engine, 
										compartments, transmission and other electrical systems by using the latest scanner to confirm 
										if every part of the vehicle is in its best condition.</p>
										<p>Our yards are also well-maintained to store thousands of major brands of vehicles at a time. 
										We provide our staffs with clean and employee-friendly workplaces in order to encourage our skilled 
										and highly dedicated professional staffs to provide the topnotch services to customers.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo2.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo7.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo4.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo5.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo6.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/ourstaff_photo8.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						<hr>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<h6><i class="fa fa-angle-right icon"></i> Buyers:</h6>
										<p>Our discerning staffs are deployed in all major auction houses to purchase vehicles in their
										best quality. We perform thorough inspection of vehicles before purchasing. The buyers have 
										wide knowledge of export, auctions and used vehicle industry so that they can offer high 
										values to our customers.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/buyer_photo1.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/buyer_photo2.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						<hr>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<h6><i class="fa fa-angle-right icon"></i> Yard Staffs:</h6>
										<p>Our yard staffs provide additional inspection before each vehicle is shipped. The yard 
										staffs are well trained to fix minor defects and clean all vehicles at the yard before shipment.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/yard_photo3.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/yard_photo4.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						<hr>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<h6><i class="fa fa-angle-right icon"></i> Sale Staffs:</h6>
										<p>Our passionate multilingual sales staffs with solid market knowledge are engaged in the best 
										services for customers round the clock across the globe.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/sales_photo1.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/sales_photo2.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						<hr>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<h6><i class="fa fa-angle-right icon"></i> Administrative Staffs:</h6>
										<p>Our experienced administrative staffs handle all documentation for customers in order to
										promote prompt and sure reception of the documents. Over the years, we have built up good 
										relationship with shipping companies, which makes it more convenient for us to ship your 
										vehicles without delay on a regular basis.</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/administrative_photo1.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/administrative_photo2.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						<hr>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
									<div class="desc">
										<h6><i class="fa fa-angle-right icon"></i> Customer Service Staffs:</h6>
										<p class="mb-0">24/7 Customer service staffs assist you in any phase of your purchasing process until
										you receive your vehicle(s).</p>
										<p>Contact us at +81-45-290-9485 or <a href="email:csd@sbtjapan.com">csd@sbtjapan.com</a></p>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="our-staff-inner">
								<div class="row">
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/cs_photo1.jpg" class="img-fluid" >
									</div>
									<div class="img col-lg-6 col-md-6">
										<img src="<?php echo base_url()?>assets/images/our-staff/cs_photo2.jpg" class="img-fluid" >
									</div>
								</div>
								</div>
							</div>
						</div>
						
						
					</div>	
				
				</div>
				
			</div><!--Main Content End-->
				
		</div>
	</div>

  </main>

 