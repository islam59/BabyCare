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
                $username = $fm->validation($_POST['username']);
                $email    = $fm->validation($_POST['email']);             
                $address    = $fm->validation($_POST['address']);   
                $gender    = $fm->validation($_POST['gender']);
                $password = $fm->validation(md5($_POST['password']));

                $username =  mysqli_real_escape_string($db->link,$username);
                $email =  mysqli_real_escape_string($db->link,$email);
                $address =  mysqli_real_escape_string($db->link,$address);
                $gender =  mysqli_real_escape_string($db->link,$gender);
                $password =  mysqli_real_escape_string($db->link,$password);

                if(empty($username)||empty($email)|| empty($address) || empty($gender)||empty($password)){
                    echo "<span class='error'>Field must not be empty !</span>";
                }else{
                    $mailquery = "SELECT * FROM tb_user WHERE email = '$email' limit 1";
                    $mailcheck = $db->select($mailquery);
                    if($mailcheck !=false){
                        echo "<span class='error'>Email Already Exist !</span>";
                    }else{
                        $query = "INSERT INTO tb_user(username,email,address,gender,password,type,status) VALUES('$username','$email','$address','$gender','$password','User','1')";
                        $catinsert = $db->insert($query);
                        if($catinsert){
                            echo "<script>alert('User Created Successfully. !'); </script>";
                            echo "<script>window.location='login.php'; </script>";
                        }else{
                            echo "<script>alert('User Not Created. !'); </script>";
                            echo "<script>window.location='login.php'; </script>";
                        }
                    }               
                }
            }
?>

