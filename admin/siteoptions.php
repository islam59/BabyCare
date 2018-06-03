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
			
		if($action == 'display'){
		    $value = $_GET['value']; 

		    $querydisplay = "UPDATE tb_site SET status='$value' WHERE id = '$roleid'";	
		    $updated_rows = $db->update($querydisplay);
		    if($updated_rows){		        	
		        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
		    }
		}elseif($action == 'displaygoal'){
		    $value = $_GET['value']; 

		    $querydisplay = "UPDATE tb_about SET status='$value' WHERE id = '$roleid'";	
		    $updated_rows = $db->update($querydisplay);
		    if($updated_rows){		        	
		        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
		    }
		}
	}     	
?>

		<!-- body section for admin index -->
		<div class="col-lg-10 col-md-10 col-sm-10 adminrightsection">
<!--
/* 
/* Admin Block: About site.. 
/*
-->
			<div class="col-lg-4 col-md-4 col-sm-12 adminrightsection-box">
				<h4>About Site</h4><hr/>
<?php /*Site: About Site */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $about = $db->select($query);
    if($about){
       $resultabout = $about->fetch_assoc(); 
?>
				<form role="form" action="updatesite.php?id=siteoptions&action=about&roleid=<?php echo $resultabout['id']; ?>" method="post">
				  <br/><br/>
				  <div class="form-group">
				  	<label>Site Title</label></br/>
				    <input type="text" name="title" class="form-control" id="subjectEmail1" value="<?php echo $resultabout['title']; ?>" required>
				    <br>
				  </div>

				  <div class="form-group">
				  	<label>Site Name</label></br/>
				    <input type="text" name="name" class="form-control" id="subjectEmail1" value="<?php echo $resultabout['name']; ?>" required>
				    <br>
				  </div>

				  <div class="form-group">
				  	<label>Address</label></br/>
				    <textarea name="address" class="form-control" rows="6" required><?php echo $resultabout['address']; ?></textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
<?php } ?>
			</div>
<!--
/* 
/* Admin Block: Wellcome Status
/*
-->
			<div class="col-lg-5 col-md-5 col-sm-12 adminrightsection-box">
				<h4>Wellcome Status</h4><hr/>
<?php /*Site: Wellcome status */
    $query = "SELECT * FROM tb_wellcome WHERE id=1";
    $status = $db->select($query);
    if($status){
       $resultstatus = $status->fetch_assoc(); 
?>
				<form role="form" action="updatewelcome.php?id=siteoptions&action=welcome&roleid=<?php echo $resultabout['id']; ?>" method="post" enctype="multipart/form-data">
				  <img class="img-responsive" src="assets/img/<?php echo $resultstatus['image']; ?>" alt="no-image" style="height:150px; width:400px;"><br/>  

				  <input type="hidden" name="del_img" value="<?php echo $resultstatus['logo']; ?>">
				  <div class="form-group">
				    <input type="file" name="image" value="<?php echo $resultstatus['logo']; ?>" >
				    <br>
				  </div>

				  <div class="form-group">
				  	<label>Notes</label></br/>
				    <textarea name="note" class="form-control" rows="6" ><?php echo $resultstatus['note']; ?>"</textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
<?php } ?>
			</div>
