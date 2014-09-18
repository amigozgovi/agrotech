<?php
Main::includeClass('AdminTemplate');
class BioFertData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrcnt;
	protected $hdrtxt='Bio Fertilizer';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['details']=NULL;
			$this->info['price']=NULL;
			$this->formName='bioFertAddForm';
			$this->legend='Add Bio Fertilizer';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='biofertUpdateForm';
			$this->legend='Update Insurance';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Bio Fertilizer";
	}

	function content()
	{
	?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Bio Fertilizer"; ?></h4>
		<div class='success-message'>
			<?php echo "Bio Fertilizer {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='bioFertForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type="text" name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<lsabel for='details'>Details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<span class="require"> *</span>
					<label for='price'>Price</label>
					<input type='text' name='price' id='price' class='textfield' value='<?php echo $this->info['price']; ?>' />
					<span class="require"> *</span>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="buttonsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" value='Add Bio Fertilizer' class='button' />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>