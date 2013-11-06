<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php include_once '../core/Core.php';?>
<?php include_once '../core/PageController.php';?>
<?php include_once '../pages/PageTemplate.php';?>
<?php session_start();
		$pageController = new PageController();
		if (Core::checkAuth() || Core::getGetParameter("page") >= 1000)
		{
			$pageController->setCurrentPageId(Core::getGetParameter("page"));	
		}
		else
		{
			$pageController->setCurrentPageId(1002);
		}
		$pageController->executeActions();
	?>
<?php 
					//echo $pageController->renderPage();
				?>