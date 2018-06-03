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
		    $userid = $_GET['userid']; 

			if($action == 'delete'){		        
		        $delquery = "DELETE FROM tb_user WHERE id ='$userid'";
		        $delData = $db->delete($delquery);
		     	if($delData){
		     		echo "<script>alert('User Deleted Successfully.!');</script>";
		     		echo "<script>window.location='admin.php?id=users'; </script>";
		     	}else{
		     		echo "<script>alert('User Not Deleted.!');</script>";
		     		echo "<script>window.location='admin.php?id=users'; </script>";
		     	}

		    }elseif($action == 'display'){
		    	$value = $_GET['value']; 
		    	if($value == 'Show'){
		    		$value = 1; 
		    	}elseif($value== 'Hide'){
		    		$value = 0; 
		    	}

		    	$querydisplay = "UPDATE tb_user SET status='$value' WHERE id = '$userid'";	
		    	$updated_rows = $db->update($querydisplay);

		        if($updated_rows){		        	
		        	echo "<script>window.location='admin.php?id=users'; </script>";
		        }
		    }elseif($action == 'type'){ 
		    	$userrole = $_GET['userrole'];

		    	$querydisplay = "UPDATE tb_user SET type='$userrole' WHERE id = '$userid'";	
		    	$updated_rows = $db->update($querydisplay);

		        if($updated_rows){		        	
		        	echo "<script>window.location='admin.php?id=users'; </script>";
		        }  		
		    }
		}	    	
?>

		<!-- body section for admin index -->
		<div class="col-lg-10 adminrightsection">

			<div class="col-lg-6 theme-table">
				<h3>User List</h3><hr/>
				<table class="table-bordered" style="width:100%;">
					<tr class="success">
						<th>#SL</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Options</th>
					</tr>
                <?php /*Theme: show Theme code */
                    $query = "SELECT * FROM tb_user WHERE type='User'";
                    $theme = $db->select($query);
                    if($theme){
						$i = 1;
                        while($result = $theme->fetch_assoc()) {	 
                ?>	
					<tr class="">
						<td>#<?php echo $i; ?></td>
						<td><?php echo $result['username']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td>
						<?php if($result['status'] == 1){ ?>
							<a href="admin.php?id=users&action=display&value=Show&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-primary">Show</a> 
							<a href="admin.php?id=users&action=display&value=Hide&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Hide</a>
						<?php }else{ ?>
							<a href="admin.php?id=users&action=display&value=Show&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Show</a>
							<a href="admin.php?id=users&action=display&value=Hide&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-warning">Hide</a>
						<?php }	?>&nbsp &nbsp 
							<a href="admin.php?id=users&action=type&userrole=Admin&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-info">Add to Admin</a> 
							<a href="admin.php?id=users&action=delete&userid=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to Delete !');"  type="button" class="btn btn-danger">Remove</a>
							
						</td>
					</tr>
				<?php $i++; } } ?>
				</table>
			</div>

			<div class="col-lg-4 theme-table">
				<h3>Admins</h3><hr/>
				<table class="table " style="width:100%;">
                <?php /*Theme: show Theme code */
                    $query = "SELECT * FROM tb_user WHERE type!='User'";
                    $theme = $db->select($query);
                    if($theme){
                        while($result = $theme->fetch_assoc()) {	 
                ?>	
					<tr class="">
						<td><?php echo $result['username']; ?></td>
						<td><?php echo $result['type']; ?></td>
						<td><a href="admin.php?id=users&action=type&userrole=User&userid=<?php echo $result['id']; ?>" type="button" class="btn btn-danger">Remove from Admin</a></td>
					</tr>
				<?php $i++; } } ?>
				</table>
			</div>

		</div>


	</div><!-- /row -->

