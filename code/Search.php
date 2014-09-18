<?php

class Search
{
	function __construct($query,$section)
	{
		$this->query=$query;
		$this->section=$section;
		$this->parse();
	}

	function parse()
	{
		$field='name';
		$table='at_crop';
		$get=array('name','details');
		switch(strtolower($this->section))
		{
			case 'crop':
				$table='at_crop';
				break;

			case 'awards':
				$table='at_awards';
				break;

			case 'biofert':
				$table='at_bio_fert';
				break;

			case 'contact':
				$table='at_contact_info';
				$field='location';
				$get=array('name','location');
				break;

			case 'crop':
			$table='at_crop';
			break;

			case 'disease':
				$table='at_crop_disease';
				break;

			case 'insurance':
				$table='at_crop_insurance';
				$field='crop';
				$get='crop';
				break;

			case 'croptype':
				$table='at_crop_types';
				break;

			case 'links':
				$table='at_links';
				break;

			case 'location':
				$table='at_location';
				break;

			case 'magazine':
				$table='at_magazine';
				$get='name';
				break;

			case 'map':
				$table='at_map';
				break;

			case 'news':
				$table='at_news';
				$get=array('title','news');
				$field='title';
				break;

			case 'patent':
				$table='at_patents';
				break;

			case 'prevactivity':
				$table='at_prev_activity';
				$get=array('location','activity');
				$field='location';
				break;

			case 'publication':
				$table='at_publication';
				$get=array('title','publisher');
				$field='title';
		}
		Main::includeClass('Details');
		$details=array();
		$details=Details::getDetails($table,$get,array($field=>$this->query),FALSE,TRUE);
		$this->display($details);
	}

	function display($details)
	{
		$info=array();
		if(empty($details))
		{
			$info=array('Error'=>'Oops, Some Thing Went Wrong With Query? Try Again With Another Term');
		}
		else
		{
			$i=0;
			foreach($details as $data)
			{
				$j=0;
				foreach($data as $cont)
				{
					if($j==0)
					{
						$info[]['name']=$cont;
					}
					else
					{
						$info[$i]['details']=$cont;
					}
					$j++;
				}
				$i++;
			}
		}
		Main::includeClass('SearchData');
		$sd=new SearchData($info,$this->section);
		Main::includeClass('TemplateData');
		$td=new TemplateData($sd);
	}
}

?>