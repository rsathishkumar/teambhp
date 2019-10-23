<div class="compareBox active">
<div class="campareBar">
<h3><?php if($_POST['catname']!='%') {echo $_POST['catname']; } else { echo "All";}?></h3>
</div>
</div>
<div class="tab_container BLR5 marB10">								
<div style="display: block;" class="tab_content">
<ul class="newslist" id="threadlist">
<?php
//function to format date in 'xx days ago'
function returnDate($querydate){ 

$minusdate = date('ymdHi') - date("ymdHi", $querydate);

if($minusdate > 88697640 && $minusdate < 100000000){ 
    $minusdate = $minusdate - 88697640; 
} 

    switch ($minusdate) { 

        case ($minusdate < 99): 
                    if($minusdate == 1){ 
                        $date_string = '1 minute ago'; 
                    } 
                    elseif($minusdate > 59){ 
                        $date_string =  ($minusdate - 40).' minutes ago'; 
                    } 
                    elseif($minusdate > 1 && $minusdate < 59){ 
                        $date_string = $minusdate.' minutes ago'; 
                    } 
        break; 

        case ($minusdate > 99 && $minusdate < 2359): 
                    $flr = floor($minusdate * .01); 
                    if($flr == 1 || $flr == 0){ 
                        $date_string = '1 hour ago'; 
                    } 
                    else{ 
                        $date_string =  $flr.' hours ago'; 
                    } 
        break; 
        
        case ($minusdate > 2359 && $minusdate < 310000): 
                    $flr = floor($minusdate * .0001); 
                    if($flr == 1 || $flr == 0){ 
                        $date_string = '1 day ago'; 
                    } 
                    else{ 
                        $date_string =  $flr.' days ago'; 
                    } 
        break; 
        
        case ($minusdate > 310001 && $minusdate < 12320000): 
                    $flr = floor($minusdate * .000001); 
                    if($flr == 1 || $flr == 0){ 
                        $date_string = "1 month ago"; 
                    } 
                    else{ 
                        $date_string =  $flr.' months ago'; 
                    } 
        break; 
        
        case ($minusdate > 100000000): 
                $flr = floor($minusdate * .00000001); 
                if($flr == 1 || $flr == 0){ 
                        $date_string = '1 year ago.'; 
                } 
                else{ 
                        $date_string = $flr.' years ago'; 
                } 
        } 
    return $date_string; 
}
include_once("connect.php");
$toshow = 10;
if(isset($_REQUEST['catname']) && ($_REQUEST['catname']!='%') && ($_REQUEST['catname']!='All'))
	{
  $q = "SELECT node.title, node.changed,node.created, node.nid, field_data_field_ht_summary.field_ht_summary_value,field_data_field_ht_forum.field_ht_forum_url, field_data_field_ht_threads.field_ht_threads_value, file_managed.uri,field_data_field_ht_author.field_ht_author_value as author FROM node, file_managed, field_data_field_ht_summary,field_data_field_ht_forum,field_data_field_ht_threads, field_data_field_ht_image,field_data_field_ht_author WHERE field_data_field_ht_threads.entity_id = node.nid AND file_managed.fid = field_data_field_ht_image.field_ht_image_fid AND node.status =1 AND field_data_field_ht_author.entity_id=field_data_field_ht_forum.entity_id AND field_data_field_ht_threads.field_ht_threads_value like '%".$_REQUEST['catname']."%' AND field_data_field_ht_image.entity_id = node.nid AND field_data_field_ht_summary.entity_id = field_data_field_ht_threads.entity_id AND field_data_field_ht_author.entity_id=field_data_field_ht_threads.entity_id group by node.nid ORDER BY node.changed DESC";
	}
