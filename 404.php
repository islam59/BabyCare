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


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php /*Site: show title */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
?>
    <meta name="description" content="<?php echo $result['description']; ?>">
<?php } ?>

    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

<?php /*Site: show title */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
?>
    <title><?php echo $result['title']; ?></title>
<?php } ?>
    
<!-- styles for this template -->
<?php /*Background CSS LInk: show title */
    $query = "SELECT * FROM tb_theme WHERE status=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
       echo $result['linkbootstrap'];
} ?>  

<!-- styles for this template -->
<?php /*Background CSS LInk: show title */
    $query = "SELECT * FROM tb_theme WHERE status=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
       echo $result['link'];
} ?>  
<link rel="stylesheet" href="assets/css/animate.css">


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/hover.zoom.js"></script>
    <script src="assets/js/hover.zoom.conf.js"></script>
    <script src="assets/js/wow.min.js"></script>
  </head>
  <body style="background:#d0d0d0;opacity:0.8;">
  	<div class="" style="font-size:70px; font-weight:bold; text-align:center; margin-top:6%;">
  		<span style="font-size:90px; color:green;">4</span>
  		<span style="font-size:90px; color:red;">0</span>
  		<span style="font-size:90px; color:green;">4</span><br/>
  		<span style="font-size:40px; color:#000;">Not Found!</span><br/>
  		<span style="font-size:20px; color:green;"><a href="index.php">Go To Home Page</a></span>
  	</div>

  </body>