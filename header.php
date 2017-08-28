<?php
global $template_url;
global $site_url;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>
<?php if(of_get_option( 'favicon' )!="") {
	echo '<link rel="icon" href="'.of_get_option( 'favicon' ).'" type="image/x-icon" />';
}
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body>
<div class="mp-pusher" id="mp-pusher">
	
  <nav id="mp-menu" class="mp-menu">
	<a href="#" id="close_bt" class="close_bt"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/close-bt.png" alt="mobile menu close" ></a>
    <div class="mp-level">                                
	<ul>
        <li> <a class="icon" href="#">HOME</a></li>			
        <li><a class="icon" href="#">ABOUT</a></li>
        <li class="icon icon-arrow"><a class="icon" href="#">NEWS &amp; EVENTS</a>
          <div class="mp-level"> <a class="mp-back" href="#">Back</a>
            <h2 class="icon"><a href="#">SUB MENU</a></h2>
            <ul>
              <li class="icon icon-arrow"><a href="#">Speaking Topics</a>
                <div class="mp-level"> <a class="mp-back" href="#">Back</a>
                  <h2 class="icon"><a href="#">SUB MENU 2</a></h2>
                  <ul>
                    <li><a href="#">Digital Growth Hacking for Sales Professionals</a></li>
                    <li><a href="#">Digital Transformation: From Websites to Social to WTF</a> </li>
					<li><a href="#">New Old Thinking on Thought Leadership: Inbound Marketing, Content Strategy, and Building Competitive Advantage</a> </li>
					<li><a href="#">Social Media Without Wasting Your Time or Killing Your Brand</a> </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
              <li class="icon"><a href="#">PUBLIC RESOURCES</a> </li>
              <li class="icon"><a href="#">COMPLAINTS</a> </li>
              <li class="icon"><a href="#">BECOMING LICENSED</a> </li>
				
              <li class="icon secondary-menu"><a href="#">Contact Us</a> </li>
              <li class="icon secondary-menu"><a href="#">Media Room</a> </li>
              <li class="icon secondary-menu"><a href="#">Other Sites</a> </li>	
				
				    <li class="icon"><a href="#">FRANÇAIS</a> </li>
            <li class="icon"><a href="#">PORTAL LOGIN</a> </li>	
      </ul>
    </div>
  </nav>
  <!-- /mp-menu -->
