<?php

Main::includeClass('AdminTemplate');
class NewsData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='News';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['news']=NULL;
			$this->info['date']=NULL;
			$this->info['time']=NULL;
			$this->formName='newsAddForm';
			$this->legend='Add News';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='newsUpdateForm';
			$this->legend='Update News';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section News";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section News"; ?></h4>
		<div class='success-message'>
			<?php echo "News {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='newsForm' method='post' action=''>
				<div>
					<label for='title'>Titlte</label>
					<input type="text" name='title' id='title' class='textfield' />
					<span class="require"> *</span>
					<label for='news'>Name</label>
					<textarea name='news' id='news' class='textarea'><?php echo $this->info['news']; ?></textarea>
					<span class="require"> *</span>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait..</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="hidden" name="date" value="<?php echo date('d/m/y'); ?>" />
					<input type="hidden" name="time" value="<?php echo date('h:i:s'); ?>" />
					<input type='submit' name='action' value="Add News" class="button" />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>