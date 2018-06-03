<?php ob_start(); ?>
<?php 
    include 'lib/Session.php'; 
    Session::init();
?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
<?php 
    $db = new Database();
    $fm = new Format();
?>
<?php 			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$roleid = $_GET['roleid']; 
			    $title =  mysqli_real_escape_string($db->link,$_POST['title']);
			    $name =  mysqli_real_escape_string($db->link,$_POST['name']);
			    $address =  mysqli_real_escape_string($db->link,$_POST['address']);
			    
			    if(empty($title) || empty($name) || empty($address)){
				        	echo "<script>alert('Field Must Not Empty !'); </script>";
				        	echo "<script>window.location='admin.php?id=siteoptions'; </script>";
			    }else{			        
				    $query = "UPDATE tb_site
				                SET 
				                title = '$title',
				                name = '$name',
				                address = '$address'
				                WHERE id ='$roleid'";
				    $updated_rows = $db->update($query);
				    if ($updated_rows) {
				        echo "<script>alert('Data Updated Successfully. !'); </script>";
				        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
				    }else {
				        echo "<script>alert('Data Not Updated !'); </script>";
				        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
				    }
			    }
		    }
?>