</div>
<div id="page" class="hfeed"> <a class="skip-content" target="_self" href="#skip-content" tabindex="0">Skip navigation</a>
  <header>
    <div class="menu-mob"><a href="#" id="trigger" class="menu-trigger"><span>hamburger</span><span>Mobile</span><span>Menu</span></a></div>
    <div class="header-top">
			<div class="left-sec">
				<ul>
				<?php
					if(of_get_option( 'twitter_link' )!="") {
						echo '<li class="twt"><a href="'.of_get_option( 'twitter_link' ).'" target="_blank">twitter</a></li>';
					}
					if(of_get_option( 'linkedin_link' )!="") {
						echo '<li class="lin"><a href="'.of_get_option( 'linkedin_link' ).'" target="_blank">linked in</a></li>';
					}
				?>
				</ul>
			</div>
		  <div class="right-sec">
      <div class="nav-right-top">
				<nav id="top-nav">
				<?php
					$nvAryTop = array(
						'theme_location' => 'top_menu',
						'menu' => 'top_menu', 
						'menu_class' => 'nav-top',
						'container' => false,
						'echo' => true,
						'fallback_cb' => false,
						'depth' => 0,
					);
					
					if (!empty($nvAryTop)){
						wp_nav_menu( $nvAryTop );
					}
				?>
				
				</nav>
				
			<ul id="textsizer" class="font-size">
            <li class="small-font"><a href="#">A</a></li>
            <li class="default-font"><a href="#" class="textresizer-active">A</a></li>
            <li class="large-font"><a href="#">A</a></li>
          </ul>
				
        <div class="search-top">
			<form action="<?php echo home_url( '/' ); ?>" method="get">
			  <input type="search" placeholder="Site Search"  class="input-xx" aria-label="Site Search" value="<?php echo get_search_query() ?>" name="s">
			  <input type="image" src="<?php echo get_template_directory_uri(); ?>/images/icons/search-icon.png" alt="search in the site" />
			</form>
        </div>

       </div>
			</div>
		</div>
		
		<div class="search-mobile-bar">
		<div class="search-open-button">
		<img src="<?php echo get_template_directory_uri(); ?>/images/icons/search-icon-mobile.png" alt="mobile search icon" >
		</div>
		<button class="search-close-button hidden">
		<span class="close-left">search</span>
		<span class="close-right">close</span>
		</button>
		</div>
		
    <div class="header-bottom">
      <div class="left-sec">
        <div class="logo">
			<a href="<?php echo home_url() ?>">
				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="<?php echo of_get_option( 'logo' ); ?>, <?php echo of_get_option( 'logo' ); ?> 2x" media="(min-width: 767px)">
					<source srcset="<?php echo of_get_option( 'logo' ); ?>, <?php echo of_get_option( 'logo' ); ?> 2x" media="(min-width: 320px)">
					<!--[if IE 9]></video><![endif]-->
					<img src="<?php echo of_get_option( 'logo' ); ?>" alt="Clinical Trials Ontario - logo" srcset="<?php echo of_get_option( 'logo' ); ?>, <?php echo of_get_option( 'logo' ); ?> 2x">
				</picture>
			</a>						
        </div>
      </div>
        <nav id="primary-nav" class="nav">
			<?php
				$nvAryHdr = array(
					'theme_location' => 'header_menu',
					'menu' => 'header_menu', 
					'menu_class' => 'nav',
					'container' => false,
					'echo' => true,
					'fallback_cb' => false,
					'depth' => 0,
				);
				if (!empty($nvAryHdr)){
					wp_nav_menu( $nvAryHdr );
				}
			?>
        </nav>

      </div>
  
  </header>
  <!--<div class="banner-curve">-->
  <div id="banner">
      <div class="banner-wrap">
              <picture>
				<!--[if IE 9]><video style="display: none;"><![endif]-->
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner@2x.jpg 2x" media="(min-width: 1500px)">
                <!-- this is for large screens-->                
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner@2x.jpg 2x" media="(min-width: 1200px)">
                <!-- this is for wide screens-->                
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner@2x.jpg 2x" media="(min-width: 992px)">
                <!-- this is for desktop screens-->                
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner-tablet.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner-tablet@2x.jpg 2x" media="(min-width: 768px)">
                <!-- this is for tablet screens-->
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner-mobile.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner-mobile@2x.jpg 2x" media="(min-width: 320px)">
                <!-- this is for mobile-->
                <!--[if IE 9]></video><![endif]-->
                
                <img src="<?php echo get_template_directory_uri(); ?>/images/banner/banner.jpg" srcset="<?php echo get_template_directory_uri(); ?>/images/banner/banner.jpg, <?php echo get_template_directory_uri(); ?>/images/banner/banner@2x.jpg 2x" alt="Clinical Trials Ontario - A man giving advice to a lady">
                <!-- this is for normal -->
              </picture>
				
				
				  <div class="banner-content">
				   <h1>What can CTO do for you?</h1>
						<ul>
						 <li>
							<a href="#">
							 <img src="<?php echo get_template_directory_uri(); ?>/images/icons/brain-icon.png" alt="CTO - Find a Trial" >
							 <span>FIND <br >A TRIAL</span>
							</a>
						</li>
						 <li>
							<a href="#">
							 <img src="<?php echo get_template_directory_uri(); ?>/images/icons/stream-icon.png" alt="CTO - REGISTER FOR CTO STREAM" >
							 <span>REGISTER FOR <br >CTO STREAM</span>
							</a>
						</li>
						 <li>
							<a href="#">
							 <img src="<?php echo get_template_directory_uri(); ?>/images/icons/book-icon.png" alt="CTO - ACCESS RESOURCES" >
							 <span>ACCESS RESOURCES</span>
							</a>
						</li>
						 <li>
							<a href="#">
							 <img src="<?php echo get_template_directory_uri(); ?>/images/icons/lightbulb-icon.png" alt="CTO - LEARN ABOUT US" >
							 <span>LEARN <br >ABOUT US</span>
							</a>
						</li>							
						</ul>
				 </div>
        </div>
        <!-- .banner wrap-->
      
      <!--</div>-->
  
		
    </div>