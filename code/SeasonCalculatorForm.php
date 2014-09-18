<?php
Main::includeClass('MainTemplate');
class SeasonCalculatorForm extends MainTemplate
{

	function banner()
	{
?>
		<div id="page-heading"> <img src="<?php echo Settings::SITEURL; ?>images/page-heading1.jpg" alt="" />
	  		<div class="heading-text">
	    		<h3>Season Calculator</h3>

	  		</div>
	  	</div>
	<?php
}

function content()
{
?>
	<h4>Identify Which Crops Can Be Sown In A Particular Season</h4>
<div id='conctactleft'>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropForm' method='post' action='' enctype="multipart/form-data">
				<div>
					<label for="season">Choose Season</label>
					<select name='season' id='season' class='selectfield'>
						<option value='summer'>Summer</option>
						<option value='winter'>Winter</option>
						<option value='spring'>Spring</option>
						<option value='autumn'>Autumn</option>
					</select>
										<span class="require"> *</span>
					<div class='clear'></div>
					<input type="submit" name="action" class='button' value='Check Season' />
				</div>
			</form>
		</div>
	</div>
<?php
}
}
?>