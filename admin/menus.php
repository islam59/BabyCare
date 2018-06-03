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
			<div class="col-lg-5 adminrightsection-box">
				<h4>Total Users</h4><hr/>
				<p id="shiva"><span class="count">1254</span></p>
			</div>
			<div class="col-lg-5 adminrightsection-box">
				<h4>Stistics</h4><hr/>
				<p>1254</p>
			</div>
		</div>

		<div class="col-lg-10 adminrightsection">
			<div class="col-lg-5 adminrightsection-box">
				<h4>Total Posts</h4><hr/>
				<p>1254</p>
			</div>
			<div class="col-lg-5 adminrightsection-box">
				<h4>Showing Posts</h4><hr/>
				<p>1254</p>
			</div>
		</div>
	</div><!-- /row -->

