<?php

Main::includeClass('AdminTemplate');

class LocationData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Location';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['details']=NULL;
			$this->info['cli']=NULL;
			$this->info['soil']=NULL;
			$this->info['crops']=NULL;
			$this->info['landuse']=NULL;
			$this->info['geo_area']=NULL;
			$this->info['land_forest']=NULL;
			$this->info['land_sown']=NULL;
			$this->info['well_irrigated_area']=NULL;
			$this->info['tank_irrigated_area']=NULL;
			$this->info['canal_irrigated_area']=NULL;
			$this->info['other_irrigated_area']=NULL;
			$this->info['net_irrigated_area']=NULL;
			$this->info['gross_irrigated_area']=NULL;
			$this->info['district']=NULL;
			$this->info['type']=NULL;
			$this->formName='locationAddForm';
			$this->legend='Add Location';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='locationUpdateForm';
			$this->legend='Update Location';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Location";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Location"; ?></h4>
		<div class='success-message'>
			<?php echo "Location {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for="desc">Description</label>
					<textarea name='details' id='des' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<span class='require'> *</span>
					<label for='cli'>Climate</label>
					<input type='text' name='cli' id='cli' class='textfield' value='<?php echo $this->info['cli']; ?>' />
					<label for='soil'>Soil Types</label>
					<textarea name='soil' id='soil' class='textarea'><?php echo $this->info['soil']; ?></textarea>
					<label for='crops'>Crops</label>
					<textarea name='crops' id='crops' class='textarea'><?php echo $this->info['crops']; ?></textarea>
					<label for='landuse'>Land Use</label>
					<input type="text" name='landuse' id='landuse' class='textfield' value='<?php echo $this->info['landuse']; ?>' />
					<label for='geo_area'>Geographical Area</label>
					<input type='text' name='geo_area' id='geo_area' class='textfield' value='<?php echo $this->info['geo_area']; ?>' />
					<label for='land_forest'>Forest Land</label>
					<input type='text' name='land_forest' id='land_forest' class='textfield' value='<?php echo $this->info['land_forest']; ?>' />
					<label for='land_sown'>Sown Land</label>
					<input type='text' name='land_sown' id='land_sown' class='textfield' value='<?php echo $this->info['land_sown']; ?>' />
					<label for='well_irrigated_area'>Well Irrigated Area</label>
					<input type='text' name='well_irrigated_area' id='well_irrigated_area' class='textfield' value='<?php echo $this->info['well_irrigated_area']; ?>' />
					<label for='tank_irrigated_area'>Tank Irrigated Area</label>
					<input type='text' name='tank_irrigated_area' id='tank_irrigated_area' class='textfield' value='<?php echo $this->info['tank_irrigated_area']; ?>' />
					<label for='canal_irrigated_area'>Canal Irrigated Area</label>
					<input type='text' name='canal_irrigated_area' id='canal_irrigated_area' class='textfield' value='<?php echo $this->info['canal_irrigated_area']; ?>' />
					<label for='net_irrigated_area'>Net Irrigated Area</label>
					<input type='text' name='net_irrigated_area' id='net_irrigated_area' class='textfield' value='<?php echo $this->info['net_irrigated_area']; ?>' />
					<label for='gross_irrigated_area'>Gross Irrigated Area</label>
					<input type="text" name='gross_irrigated_area' id='gross_irrigated_area' class='textfield' value='<?php echo $this->info['gross_irrigated_area']; ?>' />
					<label for='district' id='district'>District</label>
					<input type="text" name="district" id='district' class='textfield' value='<?php echo $this->info['district']; ?>' />
					<label for='type' id='type'>Type</label>
					<select name='type' class='selectfield'>
						<?php
							if($this->info['type']=='village')
							{
								echo "<option value='village' selected='true'>Village</option>";
							}
							else
							{
								echo "<option value='village'>Village</option>";
							}

							if($this->info['type']=='district')
							{
								echo "<option value='district' selected='true'>District</option>";
							}
							else
							{
								echo "<option value='district' selected='true'>District</option>";
							}
						?>
					</select>
					<span class='require'> *</span>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" value="Add Location" class="button"/>
				</div>
			</form>
		</div>
	</div>
		<?php

	}
}

?>