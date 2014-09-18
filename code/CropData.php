<?php

Main::includeClass('AdminTemplate');

class CropData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Crop';

	function __construct($info=NULL)
	{
		$this->info=array();
		if(!isset($info))
		{

			$this->info['name']=NULL;
			$this->info['sci_name']=NULL;
			$this->info['climate']=NULL;
			$this->info['soil']=NULL;
			$this->info['variaties']=NULL;
			$this->info['bio_fert']=NULL;
			$this->info['dur']=NULL;
			$this->info['diseases']=NULL;
			$this->info['bio_fert']=NULL;
			$this->info['market_price']=NULL;
			$this->info['details']=NULL;
			$this->info['type']=NULL;
			$this->formName='cropAddForm';
			$this->legend='Add Crop Details';
			$this->section='Add';
		}
		else
		{
			$this->info=$info[0];
			if(is_array($this->info['bio_fert']))
			{
				$this->info['bio_fert']=explode('=:=',$this->info['bio_fert']);
			}
			$this->formName='cropUpdateForm';
			$this->legend='Update Crop Details';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Crop";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Crop"; ?></h4>
		<div class='success-message'>
			<?php echo "Crop {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropForm' method='post' action='' enctype="multipart/form-data">
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for="sci_name">Scientific Name</label>
					<input type="text" name="sci_name" id="sci_name" class='textfield' value='<?php echo $this->info['sci_name'];?>' />
					<span class="require"> *</span>
					<label for="climate">Climate</label>
					<select name='climate[]' id='climate' class='selectfield' multiple='multiple'>
						<option value='summer'>Summer</option>
						<option value='winter'>Winter</option>
						<option value='spring'>Spring</option>
						<option value='autumn'>Autumn</option>
					</select>
					<label for='soil'>Soil Types</label>
					<textarea name='soil' id='soil' class='textarea'><?php echo $this->info['soil']; ?></textarea>
					<span class="require"> *</span>
					<label for='variaties'>Variaties</label>
					<textarea name='variaties' id='variaties' class='textarea'><?php echo $this->info['variaties']; ?></textarea>
					<span class="require"> *</span>
					<label for='dur'>Duration</label>
					<input type='text' name='dur' id='dur' class='textfield' value='<?php echo $this->info['dur']; ?>' />
					<label for='diseases'>Diseases</label>
					<textarea name='diseases' id='diseases' class='textarea'><?php echo $this->info['diseases']; ?></textarea>
					<span class="require"> *</span>
					<label for='bio_fert'>Bio Fertilizers</label>
					<?php
					Main::includeClass('Details');
					$det=Details::getDetails('at_bio_fert','name',NULL,TRUE);
					if(empty($det) || !is_array($det))
					{
						echo "<select name='bio_fert' id='bio_fert' class='selectfield'>";
						echo '<option value="">None</option>';
					}
					else
					{
						echo "<select multiple='multiple' name='bio_fert[]' id='bio_fert' class='selectfield'>";
						foreach($det as $val)
						{
							if(in_array($val,$this->info['bio_fert']))
							{
								echo "<option value='$val' selected='true'>$val</option>";
							}
							else
							{
								echo "<option value='$val'>$val</option>";
							}
						}
					}
					?>
					</select>
					<label for='market_price'>Market Price</label>
					<input type='text' name='market_price' id='market_price' class='textfield' value='<?php echo $this->info['market_price']; ?>' />
					<span class="require"> *</span>
					<label for="details">Details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<span class="require"> *</span>
					<label for="type">Crop Type</label>
					<select name='type' id='type' class='selectfield'>
					<?php
						$det=Details::getDetails('at_crop_types','name',NULL,TRUE);
						if(empty($det))
						{
							echo '<option value="">None</option>';
						}
						else if(is_array($det))
						{
							foreach($det as $val)
							{
								if($this->type==$val)
								{
									echo "<option value='$val' selected='selected'>$val</option>";
								}
								else
								{
									echo "<option value='$val'>$val</option>";
								}
							}
						}
						else
						{
							if($this->type==$det)
							{
								echo "<option value='$det' selected='selected'>$det</option>";
							}
							else
							{
								echo "<option value='$det'>$det</option>";
							}
						}
					?>
					</select>
					<span class="require"> *</span>
					<label for='pests'>Pests</label>
					<?php
						$det=Details::getDetails('at_crop_pests','name',NULL,TRUE);
						if(empty($det) || !is_array($det))
						{
							echo "<select name='pests' id='pests' class='selectfield'>";
							echo '<option value="">None</option>';
						}
						else
						{
							echo "<select multiple='multiple' name='pests[]' id='pest' class='selectfield'>";
							foreach($det as $val)
							{
								if(in_array($val,$this->info['pests']))
								{
									echo "<option value='$val' selected='true'>$val</option>";
								}
								else
								{
									echo "<option value='$val'>$val</option>";
								}
							}
						}
					?>
					<label for="file">Crop Image</label>
					<input type="file" name="file" id="file" />
					<input type="hidden" name="image" id='image' value='' />
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" class='button' value='Add Crop' />
				</div>
			</form>
		</div>
	</div>
	<?php
	}
}

?>