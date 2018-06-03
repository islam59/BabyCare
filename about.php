<!--Header: site header with title, description & meta content-->
<?php include 'inc/header.php'; ?>

<!--MENU: navigation bar-->
<?php include 'inc/menu.php'; ?>

<!--  Welcome Section -->
<?php include 'inc/welcomesectionpage.php'; ?>
	
	
<!-- Information Section OF ABOUT US PAGE -->
<?php /*ABOUT US: SITE ABOUT US ALL DATA SHOW */
    $query = "SELECT * FROM tb_about WHERE id=1 AND status=1";
    $about = $db->select($query);
    if($about){
       $result = $about->fetch_assoc(); 
?>	
	<div class="container pt">
		<div class="row mt centered">
			<div class="col-lg-3">
				<span class="glyphicon glyphicon-book"></span>
				<p><?php echo $result['goalone']; ?></p>
			</div>
			
			<div class="col-lg-3">
				<span class="glyphicon glyphicon-user"></span>
				<p><?php echo $result['goaltwo']; ?></p>
			</div>

			<div class="col-lg-3">
				<span class="glyphicon glyphicon-fire"></span>
				<p><?php echo $result['goalthree']; ?></p>
			</div>

			<div class="col-lg-3">
				<span class="glyphicon glyphicon-globe"></span>
				<p><?php echo $result['goalfour']; ?></p>
			</div>
		</div><!-- /row -->
		


		<div class="row mt">
			<div class="col-lg-6">
				<h4>THE THINKING</h4>
				<p><?php echo $result['thinking']; ?></p>
			</div><!-- /colg-lg-6 -->
			


			<div class="col-lg-6">
				<h4>OUR SUCCESS</h4>
				Babycare
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result['progressbabycare']; ?>%;">
						<span class="sr-only"><?php echo $result['progressbabycare']; ?>% Complete</span>
					</div>
				</div>

				Decrease of Infant
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result['progressinfant']; ?>%;">
						<span class="sr-only"><?php echo $result['progressinfant']; ?> %Complete</span>
					</div>
				</div>
				
				Nutritious Food for Baby
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result['progressfood']; ?>%;">
						<span class="sr-only"><?php echo $result['progressfood']; ?>% Complete</span>
					</div>
				</div>

			</div><!-- /col-lg-6 -->
		</div><!-- /row -->
	</div><!-- /container -->
<?php } ?>
<!--Footer: footer navigation & social link -->
<?php include 'inc/footer.php'; ?>