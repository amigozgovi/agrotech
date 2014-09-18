<?php

Main::includeClass('AdminTemplate');

class ContactData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrcnt;
	protected $hdrtxt='Contact';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['type']=NULL;
			$this->info['code']=NULL;
			$this->info['number']=NULL;
			$this->info['district']=NULL;
			$this->info['location']=NULL;
			$this->formName='contactAddForm';
			$this->legend='Add Contact Details';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load The Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='contactUpdateForm';
			$this->legend='Update Contact Details';
			$this->section='Update';
		}
			$this->hdrcnt="$this->section Contact";
	}

	function content()
	{
	?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Contact"; ?></h4>
		<div class='success-message'>
			<?php echo "Contact {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
		<form name='<?php echo $this->formName; ?>' id='contactForm' method='post' action='' enctype="multipart/form-data" >
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for='Type'>Select Type</label>
					<select name='type' id='type' class='selectfield'>
					<option value='mobile'
					<?php
						if($this->info['type']=='mobile')
						{
							echo ' selected="TRUE"';
						}
					?>
					>Mobile</option>
					<option value='office'
					<?php
						if($this->info['type']=='office')
						{
							echo ' selected="TRUE"';
						}
					?>
					>Office</option>
					</select>
					<span class="require"> *</span>

					<label for='code'>Area Code</label>
					<input type="text" name='code' id='code' class='textfield' value='<?php echo $this->info['code']; ?>' />
					<span class="require"> *</span>
					<label for='number'>Number</label>
					<input type='text' name='number' id='number' class='textfield' value='<?php echo $this->info['number']; ?>' />
					<span class="require"> *</span>
					<label for='district'>District</label>
					<select name='district' id='district' class='selectfield'>
					<?php
						Main::includeClass('Details');
						$det=Details::getDetails('at_location','name',array('type'=>'district'),TRUE);
						if(is_array($det) && !empty($det))
						{
							foreach($det as $value)
							{
								if($this->info['district']==$value)
								{
									echo "<option value='$value' selected='selected'>$value</option>";
								}
								else
								{
									echo "<option value='$value'>$value</option>";
								}
							}
						}
						else
						{
							echo "<option value=''>None</option>";
						}
					?>
					</select>
					<span class="require"> *</span>
					<label for='location'>Location</label>
					<select name='location' id='location' class='selectfield'>
					<?php
						Main::includeClass('Details');
						$det=Details::getDetails('at_location','name',array('type'=>'village'),TRUE);
						if(is_array($det) && !empty($det))
						{
							foreach($det as $value)
							{
								if($this->info['location']==$value)
								{
									echo "<option value='$value' selected='selected'>$value</option>";
								}
								else
								{
									echo "<option value='$value'>$value</option>";
								}
							}
						}
						else
						{
							echo "<option value=''>None</option>";
						}
					?>
					</select>
					<span class="require"> *</span>
					<label for='imageAdd'>Add Image</label>
					<input type="file" name='file' id='file'/>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="contactSend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" value='Add Contact' class='button'/>
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>