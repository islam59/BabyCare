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
			<div class="col-lg-4 adminrightsection-box">
				<h4>About Admin Panel</h4><hr/>
				<p style="font-size:12px; color:black; text-align:justify; ">					
					<em><b># Dashboard:</b></em> Mentioning the Home Page of Admin Panel.<br/>
					<em><b># Profile:</b></em> View Edit & Update the admin information.<br/>
					<em><b># Theme:</b></em> Control menu to change website theme.<br/>
					<em><b># Inbox:</b></em> User to admin and admin to user Communication.<br/>
					<em><b># Site Option:</b></em> Site information, social link and site settings.<br/>
					<em><b># Menu:</b></em> Control Site Menu Options (Show or Hide/Edit/Delete).<br/>
					<em><b># Post:</b></em> Control Site Post Options (Show or Hide/Edit/Delete).<br/>
				</p>
			</div>

			<div class="col-lg-3 adminrightsection-box">
				<h4>Total Page</h4><hr/>

				<p id="shiva"><span class="count">
				<?php 
				    $query = "SELECT * FROM tb_menu";
				    $msg  = $db->select($query);
				    if($msg){
				        $count = mysqli_num_rows($msg);
				        echo $count;
				    }else{
				        echo " 0 ";
				    }
				?>
				</span></p>
			</div>
			<div class="col-lg-3 adminrightsection-box">
				<h4>Total Post</h4><hr/>

				<p id="shiva"><span class="count">
				<?php 
				    $query = "SELECT * FROM tb_post";
				    $msg  = $db->select($query);
				    if($msg){
				        $count = mysqli_num_rows($msg);
				        echo $count;
				    }else{
				        echo " 0 ";
				    }
				?>
				</span></p>
			</div>
		</div>

		<div class="col-lg-10 adminrightsection">
			<div class="col-lg-6 adminrightsection-box">
				<h4>Site Thingking</h4><hr/>
<?php /*Thinking: show site name */	
    $query = "SELECT * FROM tb_about WHERE id='1'";
    $profile = $db->select($query);
    if($profile){
       $result = $profile->fetch_assoc(); 
?>
				<form action="updatethink.php" method="POST">				  
				  <div class="form-group">
				    <textarea name="thinking" class="form-control" rows="6" resquired><?php echo $result['thinking']; ?></textarea>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button> 
				</form>
<?php } ?>

			</div>
			<div class="col-lg-4 adminrightsection-box">
				<h4>Site Descriptions</h4><hr/>
<?php /*Description: show site name */	
    $query = "SELECT * FROM tb_site";
    $description = $db->select($query);
    if($description){
       $result = $description->fetch_assoc(); 
?>
				<form action="updatedes.php" method="POST">				  
				  <div class="form-group">
				    <textarea name="description" class="form-control" rows="6" resquired><?php echo $result['description']; ?></textarea>
				  </div>
				  <button type="submit" class="btn btn-success">Update</button> 
				</form>
<?php } ?>
			</div>
		</div>
	</div><!-- /row -->

