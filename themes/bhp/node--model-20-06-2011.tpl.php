<?php
//echo ($node->field_news_images['und'][0]['filename']);
//print_r($node->field_news_media_type['und'][0]['value']);
$sql_model=@mysqli_fetch_array(mysqli_query("SELECT node.title,node.nid, file_managed.uri,field_data_field_model_dashboard.field_model_dashboard_fid
FROM node, file_managed, field_data_field_model_dashboard
WHERE field_data_field_model_dashboard.field_model_dashboard_fid = file_managed.fid
AND field_data_field_model_dashboard.entity_id = node.nid
AND node.status =1 and node.nid=".$node->nid." order by node.changed desc"));
$sql_launch_date=@mysqli_fetch_array(mysqli_query("select field_moel_launched_value from field_data_field_moel_launched  where entity_id=".$node->nid));


 $sql_engine="select node.title,field_data_field_nr_make_model.entity_id,field_data_field_nr_make_model.field_nr_make_model_nid from node,field_data_field_nr_make_model where field_data_field_nr_make_model.entity_id=node.nid and field_data_field_nr_make_model.field_nr_make_model_nid=".$node->nid;

$sql_variant="select field_data_field_features_model.field_features_model_nid,node.title,field_data_field_features_nr_variant.field_features_nr_variant_nid,field_data_field_features_nr_variant.entity_id from field_data_field_features_model,node,field_data_field_features_nr_variant where field_data_field_features_nr_variant.entity_id=field_data_field_features_model.entity_id and field_data_field_features_nr_variant.field_features_nr_variant_nid=node.nid and field_data_field_features_model.field_features_model_nid=".$node->nid;


// $sql_forprice="select ,node.title,field_data_field_spec_nr_engine_type.field_spec_nr_engine_type_nid,field_news_model_nid,entity_id,field_spec_fuel_city_value from field_data_field_news_model,field_data_field_spec_nr_engine_type,node,field_data_field_spec_fuel_city where field_data_field_spec_fuel_city.entity_id=field_data_field_news_model.entity_id and field_data_field_spec_nr_engine_type.entity_id=field_data_field_spec_fuel_city.entity_id and node.nid=field_data_field_spec_nr_engine_type.field_spec_nr_engine_type_nid and field_data_field_news_model.field_news_model_nid=".$node->nid." and field_data_field_news_model.bundle='specifications'";
//print_r($forum_review_alias);
$q_mwithe="select field_news_model_nid,entity_id from field_data_field_news_model where field_news_model_nid=".$node->nid." and bundle='specifications'";
$sql_modelwithengine=@mysqli_query($q_mwithe);
$e_id='';
	while($data_eid=@mysqli_fetch_array($sql_modelwithengine))
			{
			$e_id.=$data_eid['entity_id'].",";
			}
?>
<script type="text/javascript">		    
		(function ($) {  $(function(){
			$(".listHolder").hover(
			function(){
					$(this).addClass("hover");
				},
			function(){
					$(this).removeClass("hover");
					}
			);
			
			$(".mv_tab_content li").hover(
			function(){
					$(this).addClass("hover");
				},
			function(){
					$(this).removeClass("hover");
					}
			);
			//Most Viewed tab 				
			$(".most_view li").click(function() {
			$(".most_view li a").removeClass("active"); //Remove any "active" class
			$(this).find("a").addClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".mv_tab_content").hide(); //Hide all tab content
	
			var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});
			$(".gallery_thumb li").click(function(){
    			$(".gallery_thumb li a").removeClass("active");
    			$(this).find("a").addClass("active");
    			$("img#mainPhoto").attr("src", $(this).find("a").attr("href"));
    			$(".lightbox").attr("href", $(this).find("a").attr("href"));
    			return false;
    		});
			$(".lightbox").lightbox();
			
			$("#goToNextPage").click(function(){
				$("#firstPage").css("display","none");
				$("#secondPage").css("display","block");
				$("#altrnativecars").css("display","block");
				
				$('html, body').animate({scrollTop: $($(this).attr("href")).offset().top-10}, 600);
				return false;
			});
			$("#overviewmore").click(function(){
				$("#reviewContent").fadeIn("slow");
				$(".showLess").fadeIn("slow");
				$(this).parent().fadeOut("slow");
				//$(this).parent().parent().addClass("reviewRollrBorder");
				return false;
			});
		});
})(jQuery);
	</script>
<?php
$photos_nid = @mysqli_fetch_array(mysqli_query("select entity_id from field_data_field_gallery_model where field_gallery_model_nid=".$node->nid));
	if($photos_nid!='')
		{
$photos_alias = @mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$photos_nid['entity_id']."'"));
		}

