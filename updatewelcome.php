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
         $roleid =  $_GET['roleid']; 
         $note =  mysqli_real_escape_string($db->link,$_POST['note']);
      
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name= $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div= explode('.', $file_name);
    $file_ext= strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "assets/img/".$unique_image;
    
   if($note == ""){
            echo "<script>alert('Field Must Not Empty. !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions';</script>";

    }

    if(!empty($file_name)){
        if ($file_size >1048567) {
            echo "<script>alert('Wrong with image size or format. !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions'; </script>";

        }elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(',',$permited)."</span>";

        }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tb_wellcome
                    SET 
                    note    = '$note',
                    image  = '$unique_image'
                  WHERE id =  $roleid";              

                $updated_rows = $db->update($query);

        if ($updated_rows) {
            echo "<script>alert('Data Updated Successfully. !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions'; </script>";
            if($_POST['del_img'] != ""){
                unlink("assets/img/".$_POST['del_img']);         
            }            
        }else {
            echo "<script>alert('Data Not Updated ! !'); </script>";
            echo "<script>window.location='admin.php?id=siteoptions'; </script>";           
        }
     }
 }else{
    $query = "UPDATE tb_wellcome
                SET 
                note = '$note'
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
