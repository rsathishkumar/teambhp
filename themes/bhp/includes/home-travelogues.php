<?php
$sql_bnner=@mysqli_fetch_array(mysqli_query("select title,uri from node,field_data_field_travelogue_banner_img,file_managed where field_data_field_travelogue_banner_img.entity_id = node.nid and file_managed.fid = field_data_field_travelogue_banner_img.field_travelogue_banner_img_fid and node.status=1 and node.type='travelogues_home_banner' order by md5(rand()) limit 0,5"));
$sql_travel="SELECT title, field_ht_forum_url,nid FROM node,field_data_field_ht_threads,field_data_field_ht_forum
WHERE field_data_field_ht_threads.entity_id = node.nid AND field_data_field_ht_forum.entity_id = field_data_field_ht_threads.entity_id
AND field_data_field_ht_threads.field_ht_threads_value = 'Travelogues' ORDER BY `node`.`changed` desc limit 0,5";
$res_trvel=@mysqli_query($sql_travel);
$noftravel=@mysqli_num_rows($res_trvel);
if($noftravel>0)
	{
?>
<div class="homeTra">
	<a href="/?q=hot-threads&catname=Travelogues" class="roundAll5 homeTravel clearfix">
		<?php
			$trbannerimage="";
			$trbannerimagetitle="";
			if($sql_bnner!='')
				{
				$trbannerimage = "/sites/default/files/".str_replace("public://","",$sql_bnner['uri']);
				$trbannerimagetitle = $sql_bnner['title'];
				}
				else
				{
				$trbannerimage = "/themes/bhp/images/home/travelBg.jpg";
				
				}
		?>
		<img src="<?php echo $trbannerimage;?>" alt="<?php echo $trbannerimagetitle;?>" />
			
	</a>
	<div class="fleft travels" id="trav_home"><!-- code for this click event writen in home-news-->
		<h4>Travelogues</h4>
		<p>Experiences, Route info &amp; Photos posted by Team-BHP members</p>
	</div>
	<ul class="travelList roundAll5">
		<?php
		while($d_travel=mysqli_fetch_array($res_trvel))
			{
			$hot_thread=node_load($d_travel['nid']);
			$pth="";
			if(strstr($d_travel['field_ht_forum_url'],"http://"))
				{
				$pth.=$d_travel['field_ht_forum_url'];
				}
				else
				{
				$pth.="http://".$d_travel['field_ht_forum_url'];
				}
					$ttle='';
						if(strlen($hot_thread->title)>30)
							{
								if(truncatestringwithspace($hot_thread->title,24)!=false)
								{
								$ttle.= truncatestringwithspace($hot_thread->title,24);
								}
								else
								{
								$ttle.= $hot_thread->title;
								}
							}
						else
							{
						$ttle.= $hot_thread->title;	
							}
		?>
		<li><a href="<?php echo  bhp_replace_http_strings($d_travel['field_ht_forum_url']);?>" target="_blank" title="<?php echo $hot_thread->title;?>"><?php echo $ttle; ?></a></li>
		<?php
			}
		?>
		<!--  <li><a href="#">Road trip to Ladakh</a></li>
		<li><a href="#">Strange sightings on the road</a></li>
		<li><a href="#">Route query: Delhi to Rajasthan</a></li>
		<li><a href="#">Bike trip: Mumbai to Goa</a></li>-->
	</ul>
</div>
<?php
	}
?>
