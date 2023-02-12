</div>
	</div>

  </main>

  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <div class="footer-logo">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="" />
			</div>
			<h4>Address</h4>
            <p>
              114 SOI PETCHKASEM 112, NONGKANGPLU, NONGKHAM, BANGKOK<br>
              <strong>Tel:</strong> <a href="tel:+66 6330 31732">+66 6330 31732</a><br>
			  <strong>Tel:</strong> <a href="tel:+66 6330 31732">+66 6330 31732</a><br>
              <strong>Email:</strong> <a href="mailto:info@asiahilux.com">info@asiahilux.com</a><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>Browse Stock:</h4>
			<?php dynamic_sidebar('browse-stock'); ?>
            
			<h4 class="mt-3">By Make</h4>
			<?php dynamic_sidebar('by-make'); ?>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Price</h4>
			<?php dynamic_sidebar('by-price'); ?>
            
			<h4 class="mt-3">By Discount</h4>
			<?php dynamic_sidebar('by-discount'); ?>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Type</h4>
			<?php dynamic_sidebar('by-type'); ?>
			
			<h4 class="mt-3">Car Contents</h4>
			<?php dynamic_sidebar('car-contents'); ?>
            
          </div>
		  
		   <div class="col-lg-2 col-md-4 footer-links">
            <h4>Global Office</h4>
			<?php dynamic_sidebar('global-office') ?>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <?php dynamic_sidebar('copyright') ?>
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