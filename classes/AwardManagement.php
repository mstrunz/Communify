<?php

class AwardManagement{
	
	private $awards = array();
	private $all_awards = array("First Login",
								"First Contribution",
								"Five Contributions"
	);
	
	
	public function AwardManagement()
	{
		$user_id = Core::getUser()->getId();
		$sql = "SELECT * FROM useraward WHERE userid = '{$user_id}';";
		$awards_array = Core::sqlSelect($sql);
		
		if (is_array($awards_array))
		{
			foreach ($awards_array as $award)
			{
				$this->awards[] = $award['name'];	
			}
		}
	}
	public function getAllAwards()
	{
		$result = array();
		foreach ($this->all_awards as $possible_award)
		{
			$award['name'] = $possible_award;
			if (in_array($possible_award, $this->awards))
			{
				$award['achieved'] = true;
			}
			else
			{
				$award['achieved'] = false;	
			}
			$result[] = $award;
		}
		return $result;
	}
	
	
	public function checkAwards()
	{
		$this->firstLoginAward();
		$this->firstContributionAward();
		$this->fiveContributionAward();	
	}
	
	
	private function fiveContributionAward()
	{
		$coins = 1000;
		$name = "Five Contributions";
		if (!in_array($name, $this->awards))
		{
			$contributions = IdeaContributions::getIdeaContributionsByCreator(Core::getUser()->getId());
			if(count($contributions) >= 5)
			{
				$sql = "INSERT into useraward (userid,coins,name) VALUES (".Core::getUser()->getId().",'{$coins}','{$name}');";
				Core::sqlInsert($sql);
				Core::setGlobalMessage($name.' Award received','award');	
			}
		}	
	}
	
	private function firstContributionAward()
	{
		$coins = 500;
		$name = "First Contribution";
		if (!in_array($name, $this->awards))
		{
			$contributions = IdeaContributions::getIdeaContributionsByCreator(Core::getUser()->getId());
			if(count($contributions) >= 1)
			{
				$sql = "INSERT into useraward (userid,coins,name) VALUES (".Core::getUser()->getId().",'{$coins}','{$name}');";
				Core::sqlInsert($sql);
				Core::setGlobalMessage($name.' Award received','award');	
			}
		}	
	}
	
	private function firstLoginAward()
	{
		$coins = 500;
		$name = "First Login";
		if (!in_array($name, $this->awards))
		{
			$sql = "INSERT into useraward (userid,coins,name) VALUES (".Core::getUser()->getId().",'{$coins}','{$name}');";
			Core::sqlInsert($sql);
			Core::setGlobalMessage($name.' Award received','award');
		}
	}
	
}

?>