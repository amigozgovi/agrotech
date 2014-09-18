<?php
Main::includeClass('AdminTemplate');
class MagazineData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Magazine';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['type']=NULL;
			$this->info['annual_price']=NULL;
			$this->info['single_price']=NULL;
			$this->info['lifetime_price']=NULL;
			$this->formName='magazineAddForm';
			$this->legend='Add Magazine';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='magazineeUpdateForm';
			$this->legend='Update Magazine';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Magazine";

	}

	function content()
	{

		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Magazine"; ?></h4>
		<div class='success-message'>
			<?php echo "Magazine {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='cropForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for='annaul_price'>Annual Price</label>
					<input type='text' name='annual_price' id='annual_price' class='textfield' value='<?php echo $this->info['annual_price']; ?>' />
					<span class='require'> *</span>
					<label for="single_price">Single Price</label>
					<input type='text' name='single_price' id='single_price' class='textfield' value='<?php echo $this->info['single_price']; ?>'/>
					<label for='lifetime_price'>Life Time Price</label>
					<input type='text' name='lifetime_price' id='lifetime_price' class='textfield' value='<?php echo $this->info['lifetime_price']; ?>' />
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name='action' value='Add Magazine' class='button' />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>