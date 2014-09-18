<?php

class MainTemplate
{
	protected $title='AGROTECH - A Web for Agriculture';

	function header()
	{
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
<title><?php echo $this->title; ?></title>
<meta name="generator" content="WordPress 3.1.3" />
<meta name="robots" content="follow, all" />
<link rel="stylesheet" href="<?php echo Settings::SITEURL; ?>css/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="favicon.ico"/>
<script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/l10n.js'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.js'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.prettyPhoto.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.nivo.slider.pack.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jqueryslidemenu.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.kwicks.min.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.tools.tabs.min.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/colorpicker.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/jquery.cookie.js?ver=3.1.3'></script><script type='text/javascript' src='<?php echo Settings::SITEURL; ?>js/functions.js?ver=3.1.3'></script>
<link rel="stylesheet" href="<?php echo Settings::SITEURL; ?>css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Settings::SITEURL; ?>css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Settings::SITEURL; ?>css/kwicks.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Settings::SITEURL; ?>css/custom_style.php" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo Settings::SITEURL; ?>js/cufon.js"></script><script type="text/javascript" src="<?php echo Settings::SITEURL; ?>js/ColaborateLight.js"></script><script type="text/javascript">Cufon.replace('h1')('h2')('h3')('h4')('h5')('#myslidemenu a',{hover:'true'})('#myslidemenu li li a',{textShadow:'1px 1px #ffffff',hover:'true'})('a.button',{hover:'true'})('.nivo-caption p')('span.price')('span.month');</script>
	<?php
	}

	function menu()
	{
	?>
		<ul id="menu-main-menu" class="">
                <li><a href="<?php echo Settings::SITEURL; ?>">Home</a></li>
				<li><a href="<?php echo Settings::SITEURL; ?>crop/">Crop</a></li>

                <li><a href="<?php echo Settings::SITEURL; ?>location/">Location</a></li>

               	<li><a href="">Books</a>
               		<ul>
	                	<li><a href="<?php echo Settings::SITEURL; ?>publication/">Publication</a></li>
    	            	<li><a href="<?php echo Settings::SITEURL; ?>magazine"></a></li>
	               </ul>
				</li>

               	<li><a href="<?php echo Settings::SITEURL; ?>news/">News</a></li>

               	<li><a href="#">Others</a>
               		<ul>
	                	<li><a href="<?php echo Settings::SITEURL; ?>seasoncalc/">Season Calculator</a></li>
	                	<li><a href="<?php echo Settings::SITEURL; ?>croptype/">Crop Type</a></li>
	                	<li><a href="<?php echo Settings::SITEURL; ?>awards/">Awards</a></li>
	                	<li><a href="<?php echo Settings::SITEURL; ?>map/">Map</a></li>
    	            	<li><a href="<?php echo Settings::SITEURL; ?>insurance">Insurance</a></li>
        	        	<li><a href="<?php echo Settings::SITEURL; ?>prevactivity">Previous Year Activity</a></li>
            	    	<li><a href="<?php echo Settings::SITEURL; ?>patents">Patent</a></li>
	               </ul>
               	</li>

            </ul>

	<?php
	}

	function banner()
	{
	?>
		<div id="page-heading"> <img src="<?php echo Settings::SITEURL; ?>images/page-heading1.jpg" alt="" />
	  		<div class="heading-text">
	    		<h3>Admin</h3>
	    		<p>Welcome Admin</p>
	  		</div>
	  	</div>
	<?php
	}

	function content()
	{
	?>

	<?php
	}

function sideBar()
{
if(isset($this->section))
{
	$section=$this->section;
}
else
{
	$section='crop';
}
?>
	<div id="sidebar">
		<div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="searchbox_widget-7" class="sidebarcontent widget_searchbox_widget">
              <h4 class="sidebarheading">Search</h4>
              <div class="searchbox">
                <form method="get" id="search" action="<?php echo Settings::SITEURL."search/";?>" />
                  <div>
                    <input type="text" class="searchinput" value="Search <?php echo $section; ?>(s)..." onblur="if (this.value == ''){this.value = 'Search <?php echo $section; ?>(s)...'; }" onfocus="if (this.value == 'Search <?php echo $section; ?>(s)...') {this.value = ''; }"   name="s" id="s"/>
                    <input type="hidden" name="section" value="<?php echo $section; ?>" />
                    <input type="submit" class="searchsubmit" value=""/>
                  </div>
                </form>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>

        <div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div class="sidebarcontent">
              <h4 class="sidebarheading">List</h4>
              <ul class="sidelist">
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>crop" title="Crops">Crops</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>news" title="News">News</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>insurance" title="Insurance">Insurance</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>location" title="Location">Location</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>map" title="Maps">Maps</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>magazine" title="Magazine">Magazine</a></li>
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>awards" title="awards">Award</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>publication" title="Publication">Publication</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>link" title="Links">Links</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>biofert" title="Bio Fertilizers">Bio Fertilizers</a></li>
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>prevactivity" title="Previous Year Activity">Previous Year Activity</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>patent" title="Patent">Patent</a></li>
              </ul>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>
    </div>
    <?php
}

