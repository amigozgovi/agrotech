<?php

Main::includeClass('MainTemplate');
class SeasonCalculatorData extends MainTemplate
{
	protected $content;

	function __construct($details,$season)
	{
		$this->content=$details;
		$this->season=$season;
	}

	function content()
	{
		$details=$this->content;
		echo "<h4>Crops For Season: $this->season<h4>";
	if(empty($details)||key_exists('Error',$details))
	{
?>
		<h4>
			<div align="center"><span>No Crop Can Be Cultivated in This Season</span></div>
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
						echo "<a href='$url{$info['name']}'>".str_replace("_"," ",$info['name'])."</a>";
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
		</li>
		<div class="clear"></div>
					<?php
}
}
echo '</ul>';
}
}