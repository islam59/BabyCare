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

    $name =  mysqli_real_escape_string($db->link,$_POST['name']);
    $link =  mysqli_real_escape_string($db->link,$_POST['link']);
    
    if($name == "" || $link == ""){
            echo "<span class='error'>Data not be empty !</span>";
    }else{

        $query = "INSERT INTO tb_social (name,link,status) VALUES ('$name', '$link', '1')";
        $inserted_rows = $db->insert($query);
	    if($inserted_rows){
	        echo "<script>alert('Social Link Successfull !'); </script>";
	        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
	    }else{
	        echo "<script>alert('Social Link Not Added Successfull !'); </script>";
	        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
	    }
     }
 }
?>