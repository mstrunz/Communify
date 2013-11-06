<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php include_once '../core/Core.php';?>
<?php session_start();?>
<?php include_once '../core/PageController.php';?>
<?php include_once '../pages/PageTemplate.php';?>
<?php 
   
		$pageController = new PageController();
		if (Core::checkAuth() || Core::getGetParameter("page") >= 1000)
		{
			$pageController->setCurrentPageId(Core::getGetParameter("page"));	
		}
		else
		{
			$pageController->setCurrentPageId(1001);
		}
		$pageController->executeActions();
		 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Communify</title>
		
		
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/jquery-ui.css" rel="stylesheet">
		
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
        		<div class="container">
        		<a class='brand' href="#"><img alt="Logo" src="img/logo_left.png" style='height:40px;'></a>
        			<ul class="nav" style='margin-left:10px;'>
        			<?php if (Core::checkAuth()):?>
						<li <?php echo ($pageController->getCurrentPage()->getId()== 1)?"class='active'":"";?>>
				    		<a href="index.php?page=1">My Work</a>
				  		</li>
				  		<li <?php echo ($pageController->getCurrentPage()->getId()== 2)?"class='active'":"";?>>
				  			<a href="index.php?page=2">Idea Contribution</a>
			  			</li>
				  		<li <?php echo ($pageController->getCurrentPage()->getId()== 3)?"class='active'":"";?>>
				  			<a href="index.php?page=3">Career Goals</a>
			  			</li>
			  			<li <?php echo ($pageController->getCurrentPage()->getId()== 4)?"class='active'":"";?>>
				  			<a href="index.php?page=4">Rewards</a>
			  			</li>
					</ul>
					<ul class="nav pull-right">
						<li class="dropdown">
				  			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
			  				<ul class="dropdown-menu">
			  					<li>
     								<a href="index.php?page=5">My Account</a>
     							</li>
     							<li>
     								<a href="index.php?page=1002&action=logout">Logout</a>
     							</li>
    						</ul>
				  			
			  			</li>
					<?php else:?>
						<li <?php echo ($pageController->getCurrentPage()->getId()== 1001)?"class='active'":"";?>>
					    		<a href="index.php?page=1001">About Communify</a>
				  		</li>
						<li <?php echo ($pageController->getCurrentPage()->getId()== 1002)?"class='active'":"";?>>
					    		<a href="index.php?page=1002">Login</a>
				  		</li>
			  		<?php endif;?>
					</ul>
        		</div>
        	</div>
		</div>
		<div class="container maincontentcontainer">
		<div class="row-fluid messagecontainer">
		<?php echo MessageManagement::renderGlobalMessages();?>
		</div>
		<div class="row-fluid" id='maincontent'>
				<?php 
					echo $pageController->renderPage();
				?>

		</div>
		</div>
	</body>
</html>