<?php
class CareerGoals extends PageTemplate{

	
	public function executeSelectCareerGoals($request)
	{
		$sql = "SELECT * FROM jobs;";
		$this->all_jobs = Core::sqlSelect($sql);
		$this->user_jobs = UserJob::getUserJobsByUserId(Core::getUser()->getId());
	}
	
	public function executeGetCareerGoals($request)
	{
		$sql = "SELECT * FROM jobs WHERE parent = '{$request['job_id']}';";
		echo json_encode(Core::sqlSelect($sql));
	}
	
	
	public function executeSaveCareerPath($request)
	{
		$career_path = $request['job_path'];
		$sql = "DELETE FROM userjob WHERE userid = '".Core::getUser()->getId()."';";
		Core::sqlInsert($sql);
		if (is_array($career_path))
		{
			foreach ($career_path as $level => $job_id)
			{
				if ($job_id)
				{
					$userjob = new UserJob();
					$userjob->setJobId($job_id);
					$userjob->setLevel($level);
					$userjob->setUserId(Core::getUser()->getId());
					$userjob->save();
				}
			}
		}
		Core::setGlobalMessage("Career Path saved!");
	}
	
	public function executeDefault($request)
	{
		$this->user_jobs = UserJob::getUserJobsByUserId(Core::getUser()->getId());
	}
	
	
	public function render($request)
	{
		if (Core::getGetParameter("action")=="selectCareerGoals")
		{
			include_once '../pages/CareerGoals/SelectCareerGoalsHtml.php';		
		}
		else
		{
			include_once '../pages/CareerGoals/CareerGoalsHtml.php';
		}	
	}
	
}
