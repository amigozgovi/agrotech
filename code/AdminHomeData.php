<?php
Main::includeClass('AdminTemplate');
class AdminHomeData extends AdminTemplate
{

	function banner()
	{
	?>
		<div id="page-heading"> <img src="http://localhost/images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Admin</h3>
		<p>Helps To Manage Data For Agrotech</p>

		</div>
		</div>
	<?php
	}

	function content()
	{

	?>
		<div class="maincontent">
        <h3>Welcome Admin</h3>
        <p>You can manage the details for the agrotech website using this section. Use the navigation system on right side to view details about a particular section & Use navigation system in top to add/update/remove details for a section.</p>

      </div>
	<?php
	}
}

?>