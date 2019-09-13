<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_restaurant_lite_first_color = get_theme_mod('vw_restaurant_lite_first_color');

	$custom_css = '';

	if($vw_restaurant_lite_first_color != false){
		$custom_css .='.scrollup i,.topheader, .slider .carousel-control-prev-icon i, .slider .carousel-control-next-icon i, .hvr-sweep-to-right:before, .footer input[type="submit"], .copyright, .sidebar input[type="submit"], .pagination .current, .pagination a:hover, .comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .header .nav ul.sub-menu li a:hover, .footer .custom-social-icons i:hover, .sidebar .tagcloud a:hover, .footer .tagcloud a:hover, input[type="submit"], .sidebar .custom-social-icons i:hover{';
			$custom_css .='background-color: '.esc_html($vw_restaurant_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$custom_css .='a, .header .nav ul li a:hover, .slider .more-btn a.button, .footer h3, .services .section-title a, .sidebar ul li a:hover, .header .logo a, .woocommerce-message::before{';
			$custom_css .='color: '.esc_html($vw_restaurant_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$custom_css .='.slider .more-btn a.button, .woocommerce-message{';
			$custom_css .='border-color: '.esc_html($vw_restaurant_lite_first_color).';';
		$custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$custom_css .='.header, .footer h3{';
			$custom_css .='border-bottom-color: '.esc_html($vw_restaurant_lite_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_restaurant_lite_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_restaurant_lite_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='.slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_restaurant_lite_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}