	function footer()
	{
	?>
<div id="bottomwrapper"></div>
	<div id="footer">
    <div class="footerbox">
      <div id="text-2" class="widget_text">
        <h4>About Agrotech</h4>
        <div class="textwidget">
          <p>This is a website which is made for farmers and also for students who research in agriculture. You can search for a crop by its name,type,climate. Also details of agriculture department offices in Kerala is available. You can also sget map for a particular location indicating which all crops are cultivated in the particular district/village</p>
        </div>
      </div>
    </div>
    <div class="footerbox">
      <h4>Links</h4>
      <ul>
        <li><a href="<?php echo Settings::SITEURL;?>map">Maps</a></li>
        <li><a href="<?php echo Settings::SITEURL;?>location">Location</a></li>
        <li><a href="<?php echo Settings::SITEURL;?>contact">Suggest Ideas</a></li>
        <li><a href="<?php echo Settings::SITEURL;?>faq">FAQ</a></a></li>
        <li><a href="<?php echo Settings::SITEURL;?>office">Office</a></li>
      </ul>
    </div>
    <div class="footerbox">
      <h4>Our Address</h4>
      <ul class="addresslist">
        <li> IT Department<br />
          MES Eng. College,Kuttipuram,Kerala<br />
          India</li>
        <li><strong>Phone </strong>:0494-3051200</li>
        <li><strong>FAX </strong>:0494-2698081</li>
        <li><strong>Email </strong>: <a href="mailto:agrotech.az.mesce@gmail.com">agrotech.az.mesce@gmail.com</a></li>
      </ul>
    </div>
    <div class="footerbox box-last"> <a href="#"><img src="<?php echo Settings::SITEURL; ?>images/footerlogo.png" alt="Footer Logo" class="alignleft"/></a>
      <div class="clear"></div>
      <ul class="social-links">
        <?php
        /*
		<li> <a href="#"><img src="<?php echo Settings::SITEURL; ?>images/linkedin.png" alt="Linkedin" /></a></li>
        <li> <a href="#"><img src="<?php echo Settings::SITEURL; ?>images/twitter.png" alt="Twitter" /></a></li>
        <li> <a href="http://www.facebook.com/pages/Agro-Tech/117922844964802?sk=info"><img src="<?php echo Settings::SITEURL; ?>images/facebook.png" alt="Facebook" /></a></li>
        <li> <a href="#"><img src="<?php echo Settings::SITEURL; ?>images/flickr.png" alt="Flickr" /></a></li>
        </li>
        <li><a href="#"><img src="<?php echo Settings::SITEURL; ?>images/feed.png" alt="RSS" /></a></li>
       */
        ?>
        <li> <a href="http://www.facebook.com/pages/Agro-Tech/117922844964802?sk=info"><img src="<?php echo Settings::SITEURL; ?>images/facebook.png" alt="Facebook" /></a></li>
        <li> <a href="http://twitter.com/#!/AZAgrotech"><img src="<?php echo Settings::SITEURL; ?>images/twitter.png" alt="Twitter" /></a></li>
      </ul>
    </div>
    <div class="clear"></div>
    <div class="bottom">
      <div class="footermenu">
        <ul id="menu-footer-menu" class="">
          <li><a href="<?php echo Settings::SITEURL; ?>">Home</a></li>
          <li><a href="<?php echo Settings::SITEURL; ?>about">About</a></li>
          <li><a href="<?php echo Settings::SITEURL; ?>contact">Contact</a></li>
          <li><a href="<?php echo Settings::SITEURL; ?>faq">FAQ</a></li>
          <li><a href="<?php echo Settings::SITEURL; ?>office">Office</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p> &#169; 2011 - 2012 </p>
      </div>
    </div>
  </div>
	<?php
	}
}