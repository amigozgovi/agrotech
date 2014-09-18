<?php

Main::includeClass('MainTemplate');
class FAQ extends MainTemplate
{
	function banner()
	{
	?>
		<div id="page-heading"> <img src="<?php echo Settings::SITEURL; ?>images/page-heading1.jpg" alt="" />
		<div class="heading-text">
		<h3>FAQ</h3>
		<p>Frequently Asked Questions</p>
		</div>
		</div>
	<?php
	}

	function content()
	{
	?>
	<h2>Frequently Asked Questions</h2>
	<div>
		<span>
			<h4>What Is AgroTech?</h4>
			<p>AgroTech is a website build for helping farmers and agriculture students to gather info. about crops and it's best practices. Also agrotech provides info. related to panchayath based on surveys conducted.</p>
		</span>
	</div>
	<div>
		<span>
		<h4>What Info. Is Available</h4>
		<p>Agrotech contains Info. related to village/district across kerala. Also Agrotech contains Info. about various crops and the best time and way to cultivate the crop</p>
		</span>
	</div>
	<div>
		<span>
			<h4>No Place To Search?</h4>
			<p>Of Course There is.... you can search for any info. within their respective section. Each section contains a search form in the right of the page which you can use to search within the page.</p>
		</span>
	</div>
	<div>
		<span>
			<h4>I Got An Idea Or Info. But How Can I Reach You?</h4>
			<p>We are always looking up for suggestions,you can reach us either using the contact form here <a href="<?php echo Settings::SITEURL; ?>">Contact</a> OR You can reach us at <a href="mailto:agrotech.az.mesce@gmail.com">agrotech.az.mesce@gmail.com</a> OR You can reach us via facebook/twitter: Simply click on the Facebook/Twitter icon in the bottom of this page.</p>
		</span>
	</div>
	<?php
	}
}