<?php

class MessageData
{
	protected $info;
	protected $formName;
	protected $legend;
	protected $section;

	function __construct($info=NULL)
	{
		if(!isset($info))
		{
			$this->info['from']=NULL;
			$this->info['sub']=NULL;
			$this->info['msg']=NULL;
			$this->info['date']=NULL;
			$this->info['time']=NULL;
			$this->formName='messageAddForm';
			$this->legend='Add Message';
			$this->section='Add';
		}
		else if(empty($info))
		{
			Main::throwException('Internal Error Occured',0,'Failed To Load Data');
		}
		else
		{
			$this->info=$info;
			$this->formName='messageUpdateForm';
			$this->legend='Update Message';
			$this->section='Update';
		}
		$this->data();
	}

	function data()
	{
		Main::includeClass('AdminPageData');
		$apd=new AdminPageData();
		$apd->header('Publication',"$this->section Message");
		?>
		<?php
		$apd->content();
	}
}

?>