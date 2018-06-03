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
         $description =  mysqli_real_escape_string($db->link,$_POST['description']);

        if($description == ""){
            echo "<script>alert('Field Must Not Empty. !'); </script>";
            echo "<script>window.location='admin.php?id=index'; </script>";

        }else{
            $query = "UPDATE tb_site
                   SET 
                   description = '$description'
                   WHERE id =1";
            $updated_rows = $db->update($query);

        if ($updated_rows) {
            echo "<script>alert('Data Updated Successfully. !'); </script>";
            echo "<script>window.location='admin.php?id=index'; </script>";
        }else {
            echo "<script>alert('Data Not Updated !'); </script>";
            echo "<script>window.location='admin.php?id=index'; </script>";
        }
     }
   }
?>
