<?php
Main::includeClass('AdminTemplate');
class DiseaseData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Disease';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['control']=NULL;
			$this->info['details']=NULL;
			$this->formName='diseaseAddForm';
			$this->legend='Add Disease';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='diseaseUpdateForm';
			$this->legend='Update Disease';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Disease";
	}

	function content()
	{

		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Disease"; ?></h4>
		<div class='success-message'>
			<?php echo "Disease {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for="control">Control</label>
					<textarea name='control' id='control' class='textarea'><?php echo $this->info['control']; ?></textarea>
					<span class="require"> *</span>
					<label for="details">Details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type='submit' class='button' name='action' value='Add Disease'/>
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>