else
	{
 $q = "SELECT node.title,node.changed,node.nid,node.created,field_data_field_ht_forum.field_ht_forum_url,field_data_field_ht_summary.field_ht_summary_value,field_data_field_ht_threads.field_ht_threads_value, file_managed.uri,field_data_field_ht_author.field_ht_author_value as author
FROM node, file_managed,field_data_field_ht_summary,field_data_field_ht_forum, field_data_field_ht_threads, field_data_field_ht_image,field_data_field_ht_author
WHERE field_data_field_ht_threads.entity_id = node.nid
AND file_managed.fid = field_data_field_ht_image.field_ht_image_fid
AND node.status =1 AND field_data_field_ht_image.entity_id = node.nid AND field_data_field_ht_author.entity_id=field_data_field_ht_forum.entity_id AND field_data_field_ht_summary.entity_id = field_data_field_ht_threads.entity_id and node.status=1  and field_data_field_ht_author.entity_id=field_data_field_ht_threads.entity_id 
group by node.nid ORDER BY node.changed DESC";
	}
if(isset($_REQUEST['i']))
{
$start = $_REQUEST['i'];
}
else
{
$start = 0;
}

$total_res = @mysqli_query($q) or die(mysql_error());
$total_rows=@mysqli_num_rows($total_res);
$q .= " limit ".$start.", ".$toshow;
$thread_res = @mysqli_query($q) or die(mysql_error());
if($total_rows>0)
{
while($d_thread=@mysqli_fetch_array($thread_res))
{
$restofind=@strstr($d_thread['field_ht_forum_url'],"http://");
//$url_res = @mysqli_fetch_array(mysqli_query("select alias from url_alias where source='node/".$d_thread['nid']."'"));
$url = $url_res['alias'];
?>
<li>
<div class="clearfix listHolder">
<div class="fleft w170">
<a class="holderImg" title="<?php echo htmlspecialchars($d_thread['title'], ENT_QUOTES);?>" href="<?php if($restofind=='') { echo "http://";} echo $d_thread['field_ht_forum_url'];?>" target="_blank" onclick=" return updatethreadcounter('<?php if($restofind=='') { echo "http://";} echo $d_thread['field_ht_forum_url'];?>','<?php echo $d_thread['nid'];?>');">
<strong>
<!--<img width="165" height="123" alt="<?php echo htmlentities(strip_tags(html_entity_decode($d_thread['title'])));?>" src="sites/default/files/<?php echo str_replace("public://","",$d_thread['uri']);?>">-->
<img alt="<?php echo htmlentities(strip_tags(html_entity_decode($d_thread['title'])));?>" src="http://www.team-bhp.com/?q=sites/default/files/styles/check_medium_medium/public/<?php echo str_replace("public://","",$d_thread['uri']);?>">
</strong>
</a>
</div><!-- News thum holder -->
<div class="fright w460 ShortNews">
<h2><a  title="<?php echo htmlspecialchars($d_thread['title'], ENT_QUOTES);?>" href="<?php if($restofind=='') { echo "http://";} echo $d_thread['field_ht_forum_url'];?>"  target="_blank" onclick="return updatethreadcounter('<?php if($restofind=='') { echo "http://";} echo $d_thread['field_ht_forum_url'];?>','<?php echo $d_thread['nid'];?>');"><?php echo htmlspecialchars($d_thread['title']);?></a></h2>
<div class="postDate">Posted <?php //echo returnDate($d_thread['created']); ?> by: <?php echo $d_thread['author']; ?></div>
<div class="past_shornote">
<?php 

															if(strlen($d_thread['field_ht_summary_value'])>195)
															{
															$finddot=@strpos($d_thread['field_ht_summary_value'],".",195);
															$findspcetostop=@strpos($d_thread['field_ht_summary_value']," ",195);
															if(intval($finddot)<intval($findspcetostop) && intval($finddot)>1)
																{
																$pos=$finddot;
																}
															else
																{
																$pos=$findspcetostop;
																}
																$pos=$pos+1;
															 }
															if($pos>1)
															{
																$desc = trim(substr($d_thread['field_ht_summary_value'],0 , $pos));
															}
															else
															{
																$desc = $d_thread['field_ht_summary_value'];
															}
															if(strlen($d_thread['field_ht_summary_value'])>200)
															{
															//trim($desc.="<a href='".url('node/'.$d_advice['nid'])."'>"."&hellip;"."</a>");
															
															$ex_url='';
															if($restofind=='') 
																{ 
																 $ex_url.="http://";
																}
																$ex_url.=$d_thread['field_ht_forum_url'];
															//trim($desc.="<a href='".$ex_url."'>"."&hellip;"."</a>");
															}
															if(strlen($d_thread['field_ht_summary_value'])>200)
																{
																 echo trim($desc."&hellip;");
																?>
															<!-- <a href="<?php echo $ex_url ;?>" target="_blank" onclick="return updatethreadcounter('<?php echo $ex_url; ?>','<?php echo $d_thread['nid'];?>');"></a> -->
															<?php
														//	echo $desc;
																}
																else
																{
																echo $desc;
																}
?>

</div>
</div><!-- w460 -->
</div><!-- List holder  -->
</li><!-- news list -->
<?php 
}
}
else
{
?>
<li>
<?php
echo "No thread found" ;
?>
</li><!-- news list -->
<?php
}
?>
</div>
</div><!-- tab content -->

