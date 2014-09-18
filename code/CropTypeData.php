<?php

Main::includeClass('AdminTemplate');

class CropTypeData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Crop Types';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['details']=NULL;
			$this->formName='cropTypeAddForm';
			$this->legend='Add Crop Type';
			$this->section='Add';
			$this->hdrcnt='$this->section Crop Types';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='cropTypeUpdateForm';
			$this->legend='Update Crop Type';
			$this->section='Update';
		}
	}

	function banner()
		{

		}
	function content()
	{

		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Crop Type"; ?></h4>
		<div class='success-message'>
			<?php echo "Crop Type {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropTypeForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for="details">Details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<span class="require"> *</span>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropTypeSend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name='action' class='button' value='Add Crop Type'/>
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>