$sql_url=@mysqli_fetch_array(mysqli_query("select entity_id from field_data_field_gallery_model where field_gallery_model_nid=".$node->nid));
		if($sql_url!='')
		{
$sql_url_alias=@mysqli_fetch_array(mysqli_query("SELECT * FROM url_alias WHERE `source` = 'node/".$sql_url['entity_id']."'"));
		}
$make_res = @mysqli_fetch_array(mysqli_query("select title from node where nid=".$node->field_nr_make['und'][0]['nid']));

$sql_urlforspecification=@mysqli_fetch_array(mysqli_query("select field_data_field_spec_nr_engine_type.entity_id,field_data_field_nr_make_model.field_nr_make_model_nid from field_data_field_nr_make_model, field_data_field_spec_nr_engine_type where field_data_field_nr_make_model.field_nr_make_model_nid=".$node->nid." and field_data_field_nr_make_model.entity_id=field_data_field_spec_nr_engine_type.field_spec_nr_engine_type_nid LIMIT 1"));
	if($sql_urlforspecification!='')
		{
$sql_urlforspecific=@mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$sql_urlforspecification['entity_id']."'"));
		}

//$sql_urlforfeature=@mysqli_fetch_array(mysqli_query("select entity_id from field_data_field_features_model where field_features_model_nid=".$node->nid));

		
		$forum_review_nid = @mysqli_fetch_array(mysqli_query("select entity_id from field_data_field_forum_model where field_forum_model_nid=".$node->nid));
	if($forum_review_nid!='')
		{
$forum_review_alias = @mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$forum_review_nid['entity_id']."'"));
		}
	
			$sql_forengine=mysqli_query("select node.title,field_data_field_nr_make_model.entity_id,field_data_field_nr_make_model.field_nr_make_model_nid from node,field_data_field_nr_make_model where node.nid=field_data_field_nr_make_model.entity_id and node.status=1 and field_data_field_nr_make_model.field_nr_make_model_nid=".$sql_urlforspecification['field_nr_make_model_nid']);
			$engineid='';
			while($dateforengineid=mysqli_fetch_array($sql_forengine))
				{
				$engineid.=$dateforengineid['entity_id'].",";
				}
			//	echo $engineid;
				$sql_urlforfeature=@mysqli_fetch_array(mysqli_query("select field_data_field_features_nr_variant.entity_id from field_data_field_features_nr_variant,field_data_field_variant_nr_engine where field_data_field_features_nr_variant.field_features_nr_variant_nid=field_data_field_variant_nr_engine.entity_id and field_data_field_variant_nr_engine.field_variant_nr_engine_nid in (".@substr($engineid,0,-1).") limit 1"));
	if($sql_urlforfeature!='')
		{
$sql_urlforfeaturedata=@mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$sql_urlforfeature['entity_id']."'"));
		}
		//print_r($sql_urlforfeaturedata);

		$sql_urlforprice=@mysqli_fetch_array(mysqli_query("select field_data_field_price_nr_variant.entity_id from field_data_field_nr_make_model, field_data_field_variant_nr_engine, field_data_field_price_nr_variant where field_data_field_nr_make_model.field_nr_make_model_nid=".$node->nid." and field_data_field_nr_make_model.entity_id=field_data_field_variant_nr_engine.field_variant_nr_engine_nid and field_data_field_variant_nr_engine.entity_id=field_data_field_price_nr_variant.field_price_nr_variant_nid"));
		if($sql_urlforprice!='')
		{
$sql_urlforpricedata=@mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$sql_urlforprice['entity_id']."'"));
		}
