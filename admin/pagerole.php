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
	if(isset($_GET['action'])){
		    $action = $_GET['action'];  
		    $roleid = $_GET['roleid']; 

			if($action == 'delete'){
		        $image = $_GET['image'];  

		        $delquery = "DELETE FROM tb_menu WHERE id ='$roleid'";
		        $delData = $db->delete($delquery);
		     	if($delData){
		     		unlink("assets/img/portfolio/".$image);
		     		echo "<script>alert('Menu Deleted Successfully.!');</script>";
		     		echo "<script>window.location='admin.php?id=pagerole'; </script>";
		     	}else{
		     		echo "<script>alert('Menu Not Deleted.!');</script>";
		     		echo "<script>window.location='admin.php?id=pagerole'; </script>";
		     	}

		    }elseif($action == 'display'){
		    	$value = $_GET['value']; 
		    	if($value == 1){
		    		$value = 0; 
		    	}elseif($value==0){
		    		$value = 1; 
		    	}

		    	$querydisplay = "UPDATE tb_menu SET status='$value' WHERE id = '$roleid'";	
		    	$updated_rows = $db->update($querydisplay);

		        if($updated_rows){		        	
		        	echo "<script>window.location='admin.php?id=pagerole'; </script>";
		        }
		    }elseif($action == 'edit'){ 
		    	echo $roleid;
		    	echo $action;     			    	
?>

<?php /*Site: show site name */
    $query = "SELECT * FROM tb_menu WHERE id='$roleid'";
    $menu = $db->select($query);
    if($site){
       $result = $menu->fetch_assoc(); 
?>
			<div class="col-lg-3 theme-table">
				<h3>Thumbnail</h3><hr/>
				<img src="assets/img/portfolio/<?php echo $result['image']; ?>" alt="no-image" class="img-thumbnail" style="width:400px; height:300px;">
			</div>

			<div class="col-lg-3 theme-table">
				<h3>Update Page</h3><hr/>
				<form action="updatemenu.php" method="POST" enctype="multipart/form-data">
				  <input name="roleid" type="text" value="<?php echo $result['id']; ?>">
				  <input name="del_img" type="text" value="<?php echo $result['image']; ?>">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Page Name</label>
				    <input name="name" type="name" class="form-control" id="exampleInputEmail1" value="<?php echo $result['name']; ?>">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputFile">Thumbnail Picture</label>
				    <input name="image" type="file" id="exampleInputFile" value="<?php echo $result['image']; ?>">
				    <p style="color:red;" class="help-block">400x300; JPG, JPEG, PNG format.</p>
				  </div>
				  <button type="submit" class="btn btn-success">Update Page</button>
				</form>
			</div>
<?php } //select for update close! ?>

<?php  } } ?>

		<!-- body section for admin index -->
		<div class="col-lg-10 adminrightsection">
			<div class="col-lg-8 theme-table">
				<h3>Page Role</h3><hr/>
				<table class="table-bordered" style="width:100%;">
					<tr class="success">
						<th>#SL</th>
						<th>Page Name</th>
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
                <?php /*Theme: show Theme code */
                    $query = "SELECT * FROM tb_menu";
                    $theme = $db->select($query);
                    if($theme){
						$i = 1;
                        while($result = $theme->fetch_assoc()) {	 
                ?>	
					<tr class="">
						<td>#<?php echo $i; ?></td>
						<td><?php echo $result['name']; ?></td>
						<td><img src="assets/img/portfolio/<?php echo $result['image']; ?>" alt="no-image" class="img-thumbnail" style="width:100px; height:60px;"></td>
						<td>
						<?php if($result['status'] == 1){ ?>
							<a href="admin.php?id=pagerole&action=display&value=<?php echo $result['status']; ?>&roleid=<?php echo $result['id']; ?>" type="button" class="btn btn-success">Hide</a>
							<a href="admin.php?id=pagerole&action=edit&roleid=<?php echo $result['id']; ?>" type="button" class="btn btn-warning">Edit</a>
							<a onclick="return confirm('Are you sure to Delete !');" href="admin.php?id=pagerole&action=delete&roleid=<?php echo $result['id']; ?>&image=<?php echo $result['image']; ?>" type="button" class="btn btn-danger">Delete</a>
						<?php }else{ ?>
							<a href="admin.php?id=pagerole&action=display&value=<?php echo $result['status']; ?>&roleid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Show</a>
							<a href="admin.php?id=pagerole&action=edit&roleid=<?php echo $result['id']; ?>" type="button" class="btn btn-warning">Edit</a>
							<a onclick="return confirm('Are you sure to Delete !');" href="admin.php?id=pagerole&action=delete&roleid=<?php echo $result['id']; ?>&image=<?php echo $result['image']; ?>" type="button" class="btn btn-danger">Delete</a>
						<?php }	?>
							
						</td>
					</tr>
				<?php $i++; } } ?>
				</table>
			</div>



			<div class="col-lg-3 theme-table">
				<h3>Add New Page</h3><hr/>
				<form action="addmenu.php" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Page Name</label>
				    <input name="name" type="name" class="form-control" id="exampleInputEmail1" placeholder="Page Name">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputFile">Thumbnail Picture</label>
				    <input name="image" type="file" id="exampleInputFile">
				    <p style="color:red;" class="help-block">400x300; JPG, JPEG, PNG format.</p>
				  </div>

				  <button type="submit" class="btn btn-success">Save Page</button>
				</form>
				<br/>
			</div>
		</div>
	</div><!-- /row -->

