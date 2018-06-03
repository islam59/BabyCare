	<!-- Welcome Section -->
	<div id="ww">
	    <div class="container">
			<div class="row">
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_wellcome WHERE id=1 AND status=1";
    $welcome = $db->select($query);
    if($welcome){
       $result = $welcome->fetch_assoc(); 
?>
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="assets/img/<?php echo $result['image']; ?>" alt="Stanley">
					<h1>About BabyCare</h1>
					<p><?php echo $result['note']; ?></p>					
				
				</div><!-- /col-lg-8 -->
<?php } ?>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->