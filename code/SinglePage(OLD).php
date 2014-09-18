<?php

Main::includeClass('MainTemplate');

class SinglePage extends MainTemplate
{
	protected $content;
	protected $banner;
	protected $section;
	protected $name;

	function __construct($section,$name)
	{
		$this->content=array();
		$this->banner='';
		$this->section=$section;
		$this->name=$name;
		$this->parse();
	}

	function parse()
	{
		Main::includeClass('Details');
		switch(strtolower($this->section))
		{
			case 'crop':
				Main::includeClass('Details');
				$details=Details::getDetails('at_crop','*',array('name'=>$this->name));
				//print_r($details);
				if(empty($details))
				{
					$this->content=array('Error'=>'No Data Found');
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
					//$this->content['Name']=$details[0]['name'];/
					//$this->content['Scientific_Name']=$details[0]['sci_name'];
					//$this->content['Climate']=$details[0]['climate'];
					//$this->content['Soil']=$details[0]['soil'];
					//$this->content['Variaties']=$details[0]['variaties'];
					//$this->content['Duration']=$details[0]['dur'];
					//$this->content['Diseases']=$details[0]['diseases'];
					//$this->content['Bio_Fertilizer']=$details[0]['bio_fert'];
					//$this->content['Market_Price']=$details[0]['market_price'];
					//$this->content['Crop_Details']=$details[0]['details'];
					//$this->content['Crop_Type']=$details[0]['type'];
					//$this->content['image']=$details[0]['image'];
					//$this->content['Pests']=$details[0]['pests'];
				}
				$this->banner='<div id="page-heading"> <img src="http://localhost/images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Crop</h3>
		<p>'.ucfirst($this->name).'  Details</p>

		</div>
		</div>';
				break;

			case 'awards':
					Main::includeClass('Details');
					$details=Details::getDetails('at_awards','*',array('name'=>$name));
					if(empty($details))
					{
						$this->content=array('Error'=>'No Data Found');
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
					}
			break;

			case 'bio-fert':
				Main::includeClass('Details');
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

			case 'contact':
				Main::includeClass('Details');
				$details=Details::getDetails('at_contact_info','*',array('name'=>$name,'location'=>$loc,'district'=>$district));
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

			case 'croptypes':
				$details=Details::getDetails('at_crop_types','*',array('crop'=>$name));
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
				$details=Details::getDetails('at_crop_links','*',array('crop'=>$name));
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
				$details=Details::getDetails('at_location','*',array('name'=>$name));
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

			case 'prev-activity':
				$details=Details::getDetails('at_prev_activity','*',array('year'=>$year,'LOCID'=>$id));
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
						$location=Details::getDetails('at_location','name',array('ID'=>$det['LOCID']));
						$this->content['Location']=$location;
					}
				}
			break;

			case 'publication':
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
			/*if(key_exists('image',$this->content))
			{
				if(!empty($this->content['image']) && isset($this->content['image']))
				{
					echo "<img src='".Settings::SITEURL."external_images\\{$this->content['image']}' class='alignleft'/>";
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
						echo '<p>'.$value.'</p>';
					}
				}
			}
			*/
		echo '<h4>Cadastral Map kuttippuram</h4>';
		echo '<img src="http://localhost/external_images/cadastral.jpg" />';
	}

	function banner()
	{
		echo $this->banner;
	}

	function sideBar()
	{
	?>
		<div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="searchbox_widget-7" class="sidebarcontent widget_searchbox_widget">
              <h4 class="sidebarheading">Search</h4>
              <div class="searchbox">
                <form method="get" id="search" action="/?section='crop'">
                  <div>
                    <input type="text" class="searchinput" value="Search Map(s)..." onblur="if (this.value == ''){this.value = 'Search Map(s)...'; }" onfocus="if (this.value == 'Search Map(s)...') {this.value = ''; }"   name="s" id="s"/>
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
        	if(isset($this->content['Crop_Type']))
        	{
        ?>
          <div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="categories-2" class="sidebarcontent widget_categories">
              <h4 class="sidebarheading">Related Crops</h4>
              <ul>
                <?php
                	$crops=Details::getDetails('at_crop','name',array('type'=>$this->content['Crop_Type']));
                	if(empty($crops))
                	{
                		echo "No Related Crops Of Type {$this->content['Crop_Type']} Found";
                	}
                	else
                	{
                		$count=0;
						foreach($crops as $info)
                		{
                			if($info['name']!==	$this->content['Name'])
                			{
                				echo '<li class="cat-item cat-item-1"><a href="'.Settings::SITEURL.'crop\\'.$info['name'].'">'.$info['name']."</a></li>";
                				$count+=1;
                			}
                		}
                		if(!$count)
                		{
                			echo "<p>No Related Crop(s) Found</p>";
                		}
                	}
                ?>
              </ul>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>
    <?php
		}
	}
}

?>