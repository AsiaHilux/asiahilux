<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <div class="footer-logo">
				<img src="<?php echo base_url()?>assets/images/AH-footer-logo.png" alt="Asia Hilux Logo" />
			</div>
			<h4>Address</h4>
			<div class="ac_dv">
                <p>
                114 SOI PETCHKASEM 112, NONGKANGPLU, NONGKHAM, BANGKOK <br>
                  <strong>Tel:</strong> <a href="tel:+66 6330 31732">+66 6330 31732</a><br>
    			  <strong>Tel:</strong> <a href="tel:+66 6330 31735">+66 6330 31735</a><br>
                  <strong>Email:</strong> <a href="mailto:info@asiahilux.com">info@asiahilux.com</a><br>
                </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>Browse Stock:</h4>
            <div class="ac_dv">
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>search">Browse All Cars</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>all-discounted">Discounted</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>all-clearance">Clearance</a></li>
                </ul>
            </div>
			
		    <h4 class="mt-3">By Make</h4>
			
			<div class="ac_dv">    
                <ul>
                    <?php foreach ($get_make_count as $row) { 
                     $small = strtolower($row['vm_name']);
                                     $fac = ucfirst($small);
                    ?>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>brand/<?php echo $small;?>"><?php echo $row['vm_name'];?></a></li>
                    <?php } ?>
                </ul>
            </div>
            
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Price</h4>
            <div class="ac_dv">
                <ul>
                          <li><i class="bx bx-chevron-right"></i>
                              <a href="<?php echo base_url()?>price-under/8000">Under $8000</a>
                          </li>
                          <li><i class="bx bx-chevron-right"></i>
                              <a href="<?php echo base_url()?>by-price/8000/12000">$8000 - $12000</a>
                          </li>
                          <li><i class="bx bx-chevron-right"></i>
                              <a href="<?php echo base_url()?>by-price/12000/15000">$12000 - $15000</a>
                          </li>
                          <li><i class="bx bx-chevron-right"></i>
                              <a href="<?php echo base_url()?>by-price/15000/20000">$15000 - $20000</a>
                          </li>
                          <li><i class="bx bx-chevron-right"></i>
                              <a href="<?php echo base_url()?>by-price/20000/25000">$20000 - $25000</a>
                          </li>
                          <li><i class="bx bx-chevron-right"></i>
                             <a href="<?php echo base_url()?>price-over/25000">Over $25000</a>
                          </li>
                </ul>
			</div>
		
          </div>

          <div class="col-lg-2 col-md-4 footer-links">
            <h4>By Type</h4>
            <div class="ac_dv">
                <ul>
                   <?php foreach ($get_search_by_type_list_Count as $row) {
                
                $string= $row['bodytype_name'];
                $car_body_type = str_replace(" ", "-", $string);
                $small_cbt = strtolower($car_body_type);
    
                ?>
    
                <li><i class="bx bx-chevron-right"></i>
                    <a href="<?php echo base_url()?>car-type/<?php echo $small_cbt;?>"><?php echo $row['bodytype_name'];?></a>
                </li>
                
                <?php } ?>
                </ul>
			</div>
		
          </div>
		  
		   <div class="col-lg-3 col-md-3 footer-links">
            <h4>Global Office</h4>
            <div class="ac_dv">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d31006.738016340496!2d100.47825161818311!3d13.727998657444337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m5!1s0x30e298f8a072802b%3A0x740128e22e424432!2zdmlnbzR1IGNvLixsdGQgMTE0IOC4luC4meC4mSDguYDguJ7guIrguKPguYDguIHguKnguKEgMTEyIOC5geC4guC4p-C4hyDguKvguJnguK3guIfguITguYnguLLguIfguJ7guKXguLkg4LmA4LiC4LiV4Lir4LiZ4Lit4LiH4LmB4LiC4LihIEJhbmdrb2sgMTAxNjAsIFRoYWlsYW5k!3m2!1d13.729569399999999!2d100.4846666!4m0!5e0!3m2!1sen!2s!4v1631280569144!5m2!1sen!2s" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <p>&copy; Copyright <?php echo date('Y'); ?> <strong><span>Asia Hilux</span></strong>. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!--<div id="preloader"></div>-->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--<script src="<?php echo base_url()?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>-->
  <!--<script src="<?php //echo base_url()?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
  <script src="<?php echo base_url()?>assets/vendor/venobox/venobox.min.js"></script>
  <!--<script src="<?php //echo base_url()?>assets/vendor/aos/aos.js"></script>-->
  <script src="<?php echo base_url()?>assets/js/main.js"></script>
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/lightbox.min.js"></script>
  
  <script src="<?php echo base_url()?>assets/js/easyzoom.js"></script>
  <script src="<?php echo base_url()?>assets/js/swiper.min.js"></script>            
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <script type="text/javascript">
	"use strict";
        
        var width = jQuery(window).width();
        
        if(width < 768){
            $('#footer .footer-top h4').click(function(){
               $(this).next('.ac_dv').slideToggle(); 
            });
        }
        
		$(document).ready(function domReady() {
			$(".js-select2").select2({
			});
		});
		
		$(document).on("click", '[data-toggle="lightbox"]', function(event) {
		  event.preventDefault();
		  $(this).ekkoLightbox();
		});
		

  
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


  <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        // var Tawk_API = Tawk_API || {},
        //     Tawk_LoadStart = new Date();
        // (function() {
        //     var s1 = document.createElement("script"),
        //         s0 = document.getElementsByTagName("script")[0];
        //     s1.async = true;
        //     s1.src = 'https://embed.tawk.to/62e9774154f06e12d88c91b7/1g9fvjm6t';
        //     s1.charset = 'UTF-8';
        //     s1.setAttribute('crossorigin', '*');
        //     s0.parentNode.insertBefore(s1, s0);
        // })();
    </script>
<!--End of Tawk.to Script-->


<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 14775822;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<script type="text/javascript">
_linkedin_partner_id = "5024305";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=5024305&fmt=gif" />
</noscript>
<noscript><a href="https://www.livechat.com/chat-with/14775822/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->



 <!-- Start of asiahilix Zendesk Widget script -->
 <!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=966cb7a7-cf46-407d-b371-8fd404889344"> </script>-->
 <!-- End of asiahilix Zendesk Widget script -->
 <!-- Start of  Zendesk Widget script -->
<!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=1be60819-dbf9-4e88-b317-c590d55ef8cd"> </script>-->
<!-- End of  Zendesk Widget script -->

</body>
</html>