<!--
/* 
/* Admin Block: Social admin control !
/*
-->
		
			<div class="col-lg-2 col-md-2 col-sm-12 adminrightsection-box">
					<h4>Social Progress</h4><hr/>
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_social";
    $site = $db->select($query);
    if($site){
       while($result = $site->fetch_assoc()){
       	echo "<span style='color:black; border-bottom:2px solid #1ABC9C; display:block;'>".$result['name']."</span>"; 
       	echo "<span style='color:black;'>".$result['link']."</span>"; echo "<br/>";echo "<br/>";
?>
<center>
<?php if($result['status']==1){ ?>
					<a href="admin.php?id=siteoptions&social=display&value=0&sid=<?php echo $result['id']; ?>" class="btn btn-default" style="font-size:8px;">Hide</a>
<?php }else{  ?>
					<a href="admin.php?id=siteoptions&social=display&value=1&sid=<?php echo $result['id']; ?>" class="btn btn-success" style="font-size:8px;">Show</a>
<?php }  ?>
<a href="admin.php?id=siteoptions&social=edit&sid=<?php echo $result['id']; ?>" class="btn btn-warning" style="font-size:8px;">Update</a>
<a href="admin.php?id=siteoptions&social=remove&sid=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to Delete !');" class="btn btn-danger" style="font-size:8px;">Remove</a>
</center>
<Br/><Br/><Br/>
<?php } ?>

<?php 
       } 
?>
<?php 
	if(isset($_GET['social'])){
		$social = $_GET['social'];  
		$sid = $_GET['sid']; 
			
		if($social == 'display'){
		    $value = $_GET['value']; 

		    $querydisplay = "UPDATE tb_social SET status='$value' WHERE id = '$sid'";	
		    $updated_rows = $db->update($querydisplay);
		    if($updated_rows){		        	
		        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
		    }
		}elseif($social == 'remove'){

		        $delquery = "DELETE FROM tb_social WHERE id ='$sid'";
		        $delData = $db->delete($delquery);
		     	if($delData){
		     		echo "<script>alert('Link Deleted Successfully.!');</script>";
		     		echo "<script>window.location='admin.php?id=siteoptions'; </script>";
		     	}else{
		     		echo "<script>alert('Link Not Deleted.!');</script>";
		     		echo "<script>window.location='admin.php?id=siteoptions'; </script>";
		     	}
		}elseif($social == 'edit'){		     
?>
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_social WHERE id='$sid'";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
?>
				<form role="form" action="updatesocial.php" method="post">
				  <input type="text" name="sid" value="<?php echo $result['id']; ?>" required>
				  <h4>Update Social</h4><hr/>
				  <div class="form-group">
				    <input type="text" name="name" class="form-control" id="subjectEmail1" value="<?php echo $result['name']; ?>" required>
				  </div>
				  <div class="form-group">
				    <input type="text" name="link" class="form-control" id="subjectEmail1" value="<?php echo $result['link']; ?>" required>
				  </div>
				  <button type="submit" class="btn btn-success" style="font-size:8px;">Update Social</button>
				  <a type="submit" href="admin.php?id=siteoptions" class="btn btn-danger" style="font-size:8px;">Cancel</a>
				</form> 
<?php } ?>
<?php } }else{ ?>
				<form role="form" action="addsocial.php" method="post">
				  <h4>Add New</h4><hr/>
				  <div class="form-group">
				    <input type="text" name="name" class="form-control" id="subjectEmail1" placeholder="Social Name" required>
				  </div>
				  <div class="form-group">
				    <input type="text" name="link" class="form-control" id="subjectEmail1" placeholder="Social Link" required>
				  </div>
				  <button type="submit" class="btn btn-success" style="font-size:8px;">Add New</button>
				</form> 
<?php 	}  	?>

			</div>


<!--
/* 
/* Admin Block: Wellcome Status
/*
-->
<hr/>
			<div class="col-lg-9 col-md-9 col-sm-12 adminrightsection-box">
<?php /*Site: Wellcome status */
    $query = "SELECT * FROM tb_about WHERE id=1";
    $status = $db->select($query);
    if($status){
       $resultstatus = $status->fetch_assoc(); 
?>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<h4>Goals 1</h4><hr/>
				<form role="form" action="updategoal.php?col=one" method="post">					
				  <div class="form-group">
				    <textarea name="goal" class="form-control" rows="10" ><?php echo $resultstatus['goalone']; ?>"</textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<h4>Goals 2</h4><hr/>
				<form role="form" action="updategoal.php?col=two" method="post">					
				  <div class="form-group">
				    <textarea name="goal" class="form-control" rows="10" ><?php echo $resultstatus['goaltwo']; ?>"</textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<h4>Goals 3</h4><hr/>
				<form role="form" action="updategoal.php?col=three" method="post">					
				  <div class="form-group">
				    <textarea name="goal" class="form-control" rows="10" ><?php echo $resultstatus['goalthree']; ?>"</textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<h4>Goals 4</h4><hr/>
				<form role="form" action="updategoal.php?col=four" method="post">					
				  <div class="form-group">
				    <textarea name="goal" class="form-control" rows="10" ><?php echo $resultstatus['goalfour']; ?>"</textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button>
				</form> 
			</div>
<?php } ?>
			</div>
<!--
/* 
/* Admin Block: Site Published !
/*
-->
			<div class="col-lg-2 col-md-2 col-sm-12 adminrightsection-box">
				<center>
					<h4>Site Status</h4><hr/>
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 

?>
<?php if($result['status']==1){ ?>
					<a href="admin.php?id=siteoptions&action=display&value=1&roleid=<?php echo $result['id']; ?>" class="btn btn-default">Show</a>
					<a href="admin.php?id=siteoptions&action=display&value=0&roleid=<?php echo $result['id']; ?>" class="btn btn-success">Hide</a>
<?php }else{  ?>
					<a href="admin.php?id=siteoptions&action=display&value=1&roleid=<?php echo $result['id']; ?>" class="btn btn-success">Show</a>
					<a href="admin.php?id=siteoptions&action=display&value=0&roleid=<?php echo $result['id']; ?>" class="btn btn-default">Hide</a>
<?php }  ?>
<?php } ?>
				</center>
			</div>
<!--
/* 
/* Admin Block: Goal Published !
/*
-->
			<div class="col-lg-2 col-md-2 col-sm-12 adminrightsection-box">
				<center>
					<h4>Goal/Thinking/Progress</h4><hr/>
<?php /*Site: show site name */
    $query = "SELECT * FROM tb_about WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 

?>
<?php if($result['status']==1){ ?>
					<a href="admin.php?id=siteoptions&action=displaygoal&value=1&roleid=<?php echo $result['id']; ?>" class="btn btn-default">Show</a>
					<a href="admin.php?id=siteoptions&action=displaygoal&value=0&roleid=<?php echo $result['id']; ?>" class="btn btn-success">Hide</a>
<?php }else{  ?>
					<a href="admin.php?id=siteoptions&action=displaygoal&value=1&roleid=<?php echo $result['id']; ?>" class="btn btn-success">Show</a>
					<a href="admin.php?id=siteoptions&action=displaygoal&value=0&roleid=<?php echo $result['id']; ?>" class="btn btn-default">Hide</a>
<?php }  ?>
<?php } ?>
				</center>
			</div>			
		</div>
	</div><!-- /row -->

