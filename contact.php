<!--Header: site header with title, description & meta content-->
<?php include 'inc/header.php'; ?>

<!--MENU: navigation bar-->
<?php include 'inc/menu.php'; ?>

	
	
<!--Page: Contact Section  -->	
	<div class="container pt">
<?php /*ABOUT US: SITE ABOUT US ALL DATA SHOW */
    $query = "SELECT * FROM tb_contact WHERE id=1 AND status=1";
    $contact = $db->select($query);
    if($contact){
       $result = $contact->fetch_assoc(); 
?>	
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3><?php echo $result['title']; ?></h3>
				<hr>
				<p><?php echo $result['note']; ?></p>
			</div>
		</div>
<?php } ?>

		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $fm->validation($_POST['name']);
		$email = $fm->validation($_POST['email']);
		$subject = $fm->validation($_POST['subject']);
		$message = $fm->validation($_POST['message']);

		$name =  mysqli_real_escape_string($db->link,$name);
		$email =  mysqli_real_escape_string($db->link,$email);
		$subject =  mysqli_real_escape_string($db->link,$subject);
		$message =  mysqli_real_escape_string($db->link,$message);

		$error = "";
		if(empty($name)){
			echo "<span style='color:red;'>First Name must not empty !</span><br/>";
		}elseif(empty($email)){
			echo "<span style='color:red;'>Email must not empty !</span><br/>";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<span style='color:red;'>Invalid Email Address !</span><br/>";
		}elseif(empty($subject)){
			echo "<span style='color:red;'>Please Mention Subject !</span><br/>";
		}elseif(empty($message)){
			echo "<span style='color:red;'>Message field not be empty !</span><br/>";
		}else{
			$query = "INSERT INTO tb_inbox(name,email,subject,message,status)VALUES('$name','$email','$subject','$message',0)";
			$insert_rows = $db->insert($query);
			if($insert_rows){
				echo "<span style='color:green;'>Message Sent Successfully. </span><br/>";
				$name = Null;	$email = Null; $subject = Null; $message = Null;
			}else{
				echo "<span style='color:red;'>Message Not Sent Successfully ! </span><br/>";
				$name = Null;	$email = Null; $subject = Null; $message = Null;
			}


		}
	}
?>
				<form role="form" method="post" action="contact.php">
				  <div class="form-group">
				    <input type="text" name="name" class="form-control" id="NameInputEmail1" placeholder="Your Name" required>
				    <br>
				  </div>
				  <div class="form-group">
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
				    <br>
				  </div>
				  <div class="form-group">
				    <input type="text" name="subject" class="form-control" id="subjectEmail1" placeholder="Subject" required>
				    <br>
				  </div>
				  <textarea name="message" class="form-control" rows="8" placeholder="Enter your text here" required></textarea>
				    <br>
				  <button type="submit" class="btn btn-success">SUBMIT</button>
				</form>    			
			</div>
		</div><!-- /row -->
	</div><!-- /container -->



<!--Footer: footer navigation & social link -->
<?php include 'inc/footer.php'; ?>