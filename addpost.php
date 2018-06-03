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

    $menuid =  mysqli_real_escape_string($db->link,$_POST['menuid']);
    $title =  mysqli_real_escape_string($db->link,$_POST['title']);
    $post =  mysqli_real_escape_string($db->link,$_POST['post']);
    $tags =  mysqli_real_escape_string($db->link,$_POST['tags']);
    

    $permited = array('jpg', 'jpeg', 'png','gif');
    $file_name= $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];


    $div= explode('.', $file_name);
    $file_ext= strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "assets/img/portfolio/".$unique_image;
    
    if($menuid == "" || $title == "" || $post == "" || $tags ==""){
            echo "<span class='error'>Field Must Not Empty !</span>";
    
    }elseif(!empty($file_name)){
        if ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tb_post (menuid,title,body,image,tags,status) VALUES ('$menuid','$title','$post','$unique_image','$tags', '1')";

            $inserted_rows = $db->insert($query);

            if($inserted_rows){
                echo "<script>alert('Post Save Successfull !'); </script>";
                echo "<script>window.location='admin.php?id=posts'; </script>";
            }else{
                echo "<script>alert('Post Not Save Successfull !'); </script>";
                echo "<script>window.location='admin.php?id=posts'; </script>";
            }

        }
    }else{
        $query = "INSERT INTO tb_post (menuid,title,body,tags,status) VALUES ('$menuid','$title','$post','$tags', '1')";
        $inserted_rows = $db->insert($query);
        if($inserted_rows){
            echo "<script>alert('Post Save Successfull !'); </script>";
            echo "<script>window.location='admin.php?id=posts'; </script>";
        }else{
            echo "<script>alert('Post Not Save Successfull !'); </script>";
            echo "<script>window.location='admin.php?id=posts'; </script>";
        }
     }//end of without image
    
 }
?>