?>
<div id="leftColumn" class="clearfix fleft">
	<div class="article">
			<h1 class="padL20 marB10">Reviews</h1>
			<ul class="tab TLR5 clearfix">
				<li><a href="<?php echo url("node/".$node->nid);?>" class="TLR5 active" title="Overview">Overview</a></li>
				<?php
				if($photos_alias!='')
					{
				?>
				<li><a href="?q=<?php echo $photos_alias['alias'];?>" class="TLR5" title="Photos">Photos</a></li>
				<?php
					}
				if($sql_urlforspecific!='')
					{
				?>
				<li><a href="?q=<?php echo $sql_urlforspecific['alias'];?>" class="TLR5" title="Specifications">Specifications</a></li>
				<?php
					}
				if($sql_urlforfeaturedata!='')
					{
				?>
				<li><a href="?q=<?php echo $sql_urlforfeaturedata['alias'];?>" class="TLR5" title="Features">Features</a></li>
				<?php
					}
				if($forum_review_alias!='')
					{
				?>
				<li><a href="?q=<?php echo $forum_review_alias['alias'];?>" class="TLR5" title="Forum Reviews">Forum Reviews</a></li>
				<?php
					}
				if($sql_urlforpricedata!='')
				{
				?>
				<li><a href="?q=<?php echo $sql_urlforpricedata['alias'];?>" class="TLR5" title="Price">Price</a></li>
				<?php
				}
				?>
			</ul>
			<div class="Overview">
				<div class="carOverview BLR5">
					<div class="clearfix">
						<div class="fleft w480">
							<h1><?php echo $make_res['title']." ".$node->title; ?> <span>Overview</span></h1>
						</div>
						<?php include ("includes/common/share.php");
						$q_e_img="SELECT node.title, field_data_field_gallery_model.field_gallery_model_nid, field_data_field_gallery_exterior.field_gallery_exterior_fid, file_managed.uri FROM node, file_managed, field_data_field_gallery_exterior, field_data_field_gallery_model WHERE field_data_field_gallery_exterior.entity_id = field_data_field_gallery_model.entity_id AND file_managed.fid = field_data_field_gallery_exterior.field_gallery_exterior_fid AND field_data_field_gallery_model.field_gallery_model_nid =".$node->nid." AND field_data_field_gallery_model.field_gallery_model_nid = node.nid order by field_data_field_gallery_exterior.field_gallery_exterior_fid desc limit 0,3";
						$sql_exterior_img=mysqli_query($q_e_img);
						$num_exterior=mysqli_num_rows($sql_exterior_img);
						?>
					</div><!-- clearfix -->
					<div class="clearfix marT10">
						<div class="fleft w380 PhotoGallery">									
							<div class="photogalleryHolder marB10">
									<?php
									if($num_exterior>0)
										{
										$d_singleextimg=mysqli_fetch_array($sql_exterior_img);
									?>
								<a href="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$d_singleextimg['uri']);?>" class="lightbox mainPhoto" alt="<?php echo $node->title; ?>">
									<img src="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$d_singleextimg['uri']);?>" id="mainPhoto" alt="<?php echo $node->title; ?>" width="370" height="275" />
								<?php
										}
										else
										{
								?>
								<a href="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$sql_model['uri']);?>" class="lightbox mainPhoto" alt="<?php echo $node->title; ?>">
									<img src="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$sql_model['uri']);?>" id="mainPhoto" alt="<?php echo $node->title; ?>" width="370" height="275" />
								<?php		
										}
								?>
									<a href="#" title="Click to Zoom" class="zoomIt">&nbsp;</a>
								</a>
								<?php
								
								$sql_exterior_img=mysqli_query($q_e_img);
						$num_exterior=mysqli_num_rows($sql_exterior_img);
								
