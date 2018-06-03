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

			<div class="col-lg-7">
				<h3>Unread Message</h3><hr/>
					<table class="table table-bordered" style="width:100%;">
						<tr class="success">
							<th style="width:5%; background:#1ABC9C;">#SL</th>
							<th style="width:15%; background:#1ABC9C;">From</th>
							<th style="width:20%; background:#1ABC9C;">Subject</th>
							<th style="width:35%; background:#1ABC9C;">Body</th>
							<th style="width:25%; background:#1ABC9C;">Action</th>
						</tr>
					</table>
				<div class="scrol-table" style="height:315px; width:100%; overflow:scroll">
					<table class="table-bordered" style="width:100%;">
	                <?php /*Theme: show Theme code */
	                	$query = "SELECT * FROM tb_inbox WHERE status=1 ORDER BY id DESC";
	                    $theme = $db->select($query);
	                    if($theme){
							$i = 1;
	                        while($result = $theme->fetch_assoc()) {	 
	                ?>	
						<tr>
							<td style="width:5%;">#<?php echo $i; ?></td>
							<td style="width:15%;"><?php echo $result['name']; ?><br/><em><?php echo $result['email']; ?></em></td>
							<td style="width:20%;"><?php echo $result['subject']; ?></td>
							<td style="width:35%;"><?php echo $fm->textShorten($result['message'],50);?><br/><?php echo "<em style='color:red; font-size:10px;'>".$result['date']."</em>"; ?></td>
							<td style="width:25%;">			
								<a href="admin.php?id=inbox&action=read&msgid=<?php echo $result['id']; ?>" type="button" class="btn btn-success">Read</a>							
								<a href="admin.php?id=inbox&action=read&msgid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Mark as Read!</a>							
							</td>
						</tr>
					<?php $i++; } }else{ echo "<p style='color:#024;text-align:center;'>No New Message</p>";} ?>
					</table>
				</div>
			</div>


<?php 	if(!isset($_GET['action'])){ ?>
			<div class="col-lg-3"> <!--Send Message-->
				<h3>Send Message</h3><hr/>
				<form role="form" name="register" action="register.php" method="post">
				  <div class="form-group">
				  	<br/>
				    <input type="text" name="username" class="form-control" id="subjectEmail1" placeholder="Reciptionist Email" required>
				  </div>
				  <div class="form-group">
				    <input type="text" name="email" class="form-control" id="subjectEmail1" placeholder="Subject" required>
				  </div>
				  <div class="form-group">
				    <textarea name="address" name="address" class="form-control" rows="9" placeholder="Enter your message" required></textarea>
				  </div>
				  <button type="submit" class="btn btn-success">Send Message</button>
				  <a href="admin.php?id=inbox" class="btn btn-danger">Cancel</a>
				</form>
			</div>
<?php 
	}else{
		    $action = $_GET['action'];  
		    $msgid = $_GET['msgid']; 

			if($action == 'delete'){ 

		        $delquery = "DELETE FROM tb_inbox WHERE id ='$msgid'";
		        $delData = $db->delete($delquery);
		     	if($delData){
		     		echo "<script>alert('Message Deleted Successfully.!');</script>";
		     		echo "<script>window.location='admin.php?id=inbox'; </script>";
		     	}else{
		     		echo "<script>alert('Message Not Deleted.!');</script>";
		     		echo "<script>window.location='admin.php?id=inbox'; </script>";
		     	}

		    }elseif($action == 'read'){

		    	$querydisplay = "UPDATE tb_inbox SET status='0' WHERE id = '$msgid'";	
		    	$updated_rows = $db->update($querydisplay);
		        
?>
		
		<div class="col-lg-4"> <!--Replay Message-->
			
				<h3>Read Message</h3><hr/>
				<div class="scrol-table" style="height:400px; width:100%; overflow:scroll">
	            <?php /*Theme: show Theme code */
	                $query = "SELECT * FROM tb_inbox WHERE id='$msgid'";
	                $theme = $db->select($query);
	                if($theme){
	                    $result = $theme->fetch_assoc();	 
	            ?>	
					<p id="recent-post">
					<strong id="titlename">From:<?php echo $result['name']; ?></strong><br/>
					<strong id="titlename">Email: <?php echo $result['email']; ?></strong><br/>
						<?php echo $fm->textShorten($result['message'],50);?><br/>
						<?php echo "<em style='color:red; font-size:10px;'>".$result['date']."</em>"; ?>							
						<br/>
						<?php 
							if($result['replay'] != ""){
								echo "Replay:<br/>".$result['replay']; 		
							}
						?>
						
					</p>
				<form role="form" name="register" action="replay.php" method="post">
					<input type="hidden" name="replayid" value="<?php echo $result['id']; ?> ">
				  <div class="form-group">
				    <textarea name="replay" class="form-control" rows="3" placeholder="Replay Message" required></textarea>
				  </div>
				  <button type="submit" class="btn btn-success">Replay Message</button>
				  <a href="admin.php?id=inbox" class="btn btn-danger">Cancel</a>
				</form>
				<?php } ?>
			</div>
		</div>

<?php 

		    }
		}
?>



			<div class="col-lg-11 adminrightsection">
				<hr/>
				<h3>Inbox</h3><hr/>
				<br/><br/>
				<div class="col-lg-12 col-md-12 col-sm-12 menu-posts">
					<table class="table table-bordered" style="width:100%;">
						<tr class="success">
							<th style="width:5%; background:#1ABC9C;">#SL</th>
							<th style="width:15%; background:#1ABC9C;">From</th>
							<th style="width:20%; background:#1ABC9C;">Subject</th>
							<th style="width:35%; background:#1ABC9C;">Body</th>
							<th style="width:25%; background:#1ABC9C;">Action</th>
						</tr>
					</table>
					<div class="scrol-table" style="height:800px; width:100%; overflow:scroll">
					<table class="table table-bordered" style="width:100%;">
	                <?php /*Theme: show Theme code */
	                	$query = "SELECT * FROM tb_inbox WHERE status=0 ORDER BY id DESC";
	                    $theme = $db->select($query);
	                    if($theme){
							$i = 1;
	                        while($result = $theme->fetch_assoc()) {	 
	                ?>	
						<tr class="">
							<td>#<?php echo $i; ?></td>
							<td><?php echo $result['name']; ?><br/><em><?php echo $result['email']; ?></em></td>
							<td><?php echo $result['subject']; ?></td>
							<td><?php echo $fm->textShorten($result['message'],50);?><br/><?php echo "<em style='color:red; font-size:10px;'>".$result['date']."</em>"; ?></td>
							<td>
							<?php if($result['status'] == 0){ ?>
								<a href="admin.php?id=inbox&action=read&msgid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Read</a>
							<?php } ?>
								<a href="admin.php?id=inbox&action=read&msgid=<?php echo $result['id']; ?>" type="button" class="btn btn-success">Replay</a>
								<a href="admin.php?id=inbox&action=delete&msgid=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to Delete !');" type="button" class="btn btn-danger">Delete</a>	
							</td>
						</tr>
					<?php $i++; } } ?>
					</table>
				   </div>
				</div>
			</div>

		</div>

	</div><!-- /row -->

