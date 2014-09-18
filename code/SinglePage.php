<?php

Main::includeClass('MainTemplate');

class SinglePage extends MainTemplate
{
	protected $content;
	protected $banner;
	protected $sideBar=array();
	protected $section;
	protected $name;
	protected $comp;

	function __construct($comp)
	{
		$this->content=array();
		$this->banner='';
		$this->comp=$comp;
		$this->parse();
	}

	function parse()
	{
		Main::includeClass('Details');
		$section=$this->comp['SECTION'];
		$this->section=$section;
		switch(strtolower($section))
		{
			case 'crop':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_crop','*',array('name'=>$name));
				$this->banner='<div id="page-heading"> <img src="http://localhost/images/page-heading1.jpg" alt="" /><div class="heading-text"><h3>Crop</h3><p>'.ucfirst($this->name).'  Details</p><</div></div>';
				if(empty($details))
				{
					$this->setContentEmpty();
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Name']=$det['name'];
						$this->content['Scientific_Name']=$det['sci_name'];
						$this->content['Climate']=str_replace('=:=','<br />',$det['climate']);
						$this->content['Soil']=$det['soil'];
						$this->content['Varieties']=$det['variaties'];
						$this->content['Duration']=$det['dur'];
						$this->content['Diseases']=$det['diseases'];
						$this->content['Bio_Fertilizer']=$det['bio_fert'];
						$this->content['Market_Price']=$det['market_price'];
						$this->content['Crop_Details']=$det['details'];
						$this->content['Crop_Type']=$det['type'];
						$this->content['image']=$det['image'];
						$this->content['Pests']=$det['pests'];
					}
					/*
					$name=$det['name'];
					$type=$det['type'];
					$side=Details::getDetails('at_crop','name',array('type'=>$type));
					if(!empty($side))
					{
						$count=0;
						foreach($side as $n)
						{
							if($n!==$name)
							{
								$this->sideBar[]="<li class='cat-item cat-item-1'><a href='".Settings::SITEURL."crop\\$n' title='$n'>$n</a></li>";
							}
						}
					}
					*/
				}
				break;

			case 'awards':
					$name=$this->comp['CATEGORY'];
					$details=Details::getDetails('at_awards','*',array('name'=>$name));
					if(empty($details))
					{
						$this->setContentEmpty();
					}
					else
					{
						foreach($details as $det)
						{
							$this->content['Level']=$det['level'];
							$this->content['Name']=$det['name'];
							$this->content['Details']=$det['details'];
							$this->content['Year']=$det['year'];
						}
						/*
						$name=$det['name'];
						$level=$det['level'];
						$side=Details::getDetails('at_crop','name',array('level'=>$type));
						if(!empty($side))
						{
							$count=0;
							foreach($side as $n)
							{
								if($n!==$name)
								{
									$this->sideBar[]="<li class='cat-item cat-item-1'><a href='".Settings::SITEURL."awards\\$n' title='$n'>$n</a></li>";
								}
							}
						}
						else
						{

						}
						*/
					}
			break;

			case 'biofert':

				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_bio_fert','*',array('name'=>$name));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
			else
			{
				foreach($details as $det)
				{
					$this->content['Name']=$det['name'];
					$this->content['Details']=$det['details'];
					$this->content['Price']=$det['price'];
				}
			}
			break;

			case 'office':
				$district=$this->comp['CATEGORY'];
				$location=$this->comp['SUBCATEGORY'];
				$name=str_replace("%20"," ",$this->comp['QUERY']);

				$details=Details::getDetails('at_contact_info','*',array('name'=>$name,'location'=>$location,'district'=>$district));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Name']=$det['name'];
						$this->content['Code']=$det['code'];
						$this->content['Number']=$det['number'];
						$this->content['District']=$det['district'];
						$this->content['Location']=$det['location'];
						$this->content['image']=$det['image'];
					}
				}
			break;

			case 'disease':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_crop_disease','*',array('name'=>$name));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Name']=$det['name'];
						$this->content['Control']=$det['control'];
						$this->content['Details']=$det['details'];
					}
				}
				break;

			case 'insurance':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_crop_insurance','*',array('crop'=>$name));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Crop']=$det['crop'];
						$this->content['Number/Quantity Required ']=$det['no'];
						$this->content['Age Of Crop']=$det['age'];
						$this->content['Premium']=$det['premium'];
						$this->content['Compensation']=$det['compensation'];
					}
				}
			break;

			case 'croptype':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_crop_types','*',array('name'=>$name));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
			else
			{
				foreach($details as $det)
				{
					$this->content['Name']=$det['name'];
					$this->content['Details']=$det['details'];
				}
			}
			break;

			case 'links':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_links','*',array('name'=>$name));
			if(empty($details))
			{
				$this->content=array('Error'=>'No Data Found');
			}
			else
			{
				foreach($details as $det)
				{
					$this->content['Name']=$det['name'];
					$this->content['Link']=$det['link'];
					$this->content['Details']=$det['details'];
				}
			}
			break;

			case 'location':
				if(key_exists('SUBCATEGORY',$this->comp))
				{
					$district=$this->comp['CATEGORY'];
					$location=$this->comp['SUBCATEGORY'];
					$details=Details::getDetails('at_location','*',array('name'=>$location,'district'=>$district));
				}
				else if(key_exists('CATEGORY',$this->comp))
				{
					$district=$this->comp['CATEGORY'];
					$details=Details::getDetails('at_location','*',array('name'=>$district,'type'=>'district'));
				}

				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
			else
			{
				foreach($details as $det)
				{
					$this->content['Name']=$det['name'];
					$this->content['Details']=$det['details'];
					$this->content['Soil']=$det['soil'];
					$this->content['Crops']=$det['crops'];
					$this->content['Land_Use']=$det['landuse'];
					$this->content['Geographical_Area']=$det['geo_area'];
					$this->content['Land_Forest']=$det['land_forest'];
					$this->content['Land_Sown']=$det['land_sown'];
					$this->content['Well_Irrigated_Area']=$det['well_irrigated_area'];
					$this->content['Canal_Irrigated_Area']=$det['canal_irrigated_area'];
					$this->content['Other_Irrigated_Area']=$det['other_irrigated_area'];
					$this->content['Net_Irrigated_Area']=$det['net_irrigated_area'];
					$this->content['Gross_Irrigated_Area']=$det['gross_irrigated_area'];
					$this->content['image']=$det['image'];
					$this->content['District']=$det['district'];
				}
			}
			break;

			case 'magazine':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_magazine','*',array('name'=>$name));
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Name']=$det['name'];
						$this->content['Annual_Price']=$det['annual_price'];
						$this->content['Single_Price']=$det['single_price'];
						$this->content['LifeTime_Price']=$det['lifetime_price'];
					}
				}
			break;

			case 'map':

				$details=Details::getDetails('at_map','*',array('type'=>$type,'name'=>$this->name,'LOCID'=>$locID));
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
			else
			{
				foreach($details as $det)
				{
					$this->content['Map']=$det['type'];
					$this->content['Name']=$det['name'];
					$this->content['image']=$det['image'];
					$location=Details::getDetails('at_location','name',array('ID'=>$det['LOCID']));

					$this->content['Location']=$location[0]['name'];
					$this->content['Details']=$det['details'];
				}
			}
			break;

			case 'news':
				$title=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_news','*',array('title'=>$title));
			if(empty($details))
			{
				$this->content=array("Error"=>"No Data Found");
			}
			else
			{
				foreach($details as $det)
				{
					$this->content['title']=$det['title'];
					$this->content['news']=$det['news'];
					$this->content['date']=$det['date'];
					$this->content['time']=$det['time'];
				}
			}
			break;

			case 'patents':
				$name=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_patents','*',array('name'=>$name));
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Name']=$det['name'];
						$this->content['Year']=$det['year'];
						$this->content['Holders']=$det['holders'];
						$this->content['Patent Number']=$det['no'];
						$this->content['Details']=$det['details'];
					}
				}
				break;

			case 'prevactivity':
				$year=$this->comp['SUBCATEGORY'];
				$location=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_prev_activity','*',array('year'=>$year,'location'=>$location));
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Year']=$det['year'];
						$this->content['Activity']=$det['activity'];
						$this->content['Location']=$det['location'];
					}
				}
			break;

			case 'publication':
				$title=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_publication','*',array('title'=>$title));
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					foreach($details as $det)
					{
						$this->content['Title']=$det['title'];
						$this->content['Year']=$det['year'];
						$this->content['Author']=$det['author'];
						$this->content['Publisher']=$det['publisher'];
						$this->content['Price']=$det['price'];
					}
				}
			break;
		}
	}

	function content()
	{
			if(key_exists('image',$this->content))
			{
				if(!empty($this->content['image']) && isset($this->content['image']))
				{
					echo "<img src='".Settings::SITEURL."external_images/{$this->content['image']}' class='alignleft' height='175' width='200' />";
				}
			}
			foreach($this->content as $key=>$value)
			{
				if($key!=='image' && !is_numeric($key))
				{
					if(isset($value)&&!empty($value))
					{
						$key=str_replace("_"," ",$key);
						echo "<h4>$key</h4>";
						if($key=='Name'||$key=='Title'||$key=='Location'||$key=='News')
						{
							$value=str_replace('_'," ",$value);
						}
						echo '<p>'.ucfirst($value).'</p>';
					}
				}
			}
	}

	function banner()
	{
		echo $this->banner;
	}

	function setContentEmpty()
	{
		$this->content=array('Error'=>'No Data Found');
	}

	function sideBar()
	{
	$section=$this->section;
		?>
		<div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="searchbox_widget-7" class="sidebarcontent widget_searchbox_widget">
              <h4 class="sidebarheading">Search</h4>
              <div class="searchbox">
                <form method="get" id="search" action="<?php echo Settings::SITEURL;?>search/" />
                  <div>
                    <input type="text" class="searchinput" value="Search <?php echo $section; ?>(s)..." onblur="if (this.value == ''){this.value = 'Search <?php echo $section; ?>(s)...'; }" onfocus="if (this.value == 'Search <?php echo $section; ?>(s)...') {this.value = ''; }"   name="s" id="s"/>
                    <input type="hidden" name="section" value="<?php echo $section; ?>" />
                    <input type="submit" class="searchsubmit" value=""/>
                  </div>
                </form>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>
    <?php
	}
}

?>