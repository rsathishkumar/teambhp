<?php
$descArray = explode('&lt;!--pagebreak--&gt;', $node->field_advice_content['und'][0]['safe_value']);
?>
<script type="text/javascript">
function redirectbycat(catname)
	{
	window.location='http://www.team-bhp.com/?q=advice&catname='+catname;
	}
	<?php
		if(sizeof($descArray)==1)
			{
	?>
(function (jQuery) {
	jQuery(function(){
var oldImgSrc, oldImgHeight, oldImgWidth, imgSrc;
	 		jQuery(".zoomSingleImg").hover(
			  function () {
					$("#hoverimg").attr('src', jQuery(this).attr("src"));
					jQuery(this).css("overflow","visible");
					$("#hoverimg").addClass("zoomImg");
					$("#loadimg").css("display","none");
					$("#hoverimg").css("display","inline");
				}, 
			  function () {
					$("#hoverimg").attr('src', $("#manimage").val());
					$("#hoverimg").css("overflow","hidden");
					$("#hoverimg").removeClass("zoomImg");
					$("#hoverimg").css("display","none");
					$("#loadimg").css("display","inline");
				}
			);
				/*jQuery(".desc").find("img").hover(
				  function () {
						jQuery(".zoomSingleImg").css("overflow","visible");
						$("#hoverimg").attr('src', jQuery(this).attr("src"));
						$("#hoverimg").addClass("zoomImg");
						$("#loadimg").css("display","none");
						$("#hoverimg").css("display","inline");
				  }, 
				  function () {
						$("#hoverimg").css("overflow","hidden");
						$("#hoverimg").removeClass("zoomImg");
						$("#hoverimg").css("display","none");
						$("#loadimg").css("display","inline");
					}
				);*/
		jQuery(".desc").find("img").removeAttr("height");
		jQuery(".desc").find("img").removeAttr("width");
		jQuery(".desc").find("img").css("width", "35%");
		jQuery(".desc").find("img").css("position", "relative");
		jQuery(".desc").find("img").css("z-index", "10");
		jQuery(".desc").find("img").hover(
		  function(){
		  	$(this).css("width", "100%");
		  },
		  function(){
		  	$(this).css("width", "35%");
		});
		/*jQuery(".desc").find("img").hover(
		  function () {
				jQuery(this).css("overflow","visible");
				$("#hoverimg").addClass("zoomImg");
				$("#loadimg").css("display","none");
				$("#hoverimg").css("display","inline");
			  }, 
		  function () {
				$("#hoverimg").css("overflow","hidden");
				$("#hoverimg").removeClass("zoomImg");
				$("#hoverimg").css("display","none");
				$("#loadimg").css("display","inline");
			});*/
		});
	})(jQuery);
		<?php
			}
		?>
