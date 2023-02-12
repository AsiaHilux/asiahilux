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
					  <h6>Export Information</h6>
					  <ol>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li>Export Information</li>
					  </ol>
					</div>
				</section>
				
				<div class="static-page export-info">
					<ul class="list-inline">
						<li><h6>SBT's Standard Terms of Trade are as follows:</h6></li>
						<li>Unless otherwise stated, a vehicle is reserved for three <b>(3)</b> business days. Minimum 50% payment will 
						be required within the reservation period. Failure to do so will lead to automatic cancellation of the order.</li>
						<li>Shipping procedure will begin once we receive your deposit which is agreed by the customer <b>(you)</b> and SBT <b>(us)</b>.</li>
						<li>As soon as we receive full payment, we will send you all the documents by courier <b>(DHL,FedEx)</b>
							We will receive Letters of Credit at Sight from selected countries.</li>
						<li>Scanned TT copy will be required after payment in order to avoid any delay of shipping or document preparation.</li>
						<br>
						<p>Shipping Terms</p>		
					</ul>
					
					<ul class="list-inline">
						<li><h6>FOB: Free - On - Board:</h6></li>
						<li>This is the cost of the vehicle excluding ocean freight. If you buy the vehicle at FOB price, the price 
						only includes the cost of the vehicle and the expenses until loading on the ship in Japan.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6>CFR: Cost and Freight. <br> CIF: Cost, Insurance and Freight.</h6></li>
						<li>This is the cost of the vehicle including all expenses caused in Japan and during ocean freight.
						If you need an insurance for the vehicle, please ask for our assistance.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6>T.T: Telegraphic Transfer / Wire Transfer:</h6></li>
						<li>This is the best way of payment. It is the fastest, safest and most effective mode of sending money.
						You can transfer money by Telegraphic Transfer at most of the major banks.</li>
					</ul>
					
					<ul class="list-inline">
						<li><h6>L/C: Letter of Credit:</h6></li>
						<li>We receive Letters of Credit at sight for selected countries. <br> Please contact your nearest bank about the document.</li>
					</ul>
				</div>
				
			</div><!--Main Content End-->
				
		</div>
	</div>

  </main>

 