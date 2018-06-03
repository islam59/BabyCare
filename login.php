<!--Header: site header with title, description & meta content-->
<?php include 'inc/header.php'; ?>

<!--MENU: navigation bar-->
<?php include 'inc/menu.php'; ?>
	
	
<!--Page: Contact Section  -->	
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Login !!</h3>
				<hr>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				 $email = $fm->validation($_POST['email']);
				 $password = $fm->validation(md5($_POST['password']));

				$email =  mysqli_real_escape_string($db->link,$email);
				$password =  mysqli_real_escape_string($db->link,$password);

				$query = "SELECT * FROM tb_user WHERE email='$email' AND password = '$password' AND status=1";
				$result = $db->select($query);

				if($result != false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row > 0){
							 Session::set("login",true);
							 Session::set("username", $value['username']);
							 Session::set("email", $value['email']);
							 Session::set("userId", $value['id']);
							 Session::set("type", $value['type']);
							 
							 if(Session::get('type') == 'Admin'){
								header("Location:admin.php?id=index");	
							 }else{
							 	header("Location:index.php");		
							 }
							 
							 
					}else{
						echo "<span style='color:red; font-size:18px;'>No Result Found!!.</span>";
					}
				}else{
					echo "<span style='color:red; font-size:18px;'>Username or Passsword not matched!!.</span>";
				}
			}
		?>
				<form role="form" method="post" action="">
				  <div class="form-group">
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" required>
				    <br>
				  </div>
				  <div class="form-group">
				    <input type="text" name="password" class="form-control" id="subjectEmail1" placeholder="Password" required>
				    <br>
				  </div>

				    <br>
				  <button type="submit" class="btn btn-success">Login</button>
				</form>    			
			</div>
		</div><!-- /row -->
		<br/><br/>
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Register as New !!</h3><hr/>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
				<form role="form" name="register" action="register.php" method="post">
				  <div class="form-group">
				    <input type="text" name="username" class="form-control" id="subjectEmail1" placeholder="Username" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="email" class="form-control" id="subjectEmail1" placeholder="Email" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="cemail" class="form-control" id="subjectEmail1" placeholder="Confirm Email" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <textarea name="address" name="address" class="form-control" rows="6" placeholder="Enter your address" required></textarea>
				    <br>
				  </div>
				  <br/>

				  <div class="form-group">
				  	<label class="form-label">Gender</label>
					<span class="radio">
					  <label><input type="radio" name="gender">Male</label>
					</span>
					<span class="radio">
					  <label><input type="radio" name="gender">Female</label>
					</span>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="password" class="form-control" id="subjectEmail1" placeholder="Password" required>
				    <br>
				  </div>

				  <div class="form-group">
				    <input type="text" name="cpassword" class="form-control" id="subjectEmail1" placeholder="Confirm Password" required>
				    <br>
				  </div>
				    <br>
				  <button type="submit" class="btn btn-success">Register as New</button>
				</form>    			
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
	


<!--Footer: footer navigation & social link -->
<?php include 'inc/footer.php'; ?>