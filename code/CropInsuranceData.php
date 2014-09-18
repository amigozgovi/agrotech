<?php

Main::includeClass('AdminTemplate');

class CropInsuranceData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt;
	protected $hdrcnt;

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['crop']=NULL;
			$this->info['no']=NULL;
			$this->info['age']=NULL;
			$this->info['premium']=NULL;
			$this->info['compensation']=NULL;
			$this->formName='insuranceAddForm';
			$this->legend='Add Insurance';
			$this->section='Add';
			$this->hdrtxt='Insurance';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='insuranceUpdateForm';
			$this->legend='Update Insurance';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Insurance";
	}

	function content()
	{

		?>
			<div id='conctactleft'>
				<h4><?php echo "$this->section Insurance"; ?></h4>
		<div class='success-message'>
			<?php echo "Insurance {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='insuranceForm' method='post' action=''>
				<div>
					<label for='crop'>Crop</label>
					<select name='crop' id='crop' class='selectfield'>
						<?php
							Main::includeClass('Details');
							$det=Details::getDetails('at_crop','name',NULL,TRUE);
							if(is_array($det) && !empty($det))
							{
								foreach($det as $data)
								{
									echo "<option value=$data>$data</option>";
								}
							}
							else
							{
								echo "<option value=''>None</option>";
							}
							?>
					</select>
					<span class="require"> *</span>
					<label for="no">Number</label>
					<input type="text" name="no" id="no" class='textfield' value='<?php echo $this->info['no'];?>' />
					<span class="require"> *</span>
					<label for="age">Age</label>
					<input type="text" name="age" id="age" class='textfield' value='<?php echo $this->info['age'];?>' />
					<label for='premium'>Premium</label>
					<input type="text" name='premium' id='premium' class='textfield'value='<?php echo $this->info['premium']; ?>' />
					<span class="require"> *</span>
					<label for='compensation'>Compensation</label>
					<input type='text' name='compensation' id='compensation' class='textfield' value='<?php echo $this->info['compensation']; ?>' />
					<span class="require"> *</span>
					<div class='clear'></div>
					<?php
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" value="Add Insurance" class='button' />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>