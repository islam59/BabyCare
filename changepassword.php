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
				 $userid= $fm->validation($_POST['userid']);
                 $newpassword= $fm->validation($_POST['newpassword']);
                 $confirmpassword = $fm->validation($_POST['confirmpassword']);
                 $oldpassword    = $fm->validation($_POST['oldpassword']);  

                if(empty($newpassword)||empty($confirmpassword)|| empty($oldpassword)){
                    echo "<script>alert('Field Must Not Empty.!');</script>";
                    echo "<script>window.location='admin.php?id=profile&action=change';</script>";

                }elseif($newpassword == $confirmpassword){
	                 $newpassword = $fm->validation(md5($_POST['newpassword']));             	
	                 $oldpassword = $fm->validation(md5($_POST['oldpassword']));

	                 $newpassword =  mysqli_real_escape_string($db->link,$newpassword);
	                 $oldpassword =  mysqli_real_escape_string($db->link,$oldpassword);

                    $query = "UPDATE tb_user
                        SET 
                        password = '$newpassword'
                        WHERE password='$oldpassword' AND id ='$userid'";
                    
                    $updated_rows = $db->update($query);

                    if($updated_rows){
                        echo "<script>alert('Password Changed Successfull !'); </script>";
                        echo "<script>window.location='admin.php?id=profile&action=change'; </script>";
                    }else{
                        echo "<script>alert('Password Changed Unsuccessfull !'); </script>";
                        echo "<script>window.location='admin.php?id=profile&action=change'; </script>";
                    }               
                }
			}
		?>