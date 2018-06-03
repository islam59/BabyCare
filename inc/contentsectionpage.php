	<!-- Projects Section -->

<?php 
	if(!isset($_GET['id'])){
		Header('Location:index.php'); 
	}else{	
		$id = $_GET['id']; 
	} 
?>

	<div class="container pt">
		<div class="row mt centered">	

<?php /*Site: show page name with post */
    $query = "SELECT * FROM tb_menu WHERE id='$id' AND status=1";
    $posthead = $db->select($query);
    if($posthead){

    	$count = "SELECT * FROM tb_post WHERE menuid='$id' AND status=1"; //check query for post ammount
    	$rowcount = $db->select($count); //db selection for post ammount
    	if($rowcount){ $result = $posthead->fetch_assoc(); }else{ Header('Location:index.php'); } // action for lake of post
        
?>	
			<h3>
				<?php echo $result['name']; ?>
				<img class="" src="assets/img/sublogo.jpg" alt="sl" style="margin:0px 10px;"/>
<?php 
	if(isset($_GET['postid'])){
		$postid = $_GET['postid'];
		$querypost = "SELECT * FROM tb_post WHERE menuid='$id' AND id='$postid' AND status=1";
	}else{
		$querypost = "SELECT * FROM tb_post WHERE menuid='$id' AND status=1";
	}
	
    $post = $db->select($querypost);
    if($post){
       $resultpost = $post->fetch_assoc();
       echo $resultpost['title']; 
?>

<?php }//end of post query ?>
<?php }//end of page query ?>
			</h3><hr/>


			<div class="col-lg-2">
<?php /*Menu: show php code */
	$postid = $resultpost['id']; 
    $querysubmenu = "SELECT * FROM tb_post WHERE menuid = '$id' AND status=1";
    $submenu = $db->select($querysubmenu);
    if($submenu){
        while($resultsubmenu = $submenu->fetch_assoc()) {
?>
			<p><a class="green <?php echo $currentclass; ?>" href="page.php?id=<?php echo $id; ?>&postid=<?php echo $resultsubmenu['id']; ?>"><?php echo $resultsubmenu['title']; ?></a></p>
<?php } } ?>
			</div>


			<div class="col-lg-10">	
				<div class="row">
					<div class="centered">

<?php //post fetch 
	if(isset($_GET['postid'])){
		$postid = $_GET['postid'];
		$querypost = "SELECT * FROM tb_post WHERE menuid='$id' AND id='$postid' AND status=1";
	}else{
		$querypost = "SELECT * FROM tb_post WHERE menuid='$id' AND status=1 LIMIT 1";
	}
	
    $post = $db->select($querypost);
    if($post){
       $resultpost = $post->fetch_assoc();
?>
						<p style="text-align:justify; padding:5px;">
							<?php 
								$body = $resultpost['body'];
								$image = "<br/><img class='img-responsive' src='assets/img/portfolio/".$resultpost['image']."'alt='no-image' style='margin:5px auto;'><br/>"; 
								echo str_ireplace("//image",$image,$body);
							?>
							
						</p>
<?php } ?>
					</div>
				</div>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->



 

