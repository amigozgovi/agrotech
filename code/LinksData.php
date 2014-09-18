<?php

Main::includeClass('AdminTemplate');
class LinksData extends AdminTemplate
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;
	protected $hdrtxt='Links';

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['name']=NULL;
			$this->info['url']=NULL;
			$this->info['details']=NULL;
			$this->formName='linkAddForm';
			$this->legend='Add Link';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='linkUpdateForm';
			$this->legend='Update Link';
			$this->section='Update';
		}
		$this->hdrcnt="$this->section Links";
	}

	function content()
	{
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Link"; ?></h4>
		<div class='success-message'>
			<?php echo "Link {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='linksForm' method='post' action=''>
				<div>
					<label for='name'>Name</label>
					<input type='text' name='name' id='name' class='textfield' value='<?php echo $this->info['name']; ?>' />
					<span class="require"> *</span>
					<label for='url'>URL</label>
					<input type='text' name='url' id='url' class='textfield' value='<?php echo $this->info['url']; ?>' />
					<span class='require'> *</span>
					<label for="details">details</label>
					<textarea name='details' id='details' class='textarea'><?php echo $this->info['details']; ?></textarea>
					<div class='clear'></div>
					<?php
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type='submit' name='action' class='button' />
				</div>
			</form>
		</div>
	</div>
		<?php
	}
}

?>