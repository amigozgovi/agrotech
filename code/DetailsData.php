<?php

class DetailsData
{
	protected $info;
	protected $section;

	function __construct($info,$section)
	{
		$this->info=$info;
		$this->section=$section;
	}

	function single()
	{
		$inf=$this->info;
		foreach($inf as $info)
		{

		}
		$data=array();
		switch($this->section)
		{
			case 'crop':
				$data['Name']=$info['name'];
				$data['Scientific_Name']=$info['sci_name'];
				$data['Climate']=$info['climate'];
				$data['Soil']=$info['soil'];
				$data['Variaties']=$info['variaties'];
				$data['Duration']=$info['dur'];
				$data['Diseases']=$info['diseases'];
				$data['Bio_Fertilizer']=$info['bio_fert'];
				$data['Market_Price']=$info['market_price'];
				$data['Details']=$info['details'];
				$data['Type']=$info['type'];
				$data['Image']=$info['image'];
				$data['Pests']=$info['pests'];
				break;
		}
		$this->printSingle($data);
	}

	function printSingle($data)
	{
		if(array_key_exists('Image',$data))
		{
			if(!empty($data['Image']))
			{
				echo "<img src='{$data['Image']} class='alignleft' />";
			}
		}
		foreach($data as $key=>$value)
		{
			if($key!=='Image')
			{
				echo "<h4>".str_replace('_',' ',$key)."</h4>";
				if(isset($value) && $value!=='NULL')
				{
					echo "<p>$value</p>";
				}
				else
				{
					echo "No Data";
				}
			}
		}
	}

	function printList($admin=FALSE)
	{
		$info=$this->info;
		$section=$this->section;
		foreach($info as $info_data)
		{
			//print_r($info);
		?>
		<li>
			<div class='boximg_blog'>
				<div class='blogimage'>
					<img alt='' class='boximg_pad' />
				</div>
			</div>
			<div class="postbox" class="post-176 post type-post status-publish format-standard hentry category-blog" >
				<h3>
					<?php
						echo "<a href='".Settings::SITEURL."{$info_data['name']}>{$info_data['name']}'>{$info_data['name']}</a>";
					?>
				</h3>
				<?php
					echo "<p>{$info_data['details']}</p>";
				?>
			</div>
			<div class="clear"></div>
			<?php
			if($admin)
			{
			?>
			<div class="metapost">
				<span class="first"><a href='<?php echo Settings::SiteURL."admin/update/$section/{$info_data['name']}"; ?>'>Edit</a></span> | <span><a href="<?php echo Settings::SiteURL."admin/remove/$section/{$info_data['name']}"; ?>">Remove</a></span>
			</div>
			<div class="clear"></div>
			<?php
			}
			?>
		</li>
		<?php
		}
	}
}

?>