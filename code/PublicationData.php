<?php

class PublicationData
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['title']=NULL;
			$this->info['year']=NULL;
			$this->info['author']=NULL;
			$this->info['publisher']=NULL;
			$this->info['price']=NULL;
			$this->formName='publicationAddForm';
			$this->legend='Add Publication';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='publicationUpdateForm';
			$this->legend='Update Publication';
			$this->section='Update';
		}
		$this->data();
	}

	function data()
	{
		Main::includeClass('AdminPageData');
		$apd=new AdminPageData();
		$apd->header('Publication',"$this->section Publication");
		?>
		<div id='conctactleft'>
				<h4><?php echo "$this->section Publication"; ?></h4>
		<div class='success-message'>
			<?php echo "Publication {$this->section}ed Successfully"; ?>
		</div>
		<div id='maincontactform'>
			<form name='<?php echo $this->formName; ?>' id='publicationForm' method='post' action=''>
				<div>
					<label for='title'>Title</label>
					<input type='text' name='title' id='title' class='textfield' value='<?php echo $this->info['title']; ?>' />
					<span class='require'> *</span>
					<label for='year'>Year</label>
					<input type='text' name='year' id='year' class='textfield' value='<?php echo $this->info['year']; ?>' />
					<label for="author">Author</label>
					<input name='author' id='author' class='textfield' value='<?php echo $this->info['author']; ?>' />
					<label for="publisher">Publisher</label>
					<input name='publisher' id='publisher' class='textfield' value='<?php echo $this->info['publisher']; ?>' />
					<label for="price">Price</label>
					<input name='price' id='price' class='textfield' value='<?php echo $this->info['price']; ?>' />
					<div class='clear'></div>
					<?php
						//echo '<a href="#" class="button" id="cropsend"><span>'.$this->section.'</span></a> <span class="loading" style="display: none;">Please wait...</span>';
						if($this->section=='Update')
						{
							echo "<input type='hidden' name='update_name' id='update_name' value='{$this->info['update']}' />";
						}
					?>
					<input type="submit" name="action" value="Add Publication" />
				</div>
			</form>
		</div>
	</div>
		<?php
		$apd->content();
	}
}

?>