$sql_interior_img=@mysqli_query("SELECT node.title, field_data_field_gallery_model.field_gallery_model_nid, field_data_field_gallery_interior.field_gallery_interior_fid , file_managed.uri FROM node, file_managed, field_data_field_gallery_interior, field_data_field_gallery_model WHERE field_data_field_gallery_interior.entity_id = field_data_field_gallery_model.entity_id AND file_managed.fid = field_data_field_gallery_interior.field_gallery_interior_fid  AND field_data_field_gallery_model.field_gallery_model_nid =".$node->nid." AND field_data_field_gallery_model.field_gallery_model_nid = node.nid order by field_data_field_gallery_interior.field_gallery_interior_fid desc limit 0,1") ;
								$num_interior=mysqli_num_rows($sql_interior_img);
								if(($num_exterior>0) || ($num_interior>0))
									{
								?>
								 <ul class="gallery_thumb clearfix marT10 marB5">
								 	<?php
								 		if($num_exterior>0)
										{
										while($data_ext_img=mysqli_fetch_array($sql_exterior_img))
											{
								 	?>
									<li>
										<a class="active" href="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$data_ext_img['uri']);?>" title="<?php echo $data_ext_img['title'];?>">
											<img src="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$data_ext_img['uri']);?>" alt="<?php echo $data_ext_img['title'];?>" width="70" height="50" />
										</a>
									</li>
									<?php
											}
										}
										if($num_interior>0)
										{
										$data_int_img=mysqli_fetch_array($sql_interior_img);
									?>
									<li>
										<a href="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$data_int_img['uri']);?>" title="<?php echo $data_int_img['title'];?>" class="last">
											<img src="http://www.team-bhp.com/sites/default/files/<?php echo str_replace("public://","",$data_int_img['uri']);?>" alt="<?php echo $data_int_img['title'];?>" width="70" height="50" />
										</a>
									</li>
										<?php
										}
										?>
									<!-- <li>
										<a href="car3.jpg" title="car">
											<img src="themes/bhp/images/news/thumb/car3.jpg" alt="car" width="70" height="50" />
										</a>
									</li>
									<li>
										<a href="car4.jpg" title="car" class="last">
											<img src="themes/bhp/images/news/thumb/car4.jpg" alt="car" width="70" height="50" />
										</a>
									</li>-->
								</ul>
								<?php
									}
									 $restofind=strstr($node->field_model_forum_link['und'][0]['url'],"http://");
								?>
								
							</div><!-- photo gallery Holder -->
							<?php
							if($node->field_model_link_available['und'][0]['value']=='Yes')
							{
							?>
							<a href="<?php if($restofind=='') { echo "http://";} echo $node->field_model_forum_link['und'][0]['url'];?>" target="_blank" class="discussBtn"><span>View Forum Discussion</span></a>
							<?php
							}
							?>
						</div><!-- w380 -->
							<?php
								if($node->field_review_summary['und'][0]['value']=='')
									{
							?>
						<div class="fright w490">
							<div class="vitalInfo roundAll5">
								<h4 class="TLR5">Vital Information</h4>
								<div class="vitalDescription clearfix">
									<?php
									if($sql_launch_date!='')
										{
									?>
									<div class="launcOn w150 fleft">
										<strong>Launched On</strong><br />
										<?php echo date("F Y",strtotime($sql_launch_date['field_moel_launched_value']));?>
									</div><!-- launch On -->
									<?php
										}
										$res_engineone=mysqli_query($sql_engine);
										$numberofengineone=mysqli_num_rows($res_engineone);
									if($e_id!='')
									{
									?>
									<div class="priceTable">
										<h4><strong>Price</strong></h4>
										<div class="priceTableInner">
											<table>
												<thead>
													<tr>
														<td>Engine</td>
														<td class="city">On Road<br /><span>Delhi</span></td>
													</tr>
												</thead>
												
												<tbody>
													<?php
														//if($numberofengineone>0)
														//{
														//while($data_engineone=mysqli_fetch_array($res_engineone))
														//			{
		$sql_modelengine=@mysqli_query("select field_spec_nr_engine_type_nid from field_data_field_spec_nr_engine_type where entity_id in(".substr($e_id,0,-1).") and bundle ='specifications'");
							while($engine_data=@mysqli_fetch_array($sql_modelengine))
								{
								$engine_title=mysqli_fetch_array(mysqli_query("select title from node where nid=".$engine_data['field_spec_nr_engine_type_nid']));
													?>
												
													<tr>
														<td class="column"><?php echo $engine_title['title'];?></td>
														<td class="price">8.2 - 9.7   Lakh</td>
													</tr>
													<?php
																	//}
														}
													?>
													<!--  <tr>
														<td class="column">2.0 Deisel</td>
														<td class="price">9.6 - 13.5 Lakh</td>
													</tr>
													<tr>
														<td class="column">3.6 Petrol</td>
														<td class="price">5.5 - 9.8   Lakh</td>
													</tr>-->
												</tbody>
											</table>
										</div><!-- price Inner -->
									</div><!-- price table -->
									<?php
											}
									?>
								</div><!-- vital description -->
							</div><!-- vital info -->
							<?php
								//echo $node->field_review_summary['und'][0]['value'];
								//if($node->field_team_bhp_review['und'][0]['value']!='')
								//		{									
							?>
							<div class="clearfix marT20 marB20">
										View the in-depth review of this car by a Team-BHP Moderator: <br />
									<!--  <a href="#" id="overviewmore" title="<?php echo $node->title;?>" class="underline"><?php echo $node->title;?> Review</a>-->
									 <a href="http://www.team-bhp.com/forum/newthread.php?do=Review" id="overviewmore" title="<?php echo $node->title;?>" class="underline"><?php echo $node->title;?> Review</a>
									
							</div>
								
							<?php
										//}	
								//echo $node->field_review_summary['und'][0]['value'];
								if($node->field_team_bhp_review['und'][0]['value']=='')
										{									
							?>
							<div class="reviewInfo clearfix">
									<div class="fleft w340">
										We are still compiling the summary of the ownership reviews&#44; submitted by the owners of this car. 
									</div>

									<div class="aln_right fright marT5">
										<a class="btnRight fright"  href="http://www.team-bhp.com/forum/newthread.php?do=Review" target="_blank">
										<!--  <a class="btnRight fright"  href="<?php echo $node->field_model_review_link['und'][0]['url'];?>" target="_blank">-->
											<span>Submit Your Review</span>
										</a>
									</div>
								</div><!-- review info -->
								<?php
										}
								?>
						</div><!-- w490 -->
						
						<?php
										
							}
							else
							{
							$sql_model_liked=@mysqli_query("SELECT node.title,field_data_field_model_liked.revision_id,field_data_field_model_liked.field_model_liked_value from node,field_data_field_model_liked where field_data_field_model_liked.entity_id=node.nid and node.status=1 and node.type='".$node->type."' and node.nid=".$node->nid);

$sql_model_disliked=@mysqli_query("SELECT node.title,field_data_field_model_disliked.revision_id,field_data_field_model_disliked.field_model_disliked_value from node,field_data_field_model_disliked where field_data_field_model_disliked.entity_id=node.nid and node.status=1 and node.type='".$node->type."' and node.nid=".$node->nid);
				$numoflike=mysqli_num_rows($sql_model_liked);
				$numofdislike=mysqli_num_rows($sql_model_disliked);
							if(($numoflike>0) || ($numofdislike>0))
								{
					?>
								<div class="fright w490">
											<div class="like marL20 w400">
												<?php
													if($numoflike>0)
														{
												?>
												<h3>Owners liked</h3>
												<ul class="marB30">
												<?php
													while($like=mysqli_fetch_array($sql_model_liked))
																{
												?>
													<li><?php echo $like['field_model_liked_value'];?></li>
													<?php
																}
													?>
												</ul>
													<?php
														}
														if($numofdislike>0)
														{
													?>
												<h3>Owners disliked</h3>
												<ul class="dislike">
													<?php
														while($dislike=mysqli_fetch_array($sql_model_disliked))
																{
													?>
													<li><?php echo $dislike['field_model_disliked_value'];?></li>
													<?php
																}
													?>
												</ul>
												<?php
														}
												?>
											</div><!-- like -->
										</div>	
							<?php
									}
							}
							
						?>
					</div><!-- clearfix -->
					
				</div><!-- car over view -->
									<?php
									//	if($node->field_team_bhp_review['und'][0]['value']!='')
										//{
									?>
								<div class="reviewbar marB10 roundAll5 clearfix"><!-- Team BHP Reviews -->
										<div class="Reviewhead clearfix">
												<div class="ReviewRoll">
													<strong>Team BHP Reviews</strong> <span style="display: inline;">are compiled from multiple reviews submitted by actual owners&hellip;
													<a class="underline" id="knowMore" href="#" title="Know more">Know more</a></span>
													
													<a style="display: none;" href="#" class="btnLeft showLess fright marL10">
														<span>Show less</span>
													</a>
												</div>
													
												<div class="aln_right fright marT5">
												
												<!--  <a target="_blank" href="<?php echo $node->field_model_review_link['und'][0]['url'];?>" class="btnRight fright">-->
												<a target="_blank" href="http://www.team-bhp.com/forum/newthread.php?do=Review" class="btnRight fright">														<span>Submit Your Review</span>
													</a>
												</div>	
										</div>
										<div style="display: none;" id="reviewContent">
											<?php
											//echo $node->field_team_bhp_review['und'][0]['value'];
											?>	
											<p>Team-BHP Reviews are the output of several million kms of real-world automotive ownership in
											Indian driving conditions. Actual owners from varied parts of India have provided reviews with
											up to 10 years of owning their cars. We aren't limited to test-driving a car for only 500 - 1000
											kilometers (like most other media), but instead review the entire ownership experience of the car!
											Our reviews are displayed in the most simple format and language possible, in order to provide
											value to the most varied audience.</p>
											
											<p>What you will find here are real-world reviews with real-world ownership comments. The Team-BHP test-drives 
											include all sorts of Indian driving conditions : city driving, highway driving, high-speed bursts, short runabouts,
											over-loading, commercial usage and driving by other family members. Therefore, we cover actual ownership experiences
											which include an overview on repair & servicing costs, resale values and long-term problems. Each review is accompanied 
											by the &rsqduo;smaller yet significant things&lsqduo; section which highlights certain advantages / disadvantages,
											known only by living with the car on a daily basis. The fuel efficiency figures are derived from real-world averages
											which our owners have recorded in Indian driving conditions.</p>
											
											<p>This is relevant to us as potential buyers of a car since our automotive ownership lasts several years and thousands of kilometers.
											We do hope that you find our real-world reviews valuable. Please do write in with any comments.</p>
											
											<p>If you would like to submit a review of your car, please do. Thousands of potential owners would benefit from your contribution. Thanks!</p>
	
										</div>
								</div><!-- Team BHP Reviews -->
									<?php
										//}
									if($node->field_review_summary['und'][0]['value']!='')
									{
								?>
								<div class="clearfix"><!-- main box -->
								<div class="fleft w685">
									<div class="reviewSummery clearfix roundAll5 marB10">
										
										<div id="firstPage">
											<h2>A summary of the ownership reports</h2>
											
											<div><?php
											$summary="";
												if($node->field_review_summary['und'][0]['value']!='')
													{
												$summary.=$node->field_review_summary['und'][0]['value'];
													}
												if($node->field_review_smaller['und'][0]['value']!='')
													{
													$summary.="&hellip;";
													}	
												if($summary!='')
													{
													echo $summary;
													}
												?>
													<?php
													if($node->field_review_smaller['und'][0]['value']!='')
														{
														
													?>
											<a href="#secondPage" id="goToNextPage" class="underline" title="Next Page">Next Page &gt;</a>
											<?php
														}
											?>
											</div>
										</div>	
										
											<div style="display: none;" id="secondPage">
												<h2>The Smaller &amp; Significant Things</h2>
												<ul class="blackBullet">
													<?php
													echo $node->field_review_smaller['und'][0]['value'];
													?>				
												</ul>
											</div>
										
											<div class="clearfix fright">
												<div class="clearfix InnerPagination">
													<!--  <ul class="pagination">
														<li class="first">Page</li>
														<li><a title="go to page 1" class="active" href="#">1</a></li>
														<li><a title="go to page 2" href="#">2</a></li>
														<li><a title="go to page 3" href="#">3</a></li>
													</ul>-->
												</div> 
											</div>
										
									</div><!-- review Summery -->
									
									<div class="clearfix padL20 marB10">
										<a class="btnLeft fleft" href="?q=reviews">
											<span>Back to Index</span>
										</a>
									</div><!-- back to index -->
									
								</div><!-- clearfix-->
								<?php
									if($node->field_review_summary['und'][0]['value']!='')
									{
								$sql_fuel_eficiency=@mysqli_query("SELECT field_data_field_news_model.entity_id, field_data_field_spec_nr_engine_type.field_spec_nr_engine_type_nid, field_data_field_spec_fuel_city.field_spec_fuel_city_value, field_data_field_spec_fuel_highway.field_spec_fuel_highway_value FROM field_data_field_news_model, field_data_field_spec_nr_engine_type, field_data_field_spec_fuel_city, field_data_field_spec_fuel_highway WHERE field_data_field_spec_fuel_highway.entity_id = field_data_field_spec_fuel_city.entity_id
AND field_data_field_spec_nr_engine_type.entity_id = field_data_field_news_model.entity_id AND field_data_field_news_model.bundle = 'specifications' and field_data_field_news_model.entity_id=".$node->nid);
									$numefi=mysqli_num_rows($sql_fuel_eficiency);
									
									

								$res_engine=mysqli_query($sql_engine);
								$numberofengine=mysqli_num_rows($res_engine);									
								?>
								<div class="reviewVitalInfo vitalInfo roundAll5">
								<h4 class="TLR5">Vital Information</h4>
								<div class="pad5">
									<div class="vitalInfoFull">
										<ul class="VitalList">
											<?php
												if($sql_launch_date!='')
													{
											?>
											<li>
												<h3 class="launch">Launched in<br><span><?php echo date("F Y",strtotime($sql_launch_date['field_moel_launched_value']));?></span></h3>
											</li>
											<?php
													}
												if($e_id!='')
													{
												?>
											<li class="clearfix">
												<h3 class="price">Price</h3>
												<div class="priceTable">
													<table>
														<thead>
															<tr>
																<td>Engine</td>
																<td class="city">On Road<br><span>Delhi</span></td>
															</tr>
														</thead>
														
														<tbody>
														<?php
			$sql_modelengine=@mysqli_query("select field_spec_nr_engine_type_nid from field_data_field_spec_nr_engine_type where entity_id in(".substr($e_id,0,-1).") and bundle ='specifications'");
							while($engine_data=@mysqli_fetch_array($sql_modelengine))
								{
								$engine_title=mysqli_fetch_array(mysqli_query("select title from node where nid=".$engine_data['field_spec_nr_engine_type_nid']));
													?>								<tr>
																<td class="column"><?php echo $engine_title['title'];?></td>
																<td class="price">8.2 - 9.7   Lakh</td>
															</tr>
														<?php
																	}
																
														?>
															<!--  <tr>
																<td class="column">2.0 Deisel</td>
																<td class="price">9.6 - 13.5 Lakh</td>
															</tr>
															<tr>
																<td class="column">3.6 Petrol</td>
																<td class="price">5.5 - 9.8   Lakh</td>
															</tr>
															-->
														</tbody>
													</table>
												</div>
											</li>
											<?php
												}
											 $q_fef="select field_data_field_spec_fuel_city.entity_id,field_data_field_spec_fuel_city.field_spec_fuel_city_value,field_data_field_spec_nr_engine_type.field_spec_nr_engine_type_nid,field_data_field_news_model.field_news_model_nid from field_data_field_spec_fuel_city,field_data_field_spec_nr_engine_type,field_data_field_news_model where field_data_field_news_model.entity_id =field_data_field_spec_fuel_city.entity_id and field_data_field_news_model.entity_id =field_data_field_spec_nr_engine_type.entity_id and field_data_field_news_model.bundle='specifications' and field_data_field_news_model.field_news_model_nid=".$node->nid;
											$resfefi=mysqli_query($q_fef);
											$nofef=mysqli_num_rows($resfefi);
												if($nofef>0)
													{
													
											$res_variant=mysqli_query($sql_variant);
											?>
											<li class="clearfix">
												<h3 class="fuel">Fuel Efficiency</h3>
												
												<div class="priceTable">
													<table>
														<thead>
															<tr>
																<td>Variant</td>
																<td class="aln_center">City<br><span>kpl</span></td>
																<td class="city aln_center">Highway<br><span>kpl</span></td>
															</tr>
														</thead>
														
														<tbody>
														<?php
														 //$qry_var=mysqli_fetch_array(mysqli_query("select field_data_field_features_model.field_features_model_nid,field_data_field_features_nr_variant.entity_id,node.title from node,field_data_field_features_nr_variant,field_data_field_features_model where field_data_field_features_model.entity_id =field_data_field_features_nr_variant.entity_id and field_data_field_features_nr_variant.field_features_nr_variant_nid=node.nid and node.status=1 and field_data_field_features_model.field_features_model_nid=".$node->nid));
															while($row_fuel=mysqli_fetch_array($resfefi))
																{
													$sql_highway=mysqli_fetch_array(mysqli_query("select field_spec_fuel_highway_value from field_data_field_spec_fuel_highway where entity_id=".$row_fuel['entity_id']));
													$qry_var=mysqli_fetch_array(mysqli_query("select node.title,field_data_field_variant_nr_engine.field_variant_nr_engine_nid from node,field_data_field_variant_nr_engine where field_data_field_variant_nr_engine.entity_id=node.nid and field_data_field_variant_nr_engine.field_variant_nr_engine_nid=".$row_fuel['field_spec_nr_engine_type_nid']));
													?>
															<tr>
																<td class="column<?php if($qry_var==''){?> aln_center<?php }?>"><?php if($qry_var!=''){ echo $qry_var['title'];} else { echo "---";}?></td>
																<td class="price aln_center"><?php echo $row_fuel['field_spec_fuel_city_value'];?></td>
																<td class="price aln_center"><?php echo $sql_highway['field_spec_fuel_highway_value'];?></td>
															</tr>
															<?php
																}
															?>
															<!--  <tr>
																<td class="column">2.0 Deisel</td>
																<td class="price aln_center">9.6</td>																	
																<td class="price aln_center">13.5</td>
															</tr>
															<tr>
																<td class="column">3.6 Petrol</td>
																<td class="price aln_center">5.5</td>
																<td class="price aln_center">9.8</td>
															</tr>-->
														</tbody>
													</table>
												</div>
												
											</li>
											<?php
												}
												if($node->field_model_upkeep['und'][0]['value']!='')
													{
											?>
											<li>
												<h3 class="upkeepCosts">Upkeep Costs</h3>
													<?php
													echo $node->field_model_upkeep['und'][0]['value'];
													?>
											</li>
												<?php
													}
													if($node->field_model_reliability['und'][0]['value']!='')
													{
													?>
											<li>
												<h3 class="overallReli">Overall Reliability</h3>
													<?php
													echo $node->field_model_reliability['und'][0]['value'];
													?>
											</li>
												<?php
													}
													if($node->field_model_service['und'][0]['value']!='')
													{
													?>
											<li>
												<h3 class="serviceQuality">Service Quality</h3>
													<?php
													echo $node->field_model_service['und'][0]['value'];
													?>
											</li>
												<?php
													}
													if($node->field_model_resale['und'][0]['value']!='')
													{
													?>
											<li class="last">
												<h3 class="resaleValue">Resale Value</h3>
													<?php
													echo $node->field_model_resale['und'][0]['value'];
													?>
											</li>
											<?php
													}
											?>
										</ul>
									</div><!-- vitalInfoFull -->
								</div><!-- pad 10 -->
								</div><!-- Review Vital Info -->
								<?php
									}
								?>
							</div>
							<?php
							}
							?>
			</div><!-- overviewContainer -->
		</div><!-- articles -->
		<div id="altrnativecars" style="display:<?php if($node->field_review_summary['und'][0]['value']!=''){?>block<?php } else {?>none<?php }?>">
		<?php
		include ("includes/compare-review.php");
		include ("includes/reviews-alternatives.php");
		?>
		</div>
</div><!-- Left Column -->
	
	

	
	<div class="clearfix fright roundAll5" id="images/news">
		<?php //include ("includes/cta/find-news.php") ?>
		<?php //include ("includes/cta/most-viewed.php") ?>	
		<?php //include ("includes/cta/add-banner.php") ?>	
	</div>
