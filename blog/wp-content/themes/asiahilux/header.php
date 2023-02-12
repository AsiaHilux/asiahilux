<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php bloginfo('name'); if(wp_title('', false)) { echo ' |'; } else { echo bloginfo('description'); } wp_title(''); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.png" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300&display=swap" rel="stylesheet">
  <?php wp_head() ?>
</head>

<body>
<div class="header-wrap">
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <p>Asia Hilux The World's Largest Used Car Exporter, Since 1993</p>
      </div>
      <div class="social-links">
		<a href="https://www.facebook.com/hiluxasia/" class="facebook"><i class="fa fa-facebook"></i></a>
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container-">
      <div class="container">
	  <a href="https://asiahilux.com/" class="logo mr-auto">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/asiahilux.png" alt="Asia Hilux Logo">
		</a>
		
		<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="header-content-left">
				<p class="time"><b>Thailand Time:</b>
				<?php 
					$tz = 'Asia/Bangkok';
					$timestamp = time();
					$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
					$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
					echo $dt->format('H:i:sa,  d-m-Y');
					
    		        require('custom_connection.php');
    		        
    		        $sql_products   =   mysqli_query($conn, "SELECT COUNT(car_d_id) AS car_count FROM hv_car_details");
                    
                    $row_products   =   mysqli_fetch_array($sql_products);
				?>
				</p>
				<p><b>Total Cars: <?php echo $row_products['car_count']; ?></b></p>
			</div>
			</div>
			
			<div class="col-md-6 col-sm-6">
			<div class="header-content-right">
			<select class="form-control form-control-sm" onchange="select_lang()" id="select_lang" style="margin-top: 2px;">
				<option value="">Select Language</option>
				<option value="#googtrans(en|af)">Afrikaans</option>
				<option value="#googtrans(en|sq)">Albanian</option>
				<option value="#googtrans(en|am)">Amharic</option>
				<option value="#googtrans(en|ar)">Arabic</option>
				<option value="#googtrans(en|hy)">Armenian</option>
				<option value="#googtrans(en|az)">Azerbaijani</option>
				<option value="#googtrans(en|eu)">Basque</option>
				<option value="#googtrans(en|be)">Belarusian</option>
				<option value="#googtrans(en|bn)">Bengali</option>
				<option value="#googtrans(en|bs)">Bosnian</option>
				<option value="#googtrans(en|bg)">Bulgarian</option>
				<option value="#googtrans(en|ca)">Catalan</option>
				<option value="#googtrans(en|ceb)">Cebuano</option>
				<option value="#googtrans(en|ny)">Chichewa</option>
				<option value="#googtrans(en|zh-CN)">Chinese (Simplified)</option>
				<option value="#googtrans(en|zh-TW)">Chinese (Traditional)</option>
				<option value="#googtrans(en|co)">Corsican</option>
				<option value="#googtrans(en|hr)">Croatian</option>
				<option value="#googtrans(en|cs)">Czech</option>
				<option value="#googtrans(en|da)">Danish</option>
				<option value="#googtrans(en|nl)">Dutch</option>
				<option value="#googtrans(en|eo)">Esperanto</option>
				<option value="#googtrans(en|et)">Estonian</option>
				<option value="#googtrans(en|tl)">Filipino</option>
				<option value="#googtrans(en|fi)">Finnish</option>
				<option value="#googtrans(en|fr)">French</option>
				<option value="#googtrans(en|fy)">Frisian</option>
				<option value="#googtrans(en|gl)">Galician</option>
				<option value="#googtrans(en|ka)">Georgian</option>
				<option value="#googtrans(en|de)">German</option>
				<option value="#googtrans(en|el)">Greek</option>
				<option value="#googtrans(en|gu)">Gujarati</option>
				<option value="#googtrans(en|ht)">Haitian Creole</option>
				<option value="#googtrans(en|ha)">Hausa</option>
				<option value="#googtrans(en|haw)">Hawaiian</option>
				<option value="#googtrans(en|iw)">Hebrew</option>
				<option value="#googtrans(en|hi)">Hindi</option>
				<option value="#googtrans(en|hmn)">Hmong</option>
				<option value="#googtrans(en|hu)">Hungarian</option>
				<option value="#googtrans(en|is)">Icelandic</option>
				<option value="#googtrans(en|ig)">Igbo</option>
				<option value="#googtrans(en|id)">Indonesian</option>
				<option value="#googtrans(en|ga)">Irish</option>
				<option value="#googtrans(en|it)">Italian</option>
				<option value="#googtrans(en|ja)">Japanese</option>
				<option value="#googtrans(en|jw)">Javanese</option>
				<option value="#googtrans(en|kn)">Kannada</option>
				<option value="#googtrans(en|kk)">Kazakh</option>
				<option value="#googtrans(en|km)">Khmer</option>
				<option value="#googtrans(en|rw)">Kinyarwanda</option>
				<option value="#googtrans(en|ko)">Korean</option>
				<option value="#googtrans(en|ku)">Kurdish (Kurmanji)</option>
				<option value="#googtrans(en|ky)">Kyrgyz</option>
				<option value="#googtrans(en|lo)">Lao</option>
				<option value="#googtrans(en|la)">Latin</option>
				<option value="#googtrans(en|lv)">Latvian</option>
				<option value="#googtrans(en|lt)">Lithuanian</option>
				<option value="#googtrans(en|lb)">Luxembourgish</option>
				<option value="#googtrans(en|mk)">Macedonian</option>
				<option value="#googtrans(en|mg)">Malagasy</option>
				<option value="#googtrans(en|ms)">Malay</option>
				<option value="#googtrans(en|ml)">Malayalam</option>
				<option value="#googtrans(en|mt)">Maltese</option>
				<option value="#googtrans(en|mi)">Maori</option>
				<option value="#googtrans(en|mr)">Marathi</option>
				<option value="#googtrans(en|mn)">Mongolian</option>
				<option value="#googtrans(en|my)">Myanmar (Burmese)</option>
				<option value="#googtrans(en|ne)">Nepali</option>
				<option value="#googtrans(en|no)">Norwegian</option>
				<option value="#googtrans(en|or)">Odia (Oriya)</option>
				<option value="#googtrans(en|ps)">Pashto</option>
				<option value="#googtrans(en|fa)">Persian</option>
				<option value="#googtrans(en|pl)">Polish</option>
				<option value="#googtrans(en|pt)">Portuguese</option>
				<option value="#googtrans(en|pa)">Punjabi</option>
				<option value="#googtrans(en|ro)">Romanian</option>
				<option value="#googtrans(en|ru)">Russian</option>
				<option value="#googtrans(en|sm)">Samoan</option>
				<option value="#googtrans(en|gd)">Scots Gaelic</option>
				<option value="#googtrans(en|sr)">Serbian</option>
				<option value="#googtrans(en|st)">Sesotho</option>
				<option value="#googtrans(en|sn)">Shona</option>
				<option value="#googtrans(en|sd)">Sindhi</option>
				<option value="#googtrans(en|si)">Sinhala</option>
				<option value="#googtrans(en|sk)">Slovak</option>
				<option value="#googtrans(en|sl)">Slovenian</option>
				<option value="#googtrans(en|so)">Somali</option>
				<option value="#googtrans(en|es)">Spanish</option>
				<option value="#googtrans(en|su)">Sundanese</option>
				<option value="#googtrans(en|sw)">Swahili</option>
				<option value="#googtrans(en|sv)">Swedish</option>
				<option value="#googtrans(en|tg)">Tajik</option>
				<option value="#googtrans(en|ta)">Tamil</option>
				<option value="#googtrans(en|tt)">Tatar</option>
				<option value="#googtrans(en|te)">Telugu</option>
				<option value="#googtrans(en|th)">Thai</option>
				<option value="#googtrans(en|tr)">Turkish</option>
				<option value="#googtrans(en|tk)">Turkmen</option>
				<option value="#googtrans(en|uk)">Ukrainian</option>
				<option value="#googtrans(en|ur)">Urdu</option>
				<option value="#googtrans(en|ug)">Uyghur</option>
				<option value="#googtrans(en|uz)">Uzbek</option>
				<option value="#googtrans(en|vi)">Vietnamese</option>
				<option value="#googtrans(en|cy)">Welsh</option>
				<option value="#googtrans(en|xh)">Xhosa</option>
				<option value="#googtrans(en|yi)">Yiddish</option>
				<option value="#googtrans(en|yo)">Yoruba</option>
				<option value="#googtrans(en|zu)">Zulu</option>
			</select>
			</div>
			</div>
		</div>
		
		</div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="drop-down first"><a href="#">Search Cars</a>
			<div class="mega-menu">
			<div class="container">
			<div class="row">
    			<div class="col-md-3 col-sm-3">
        			<ul>
        			    <b>Browse Stock:</b>	
        				<li><a href="https://asiahilux.com/search">Browse All Cars</a></li>
        				<li><a href="https://asiahilux.com/all-discounted">Discounted</a></li>
        				<li><a href="https://asiahilux.com/all-clearance">Clearance</a></li>
                    </ul>
    			</div>
    			<ul class="col-md-3 col-sm-3">
    		        <b>Search By Make</b>
    		        
    		        <?php 
    		        
    		        $sql_make   =   mysqli_query($conn, "SELECT DISTINCT hcman.vm_name, COUNT(hcd.car_d_id) AS car_count FROM hv_car_details hcd
                                    INNER JOIN hv_car_manufacturer hcman ON hcman.vm_id=hcd.vm_id
                                    WHERE hcman.active=1
                                    GROUP BY hcman.vm_name
                                    ORDER BY car_count DESC");
                    
                    if(mysqli_num_rows($sql_make) > 0)
                    {          
                        WHILE($row_make =   mysqli_fetch_array($sql_make))
                        {
                            $small = strtolower($row_make['vm_name']);
                            $fac = ucfirst($small);
    		        ?>
    		        
    				<li>
    					<a href="https://asiahilux.com/brand/<?php echo $small; ?>"><?php echo $fac."(".$row_make['car_count'].")"; ?></a>
    				</li>
    				
    				<?php }} ?>
                </ul>
    			<ul class="col-md-3 col-sm-3">
        			<b>Search By Type</b>
        			
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
    					<a href="https://asiahilux.com/car-type/<?php echo $small_cbt; ?>"><?php echo $row_type['bodytype_name']."(".$row_type['car_count'].")"; ?></a>
    				</li>
    				
    				<?php }} ?>
                </ul>
    			<ul class="col-md-3 col-sm-3">
    			    <b>Search By Price</b>	
    				<li>
    					<a href="https://asiahilux.com/price-under/8000">Under $8000</a>
    				</li>
    				<li>
    					<a href="https://asiahilux.com/by-price/8000/12000">$8000 - $12000</a>
    				</li>
    				<li>
    					<a href="https://asiahilux.com/by-price/12000/15000">$12000 - $15000</a>
    				</li>
    				<li>
    					<a href="https://asiahilux.com/by-price/15000/20000">$15000 - $20000</a>
    				</li>
    				<li>
    					<a href="https://asiahilux.com/by-price/20000/25000">$20000 - $25000</a>
    				</li>
    				<li>
    					<a href="https://asiahilux.com/price-over/25000">Over $25000</a>
    				</li>
                </ul>		
			</div>
			</div>
			</div>
		  </li>
		<li class="drop-down single-dropdown"><a href="#">Country</a>
		  <div class="mega-menu">
			<ul>
			  <?php
                $sql_country    =   mysqli_query($conn, "SELECT DISTINCT sic.country_name, COUNT(hcd.car_d_id) AS car_count FROM hv_car_details hcd
                                    INNER JOIN si_countries_details sicd ON sicd.car_d_id=hcd.car_d_id
                                    INNER JOIN si_countries sic ON sic.country_id=sicd.country_detail_id
                                    WHERE sic.active=1
                                    GROUP BY sic.country_name
                                    ORDER BY car_count DESC");
                
                if(mysqli_num_rows($sql_country) > 0)
                {          
                    WHILE($row_country =   mysqli_fetch_array($sql_country))
                    {
                        $small = strtolower($row_country['country_name']);
                        $fac = ucfirst($small);
		        ?>
		        
				<li>
					<a href="https://asiahilux.com/country/<?php echo $small; ?>"><?php echo $fac."(".$row_country['car_count'].")"; ?></a>
				</li>
				
				<?php }} ?>
            </ul>
		</div>
        </li>
        <li class="drop-down single-dropdown"><a href="#">Stock</a>
		<div class="mega-menu">
		<ul>
		  <li><a href="https://asiahilux.com/brand/ford">Ford</a></li>
		  <li><a href="https://asiahilux.com/model/revo">Revo</a></li>
		  <li><a href="https://asiahilux.com/car-type/double-cab">Double Cab</a></li>
		  <li><a href="https://asiahilux.com/car-type/standard-cab">Standard Cab</a></li>                  
		</ul>
        </div>
        </li>
          <li><a href="https://asiahilux.com/why-choose-asia-hilux">Why Choose Asia Hilux?</a></li>
		  <li><a href="https://asiahilux.com/how-to-buy">How to Buy</a></li>
		  <li><a href="https://asiahilux.com/blog">Blog</a></li>
        </ul>
      </nav>
    </div>
  </header>
  </div>
  
  <main id="main">
	<div class="container mt-5 content-outer">
		<div class="row">