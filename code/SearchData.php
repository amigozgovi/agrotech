<?php

Main::includeClass('MainTemplate');
class SearchData extends MainTemplate
{
	function __construct($details,$section)
	{
		$this->content=$details;
		$this->admin=Main::isAdminLoggedIn();
		$this->section=$section;
	}



	function content()
	{
	$details=$this->content;
	echo '<h3>Search Result</h3>';
	if(empty($details)||key_exists('Error',$details))
	{
?>

		<h4>
			<?php echo $details['Error']; ?>
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
						//echo "<a href='".Settings::SITEURL."$this->section/{$info['name']}'>{$info['name']}</a>";
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
						echo "<a href='".Settings::SITEURL."$this->section/{$info['name']}'>{$info['name']}</a>";
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
}

?>