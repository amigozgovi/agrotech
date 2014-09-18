<?php
Main::includeClass('MainTemplate');

class AdminTemplate extends MainTemplate
{
	protected  $hdrtxt="Admin";
	protected  $hdrcnt="Helps To Manage Data For Agrotech";
	protected  $hdrimg="http://agrotech.neru9.com/images/page-heading1.jpg";
	function __construct()
	{

	}

	function menu()
	{
	?>

              <ul id="menu-main-menu" class="">

				<li><a href="<?php echo Settings::SITEURL; ?>admin/">Home</a></li>
                <li><a href="<?php echo Settings::SITEURL; ?>admin/add/">Add</a>
                <ul>
	                <li><a href="<?php echo Settings::SITEURL; ?>admin/add/crop">Crops</a></li>
    	            <li><a href="<?php echo Settings::SITEURL; ?>admin/add/croptype">Crop Type</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/contact">Contact Info</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/news">News</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/map">Map</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/magazine">Magazine</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/award">Award</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/location">Location</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/publication">Publication</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/link">Link</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/biofert">Bio Fertilizer</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/insurance">Insurance</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/prevactivity">Previous Year Activity</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>admin/add/patent">Patent</a></li>
                </ul>
                </li>
                <li><a href="<?php echo Settings::SITEURL; ?>update">Update</a>
                <ul>
	                <li><a href="<?php echo Settings::SITEURL; ?>crop">Crops</a></li>
    	            <li><a href="<?php echo Settings::SITEURL; ?>croptype">Crop Type</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>contact">Contact Info</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>news">News</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>map">Map</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>magazine">Magazine</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>award">Award</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>location">Location</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>publication">Publication</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>link">Link</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>biofert">Bio Fertilizer</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>insurance">Insurance</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>prevactivity">Previous Year Activity</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>patent">Patent</a></li>
                </ul>
                </li>
                <li><a href="<?php echo Settings::SITEURL; ?>remove">Remove</a>
                <ul>
	                <li><a href="<?php echo Settings::SITEURL; ?>crop">Crops</a></li>
    	            <li><a href="<?php echo Settings::SITEURL; ?>croptype">Crop Type</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>contact">Contact Info</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>news">News</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>map">Map</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>magazine">Magazine</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>awards">Award</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>location">Location</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>publication">Publication</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>link">Link</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>biofert">Bio Fertilizer</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>insurance">Insurance</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>prevactivity">Previous Year Activity</a></li>
                	<li><a href="<?php echo Settings::SITEURL; ?>patent">Patent</a></li>
                </ul>
                </li>
                				<?php
                					if(Main::isAdminLoggedIn())
                					{
                					?>
                					<li><a href='<?php echo Settings::SITEURL;?>admin/logout/'>Logout</a></li>
                					<?php
                					}
                				?>
              </ul>
		<?php
	}

	function banner()
	{
	?>
		<div id="page-heading"> <img src="<?php echo $this->hdrimg; ?>" alt="" />

		<div class="heading-text">

		<h3><?php echo $this->hdrtxt; ?></h3>
		<p><?php echo $this->hdrcnt; ?></p>

		</div>
		</div>
	<?php
	}

	function content()
	{

	?>
		<div class="maincontent">
        <h3>Welcome Admin</h3>
        <p>You can manage the details for the agrotech website using this section. Use the navigation system on right side to view details about a particular section and also to Edit/Remove an element & Use navigation system in top to add details for a section.</p>

      </div>
	<?php
	}

		function sideBar()
		{
		?>
		<div id="sidebar">
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
}

?>