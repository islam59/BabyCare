   <body>
    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top animated infinite fadeInDown" data-wow-duration="2s" data-wow-delay="0.1s"> 
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

<?php /*Site: show site name */
    $query = "SELECT * FROM tb_site WHERE id=1";
    $site = $db->select($query);
    if($site){
       $result = $site->fetch_assoc(); 
?>
          <a class="navbar-brand" href="index.php"><?php echo $result['name']; ?></a>
<?php } ?>

        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
<?php if(Session::get('type') == 'Admin'){ ?> 
              <li><a href="#" target="_blank">Live Preview</a></li>
              <li><a href="admin.php?id=theme">Theme</a></li>
              <li><a href="admin.php?id=inbox">Inbox(
              <?php 
                  $query = "SELECT * FROM tb_inbox WHERE status=1";
                  $msg  = $db->select($query);
                  if($msg){
                      $count = mysqli_num_rows($msg);
                      echo $count;
                  }else{
                      echo " 0 ";
                  }
              ?>
                )</a></li>
              <li><a href="admin.php?id=users">Users</a></li>
              <li><a href="?action=logout">Logout</a></li>

<?php       }elseif(Session::get('type') == 'User'){ ?>              
                <?php /*Menu: show php code */
                    $query = "SELECT * FROM tb_menu WHERE status=1";
                    $menu = $db->select($query);
                    if($menu){
                        while($result = $menu->fetch_assoc()) {
                ?>
                              <li><a href="page.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>                            
                <?php } ?>
                              <li><a href="notification.php">Notification</a></li>
                              <li><a href="?action=logout">Logout</a></li>
                <?php } ?> 
<?php       }else{ ?>
                <?php /*Menu: show php code */
                    $query = "SELECT * FROM tb_menu WHERE status=1";
                    $menu = $db->select($query);
                    if($menu){
                        while($result = $menu->fetch_assoc()) {
                ?>
              <li><a href="page.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
              
              <?php } ?>
                <li><a href="login.php">Login/Sign In</a></li>
              <?php } ?>
<?php } ?>

<?php //logout function 
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
        header('Location:index.php'); 
    }
?>       
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>