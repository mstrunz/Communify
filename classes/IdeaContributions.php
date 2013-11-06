<?php
class IdeaContributions{
	
	private $id;
	private $ideatopic_id;
	private $created_by;
	private $creation_date;
	private $description;
	private $name;
	
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;	
	}
	public function getIdeaTopicId()
	{
		return $this->ideatopic_id;
	}
	public function setIdeaTopicId($ideatopic_id)
	{
		$this->ideatopic_id = $ideatopic_id;
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
	/**
	 * 
	 * Enter description here ...
	 * @param $ideatopic_id
	 * @return IdeaContribution[]
	 */
	public static function getIdeaContributionsByIdeaTopicId($ideatopic_id)
	{
		$sql = "SELECT * FROM ideacontribution WHERE ideatopicid = '{$ideatopic_id}';";
		$result = Core::sqlSelect($sql);
		$return_array = array();
		if (is_array($result))
		{
			foreach ($result as $row)
			{	
				$contribution = new IdeaContributions();
				$contribution->setCreatedBy($row['createdby']);
				$contribution->setCreationDate($row['creationdate']);
				$contribution->setDescription($row['description']);
				$contribution->setId($row['id']);
				$contribution->setIdeaTopicId($row['ideatopicid']);
				$contribution->setName($row['name']);
				$return_array[] = $contribution;
			}
		}
		return $return_array;
	}
/**
	 * 
	 * Enter description here ...
	 * @param $user_id
	 * @return IdeaContribution[]
	 */
	public static function getIdeaContributionsByCreator($user_id)
	{
		$sql = "SELECT * FROM ideacontribution WHERE createdby = '{$user_id}';";
		$result = Core::sqlSelect($sql);
		$return_array = array();
		if (is_array($result))
		{
			foreach ($result as $row)
			{	
				$contribution = new IdeaContributions();
				$contribution->setCreatedBy($row['createdby']);
				$contribution->setCreationDate($row['creationdate']);
				$contribution->setDescription($row['description']);
				$contribution->setId($row['id']);
				$contribution->setIdeaTopicId($row['ideatopicid']);
				$contribution->setName($row['name']);
				$return_array[] = $contribution;
			}
		}
		return $return_array;
	}
	
	public function save()
	{
		if ($this->getId())
		{
			$sql = "UPDATE ideacontribution SET
					ideatopicid = '{$this->getIdeaTopicId()}',
					createdby = '{$this->created_by}',
					creationdate = '{$this->getCreationDate()}',
					description = '{$this->getDescription()}',
					name = '{$this->getName()}'				
					WHERE id = '{$this->getId()}';
			";
			Core::sqlInsert($sql);		
		}
		else
		{
			$sql = "INSERT INTO ideacontribution(ideatopicid,createdby,creationdate,description,name) VALUES
					(
						'{$this->getIdeaTopicId()}',
						'{$this->created_by}',
						'{$this->getCreationDate()}',
						'{$this->getDescription()}',
						'{$this->getName()}'
					)";
			$this->setId(Core::sqlInsert($sql));	
		}
	}
	
}

?>