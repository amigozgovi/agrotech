<?php

class UpdateHandler
{
	protected $section;
	protected $name;

	function __construct($comp)
	{
		if(key_exists('SUBCATEGORY',$comp) && key_exists('QUERY',$comp))
		{
			$section=$comp['SUBCATEGORY'];
			$name=str_replace('%20'," ",$comp['QUERY']);
		}
		else
		{
			echo header('Location: '.Settings::SITEURL.'admin/');
		}
		$this->section=$section;
		$this->name=$name;
		$this->handle($section);
	}

	function handle($section)
	{
		$page="UpdateHome";
		$temp['cond']='name';
		switch($section)
		{
			case 'crop':
				$table='at_crop';
				$fields=array('name','sci_name','climate','soil','variaties','dur','diseases','bio_fert','market_price','details','type');
				$req=array('name','type');
				$page='CropData';
				$temp['cond']='name';
				break;
			case 'office':
				$table='at_contact_info';
				$fields=array('name','type','code','number','district','location');
				$req=array('number','name','district');
				$page='ContactData';
				$temp['cond']='name';
				break;
			case 'croptype':
				$table='at_crop';
				$fields=array('name','details');
				$req=array('name');
				$page='CropTypeData';
				$temp['cond']='name';
				break;
			case 'news':
				$table='at_news';
				$fields=array('news','date','time');
				$req=array('news','date','time');
				$page='NewsData';
				$temp['cond']='date';
				break;

			case 'map':
				$table='at_map';
				$fields=array('news','date','time');
				$req=array('news','date','time');
				$page='MapData';
				break;

			case 'magazine':
				$table='at_magazine';
				$fields=array('name','type','annual_price','single_price','lifetime_price');
				$req=array('name','type');
				$page='MagazineData';
				$temp['cond']='name';
				break;
			case 'award':
				$table='at_awards';
				$fields=array('level','name','details','year');
				$req=array('name','level');
				$page='AwardsData';
				$temp['cond']='name';
				break;
			case 'disease':
				$table='at_crop_disease';
				$fields=array('name','control');
				$req=array('name');
				$page='DiseaseData';
				$temp['cond']='name';
				break;
			case 'location':
				$table='at_location';
				$fields=array('name','details','cli','soil','crops','landuse','geo_area','land_forest','land_sown','well_irrigated_area','tank_irrigated_area','other_irrigated_area','canal_irrigated_area','net_irrigated_area','gross_irrigated_area','type','district');
				$req=array('name','type');
				$page='LocationData';
				$temp['cond']='name';
				break;
			case 'publication':
				$table='at_publication';
				$fields=array('title','year','author','publisher','price');
				$req=array('title');
				$page='PublicationData';
				$temp['cond']='title';
				break;
			case 'link':
				$table='at_links';
				$fields=array('name','url','details');
				$req=array('name','url','details');
				$page='LinksData';
				$temp['cond']='name';
				break;
			case 'biofert':
				$table='at_bio_fert';
				$fields=array('name','details','price');
				$req=array('name','details','price');
				$page='BioFertData';
				$temp['cond']='name';
				break;
			case 'insurance':
				$table='at_crop_insurance';
				$fields=array('crop','no','age','premium','compensation');
				$req=array('crop','premium','compensation');
				$page='CropInsuranceData';
				$temp['cond']='crop';
				break;
			case 'prevactivity':
				$table='at_prev_activity';
				$fields=array('year','activity','location');
				$req=array('year','activity','location');
				$page='PrevActivityData';
				$temp['cond']='year';
				break;
			case 'patent':
				$table='at_patents';
				$fields=array('name','holders','year','no');
				$req=array('name','holders','no');
				$page='PatentsData';
				$temp['cond']='name';
			case 'default':
				echo header("Location: ".Settings::SITEURL."admin/");
		}
		Main::includeClass('Details');
		$det=new Details();

		if(isset($_POST['action']) && isset($_POST['update_name']))
		{
			$name=$_POST['update_name'];
			$info=Main::getPostData($fields,$req);
			/*
			if($this->image)
			{
				if(isset($_FILES['file']))
				{
					if($_FILES['file']['error']===UPLOAD_ERR_OK)
					{
						echo $_FILES['file']['error'];
						Main::includeClass('UploadManager');
						$file=Main::generateRandom();
						$um=new UploadManager($file);
						$info['image']=$file;
					}
				}
			}
			*/
			$cond=array($temp['cond']=>$name);
			Main::includeClass('Update');
			$update=new Update($info,$table,$cond);
			echo header("Location:".Settings::SITEURL."$this->section/");
		}
		//if(isset($_POST['update'])&& !empty($_POST['update']))
		//{
		else
		{
			$name=$this->name;
			$cond=array($temp['cond']=>$name);
			$list=$det->getDetails($table,'*',$cond,FALSE);
			if(!empty($list))
			{
				$list[0]['update']=$name;
			}
			$i=0;
			//print_r($list);
			foreach($list as $data)
			{
				//print_r($data);
				//$keys=array_keys($data);
				//print_r($keys);
				foreach($data as $key=>$value)
				{
					if(!isset($value))
					{
						$list[$i][$key]='';
					}
				}
				$i++;
			}
			//print_r($list);
			if(!empty($list))
			{
				$list=$list[0];
			}
			$this->displayUpdate($page,$list);
		}
		//}
	}

	function displayUpdate($page,$list)
	{
		Main::includeClass($page);
		$obj=new $page($list);
		Main::includeClass('TemplateData');
		$td=new TemplateData($obj);
	}

	function displaySelect($list)
	{
		Main::includeClass('Select');
		$select=new Select($list);
	}
}