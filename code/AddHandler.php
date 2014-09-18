<?php

class AddHandler
{
	protected $info;
	protected $table;
	protected $image;
	protected $page;

	function __construct($comp)
	{
		$this->page='AdminHomeData';
		$this->image=FALSE;
		if(key_exists('SUBCATEGORY',$comp))
		{
			$this->handle($comp['SUBCATEGORY']);
		}
		else
		{
			$this->handle('home');
		}
	}

	function parse($section)
	{
		$page='AdminHomeData';
		$image=FALSE;
		switch($section)
		{
			case 'crop':
				$table='at_crop';
				$fields=array('name','sci_name','climate','soil','variaties','dur','diseases','bio_fert','market_price','details','type','pests');
				$image=TRUE;
				$req=array('name','type');
				$page='CropData';
				break;

			case 'croptype':
				$table='at_crop_types';
				$fields=array('name','details');
				$req=array('name');
				$page='CropTypeData';
				break;

			case 'office':
				$table='at_contact_info';
				$fields=array('name','type','code','number','district','location');
				$req=array('number','name');
				$image=TRUE;
				$page='ContactData';
				break;

			case 'news':
				$table='at_news';
				$fields=array('news','title','date','time');
				$req=array('news','title','date','time');
				$page='NewsData';
				break;

			case 'map':
				$table='at_map';
				$fields=array('type','name','file','LOCID','details');
				$req=array('type','name');
				$image=TRUE;
				$page='MapData';
				break;

			case 'magazine':
				$table='at_magazine';
				$fields=array('name','annual_price','single_price','lifetime_price');
				$req=array('name');
				$page='MagazineData';
				break;

			case 'award':
				$table='at_awards';
				$fields=array('level','name','details','year');
				$req=array('name','level');
				$page='AwardsData';
				break;

			case 'disease':
				$table='at_crop_disease';
				$fields=array('name','control','details');
				$req=array('name');
				$page='DiseaseData';
				break;

			case 'location':
				$table='at_location';
				$fields=array('name','details','cli','soil','crops','landuse','geo_area','land_forest','land_sown','well_irrigated_area','tank_irrigated_area','other_irrigated_area','canal_irrigated_area','net_irrigated_area','gross_irrigated_area','type','district');
				$image=TRUE;
				$req=array('name','type');
				$page='LocationData';
				break;

			case 'publication':
				$table='at_publication';
				$fields=array('title','year','author','publisher','price');
				$req=array('title');
				$page='PublicationData';
				break;

			case 'link':
				$table='at_links';
				$fields=array('name','url','details');
				$req=array('name','url','details');
				$page='LinksData';
				break;

			case 'biofert':
				$table='at_bio_fert';
				$fields=array('name','details','price');
				$req=array('name','details','price');
				$page='BioFertData';
				break;

			case 'insurance':
				$table='at_crop_insurance';
				$fields=array('crop','no','age','premium','compensation');
				$req=array('crop','premium','compensation');
				$page='CropInsuranceData';
				break;

			case 'prevactivity':
				$table='at_prev_activity';
				$fields=array('year','activity','location');
				$req=array('year','activity','location');
				$page='PrevActivityData';
				break;

			case 'patent':
				$table='at_patents';
				$fields=array('name','holders','year','no');
				$req=array('name','holders','no');
				$page='PatentsData';
				break;

			case 'message':
				$table='at_message';
				$fields=array('news','date','time');
				$req=array('name','date','time');
				$page='MessageData';
				break;

			default:
				$table='';
				$fields='';
				$req='';
				$page='AdminHomeData';
				break;
		}
		$this->image=$image;
		$this->table=$table;
		if(isset($_POST['action']))
		{
			$this->info=Main::getPostData($fields,$req);
			if($section=='crop')
			{
				$this->info['soil']=str_replace(array('\n','\r'),'<br />',$this->info['soil']);
				$this->info['variaties']=str_replace(array('\n','\r'),'<br />',$this->info['variaties']);
				$this->info['diseases']=str_replace(array('\n','\r'),'<br />',$this->info['diseases']);
			}
			if($this->image)
			{
				if(isset($_FILES['file']))
				{
					if($_FILES['file']['error']===UPLOAD_ERR_OK)
					{
						//echo $_FILES['file']['error'];
						Main::includeClass('UploadManager');
						$file=Main::generateRandom();
						$um=new UploadManager($file);
						$this->info['image']=$file;
					}
				}
			}
		}
		else
		{
			$this->display($page);
		}
	}

	function handle($section)
	{
		if(isset($_POST['action']))
		{
			$this->parse($section);
			Main::includeClass('Add');
			$add=new Add($this->info,$this->table);
			echo header('Location: '.Settings::SITEURL.'/admin/add/'.$section);
		}
		else
		{
			$this->parse($section);
		}
	}
	function display($form)
	{
		Main::includeClass($form);
		$obj=new $form();
		Main::includeClass('TemplateData');
		$td=new TemplateData($obj);
	}
}

?>