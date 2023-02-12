

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
					  <h6>FAQ</h6>
					  <ol>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li>FAQ</li>
					  </ol>
					</div>
				</section>
				
				<div class="static-page faqs">
					<ul class="list-inline">
						<li><h6><span>Q.</span> What do I have to do to buy a car?</h6></li>
						<li>Registration is required. After registration is completed, you can buy any car that you want.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Do you have any criteria to become a registered member of SBT?</h6></li>
						<li>Anyone who is an automobile dealer or an individual buyer can apply for the membership.
						However, for an individual car buyer, we encourage you to check your country's regulations before purchase.
						We are not familiar with the laws of your country. We are not able to offer you any advice, or to introduce
						you to any car importer or customs clearing agent in your country.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> How many used cars are normally available in your Inventory and in auction?</h6></li>
						<li>Usually, we have more than a thousand cars in our regular inventory. In addition, you can 
						have access to about 150,000 cars a week available at different online auctions we cover. Usually we have 2 to 3 
						RORO Ships and 4 to 5 Container Shipments in a month.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> What payment methods can be accepted by SBT?</h6></li>
						<li>Because of high frequency of credit card fraud, we don't accept payment by credit card. 
						We only accept payment by telegraphic transfer to our designated bank account from your bank.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> How long does it take me to receive my car?</h6></li>
						<li>We cannot tell you the exact time for your car to be delivered to you as it completely depends on 
						the shipping schedule. However, your car will be shipped on the earliest available vessel. Usually, it takes 4 to 8 weeks.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Is there any membership fee?</h6></li>
						<li>No. No fees or hidden charges are required. So don't hesitate and <a href="#">sign up now.</a></li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> If I purchase a vehicle at $ 2,000, how much will I have to pay as extra charges?</h6></li>
						<li>If the price is in FOB, you will have to pay Freight charge, Clearance fee, Import duty, 
						Registration fee, Compliance fee, and any other fee which may occur according to the import regulations of your 
						country. <br> If the price is in C&F, you can omit Freight charge from the above charges.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Can I purchase LHD cars from SBT?</h6></li>
						<li>LHD cars are very rare in Japan. LHD cars are usually imported from countries like US, 
						Europe and Korea. However, you can search for an LHD car in a fair amount of Korean and American Inventory.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Can I cancel my purchase order?</h6></li>
						<li>When you cancel an order, we may have to resell that car in an auction or in any other way. 
						Therefore, if you cancel the order, you have to pay the balance in addition to the costs that may incur.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Do you inspect the cars before shipping?</h6></li>
						<li>All the cars are thoroughly inspected to confirm that there is no difference between the 
						actual specifications and those on the specification sheet.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> When can I use online auction service?</h6></li>
						<li>You can use it every day.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Is there any way to know an indicative bidding price for a vehicle I am interested in at an auction?</h6></li>
						<li>Yes, the data from recent auctions will be a good source of information. It indicates the prices 
						of vehicles that have been sold over the last 3 months.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6><span>Q.</span> Do your staffs inspect the cars before bidding?</h6></li>
						<li>We have highly skilled professionals who carefully inspect the cars. Before the professionals 
						decide to bid a car, they confirm that the actual specification and condition of the car matches the information
						provided by the auction house.</li>
					</ul>
					
					<div class="further-questions">
					<b>For further questions, feel free to contact us</b>
						<div class="further-details">
							<p><b>Call:</b> <a href="tel:+81-45-290-9485">+81-45-290-9485</a></p>
							<p><b>Fax:</b> <a href="tel:+81-45-290-9486">+81-45-290-9486</a></p>
							<p><b>Email:</b> <a href="mailto:csd@sbtjapan.com">csd@sbtjapan.com</a></p>
							<p><b>Skype:</b> sbtcsc</p>
						</div>
					</div>
					
					
				</div>
				
			</div><!--Main Content End-->
				
		</div>
	</div>

  </main>

 