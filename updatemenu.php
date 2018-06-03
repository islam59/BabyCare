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
       $roleid =  mysqli_real_escape_string($db->link,$_POST['roleid']);
       $del_img =  mysqli_real_escape_string($db->link,$_POST['del_img']);

  
    $permited = array('jpg', 'jpeg', 'png');
    $file_name= $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div= explode('.', $file_name);
    $file_ext= strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "assets/img/portfolio/".$unique_image;
    

    if(!empty($file_name)){
        if ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!</span>";

        }elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(',',$permited)."</span>";

        }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tb_menu
                    SET 
                    name    = '$name',
                    image  = '$unique_image'
                  WHERE id =  $roleid";              

                $updated_rows = $db->update($query);

        if ($updated_rows) {
            unlink("assets/img/portfolio/".$del_img);     
	        echo "<script>alert('Menu Update Successfull !'); </script>";
	        echo "<script>window.location='admin.php?id=pagerole'; </script>";
        }else {
            echo "<script>alert('Menu Not Update Successfull !'); </script>";
	        echo "<script>window.location='admin.php?id=pagerole'; </script>";            
        }
     }
 }else{
    $query = "UPDATE tb_menu
                SET 
                name = '$name'
                WHERE id ='$roleid'";

        $updated_rows = $db->update($query);

	        if($updated_rows){
	        	echo "<script>alert('Menu Update Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=pagerole'; </script>";
	        }else{
	        	echo "<script>alert('Menu Not Update Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=pagerole'; </script>";
	        }
     }
   }
?>