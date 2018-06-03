<!--content section for admin-->

	<div class="row">
		<div class="col-lg-2 adminleftmenu">
		    <!-- Static navbar -->
		    <div class="navbar navbar-inverse navbar-static-top" >
		        <div class="navbar-collapse collapse" style="min-height:480px;">
		          <ul class="nav navbar-nav navbar-left">
		              <li><a href="admin.php?id=index">Dashboard</a></li><br/>
		              <li><a href="admin.php?id=profile">Profile</a></li><br/>    
		              <li><a href="admin.php?id=theme">Theme</a></li><br/>
		              <li><a href="admin.php?id=inbox">Inbox(
						<?php 
						    $query = "SELECT * FROM tb_inbox WHERE status=1";
						    $msg  = $db->select($query);
						    if($msg){
						        $count = mysqli_num_rows($msg);
						        echo $count;
						    }else{
						        echo " 0 ";
						    }
						?>
		              	)</a></li><br/>
		              <li><a href="admin.php?id=siteoptions">Site Options</a></li><br/>              
		              <li><a href="admin.php?id=pagerole">Menus</a></li><br/>                     
		              <li><a href="admin.php?id=posts">Posts</a></li><br/>              
		                        
		          </ul>
		        </div><!--/.nav-collapse -->
		    </div>
		</div>

<?php 
	if(isset($_GET['setid'])){
		    $setid = $_GET['setid']; 

	    	$queryreset = "UPDATE tb_theme SET status='0' WHERE status = '1' ";
	        $updated_rows = $db->update($queryreset);
	    	$queryset = "UPDATE tb_theme SET status = '1' WHERE id ='$setid'";
	        $updated_rows = $db->update($queryset);

	        if($updated_rows){
	        	echo "<script>alert('Theme Set Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=theme'; </script>";
	        }
	}

?>

		<!-- body section for admin index -->
		<div class="col-lg-10 adminrightsection">
			<div class="col-lg-11 theme-table">
				<table class="table table-bordered" style="width:100%;">

				
					<tr class="success">
						<th>Theme Name</th>
						<th>Theme Example</th>
						<th>Action</th>
					</tr>
                <?php /*Theme: show Theme code */
                    $query = "SELECT * FROM tb_theme";
                    $theme = $db->select($query);
                    if($theme){
                        while($result = $theme->fetch_assoc()) {
                ?>	
					<tr class="">
						<td><?php echo $result['name']; ?></td>
						<td><img src="assets/img/theme/<?php echo $result['image']; ?>" alt="no-image" class="img-thumbnail"></td>
						<td>
						<?php if($result['status'] == 1){ ?>
							<a type="button" class="btn btn-default">Default Theme</a>
						<?php }else{ ?>
							<a type="button" href="admin.php?id=theme&setid=<?php echo $result['id']; ?>" class="btn btn-success">Set This Theme</a>
						<?php }	?>
							
						</td>
					</tr>
				<?php } } ?>
				</table>
			</div>

		</div>


	</div><!-- /row -->

