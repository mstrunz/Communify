<?php
class MyAccount extends PageTemplate{
	
	
	public function executeDefault($request)
	{
		$user = Core::getUser();
		$this->balance = $user->getCurrentBalance();
		$this->balanceSheet = $user->getBalanceSheet();
	}
	
	public function executeManageEmployees($request)
	{
		$this->employees = User::getEmployees();	
	}
	
	public function executeViewAwards($request)
	{
		$aw = new AwardManagement();
		$this->awards = $aw->getAllAwards();
	}
	
	public function executeAddEmployee($request)
	{
		$userid = $request['userid'];
		$user = User::getUserById($userid);
		$user->setManager(Core::getUser()->getId());
		$user->save();	
	}
	
	public function render($request)
	{
		if (Core::getGetParameter("action") ==  "manageEmployees")
		{
			include '../pages/MyAccount/ManageEmployeesHtml.php';	
		}
		elseif (Core::getGetParameter("action") ==  "viewAwards")
		{
			include '../pages/MyAccount/ViewAwardsHtml.php';	
		}
		else 
		{
			include '../pages/MyAccount/MyAccountHtml.php';
		}
	}
}