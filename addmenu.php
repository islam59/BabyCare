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

    $permited = array('jpg', 'jpeg', 'png');
    $file_name= $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div= explode('.', $file_name);
    $file_ext= strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "assets/img/portfolio/".$unique_image;
    
    if($name == "" || $file_name == ""){
            echo "<span class='error'>Page Name not be empty !</span>";

    }elseif ($file_size >1048567) {
    echo "<span class='error'>Image Size should be less then 1MB!</span>";

    }elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(',',$permited)."</span>";

    }else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tb_menu (name,image,status) VALUES ('$name', '$unique_image', '0')";

        $inserted_rows = $db->insert($query);

	        if($inserted_rows){
	        	echo "<script>alert('Menu Add Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=pagerole'; </script>";
	        }else{
	        	echo "<script>alert('Menu Not Add Successfull !'); </script>";
	        	echo "<script>window.location='admin.php?id=pagerole'; </script>";
	        }

     }
 }
?>