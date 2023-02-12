</div>
	</div>

  </main>

  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <div class="footer-logo">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/asiahilux.png" alt="" />
			</div>
			<h4>Address</h4>
            <p>
              114 SOI PETCHKASEM 112, NONGKANGPLU, NONGKHAM, BANGKOK<br>
              <strong>Tel:</strong> <a href="tel:+66 6330 31732" style="text-decoration: none;">+66 6330 31732</a><br>
			  <strong>Tel:</strong> <a href="tel:+66 6330 31735" style="text-decoration: none;">+66 6330 31735</a><br>
              <strong>Email:</strong> <a href="mailto:info@asiahilux.com" style="text-decoration: none;">info@asiahilux.com</a><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>Browse Stock:</h4>
			<?php dynamic_sidebar('browse-stock'); ?>
            
			<h4 class="mt-3">By Make</h4>
			<ul>
                <?php
    		    require('custom_connection.php');
    		        
                $sql_make   =   mysqli_query($conn, "SELECT DISTINCT hcman.vm_name, COUNT(hcd.car_d_id) AS car_count FROM hv_car_details hcd
                                    INNER JOIN hv_car_manufacturer hcman ON hcman.vm_id=hcd.vm_id
                                    WHERE hcman.active=1
                                    GROUP BY hcman.vm_name
                                    ORDER BY car_count DESC");
                    
                if(mysqli_num_rows($sql_make) > 0)
                {          
                    WHILE($row_make =   mysqli_fetch_array($sql_make))
                    {
                        $upper = strtoupper($row_make['vm_name']);
                        $small = strtolower($row_make['vm_name']);
                        $fac = ucfirst($small);
		        ?>
    		        
    				<li>
    				    <i class="bx bx-chevron-right"></i> 
    				    <a href="https://asiahilux.com/brand/<?php echo $small; ?>"><?php echo $upper; ?></a>
    				</li>
    				
    			<?php }} ?>
            </ul>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Price</h4>
			<?php dynamic_sidebar('by-price'); ?>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Type</h4>
			<ul>
                <?php
                $sql_type   =   mysqli_query($conn, "SELECT DISTINCT hcbt.bodytype_name, COUNT(hcd.car_d_id) AS car_count FROM hv_car_details hcd
                                INNER JOIN hv_car_bodytype_details hcbtd ON hcbtd.car_d_id=hcd.car_d_id
                                INNER JOIN hv_car_bodytype hcbt ON hcbt.bodytype_id=hcbtd.bodytype_id
                                WHERE hcbt.active=1
                                GROUP BY hcbt.bodytype_name
                                ORDER BY car_count DESC");
                
                if(mysqli_num_rows($sql_type) > 0)
                {          
                    WHILE($row_type =   mysqli_fetch_array($sql_type))
                    {
                        $string= $row_type['bodytype_name'];
                        $car_body_type = str_replace(" ", "-", $string);
                        $small_cbt = strtolower($car_body_type);
		        ?>
    		        
				<li>
					<i class="bx bx-chevron-right"></i>
					<a href="https://asiahilux.com/car-type/<?php echo $small_cbt; ?>"><?php echo $row_type['bodytype_name']; ?></a>
				</li>
				
				<?php }} ?>
            </ul>
          </div>
		  
		   <div class="col-md-3 footer-links">
            <h4>Global Office</h4>
			<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d31006.738016340496!2d100.47825161818311!3d13.727998657444337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m5!1s0x30e298f8a072802b%3A0x740128e22e424432!2zdmlnbzR1IGNvLixsdGQgMTE0IOC4luC4meC4mSDguYDguJ7guIrguKPguYDguIHguKnguKEgMTEyIOC5geC4guC4p-C4hyDguKvguJnguK3guIfguITguYnguLLguIfguJ7guKXguLkg4LmA4LiC4LiV4Lir4LiZ4Lit4LiH4LmB4LiC4LihIEJhbmdrb2sgMTAxNjAsIFRoYWlsYW5k!3m2!1d13.729569399999999!2d100.4846666!4m0!5e0!3m2!1sen!2s!4v1631280569144!5m2!1sen!2s" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <p>© Copyright <?php echo date(Y); ?> <b>Asia Hilux</b>. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  
 <?php wp_footer() ?>

<script>
	function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
        function select_lang() {
            var url = document.getElementById("select_lang").value; // get selected value
            if (url) { // require a URL
                var clean_uri = location.protocol + "//" + location.host + location.pathname;
                window.history.replaceState({}, document.title, clean_uri);
                document.cookie = "googtrans=" + $('#select_lang').find("option:selected").attr('data-check');
                var c_url = window.location;
                var new_url = c_url+url; // redirect
                window.location = new_url; // redirect
                location.reload();
            }
            return false;
        }
	</script>
</body>
</html>