</script>
						<div class="article">
							<h1 class="padL20 marB10">Advice</h1>
							
							<ul class="tab TLR5 clearfix">
								<li><a href="#" class="TLR5<?php if($node->field_advice_categories['und'][0]['value']=='All'){?> active<?php }?>" title="All" onclick="javascript:redirectbycat('All');return false;">All</a></li>
								<li><a href="#" class="TLR5<?php if($node->field_advice_categories['und'][0]['value']=='On Buying'){?> active<?php }?>" title="On Buying" onclick="javascript:redirectbycat('<?php echo urldecode('On Buying');?>');return false;">On Buying </a></li>
								<li><a href="#" class="TLR5<?php if($node->field_advice_categories['und'][0]['value']=='On Owning'){?> active<?php }?>" title="On Selling" onclick="javascript:redirectbycat('<?php echo urldecode('On Owning');?>');return false;">On Owning</a></li>
								<li><a href="#" class="TLR5<?php if($node->field_advice_categories['und'][0]['value']=='On Modifying'){?> active<?php }?>" title="On Modifying" onclick="javascript:redirectbycat('<?php echo urldecode('On Modifying');?>');return false;">On Modifying</a></li>
								<li><a href="#" class="TLR5<?php if($node->field_advice_categories['und'][0]['value']=='Miscellany'){?> active<?php }?>" title="Miscellany" onclick="javascript:redirectbycat('<?php echo urldecode('Miscellany');?>');return false;">Miscellany</a></li>								
							</ul>
							
							<div class="tab_container BLR5 marB10">
								<div id="tab2" class="tab_content"  style="display:block">
									<div class="news_details clearfix">
										<div class="clearfix marB20">
											<div class="fleft w460">
												<h1><?php echo $node->title;?></h1>
											</div><!-- fleft -->
											<?php include ("includes/common/share.php") ?>
										</div><!--clearfix -->
										
											<?php
											//include ("includes/common/inner-pagination.php");
											//$descArray = explode('<!--pagebreak-->', $node->field_advice_content['und'][0]['safe_value']);
											if(count($descArray)>1)
											{
											$node->field_advice_content['und'][0]['safe_value']=explode('&lt;!--pagebreak--&gt;', $node->field_advice_content['und'][0]['safe_value']);
											
											?>
										<div class="clearfix">
											<div class="fright">
											<script type="text/javascript">
											(function (jQuery) {
												
											jQuery(function(){
													jQuery('.next').click(function(){
														jQuery('.desc').css('display', 'none');
														jQuery(jQuery(this).attr('href')).css('display', 'block');
														jQuery('ul.pagination li a').removeClass('active');
														jQuery('ul.pagination li a[href="'+jQuery(this).attr('href')+'"]').addClass('active');
														jQuery('html, body').animate({scrollTop: jQuery("h1.padL20").offset().top-10}, 300);
														return false;
													});
													jQuery('ul.pagination li a').click(function(){
														jQuery('.desc').css('display', 'none');
														jQuery('ul.pagination li a').removeClass('active');
														jQuery('ul.pagination li a[href="'+jQuery(this).attr('href')+'"]').addClass('active');
														jQuery('html, body').animate({scrollTop: jQuery("h1.padL20").offset().top-10}, 300);
														jQuery(jQuery(this).attr('href')).css('display', 'block');
														return false;
													});
													
													var oldImgSrc, oldImgHeight, oldImgWidth, imgSrc;
													jQuery(".zoomSingleImg").hover(
													  function () {
														/*oldImgSrc = jQuery(this).find("img").attr("src");
														oldImgHeight = jQuery(this).find("img").attr("height");
														oldImgWidth = jQuery(this).find("img").attr("width");
														imgSrc = jQuery(this).find("img").attr("src");*/
														jQuery(this).css("overflow","visible");
														//jQuery(this).find("img").addClass("zoomImg");
														$("#hoverimg").addClass("zoomImg");
														$("#loadimg").css("display","none");
														$("#hoverimg").css("display","inline");
														//jQuery(this).find("img").removeAttr("width");
														//jQuery(this).find("img").removeAttr("height");
														//imgSrc=imgSrc.replace("check_tech_stuff", "check_tech_stuff_hover");
														//jQuery(this).find("img").attr("src", imgSrc);
														/*jQuery(this).find("img").attr("height", 480);
														jQuery(this).find("img").attr("width", 640);*/
												  }, 
												  function () {
														$("#hoverimg").css("overflow","hidden");
														//jQuery(this).find("img").removeClass("zoomImg");
														$("#hoverimg").removeClass("zoomImg");
														/*imgSrc=imgSrc.replace("check_tech_stuff_hover", "check_tech_stuff");
														jQuery(this).find("img").attr("src", oldImgSrc);*/
														/*jQuery(this).find("img").attr("height", 161);
														jQuery(this).find("img").attr("width", 215);*/
														$("#hoverimg").css("display","none");
														$("#loadimg").css("display","inline");
														
														
												  }
												);
												});
											})(jQuery);
											</script>
											<div class="clearfix InnerPagination">
												<ul class="pagination">
													<li class="first">Page</li>
													<?php
													for($i=0; $i<count($descArray); $i++)
													{
													?>
													<li><a title="go to page <?php echo $i+1; ?>"<?php if($i==0) {?> class="active"<?php } ?> href="#p<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
											</div><!-- fright -->
										</div>
											<?php
											}
											?>
										
										<div class="full_news marT10">
											<?php
											if($node->field_advice_media_type['und'][0]['value']=='Image')
													{
											?>
											<div class="fleft newPhotoGallery marB10 clearfix">
												<div class="photogalleryHolder marB10 clearfix">
												
												<div class="mainPhoto zoomSingleImg">
														<strong>
														<img id="loadimg" src="http://www.team-bhp.com/?q=sites/default/files/styles/check_tech_stuff/public/<?php echo str_replace("public://","",$node->field_advice_images['und'][0]['uri']);?>" rel="<?php echo str_replace("public://","",$node->field_advice_images['und'][0]['uri']);?>" class="zoomLt" alt="<?php echo $node->title;?>" style="display:inline"  />
														</strong>
														<img id="hoverimg" src="http://www.team-bhp.com/?q=sites/default/files/styles/check_tech_stuff_hover/public/<?php echo str_replace("public://","",$node->field_advice_images['und'][0]['uri']);?>" rel="<?php echo str_replace("public://","",$node->field_advice_images['und'][0]['uri']);?>" class="zoomLt" alt="<?php echo $node->title;?>" style="display:none" />
														<a href="#" title="<?php echo $node->title;?>" class="zoomIt">&nbsp;</a>
													</div>
													
												
												</div><!-- photo gallery Holder -->
												<?php
												if($node->field_advice_forum['und'][0]['url']!='')
													{
												?>
												<a href="<?php echo $node->field_advice_forum['und'][0]['url'];?>" target="_blank" class="discussBtn"><span>View Forum Discussion</span></a>
												<?php
													}
												?>
											</div><!-- new photo galler -->
												<?php
													}
													else
													{
														if(strpos($node->field_advice_video['und'][0]['url'], "youtu.be/")>1)
												  	    {
														$uVid = substr($node->field_advice_video['und'][0]['url'], 16);
														}
														else
														{
														$strfinded="&feature=related";
														$replaced_videosource=@str_replace($strfinded,"", $node->field_advice_video['und'][0]['url']);
														$explodedsource=@explode("=",$replaced_videosource);
														if(strpos($explodedsource[1], '&feature')>0)
															{
															$uVid = substr($explodedsource[1], 0, strpos($explodedsource[1], '&feature'));
															}
														else
															{
															$uVid = $explodedsource[1];
															}
														}
											  ?>
												<div class="aln_center marB20 marT20">
																<object width="428" height="256" id="youtubeVideo">
																<param name="movie" value="http://www.youtube.com/v/<?php echo $uVid;?>&hl=en_US&feature=player_embedded&version=3"></param>
																<embed src="http://www.youtube.com/v/<?php echo $uVid;?>&hl=en_US&feature=player_embedded&version=3"
																type="application/x-shockwave-flash" width="428" height="256" wmode="opaque">
																</embed>
																</object>
													</div>	 
													<?php
													}
													?>
											
											<div class="descripptionFlow">
												<?php
												if(count($descArray)>1)
												{
												
													for($i=0; $i<count($descArray); $i++)
														{
														//echo "";
														?>
															<div class="desc" id="p<?php echo $i; ?>"<?php if($i>0) { ?> style="display:none;"<?php } ?>>
														<?php
															//echo $descArray[$i];
															/*$search = array('&amp;l', '&lt;','>','<','!--smart_paging_filter_done---','!--smart_paging_filter_done--p','&gt;');
															$replace = array('','','','','','','');*/
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("&lt;!--pagebreak--&gt;","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															//$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("&lt;!--pagebreak--&gt;","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("&gt;","",$node->field_advice_content['und'][0]['safe_value'][$i]);
														    $node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("&lt;","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("<div>","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("</div>","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace("<p></p>","",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace('<em class="placeholder">!--</em>start--',"<strong class='reviewQuotes'><span class='openingQuotes'>&ldquo;</span>",$node->field_advice_content['und'][0]['safe_value'][$i]);
															$node->field_advice_content['und'][0]['safe_value'][$i]=str_replace('<em class="placeholder">!--</em>end--',"<span class='closingQuots'>&rdquo;</span></strong>",$node->field_advice_content['und'][0]['safe_value'][$i]);
																if($i!=0)
																{
																echo "<p>";
																}
															
															print $node->field_advice_content['und'][0]['safe_value'][$i];
															if($i!=0)
																{
																echo "</p>";
																}
															if($i<count($descArray)-1)
															{
															?>
															<a title="Next Page" href="#p<?php echo $i+1; ?>" class="next">Next Page ></a>
															<?php
															}
														?>
															</div>
														<?php
														}
												}
												else
												{
												?>
													<div class="desc">
												<?php
													echo $node->field_advice_content['und'][0]['safe_value'];
												?>
													</div>
												<?php
												}
												?>
											</div><!-- description flow -->
											
													<div class="fright ">
														<?php
														//include ("includes/common/inner-pagination.php");
														if(count($descArray)>1)
														{
														?>
															<div class="clearfix InnerPagination">
																<ul class="pagination">
																	<li class="first">Page</li>
																	<?php
																	for($i=0; $i<count($descArray); $i++)
																	{
																	?>
																	<li><a title="go to page <?php echo $i+1; ?>"<?php if($i==0) {?> class="active"<?php } ?> href="#p<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
																	<?php
																	}
																	?>
																</ul>
															</div>
														<?php
														}
														?>
													</div>
											
											<div class="clearfix">&nbsp;</div>
											
										</div><!-- full news -->
										
										
									</div><!-- news deatils -->
								</div>
							</div><!-- tab content -->
								
							<?php 
							include ("includes/common/navigate-articles.php"); ?>
							
							<?php include ("includes/realated-articles.php"); ?>
							
						</div><!-- article -->
