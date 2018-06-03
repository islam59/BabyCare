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
    $msgid =  mysqli_real_escape_string($db->link,$_POST['replayid']);
    $replay =  mysqli_real_escape_string($db->link,$_POST['replay']);
    
    if($msgid == "" || $replay == ""){
                echo "<script>alert('Field Must Not Empty !'); </script>";
                echo "<script>window.location='admin.php?id=inbox?action=read&msgid=".$msgid."'; </script>";
    }else{        
            $querydisplay = "UPDATE tb_inbox SET replay='$replay' WHERE id = '$msgid'";   
            $updated_rows = $db->update($querydisplay);

	        if($updated_rows){
	        	echo "<script>alert('Replay Send Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=inbox&action=read&msgid=".$msgid."'; </script>";
	        }else{
	        	echo "<script>alert('Replay Not Send Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=inbox?action=read?msgid=".$msgid."'; </script>";
	        }

     }
 }
?>