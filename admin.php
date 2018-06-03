<!--Header: site header with title, description & meta content-->
<?php include 'inc/header.php'; ?>

<!--MENU: navigation bar-->
<?php include 'inc/menu.php'; ?>

 <!--//Content Field for admin -->
<?php 
	if(!isset($_GET['id'])){
		header('Location:index.php?action=logout'); 
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
		$pageid = $_GET['id'];
		if($pageid == 'index'){
			include 'admin/index.php';

		}elseif($pageid == 'theme'){
			include 'admin/theme.php';

		}elseif($pageid == 'inbox'){
			include 'admin/inbox.php';

		}elseif($pageid == 'users'){
			include 'admin/users.php';

		}elseif($pageid == 'profile'){
			include 'admin/profile.php';

		}elseif($pageid == 'pagerole'){
			include 'admin/pagerole.php';

		}elseif($pageid == 'siteoptions'){
			include 'admin/siteoptions.php';

		}elseif($pageid == 'menus'){
			include 'admin/menus.php';

		}elseif($pageid == 'posts'){
			include 'admin/posts.php';
			
		}
	}else{
		header('Location:index.php?action=logout');
	}

?>

<!-- //Footer: footer navigation & social link -->
<?php include 'admin/footeradmin.php'; ?>