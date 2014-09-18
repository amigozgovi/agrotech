<?php

class DetailsHandler
{
	function __construct($components)
	{
		$this->handle($components);
	}

	function handle($components)
	{
		$list=FALSE;
		switch(strtolower($components['CATEGORY']))
		{
			case 'crop':
				$table='at_crop';
				if(key_exists('SUBCATEGORY',$components))
				{
					$name=$components['SUBCATEGORY'];
					$list=FALSE;
					$data='*';
				}
				else
				{
					$name=NULL;
					$list=TRUE;
					$data=array('name','type');
				}
				$temp['cond']='name';
				$page='CropDetails';
			break;

			case 'links':
				$table='at_links';
				if(key_exists('SUBCATEGORY',$components))
				{
					$name=$components['SUBCATEGORY'];
					$list=FALSE;
					$data='*';
				}
				else
				{
					$name=NULL;
					$list=TRUE;
					$data=array('name','details');
				}
				$temp['cond']='name';
				$page='LinkDetails';
				break;

			case 'awards':
				$table='at_awards';
				if(key_exists('SUBCATEGORY',$components))
				{
					$name=$components['SUBCATEGORY'];
					$list=FALSE;
					$data='*';
				}
				else
				{
					$name=NULL;
					$list=TRUE;
					$data=array('name','details');
				}
				$temp['cond']='name';
				$page='LinkDetails';
				break;

			default:
				$page='HomePageData';
		}
		Main::includeClass('Details');
		$det=new Details();
		if(isset($name))
		{
			$cond=array($temp['cond']=>$name);;
		}
		else
		{
			$cond=NULL;
		}
		if(isset($table))
		{
			$details=$det->getDetails($table,$data,$cond,$list);
		}
		else
		{
			$details=NULL;
		}
		$this->display($page,$details,$list);
	}

	function display($page,$details=NULL,$list=FALSE)
	{
		Main::includeClass($page);
		$page=new $page($details);
		if($list)
		{
			$page->printList();
		}
		else
		{
			$page->details();
		}
	}
}
?>