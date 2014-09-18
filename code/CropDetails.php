<?php

class CropDetails
{
	function __construct($name)
	{
		Main::includeClass('Details');
		$details=Details::getDetails('at_crop','*',array('name'=>$name));
		Main::includeClass('DetailsData');
		$dd=new DetailsData($details,'crop');
		$dd->single();
	}

	function details()
	{
	Main::includeClass('DetailsData');
	$dd=new DetailsData();
	$dd->header();
?>
		<div>
		<?php
			if(!is_array($this->details))
			{
				echo '<h3>No Data Found<h3>';
			}
			else
			{
				if(isset($this->details['image'])&& $this->details['image']!=='NULL')
				{
					echo "<img src='{$this->details['image']}' class='alignleft' />";
				}
				echo '<h3>Name</h3>';
				if(isset($this->details['name']))
				{
					echo '<p>'.$this->details['name'].'</p>';
				}
				else
				{
					echo '<p>N/A</p>';
				}
				echo '<h3>Scientific Name</h3>';
				if(isset($this->details['sci_name'])&& $this->details['sci_name']!=='NULL')
				{
					echo '<p>'.$this->details['sci_name'].'</p>';
				}
				else
				{
					echo '<p>N/A</p>';
				}
				echo '<h3>Climate</h3>';
				if(isset($this->details['climate']) && $this->details['climate']!=='NULL')
				{
					echo '<p>'.$this->details['climate'].'</p>';
				}
				else
				{
					echo '<p>N/A</p>';
				}
				echo '<h3>Soil</h3>';
				if(isset($this->details['soil']) && $this->details['soil']!=='NULL')
				{
					echo $this->details['soil'];
				}
				else
				{
					echo 'N/A';
				}
				if(isset($this->details['variaties'])&& $this->details['variaties']!=='NULL')
				{
					echo $this->details['variaties'];
				}
				else
				{
					echo 'N/A';
				}
				if(isset($this->details['dur'])&&$this->details['dur']!=='NULL')
				{
					echo $this->details['dur'];
				}
				else
				{
					echo 'N/A';
				}
				if(isset($this->details['diseases']) && $this->details['diseases']!=='NULL')
				{
					echo $this->details['diseases'];
				}
				if(isset($this->details['bio_fert'])&&$this->details['bio_fert']!=='NULL')
				{
					echo $this->details['bio_fert'];
				}
				else
				{
					echo 'N/A';
				}

				if(isset($this->details['market_price'])&&$this->details['market_price']!=='NULL')
				{
					echo $this->details['market_price'];
				}
				else
				{
					echo 'N/A';
				}

				if(isset($this->details['details'])&&$this->details['details']!=='NULL')
				{
					echo $this->details['details'];
				}
				else
				{
					echo 'N/A';
				}
				if(isset($this->details['type'])&&$this->details['type']!=='NULL')
				{
					echo $this->details['type'];
				}
				else
				{
					echo 'N/A';
				}
				if(isset($this->details['pests'])&&$this->details['pests']!=='NULL')
				{
					echo $this->details['pests'];
				}
				else
				{
					echo 'N/A';
				}
			}
		?>
		</div>
		<?php
$dd->content();
	}

	function printList()
	{
		Main::includeClass('DetailsData');
		$dd=new DetailsData();
		$dd->header();
		if(!is_array($this->details) ||empty($this->details))
		{
			echo '<h3> No Data Found</h3>';
		}
		else
		{
	?>
		<ul id="listlatestnews">

		<?php
			foreach($this->details as $value)
			{
			?>
				<li>
				<div class="boximg-blog">
				<div class="blogimage"> <img alt="" class="boximg-pad" /></div>
				</div>
				<div class="postbox class="post-176 post type-post status-publish format-standard hentry category-blog"">

				<h3><a href="http://localhost/details/crop/<?php echo $value; ?>"><?php echo $value; ?></a></h3>
				</div>
				<div class="clear"></div>
				</li>
			<?php
			}
		?>
		</ul>
		<div class="clear"></div>
		<?php
		}
		$dd->content();
	}
}

?>