<?php
class Job{
	
	private $id;
	private $name;
	private $parent;
	
	
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
	public function getParentId()
	{
		return $this->parent;
	}
	public function setParentId($parent_id)
	{
		$this->parent = $parent_id;
	}
	
	public static function getJobById($id)
	{
		$sql = "SELECT * FROM jobs WHERE id = '{$id}';";
		$result = Core::sqlSelect($sql);
		if (is_array($result))
		{
			$row = $result[0];
			$job = new Job();
			$job->setId($row['id']);
			$job->setName($row['name']);
			$job->setParentId($row['parent']);
		}
		return $job;
	}
	
	
}