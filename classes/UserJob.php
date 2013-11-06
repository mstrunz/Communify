<?php
class UserJob{
	
	private $id;
	private $user_id;
	private $job_id;
	private $current;
	private $level;
	
	
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getUserId()
	{
		return $this->user_id;
	}
	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}
	public function getJobId()
	{
		return $this->job_id;
	}
	public function getJob()
	{
		return Job::getJobById($this->getJobId());
	}
	
	public function setJobId($job_id)
	{
		$this->job_id = $job_id;
	}
	public function getCurrent()
	{
		return $this->current;
	}
	public function setCurrent($current)
	{
		$this->current = $current;
	}
	public function getLevel()
	{
		return $this->level;
	}
	public function setLevel($level)
	{	
		$this->level = $level;
	}
	
	public static function getUserJobsByUserId($user_id)
	{
		$sql = "SELECT * FROM userjob WHERE userid = '{$user_id}';";
		$result = Core::sqlSelect($sql);
		$return_array = array();
		if (is_array($result))
		{
			foreach ($result as $row)
			{
				$userjob = new UserJob();
				$userjob->setCurrent($row['current']);
				$userjob->setId($row['id']);
				$userjob->setJobId($row['jobid']);
				$userjob->setLevel($row['level']);
				$userjob->setUserId($row['userid']);
				$return_array[] = $userjob;
			}
		}
		return $return_array;
		
	}
	
	public function save()
	{
		if ($this->getId())
		{
			$sql = "UPDATE userjob SET
					userid = '{$this->getUserId()}',
					current = '{$this->getCurrent()}',
					jobid = '{$this->getJobId()}',
					level = '{$this->getLevel()}',
					WHERE id = '{$this->getId()}';";
			Core::sqlInsert($sql);	
		}
		else
		{
			$sql = "INSERT INTO userjob (userid,current,jobid,level) VALUES
			(
				'{$this->getUserId()}',
				'{$this->getCurrent()}',
				'{$this->getJobId()}',
				'{$this->getLevel()}'
			);";
			$this->setId(Core::sqlInsert($sql));	
		}
	}
	
}