<?php
class IdeaTopic{
	
	private $id;
	private $name;
	private $description;
	private $created_by;
	private $creation_date;
	private $coins;
	
	
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;	
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	/**
	 * 
	 * Enter description here ...
	 * @return User
	 */
	public function getCreatedBy()
	{
		return User::getUserById($this->created_by);
	}
	public function setCreatedBy($user_id)
	{
		$this->created_by = $user_id;
	}
	public function getCreationDate()
	{
		return $this->creation_date;
	}
	public function setCreationDate($date)
	{
		$this->creation_date = $date;
	}
	public function getCoins()
	{
		return $this->coins;
	}
	public function setCoins($coins)
	{
		$this->coins = $coins;
	}
	
	public function save()
	{
		if ($this->getId())//update case
		{
			$sql = "UPDATE ideatopic SET
					(
						coins = '{$this->getCoins()}',
						createdby = '{$this->created_by}',
						creationdate = '{$this->getCreationDate()}',
						description = '{$this->getDescription()}',
						name = '{$this->getName()}'
					)
					WHERE id = '{$this->getId()}';";
			Core::sqlInsert($sql);	
		}
		else
		{
			$sql = "INSERT INTO ideatopic (coins,createdby,creationdate,description,name) VALUES
					(
						'{$this->getCoins()}',
						'{$this->created_by}',
						'{$this->getCreationDate()}',
						'{$this->getDescription()}',
						'{$this->getName()}'
					);";
			$this->setId(Core::sqlInsert($sql));
		}
	}
	
	public function getIdeaContributions()
	{
		return IdeaContributions::getIdeaContributionsByIdeaTopicId($this->getId());	
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $id
	 * @return IdeaTopic
	 */
	public static function getIdeaTopic($id)
	{
		$sql = "SELECT * FROM ideatopic WHERE id = '{$id}';";
		$result = Core::sqlSelect($sql);
		if (is_array($result))
		{
			$row = $result[0];
			$idea_topic = new IdeaTopic();
			$idea_topic->setCoins($row['coins']);
			$idea_topic->setCreatedBy($row['createdby']);
			$idea_topic->setCreationDate($row['creationdate']);
			$idea_topic->setDescription($row['description']);
			$idea_topic->setId($row['id']);
			$idea_topic->setName($row['name']);	
		}
		return $idea_topic;	
	}
	
	public static function getIdeaTopics()
	{
		$sql = "SELECT * FROM ideatopic ORDER by creationdate DESC;";
		$result = Core::sqlSelect($sql);
		$return_array = array();
		if (is_array($result))
		{
			foreach ($result as $row)
			{
				$idea_topic = new IdeaTopic();
				$idea_topic->setCoins($row['coins']);
				$idea_topic->setCreatedBy($row['createdby']);
				$idea_topic->setCreationDate($row['creationdate']);
				$idea_topic->setDescription($row['description']);
				$idea_topic->setId($row['id']);
				$idea_topic->setName($row['name']);
				$return_array[] = $idea_topic;
			}
		}
		return $return_array;
	}
	
}
?>