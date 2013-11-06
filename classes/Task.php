<?php
class Task{
	
	private $id;
	private $name;
	private $description;
	private $created_by;
	private $assigned_to;
	private $due_date;
	private $creation_date;
	private $coints;
	private $status;
	
	public function setId($id)
	{
		$this->id = $id;	
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setName($name)
	{
		$this->name = $name;	
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	public function getDescription ()
	{	
		return $this->description;
	}
	
	public function setCreatedBy($user)
	{
		$this->created_by = $user;
	}
	
	/**
	 * 
	 * @return User
	 */
	public function getCreatedy()
	{
		return $this->created_by;
	}
		
	public function getDueDate()
	{
		return $this->due_date;
	}
	public function setDueDate($date)
	{
		$this->due_date = $date;
	}
	
	public function setCreationDate($date)
	{
		$this->creation_date = $date;	
	}
	
	public function getCreationDate()
	{
		return $this->creation_date;
	}
	
	public function setCoints($coints)
	{
		$this->coints = $coints;
	}
	
	public function getCoints()
	{
		return $this->coints;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param $id
	 * @return Task
	 */
	public static function getTaskById($id)
	{
		$sql = "SELECT * FROM task WHERE id = '{$id}';";
		$result = Core::sqlSelect($sql);
		if (is_array($result))
		{
			$result = $result[0];
			$task = new Task();
			$task->setCoints($result['coins']);
			$task->setCreatedBy($result['createdby']);
			$task->setCreationDate($result['creationdate']);
			$task->setDescription($result['description']);
			$task->setDueDate($result['duedate']);
			$task->setId($result['id']);
			$task->setName($result['name']);
			
		}
		return $task;
	}
	
}
?>