<?php
if($total_rows>$toshow)
{
?>
<div class="clearfix marT10">
	<div class="clearfix w100p">
	<?php
	if($start<$toshow)
	{
	?>
		<a class="btnLeft fleft btnLeftDisabled" href="#" onclick="return false;">
	<?php
	}
	else
	{
		$q = 'i='.($start-$toshow);
		if(isset($_REQUEST['catname']))
			{
				$q .= '&catname='.$_REQUEST['catname'];
			}
		
		
	?>
		<a class="btnLeft fleft" href="<?php echo $q; ?>" onclick="nav_hotthreads(this); return false;">
	<?php
	}
	?>
			<span>Newer</span>
		</a>
		
		<ul class="pagination">
			<!--<li class="first disable"><a title="go to previews 10 results" href="#">É</a></li>-->
			<?php
				$j=1;
				/*if($total_rows<=20)
					{
						$t = $total_rows;
					}
				else
					{
						$t = 20;
					}*/
				$t = $total_rows;
			for($i=0; $i<$total_rows; $i=$i+$toshow)
				{
				if($i==$start)
					{
						$c = "class=\"active\"";
					}
				else if(($start==0) && ($j==1))
					{
						$c = "class=\"active\"";
					}
				else
					{
						$c = "";
					}
					$q = 'i='.$i;
				if(isset($_REQUEST['catname']) && ($_REQUEST['catname']!='%') && ($_REQUEST['catname']!='All'))
				{
					$q .= '&catname='.$_REQUEST['catname'];
				}
			else
				{
					$q .= '&catname=%';
				}
					
			?>
				<li><a title="go to page <?php echo $j; ?>"<?php echo $c; ?> href="<?php echo $q; ?>" onclick="<?php if($c=="") { ?>nav_hotthreads(this); <?php } ?>return false;"><?php echo $j; ?></a></li>
			<?php
			$j++;
				}
$next = $start+$toshow;
			?>
			<!--<li class="first"><a title="go to next 10 results" href="#">É</a></li>-->
		</ul>
		<?php
		if($start<($t-$toshow))
		{
		$q = 'i='.($start+$toshow);
		if(isset($_REQUEST['catname']) && ($_REQUEST['catname']!='%') && ($_REQUEST['catname']!='All'))
			{
				$q .= '&catname='.$_REQUEST['catname'];
			}
		else
			{
				$q .= '&catname=%';
			}
		
		?>
		<a class="btnRight fright rPos" href="<?php echo $q; ?>" onclick="nav_hotthreads(this); return false;">
		<?php
		
		}
		else
		{
		?>
		<a class="btnRight fright btnRightDisabled" href="#" onclick="return false;">
		<?php
		//echo "here ".$t-$toshow;
		}
		?>
			<span>Older</span>
		</a>
	</div>
</div>
<?php
}
?>