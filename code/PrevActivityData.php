<?php

Main::includeClass('AdminTemplate');

class PrevActivityData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Previous Year Activity';
	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['year']=NULL;
			$this->info['activity']=NULL;
			$this->info['location']=NULL;
			$this->formName='prevActivityAddForm';
			$this->legend='Add PrevActivity';
			$this->section='Add';
			$this->info['update']='NULL';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='prevActivityUpdateForm';
			$this->legend='Update PrevActivity';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Previous Year Activity";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Previous Year Activity"; ?></h4>
		<div class='success-message'>
			<?php echo "Previous Year Activity {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='prevYearActivityForm' method='post' action=''>
				<div>
					<label for='year'>Year</label>
					<input type='text' name='year' id='year' class='textfield' value='<?php echo $this->info['year']; ?>' />
					<span class="require"> *</span>
					<label for='activity'>Activity</label>
					<textarea name='activity' id='activity' class='textarea'><?php echo $this->info['activity']; ?></textarea>
					<span class='require'> *</span>
					<label for="location">Location</label>
					<input name='location' id='location' class='textfield' value='<?php echo $this->info['location']; ?>' />
					<div class='clear'></div>
					<?php
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name='action' value='Add Prev Activity' />
				</div>
			</form>
		</div>
	</div>
		<?php	}
}

?>