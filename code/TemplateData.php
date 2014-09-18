<?php

class TemplateData
{
	function __construct($page)
	{
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="ltr" lang="en-US">
<head>

<!-- Header Starts -->
<?php
	$page->header();
?>
<!-- Header Ends-->

</head>


<body class="home blog">
<div id="wrapper">
  <div id="topwrapper"></div>
  <div id="mainwrapper">
    <div id="header">
      <div class="center">
        <div id="logo"> <img src="<?php echo Settings::SITEURL; ?>images/logo.png" alt="Logo"/></div>
        <div id="headerright">
          <div id="mainmenu">
            <div id="myslidemenu" class="jqueryslidemenu">

            <!-- Menu Starts -->
              <?php
			  $page->menu();
			  ?>

			  <!-- Menu Ends -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Unique Data In Home Page -->
    <?php

    $page->banner();
    ?>

    <!-- Unique Data In Home Page Ends -->

    <div class="clear"></div>

    <div class="center">
    <div class="maincontent">

	<!-- Main Content Starts -->
	<?php
      $page->content();
  	?>
</div>
		<!-- Main Content Ends -->

      <!-- Side Bar Content -->
      		<?php
			$page->sideBar();
			?>
	  <!-- Side Bar Content Ends -->

	</div>
    <div class="clear"></div>
  </div>
  <!-- Footer Starts -->
  <?php
  $page->footer();
  ?>

  <!-- Footer Ends Here -->
</div>

</body>
</html>

	<?php
	}
}

?>