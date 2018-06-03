	
	<!-- Footer Section -->
	
	<div id="footer" class="animated infinite fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s"> >
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h4>Address</h4>
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
?>
					<p>
					<?php echo $result['address']; ?>
					</p>
<?php } ?>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-3">
					<h4>Pages</h4>
					<p>
						<a href="about.php">About Us</a><br/>
						<a href="contact.php">Contact Us</a><br/>
						<a href="blog.php">Blogs</a>
					</p>
				</div><!-- /col-lg-4 -->

				<div class="col-lg-3">
					<h4>Social Links</h4>
					<p>
<?php /*Menu: show php code */
    $query = "SELECT * FROM tb_social WHERE status=1";
    $menu = $db->select($query);
    if($menu){
        while($result = $menu->fetch_assoc()) {
?>
						<a href="http://<?php echo $result['link']; ?>" target="_blank"><?php echo $result['name']; ?></a><br/>
<?php } } ?>
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-3">
					<h4>About Babycare</h4>
					<p>Babycare online service for every 1 month to 5 years normal & special childrens. <a href="about.php">Details</a></p>
				</div><!-- /col-lg-4 -->
			
			</div>
		
		</div>
	</div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script> 
  </body>
</html>
