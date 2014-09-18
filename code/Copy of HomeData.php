<?php
Main::includeClass('MainTemplate');

class HomeData extends MainTemplate
{
	function banner()
	{
	?>
	<script type="text/javascript">jQuery(window).load(function($){jQuery('#slider').nivoSlider({effect:'random',slices:15,animSpeed:500,pauseTime:3000,directionNav:true,directionNavHide:true,controlNav:true});});</script>
    <div id="slide-wrapper">
      <div id="slider"> <a href="#" title="Slideshow Items #9"> <img src="images/slideimage12.jpg" alt="" /> </a> <a href="#" title="Slideshow Items #8"> <img src="images/slideimage13.jpg" alt="" /> </a> <a href="#" title="Slideshow Items #7"> <img src="images/slideimage15.jpg" alt="" /> </a> <a href="#" title="Slideshow Items #6"> <img src="images/slideimage17.jpg" alt="" /></div>
    </div>
    <div class="clear"></div>
    <div id="featuresbox">
      <ul>
        <li class="first"> <img src="images/bar-chart1.png" class="alignleft" alt=""/>
          <h4><a href="<?php echo Settings::SITEURL; ?>Forestry">AgroForestry</a></h4>
          <div class="clear"></div>
          <p>Combining Agriculture & Forestry technologies for success</p>
        </li>
        <li> <img src="images/fancy-globe1.png" class="alignleft" alt="" />
          <h4><a href="<?php echo Settings::SITEURL; ?>soiltype">Soil Types</a></h4>
          <div class="clear"></div>
          <p>Discover various soil types found across districts of Kerala</p>
        </li>
        <li> <img src="images/processing.png" class="alignleft" alt="" />
          <h4><a href="<?php echo Settings::SITEURL; ?>Ecology">AgroEcology</a></h4>
          <div class="clear"></div>
          <p>Learn the most advanced principles used in Agriculture</p>
        </li>
        <li class="last"> <img src="images/connections.png" class="alignleft" alt="" />
          <h4><a href="<?php echo Settings::SITEURL; ?>Linksdata">Connectivity</a></h4>
          <div class="clear"></div>
          <p>Helping farmers to gain more income using the modern approaches to agriculture</p>
        </li>
      </ul>
    </div>

	<?php
	}


/*function menu()
{
?>
		<ul id="menu-main-menu" class="">
                <li><a href="<?php echo Settings::SITEURL; ?>">Home</a></li>
				<li><a href="<?php echo Settings::SITEURL; ?>crop/">Crop</a></li>

                <li><a href="<?php echo Settings::SITEURL; ?>location/">Location</a></li>

               	<li><a href="<?php echo Settings::SITEURL; ?>books/">Books</a></li>

               	<li><a href="<?php echo Settings::SITEURL; ?>news/">News</a></li>

               	<li><a href="#">Others</a>
               		<ul>
	                	<li><a href="<?php echo Settings::SITEURL; ?>search/">Search</a></li>
    	            	<li><a href="<?php echo Settings::SITEURL; ?>insurance">Insurance</a></li>
        	        	<li><a href="<?php echo Settings::SITEURL; ?>prevactivity">Previous Year Activity</a></li>
            	    	<li><a href="<?php echo Settings::SITEURL; ?>patents">Patent</a></li>
	               </ul>
               	</li>

            </ul>

	<?php
}
*/
	function content()
	{
	?>
	<h3><cufon class="cufon cufon-canvas" alt="Welcome " style="width: 98px; height: 24px; "><canvas width="114" height="25" style="width: 114px; height: 25px; top: 0px; left: -1px; "></canvas><cufontext>Welcome </cufontext></cufon><cufon class="cufon cufon-canvas" alt="to " style="width: 25px; height: 24px; "><canvas width="41" height="25" style="width: 41px; height: 25px; top: 0px; left: -1px; "></canvas><cufontext>to </cufontext></cufon><cufon class="cufon cufon-canvas" alt="AGROTECH!" style="width: 122px; height: 24px; "><canvas width="138" height="25" style="width: 138px; height: 25px; top: 0px; left: -1px; "></canvas><cufontext>AGROTECH!</cufontext></cufon></h3>
        <p>The website AGROTECH is collection of crop details which includes soils,  climate changes and temperature.This website provides datas regarding to crops and their details with respect to various panchayaths.Primarily it concentrates on Kuttippuram Panchayath which can be further expanded to other panchayaths.</p>
        <p>This website will find useful for teaching purposes and a referance to agricultural students.This also focusses on the farming communities. The purpose of our website is to support Governments Job Assurance Scheme for common people by giving the details of barren land.This details will be helpful for them to implement the new varieties of crops in this land.</p>
        <div class="mainbox">
          <h4><a href="#"><cufon class="cufon cufon-canvas" alt="About " style="width: 49px; height: 18px; "><canvas width="61" height="19" style="width: 61px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>About </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Us" style="width: 21px; height: 18px; "><canvas width="30" height="19" style="width: 30px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Us</cufontext></cufon></a></h4>
          <img src="images/icon1.png" class="alignleft" alt="">
          <p>Agrotech is comprised of data regarding the various crops and its details.This is primarly based on our survey, covering basically the Kuttippuram panchayath of malappuram district in Kerala. This can be updated to include all the panchayaths and districts in Kerala.
</p>
        </div>
        <div class="mainbox box-last">
          <h4><a href="#"><cufon class="cufon cufon-canvas" alt="Our " style="width: 33px; height: 18px; "><canvas width="45" height="19" style="width: 45px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Our </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Vision" style="width: 64px; height: 18px; "><canvas width="73" height="19" style="width: 73px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Vision</cufontext></cufon></a></h4>
          <img src="images/icon2.png" class="alignleft" alt="">
          <p>The vision of this website is: <span>To provide agricultural details about every panchayath of kerala,</span><span> Governments Job Assurance Scheme is supported,</span><span> Provide stability among farming communities,particularliy small and marginal farmers</span>
</p>
        </div>
        <div class="spacer"></div>
        <div class="mainbox">
          <h4><a href="#"><cufon class="cufon cufon-canvas" alt="Features " style="width: 33px; height: 18px; "><canvas width="45" height="19" style="width: 45px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Features</cufontext></cufon></a></h4>
          <img src="images/icon3.png" class="alignleft" alt="">
          <p>Our most important feature is the search facility itself. You can search for anything within the site which include crops, diseases, current market price for a crop, location map, offices contact info in a location etc. Also it's possible to narrow down the search results by using our advanced search mechanism with a very simple to use interface</p>
        </div>
        <div class="mainbox box-last">
          <h4><a href="#"><cufon class="cufon cufon-canvas" alt="Our " style="width: 33px; height: 18px; "><canvas width="45" height="19" style="width: 45px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Our </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Mission" style="width: 65px; height: 18px; "><canvas width="74" height="19" style="width: 74px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Mission</cufontext></cufon></a></h4>
          <img src="images/icon4.png" class="alignleft" alt="">
          <p>provides datas for agricultural students and teachers. Promote Government Job Assurance Scheme,by providing the details of the area that can be usefull for public. To undertake campaigns to promote the utilisation of barren lands. Provide the details based on crop insurance. Watershed development through villages</p>
        </div>
	<?php
	}

	function sideBar()
	{
	?>
	        <div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="latestnews_widget-3" class="sidebarcontent widget_latestnews_widget">
              <h4 class="sidebarheading"><cufon class="cufon cufon-canvas" alt="Latest " style="width: 49px; height: 18px; "><canvas width="61" height="19" style="width: 61px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>Latest </cufontext></cufon><cufon class="cufon cufon-canvas" alt="News" style="width: 43px; height: 18px; "><canvas width="52" height="19" style="width: 52px; height: 19px; top: 0px; left: 0px; "></canvas><cufontext>News</cufontext></cufon></h4>
              <ul class="latestnews">
                <li> <a href="#">No Latest News</a>
                </li>
              </ul>
              <div class="clear"></div>
              <a href="#" class="button-more">View All News</a>
              <div class="clear"></div>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>
	<?php
	}
}