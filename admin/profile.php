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



		<!-- body section for admin index -->
		<div class="col-lg-10 adminrightsection">
			<div class="col-lg-4 theme-table">
				<a href="admin.php?id=profile" class="btn btn-success">Reload !</a>
				<h3>User Profile</h3><hr/>
<?php /*Site: show site name */
	$id = Session::get('userId');
	
    $query = "SELECT * FROM tb_user WHERE id='$id'";
    $profile = $db->select($query);
    if($profile){
       $result = $profile->fetch_assoc(); 
?>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input name="name" type="name" class="form-control" id="exampleInputEmail1" value="<?php echo $result['username']; ?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input name="name" type="name" class="form-control" id="exampleInputEmail1" value="<?php echo $result['email']; ?>" readonly>
				  </div>
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Address</label>
				    <textarea name="address" name="address" class="form-control" rows="6" readonly><?php echo $result['address']; ?></textarea>
				    <br>
				  </div>
<?php } ?>				
			</div>



			<div class="col-lg-4 theme-table">

<?php 
	if(isset($_GET['action'])){ 
		$action = $_GET['action'];
?>

<?php if($action == 'update'){ ?>
				<a href="admin.php?id=profile&action=update" class="btn btn-default">Update Profile</a>
				<a href="admin.php?id=profile&action=change" class="btn btn-success">Change Password</a>

				<h3>Update Profile</h3><hr/>
<?php /*Site: show site name */
	$id = Session::get('userId');
	
    $query = "SELECT * FROM tb_user WHERE id='$id'";
    $profile = $db->select($query);
    if($profile){
       $result = $profile->fetch_assoc(); 
?>
				<form action="updateprofile.php" method="POST">
					<input name="userid" type="hidden" value="<?php echo $result['id']; ?>">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input name="username" type="name" class="form-control" value="<?php echo $result['username']; ?>" id="exampleInputEmail1" resquired >
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input name="email" type="email" class="form-control" value="<?php echo $result['email']; ?>" id="exampleInputEmail1" resquired>
				  </div>
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Address</label>
				    <textarea name="address" name="address" class="form-control" rows="6" resquired><?php echo $result['address']; ?></textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update Profile</button>
				</form>
<?php } ?>
				<br/>

<?php }elseif($action == 'change'){ ?>
				<a href="admin.php?id=profile&action=update" class="btn btn-success">Update Profile</a>
				<a href="admin.php?id=profile&action=change" class="btn btn-default">Change Password</a>

				<h3>Change Password</h3><hr/>

				<form action="changepassword.php" method="POST">
					<input name="userid" type="hidden" value="<?php echo Session::get('userId'); ?>" >
				  <div class="form-group">
				    <label for="exampleInputEmail1">New Password</label>
				    <input name="newpassword" type="password" class="form-control" id="exampleInputEmail1" placeholder="New Password" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Confirm Password</label>
				    <input name="confirmpassword" type="password" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Old Password</label>
				    <input name="oldpassword" type="password" class="form-control" id="exampleInputEmail1" placeholder="Old Password" required>
				  </div>

				  <button type="submit" class="btn btn-success">Change Password</button>
				</form>
				<br/>
<?php }  }else{ ?>
				<a href="admin.php?id=profile&action=update" class="btn btn-success">Update Profile</a>
				<a href="admin.php?id=profile&action=change" class="btn btn-success">Change Password</a>
<?php } ?>





			</div>


		</div>


	</div><!-- /row -->

