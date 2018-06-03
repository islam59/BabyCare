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
         $sid =  mysqli_real_escape_string($db->link,$_POST['sid']);
         $name =  mysqli_real_escape_string($db->link,$_POST['name']);
         $link =  mysqli_real_escape_string($db->link,$_POST['link']);


    
   if($sid == ""|| $name == ""|| $link == ""){
            echo "<script>alert('Field Must Not Empty. !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions&social=edit&sid=<?php echo ".$sid."?>'; </script>";
    }else{
        $query = "UPDATE tb_social
             SET 
                name    = '$name',
                link  = '$link'
            WHERE id =  $sid";              
        $updated_rows = $db->update($query);

        if ($updated_rows) {
            echo "<script>alert('Data Updated Successfully. !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions'; </script>";        
        }else {
            echo "<script>alert('Data Not Updated ! !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions'; </script>";           
        }
     }

   }
?>
