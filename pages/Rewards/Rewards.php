<?php
class Rewards extends PageTemplate{
	
	public function executeDefault()
	{
		$this->currentBalance = Core::getUser()->getCurrentBalance();
	}
	
	public function executeGetReward()
	{
		$amount = $this->getRequest()->getGetParameter('amount');
		$reward_type= $this->getRequest()->getGetParameter('rewardtype');
		$user_id = Core::getUser()->getId();
		$date = Core::date2Mysql(date("d.m.Y"));
		if ($amount <= Core::getUser()->getCurrentBalance())
		{
			if ($amount > 0)
			{
				$amount = $amount * -1;	
			}
			$sql = "INSERT INTO withdrawals (action,userid,amount,creationdate) VALUES 
					(
					'{$reward_type}',
					'{$user_id}',
					'{$amount}',
					'{$date}'
					);";
			$withdrawalid = Core::sqlInsert($sql);
			
			$sql = "INSERT INTO account (userid,coins,withdrawalid) VALUES
					(
					'{$user_id}',
					'{$amount}',
					'{$withdrawalid}'
					)";
			Core::sqlInsert($sql);
			
			Core::setGlobalMessage("Your Reward Request has been submitted.");
		}
		else
		{
			Core::setGlobalMessage("Insufficient Communify Coins",'error');	
		}
		
		$this->currentBalance = Core::getUser()->getCurrentBalance();
		
	}
	
	
}