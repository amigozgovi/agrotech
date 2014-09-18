<?php

Main::includeClass('AdminTemplate');
class AwardsData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Award';
	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['level']=NULL;
			$this->info['name']=NULL;
			$this->info['details']=NULL;
			$this->info['year']=NULL;
			$this->formName='awardAddForm';
			$this->legend='Add Award';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='awardUpdateForm';
			$this->legend='Update Award';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Award";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Award"; ?></h4>
		<div class='success-message'>
			<?php echo "Award {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='awardForm' method='post' action=''>
				<div>
						<label for='level'>Select Level</label>
					<select name='level' id='level' class='selectfield'>
					<option value='international'
					<?php
						if($this->info['level']=='international')
						{
							echo ' selected="TRUE"';
						}
					?>
					>International</option>
					<option value='national'
					<?php
						if($this->info['level']=='national')
						{
							echo ' selected="TRUE"';
						}
					?>
					>National</option>
					<option value='state'
					<?php
						if($this->info['level']=='state')
						{
							echo ' selected="TRUE"';
						}
					?>
					>State</option>
					</select>
					<span class="require"> *</span>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for='details'>Details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<span class="require"> *</span>
					<label for='year'>Year</label>
					<input type='text' name='year' id='year' class='textfield' value='<?php echo $this->info['year']; ?>' />
					<span class="require"> *</span>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="buttonsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="hidden" name="action" />
					<input type='submit' class='button' value='Add Award' />
				</div>
			</form>
		</div>
	</div>
	<?php
	}
}

?>