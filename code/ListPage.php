<?php
Main::includeClass('MainTemplate');

class ListPage extends MainTemplate
{
	protected $comp;

	function __construct($comp)
	{
		$this->content=array();
		$this->banner='';
		$this->admin=Main::isAdminLoggedIn();
		$this->comp=$comp;
		if(isset($_GET['p']) && $_GET['p']>0)
		{
			$this->page=$_GET['p'];
		}
		else
		{
			$this->page=1;
		}
		$this->parse();
	}

	function parse()
	{
		Main::includeClass('Details');
		$this->section=$this->comp['SECTION'];
		switch(strtolower($this->section))
		{
			case 'crop':
				Main::includeClass('Details');
				$details=Details::getDetails('at_crop',array('name','details','image'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />
		<div class="heading-text">

		<h3>Crops</h3>
		<p>Crop List</p>

		</div>
		</div>';
			break;

		case 'croptype':
			Main::includeClass('Details');
			$details=Details::getDetails('at_crop_types',array('name','details'),NULL,FALSE);
			if(empty($details))
			{
				$this->content=array("Error"=>"No Data Found");
			}
			else
			{
				$this->content=$details;;
			}
			$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Crops</h3>
		<p>Crop List</p>

		</div>
		</div>';
			break;

			case 'map':
				if(key_exists('SUBCATEGORY',$this->comp))
				{
					$district=$this->comp['CATEGORY'];
					$location=$this->comp['SUBCATEGORY'];
					$details=Details::getDetails('at_map',array('name','details'),array('district'=>$district,'location'=>$location));
				}
				else if(key_exists('CATEGORY',$this->comp))
				{
					$district=$this->comp['CATEGORY'];
					$details=Details::getDetails('at_map',array('location'),array('location'=>$location));
					if(empty($details))
					{
						$this->content=array("Error"=>"No Data Found");
					}
					else
					{
						$info=array();
						$i=0;
						foreach($details as $det)
						{
							$info['name']=$det['location'];
						}
						$this->content=$info;
					}
				}
				else
				{
					$details=Details::getDetails('at_map',array('district'));
					if(empty($details))
					{
						$this->content=array("Error"=>"No Data Found");
					}
					else
					{
						$info=array();
						$i=0;
						foreach($details as $det)
						{
							$info['name']=$det['district'];
						}
						$this->content=$info;
					}
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Maps</h3>
		<p>Map List</p>

		</div>
		</div>';
				break;

			case 'office':
				//Main::includeClass('Contact');
				if(key_exists('SUBCATEGORY',$this->comp))
				{
					$location=$this->comp['SUBCATEGORY'];
					$district=$this->comp['CATEGORY'];
					$details=Details::getDetails('at_contact_info',array('name'),array('location'=>$location,'district'=>$district));
					if(empty($details))
					{
						$this->content=array("Error"=>"No Data Found");
					}
					else
					{
						$this->content=$details;
					}
					break;
				}
				else if(key_exists('CATEGORY',$this->comp))
				{
					$district=$this->comp['CATEGORY'];
					$details=Details::getDetails('at_contact_info',array('location'),array('district'=>$district));
					if(empty($details))
					{
						$this->content=array("Error"=>"No Data Found");
					}
					else
					{
						$info=array();
						$i=0;
						foreach($details as $det)
						{
							$info[$i]['name']=$det['location'];
						}
						$this->content=$info;
					}
				}
				else
				{
					$details=Details::getDetails('at_contact_info','district');
					if(empty($details))
					{
						$this->content=array("Error"=>"No Data Found");
					}
					else
					{
						$info=array();
						$i=0;
						foreach($details as $det)
						{
							$info[$i]['name']=$det['district'];
						}
						$this->content=$info;
					}
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Offices</h3>
		<p>Office List</p>

		</div>
		</div>';
				break;

			case 'prevactivity':
				Main::includeClass('Details');
				if(!key_exists('CATEGORY',$this->comp))
				{
					$details=Details::getDetails('at_prev_activity','location',NULL,FALSE);
					if(empty($details))
					{
						$this->content=array('Error'=>"No Data Found");
					}
					else
					{
						$info=array();
						$i=0;
						foreach($details as $det)
						{
							$info[$i]['name']=$det['location'];
							if(isset($det['activity']))
							{
								$info[$i]['details']=$det['activity'];
							}
							$i++;
						}
						$this->content=$info;
					}
				}
			else
			{
				$location=$this->comp['CATEGORY'];
				$details=Details::getDetails('at_prev_activity','year',NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$info=array();
					$i=0;
					foreach($details as $det)
					{
						$info[$i]['name']=$det['year'];
						$i++;
					}
					$this->content=$info;
				}

			}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Previous Year Activity</h3>
		<p></p>

		</div>
		</div>';
			break;

		case 'awards':
			Main::includeClass('Details');
			$details=Details::getDetails('at_awards',array('name','details'),NULL,FALSE);
			if(empty($details))
			{
				$this->content=array("Error"=>"No Data Found");
			}
			else
			{
				$this->content=$details;;
			}
			$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Awards</h3>
		<p>Awards List</p>

		</div>
		</div>';
			break;

			case 'biofert':
			Main::includeClass('Details');
			$details=Details::getDetails('at_bio_fert',array('name','details'),NULL,FALSE);
			if(empty($details))
			{
				$this->content=array("Error"=>"No Data Found");
			}
			else
			{
				$this->content=$details;;
			}
			$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Bio Fertilizer</h3>
		<p>Bio Fertilizer List</p>

		</div>
		</div>';
				break;

			case 'disease':
				Main::includeClass('Details');
				$details=Details::getDetails('at_crop_disease',array('name','details'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Disease</h3>
		<p>Disease List</p>

		</div>
		</div>';
				break;

			case 'insurance':
				Main::includeClass('Details');
				$details=Details::getDetails('at_crop_insurance',array('crop'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Crops Insurance</h3>
		<p>Insured Crops List</p>

		</div>
		</div>';
				break;
			case 'links':
				Main::includeClass('Details');
				$details=Details::getDetails('at_links',array('name','details'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>UseFull Links</h3>
		<p>Links List</p>

		</div>
		</div>';
				break;
			case 'location':
				Main::includeClass('Details');
				$details=Details::getDetails('at_location',array('name','details','image'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Location</h3>
		<p>Location List</p>

		</div>
		</div>';
				break;
			case 'magazine':
				Main::includeClass('Details');
				$details=Details::getDetails('at_magazine',array('name'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Magazine</h3>
		<p>Magazine List</p>

		</div>
		</div>';
				break;
			case 'news':
				Main::includeClass('Details');
				$details=Details::getDetails('at_news',array('title','news'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					foreach($details as $data)
					{
						$info=$data;
					}
					$this->content[0]=array('name'=>$info['title'],'details'=>$info['news']);
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>News</h3>
		<p>News</p>

		</div>
		</div>';
				break;
			case 'patents':
				Main::includeClass('Details');
				$details=Details::getDetails('at_patents',array('name'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					$this->content=$details;;
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Patents</h3>
		<p>Patents List</p>

		</div>
		</div>';
				break;
			case 'publication':
				Main::includeClass('Details');
				$details=Details::getDetails('at_publication',array('title'),NULL,FALSE);
				if(empty($details))
				{
					$this->content=array("Error"=>"No Data Found");
				}
				else
				{
					if(isset($details['title']))
					{
						$this->content[0]['name']=$details['title'];
					}
				}
				$this->banner='<div id="page-heading"> <img src="'.Settings::SITEURL.'images/page-heading1.jpg" alt="" />

		<div class="heading-text">

		<h3>Publications</h3>
		<p>Publication List</p>

		</div>
		</div>';
				break;
		}
	}

	function content()
	{
	$details=$this->content;
		//print_r($details);
	if(empty($details)||key_exists('Error',$details))
	{
	?>
		<h4>
			<div align="center"><span>Sorry! Currently Content Is Not Available For This Property.</span></div>
		</h4>
	<?php
	}
	else
	{
	foreach($details as $info)
	{
?>
		<div class="boximg-blog">
              <div class="blogimage"> <img alt="" class="boximg-pad" /></div>
            </div>
			<div class="postbox" class="post-176 post type-post status-publish format-standard hentry category-blog" >
	<h4>
					<?php
						$uri=explode('/',$_SERVER['REQUEST_URI']);
						$url='';
						$i=0;
						foreach($uri as $data)
						{
							if(!empty($data))
							{
								if($i>0)
								{
									$url.="$data";
									$i++;
								}
								else
								{
									$url.=$data."/";
								}
							}
						}
						$url=Settings::SITEURL.$url;
						$name=str_replace("_"," ",$info['name']);
						echo "<a href='$url{$info['name']}'>".ucfirst($name)."</a>";
					?>
				</h4>
				<?php
					if(isset($info['details']))
					{
						$details=$info['details'];
						if(strlen($details)>150)
						{
							$details=substr($details,0,150);
						}
						echo "<p>$details</p>";
					}
				?>
			</div>
			<div class="clear"></div>
			<?php
				if($this->admin)
				{
			?>
			<div class="metapost">
				<span class="first"><a href='<?php echo Settings::SITEURL."admin/update/$this->section/{$info['name']}"; ?>'>Edit</a></span> | <span><a href="<?php echo Settings::SITEURL."admin/remove/$this->section/{$info['name']}"; ?>">Remove</a></span>
			</div>
			<div class="clear"></div>
			<?php
}
?>
		</li>
		<div class="clear"></div>
					<?php
}
}
echo '</ul>';
	}

	function banner()
	{
		echo $this->banner;
	}

function sideBar()
{
$section=$this->section;
?>
	<div id="sidebar">
		<div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div id="searchbox_widget-7" class="sidebarcontent widget_searchbox_widget">
              <h4 class="sidebarheading">Search</h4>
              <div class="searchbox">
                <form method="get" id="search" action="<?php echo Settings::SITEURL."search/";?>" />
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

        <div class="sidebar">
          <div class="sidebartop"></div>
          <div class="sidebarmain">
            <div class="sidebarcontent">
              <h4 class="sidebarheading">List</h4>
              <ul class="sidelist">
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>crop" title="Crops">Crops</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>disease" title="Diseases">Diseases</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>news" title="News">News</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>insurance" title="Insurance">Insurance</a></li>
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>message" title="Message">Message</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>location" title="Location">Location</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>map" title="Maps">Maps</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>magazine" title="Magazine">Magazine</a></li>
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>awards" title="award">Award</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>publication" title="Publication">Publication</a></li>
                <li class="page_item page-item-97"><a href="<?php echo Settings::SITEURL; ?>link" title="Links">Links</a></li>
                <li class="page_item page-item-100"><a href="<?php echo Settings::SITEURL; ?>biofert" title="Bio Fertilizers">Bio Fertilizers</a></li>
                <li class="page_item page-item-105"><a href="<?php echo Settings::SITEURL; ?>prevactivity" title="Previous Year Activity">Previous Year Activity</a></li>
                <li class="page_item page-item-103"><a href="<?php echo Settings::SITEURL; ?>patent" title="Patent">Patent</a></li>
              </ul>
            </div>
          </div>
          <div class="sidebarbottom"></div>
        </div>
    </div>
    <?php
}
}
?>