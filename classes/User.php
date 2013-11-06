<?php
class User{
	
	private $id;
	private $username;
	private $password;
	private $email;
	private $manager;
	private $is_manager;
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function GetManagerId()
	{
		return $this->manager;
	}
	/**
	 * 
	 * @return User
	 */
	public function getManager()
	{
		return User::getUserById($this->manager);
	}
	
	public function setManager($manager)
	{
		$this->manager = $manager;
	}
	
	public function setId($id)
	{
		$this->id = $id;	
	}
	
	public function getId()
	{
		return $this->id;	
	}
	
	public function getIsManager()
	{
		return $this->is_manager;
	}
	
	public function setIsManager($is_manager)
	{
		$this->is_manager = $is_manager;	
	}
	
	public function getCurrentBalance()
	{
		$sql = "SELECT sum(coins) as 'balance' FROM account WHERE userid = '{$this->getId()}'";
		$balance = Core::sqlSelect($sql);
		$balance = $balance[0]['balance'];
		return $balance;	
	}
	
	public function getBalanceSheet()
	{
		$sql = "SELECT coins, name,date,type FROM
				(
					SELECT account.coins as 'coins', task.name as 'name', task.completiondate as 'date', 'income' as 'type'
					FROM account 
					INNER JOIN task ON task.id = account.taskid
					WHERE account.userid = '{$this->getId()}'
					UNION
					SELECT account.coins as 'coins', Concat('Suggestion for ',task2.name) AS 'name', tasksuggestion.suggestiondate as 'date', 'income' as 'type'
					FROM account 
					INNER JOIN tasksuggestion ON tasksuggestion.id = account.tasksuggestionid
					INNER JOIN task AS task2 ON task2.id = tasksuggestion.taskid
					WHERE account.userid = '{$this->getId()}'
					UNION
					SELECT account.coins as 'coins', Concat('Contribution to ',ideatopic.name) AS 'name', ideacontribution.creationdate as 'date', 'income' as 'type'
					FROM account 
					INNER JOIN ideacontribution ON ideacontribution.id = account.ideacontributionid
					INNER JOIN ideatopic ON ideatopic.id = ideacontribution.ideatopicid
					WHERE account.userid = '{$this->getId()}'
					UNION
					SELECT account.coins as 'coins', Concat(withdrawals.action,' Reward') AS 'name', withdrawals.creationdate as 'date', 'outcome' as 'type'
					FROM account 
					INNER JOIN withdrawals ON withdrawals.id = account.withdrawalid
					WHERE account.userid = '{$this->getId()}'
				) as balance
				ORDER BY date desc;
				
				";
		return Core::sqlSelect($sql);	
	}
	
	public function getJobPath()
	{
		$sql = "SELECT level FROM userjob WHERE userid = '{$this->getId()}';";
		return Core::sqlSelect($sql);
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param $id
	 * @return User
	 */
	public static function getUserById($id)
	{
		$sql = "SELECT * FROM user WHERE id = '$id';";
		$result = Core::sqlSelect($sql);
		if (is_array($result))
		{
			$result = $result[0];
			$user = new User();
			$user->setEmail($result['email']);
			$user->setId($result['id']);
			$user->setIsManager($result['ismanager']);
			$user->setManager($result['manager']);
			$user->setUsername($result['username']);	
		}
		return $user;
	}
	
	public static function getEmployees($manager = null)
	{
		if ($manager)
			$where = " WHERE manager = '{$manager}'";
			
		$sql = "SELECT * FROM user {$where}";
		$result = Core::sqlSelect($sql);
		$result_array = array();
		if(is_array($result))
		{
			foreach ($result as $row)
			{
				$user = new User();
				$user->setEmail($row['email']);
				$user->setId($row['id']);
				$user->setIsManager($row['ismanager']);
				$user->setManager($row['manager']);
				$user->setUsername($row['username']);
				$result_array[] = $user;
			}
			
		}
		return $result_array;
	}
	
	public function save()
	{
		if ($this->getId())
		{
			$sql = "UPDATE user SET 
						username = '{$this->getUsername()}',
						email = '{$this->getEmail()}',
						ismanager = '{$this->getIsManager()}',
						manager = '{$this->GetManagerId()}'
					WHERE id = '{$this->getId()}';
			";
			Core::sqlInsert($sql);	
		}
		else
		{
			$sql = "INSERT INTO user (username,email,ismanager,manager) VALUES
					(
						'{$this->getUsername()}',
						'{$this->getEmail()}',
						'{$this->getIsManager()}',
						'{$this->GetManagerId()}'						
					)";	
			$this->setId(Core::sqlInsert($sql));
		}
	}
	
}
?>