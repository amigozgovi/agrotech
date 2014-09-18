<?php

Main::includeClass('MainTemplate');

class PatentsData extends MainTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Patents';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['holders']=NULL;
			$this->info['year']=NULL;
			$this->info['no']=NULL;
			$this->info['update']=NULL;
			$this->formName='patentAddForm';
			$this->legend='Add Patent';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='patentUpdateForm';
			$this->legend='Update Patent';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Patents";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Patent"; ?></h4>
		<div class='success-message'>
			<?php echo "Patent {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='patentsForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for='holders'>Holders</label>
					<textarea name='holders' id='holders' class='textarea'><?php echo $this->info['holders']; ?></textarea>
					<span class='require'> *</span>
					<label for='year'>Year</label>
					<input type='text' name='year' id='year' class='textfield' value='<?php echo $this->info['year']; ?>' />
					<label for='no'>No</label>
					<input type='text' name='no' id='no' class='textfield' value='<?php echo $this->info['no']; ?>' />
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name='action' value='Add Patent' />
				</div>
			</form>
		</div>
	</div>
		<?php

	}
}

?>