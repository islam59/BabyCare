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
                if(isset($_GET['col'])){
                    $goal = $fm->validation($_POST['goal']);  
                    $col = $_GET['col'];  

                    $goal =  mysqli_real_escape_string($db->link,$goal);
                }
                


                if(empty($goal)){
                    echo "<script>alert('Field Must Not Empty.!');</script>";
                    echo "<script>window.location='admin.php?id=siteoptions'; </script>";
                }else{
                    if($col == "one"){
                        $query = "UPDATE tb_about SET goalone = '$goal' WHERE id =1";
                    }elseif($col == 'two'){
                        $query = "UPDATE tb_about SET goalone = '$goal' WHERE id =1";
                    }elseif($col == 'three'){
                        $query = "UPDATE tb_about SET goalone = '$goal' WHERE id =1";    
                    }elseif($col == 'four'){
                        $query = "UPDATE tb_about SET goalone = '$goal' WHERE id =1";
                    }
                    
                    $updated_rows = $db->update($query);

                    if($updated_rows){
                        echo "<script>alert('Goal Update Successfull !'); </script>";
                        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
                    }else{
                        echo "<script>alert('Goal Update Unsuccessfull !'); </script>";
                        echo "<script>window.location='admin.php?id=siteoptions'; </script>";
                    }               
                }
            }
?>