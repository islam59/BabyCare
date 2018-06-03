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
<?php
	if(isset($_GET['find'])){ 
		$find = $_GET['find']; 
	}else{
		$find = ""; 
	}

	if(isset($_GET['action'])){
		$action = $_GET['action'];  
		$postid = $_GET['postid']; 

		if($action == 'delete'){
		    $image = $_GET['image'];  

		    $delquery = "DELETE FROM tb_post WHERE id ='$postid'";
		    $delData = $db->delete($delquery);
		    if($delData){
		    	if($_GET['image']){
		    		unlink("assets/img/portfolio/".$_GET['image']);	
		    	}
		     	echo "<script>alert('Post Deleted Successfully.!');</script>";
		     	echo "<script>window.location='admin.php?id=posts'; </script>";

		    }else{
		     	echo "<script>alert('Post Not Deleted.!');</script>";
		     	echo "<script>window.location='admin.php?id=posts'; </script>";
		    }

		    }elseif($action == 'display'){
		    	$value = $_GET['value']; 
		    	if($value == 1){
		    		$value = 0; 
		    	}elseif($value==0){
		    		$value = 1; 
		    	}
		    	$querydisplay = "UPDATE tb_post SET status='$value' WHERE id = '$postid'";	
		    	$updated_rows = $db->update($querydisplay);
		        if($updated_rows){		        	
		        	echo "<script>window.location='admin.php?id=posts'; </script>";
		        }

		    }elseif($action == 'edit'){
?>
			<div class="col-lg-6">
				<h3>Update Post</h3><hr/>	
                <?php //<!--page selection php code-->
                    $query = "SELECT * FROM tb_post WHERE id='$postid'";
                    $post = $db->select($query);
                    if($post){
                      $result = $post->fetch_assoc(); 
                ?>

				<form role="form" action="editpost.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="postid" value="<?php echo $postid; ?>">
					<input type="hidden" name="del_img" value="<?php echo $result['image']; ?>">
				  <div class="form-group">
				    <select class="form-control" name="menuid" required>
		                <?php //<!--page selection php code-->
		                    $querymenu = "SELECT * FROM tb_menu WHERE status='1'";
		                    $postmenu = $db->select($querymenu);
		                    if($postmenu){
		                      while($resultmenu = $postmenu->fetch_assoc()){ 
		                ?>
					  <option value="<?php echo $resultmenu['id']; ?>" <?php if($resultmenu['id'] == $result['menuid']){ echo "selected"; }?>><?php echo $resultmenu['name']; ?></option>
					  <?php } }  ?>
					</select>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="title" class="form-control" id="subjectEmail1" value="<?php echo $result['title'];?>" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <textarea name="post" class="form-control" rows="8" placeholder="Enter Post" required><?php echo $result['body']; ?></textarea>
				    <em style="color:red">N.B. Type "//image" to mention the image</em>
				  </div>
				  <br/>
				  <div class="form-group">
				  	<img src="assets/img/portfolio/<?php echo $result['image']; ?>" alt="no-image" style="width:400px; height:300px;"><br/>
				    <label for="exampleInputFile">Change Image</label>
				    <input name="image" type="file" id="exampleInputFile" value="<?php echo $result['image']; ?>">				    
				  </div>	
				  	<br/>	  
				  <div class="form-group">
				    <textarea name="tags" class="form-control" rows="1" required>Tags: <?php echo $result['tags']; ?></textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Update Post</button>
				</form> 
				<?php } ?>
			</div>

<?php   }else{  ?>

<?php }	}else{ ?>
			<div class="col-lg-6">
				<h3>Add New Post</h3><hr/>				
				<form role="form" action="addpost.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <select class="form-control" name="menuid" required>
					  <option>Select Page Role</option>
                <?php //<!--page selection php code-->
                    $query = "SELECT * FROM tb_menu WHERE status=1";
                    $menu = $db->select($query);
                    if($menu){
                        while($result = $menu->fetch_assoc()) {
                ?>
					  <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
				<?php } } ?>				
					</select>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="title" class="form-control" id="subjectEmail1" placeholder="Post Title" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <textarea name="post" class="form-control" rows="8" placeholder="Enter Post" required></textarea>
				    <em style="color:red">N.B. Type "//image" to mention the image</em>
				  </div>
				  <br/>
				  <div class="form-group">
				    <label for="exampleInputFile">Upload Post's Image</label>
				    <input name="image" type="file" id="exampleInputFile" value="<?php echo $result['image']; ?>">				    
				  </div>	
				  	<br/>	  
				  <div class="form-group">
				    <textarea name="tags" class="form-control" rows="1" placeholder="Tags" required></textarea>
				    <br>
				  </div>
				  <button type="submit" class="btn btn-success">Save Post</button>
				</form> 
			</div>
<?php 	}  ?>

			<div class="col-lg-3">
				<h3>Recent Post</h3><hr/>
				<marquee bgcolor="#d7d7d7" scrollamount="5" direction="up" loop="true" style=" height:520px;">
		        <?php //<!--page selection php code-->
		            $querystates = "SELECT * FROM tb_post WHERE status='1'  ORDER BY id DESC";
		            $states = $db->select($querystates);
		            if($states){
		               while($resultstates = $states->fetch_assoc()){ 
		                ?>
						<p id="recent-post">
							<strong id="titlename"><?php echo $resultstates['title']; ?></strong><br/>
							<b>Page Name: sdl;f alskfjsdl kfjsldkf jslkdfjkjsdfl kj<br/>
								<em>-1st January 2014</em>
							</b>
						</p>
				<?php }} ?>
				</marquee>
			</div>

			<div class="col-lg-10 adminrightsection">
				<hr/>
				<h3>Post List</h3><hr/>
				<div class="col-lg-8 col-md-8 col-sm-12 menu-posts">
					<a class="<?php if($find==""){ echo "btn btn-success"; }else{ echo "btn btn-default"; } ?>" href="admin.php?id=posts&find=" role="button">All Page</a>
                
                <?php /*Menu: show php code */	
					$query = "SELECT * FROM tb_menu WHERE status=1";
                    $menu = $db->select($query);
                    if($menu){
                        while($result = $menu->fetch_assoc()) {
                ?>
					<a class="<?php if($find==$result['id']){echo 'btn btn-success'; }else{ echo 'btn btn-default'; }?>" href="admin.php?id=posts&find=<?php echo $result['id']; ?>" role="button"><?php echo $result['name']; ?></a>
				<?php } } ?>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 menu-posts">
					<form class="form-inline">
					  <div class="form-group">
					    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Search Keywords">
					  </div>
					  <button type="submit" class="btn btn-success">Search</button>
					</form>
				</div>
				<hr/>
				<br/><br/>
				<div class="col-lg-12 col-md-12 col-sm-12 menu-posts">
					<table class="table-bordered" style="width:100%;">
						<tr class="success">
							<th style="width:5%;">#SL</th>
							<th style="width:15%;">Page Name</th>
							<th style="width:55%;">Post</th>
							<th style="width:25%;">Action</th>
						</tr>
	                <?php /*Theme: show Theme code */
	                	if($find == ""){
							$query = "SELECT * FROM tb_post";
	                	}else{
	                		$query = "SELECT * FROM tb_post WHERE menuid = '$find'";
	                	}
	                    $theme = $db->select($query);
	                    if(!$theme){
	                    	echo "<h2>No Post Available !!</h2>";
	                    }else{
							$i = 1;
	                        while($result = $theme->fetch_assoc()) {	 
	                ?>	
						<tr class="">
							<td>#<?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td>	
								<div id="left"><?php echo $image = "<img class='img-responsive' src='assets/img/portfolio/".$result['image']."'alt='no-image' style='display:100%'>"; ?></div>
								<div id="right"><?php echo "<b style='color:green;'>".$result['title']."</b><br/>"; echo $fm->textShorten($result['body'],250); ?></div>
							
							</td>
							<td>
							<?php if($result['status'] == 1){ ?>
								<a href="admin.php?id=posts&action=display&value=<?php echo $result['status']; ?>&postid=<?php echo $result['id']; ?>" type="button" class="btn btn-success">Hide</a>
							<?php }else{ ?>
								<a href="admin.php?id=posts&action=display&value=<?php echo $result['status']; ?>&postid=<?php echo $result['id']; ?>" type="button" class="btn btn-default">Show</a>
							<?php }	?>
								<a href="admin.php?id=posts&action=edit&postid=<?php echo $result['id']; ?>" type="button" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure to Delete !');" href="admin.php?id=posts&action=delete&postid=<?php echo $result['id']; ?>&image=<?php echo $result['image']; ?>" type="button" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php $i++; } } ?>
					</table>
				</div>
			</div>

		</div>

	</div><!-- /row -->

