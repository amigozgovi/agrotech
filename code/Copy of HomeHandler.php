<?php

class HomeHandler
{
	function __construct()
	{
		$this->display();
	}

	function display()
	{
		Main::includeClass('HomePageData');
		$hpd=new HomePageData();
		$hpd->header();
		$hpd->banner();
		$hpd->content();
		$hpd->footer();
	}
}

?>