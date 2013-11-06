<?php
class MyWork extends PageTemplate{

	public function executeAddTask($request)
	{
		$user = Core::getUser();
		$sql = "SELECT * FROM user WHERE manager = '{$user->getId()}'";
		
		$this->users = Core::sqlSelect($sql);
		array_unshift($this->users, array("id" => $user->getId(), "username" => $user->getUsername()));
	}
	
	public function executeViewTask($request)
	{
		$task_id = $request['taskid'];
		$this->task = Task::getTaskById($task_id);
		
	}
	
	public function executeAddnewTask($request)
	{
		if ($request["name"])
		{
			$creationdate = Core::date2Mysql(date("d.m.Y"));
			$duedate = Core::date2Mysql($request["duedate"]);;
			$user = Core::getUser();
			$createdby = $user->getId();
			$assignedto = explode(",", trim(trim($request['assignedto']),", "));
			
			$sql = "INSERT INTO task (name,description,createdby,duedate,creationdate,coins,status) VALUES 
						(
						'{$request["name"]}',
						'{$request["description"]}',
						'{$createdby}',
						'{$duedate}',
						'{$creationdate}',
						'{$request["coins"]}',
						'Open'
						);";

			$task_id = Core::sqlInsert($sql);
			
			if (is_array($assignedto))
			{
				
				foreach ($assignedto as $username)
				{
					$username = trim($username);
					$sql = "SELECT * FROM user WHERE username = '{$username}'";
					$auser = Core::sqlSelect($sql);
					if($auser[0])
					{
						$auser = $auser[0];
						$auser_id = $auser['id'];
						$sql = "INSERT INTO usertask (userid,taskid) VALUES ({$auser_id},{$task_id});";
						Core::sqlInsert($sql);
					}
				}
			}
			
			Core::setGlobalMessage("Task created!");	
			Core::go2Page(1);
		}
		else
		{
			Core::setGlobalMessage("Please enter a name");
		}
	}
	
	public function executeCompleteTask($request)
	{
		$completiondate = Core::date2Mysql(date("d.m.Y"));
		$sql = "UPDATE task SET status='Completed', completiondate='{$completiondate}' WHERE id = '{$request['taskid']}'";
		Core::sqlInsert($sql);
		$sql = "SELECT * FROM task WHERE id = '{$request['taskid']}'";
		$task = Core::sqlSelect($sql);
		$task = $task[0];
		$user = Core::getUser();
		$sql = "INSERT INTO account (userid,taskid,coins) VALUES ({$user->getId()},{$task['id']},{$task['coins']})";
		Core::sqlInsert($sql);
		Core::go2Page(1);
	}
	
	public function executeGetUser($request)
	{
		$user = Core::getUser();
		$sql = "SELECT * FROM user WHERE (manager = '{$user->getId()}' OR id = '{$user->getId()}') AND username like '%{$request['term']}%';";
		$users = Core::sqlSelect($sql);
		
		foreach ($users as $user)
		{
			$result[] = $user["username"];
		}
		
		echo json_encode($result);
		
		die();
			
	}
	
	public function executeAddNewSuggestion($request)
	{
		if($request['taskid'] && $request['suggestion'])
		{
			$user = Core::getUser();
			$date = Core::date2Mysql(date("d.m.Y"));
			$sql = "INSERT INTO tasksuggestion (taskid,suggestiontext,userid,suggestiondate) VALUES ({$request['taskid']},'{$request['suggestion']}',{$user->getId()},'{$date}');";
			Core::sqlInsert($sql);
		}
		else
		{
			Core::setGlobalMessage("Please enter a Suggestion.","error");
		}
		Core::go2Page(1);
	}
	
	public function executeViewSuggestions($request)
	{
		$sql = "SELECT tasksuggestion.suggestiontext, tasksuggestion.id, user.username, tasksuggestion.coins
				FROM tasksuggestion
				INNER JOIN user ON user.id = tasksuggestion.userid
				WHERE tasksuggestion.taskid = '{$request['taskid']}'";
		$this->suggestions = Core::sqlSelect($sql);		
	}
	
	public function executeAddSuggestionCoins($request)
	{
		$user_Id = Core::getUser()->getId();
		$coins = $request['coins'];
		$suggestion_id = $request['suggestionid'];
		$sql = "INSERT INTO account (userid,coins,tasksuggestionid) VALUES ('{$user_Id}','{$coins}','{$suggestion_id}')";
		Core::sqlInsert($sql);
		
		$sql = "UPDATE tasksuggestion SET coins = '{$coins}' WHERE id = '{$suggestion_id}';";
		Core::sqlInsert($sql);
	}
	
	public function executeTaskList($request)
	{
		if ($request['usernamefilter'] != "")
		{
			$where .= " AND user.username LIKE '%{$request['usernamefilter']}%'";
			Core::setInSession("usernamefilter", $request['usernamefilter']);
		}else{Core::setInSession("usernamefilter", null);}
		if ($request['tasknamefilter'] != "")
		{
			$where .= " AND task.name LIKE '%{$request['tasknamefilter']}%'";
			Core::setInSession("tasknamefilter", $request['tasknamefilter']);
		}else{Core::setInSession("tasknamefilter", null);}
		if ($request['duedatefilter'] != "")
		{
			$where .= " AND task.duedate LIKE '%{$request['duedatefilter']}%'";
			Core::setInSession("duedatefilter", $request['duedatefilter']);
		}else{Core::setInSession("duedatefilter", null);}
		if ($request['coinsfilter'] != "")
		{
			$where .= " AND task.coins LIKE '%{$request['coinsfilter']}%'";
			Core::setInSession("coinsfilter", $request['coinsfilter']);
		}else{Core::setInSession("coinsfilter", null);}
		if ($request['statusfilter'] != "")
		{
			$where .= " AND task.status LIKE '%{$request['statusfilter']}%'";
			Core::setInSession("statusfilter", $request['statusfilter']);
		}else{Core::setInSession("statusfilter", null);}
		
		if ($request['orderfield'] != "")
		{
			Core::setInSession("orderfield", $request['orderfield']);
			Core::setInSession("orderdirection", $request['orderdirection']);
			switch ($request['orderfield']){
				case "username":
					$field = "user.username";	
					break;
				case "taskname":
					$field = "task.name";	
					break;
				case "duedate":
					$field = "task.duedate";	
					break;
				case "coins":
					$field = "task.coins";	
					break;
				case "status":
					$field = "task.status";	
					break;
			}
			$order = "ORDER BY {$field} {$request['orderdirection']}";
		}
		else
		{
			Core::setInSession("orderfield", null);
			Core::setInSession("orderdirection", "asc");
		}
		
		$user = Core::getUser();
		if($user->getIsManager())
		{
			$sql = "SELECT task.id,
					task.name,
					task.coins,
					task.status,
					task.duedate,
					user.username,
					user.id AS 'userid'
					FROM task 
				INNER JOIN usertask ON usertask.taskid = task.id
				INNER JOIN user ON user.id = usertask.userid
				WHERE (usertask.userid = '{$user->getId()}' OR user.manager = '{$user->getId()}')
			   {$where} {$order}";	
		}
		else
		{
			$sql = "SELECT task.id,
						task.name,
						task.coins,
						task.status,
						task.duedate,
						usertask.userid 
						FROM task
					INNER JOIN usertask ON usertask.taskid = task.id
					WHERE usertask.userid = '{$user->getId()}'
					{$where} {$order}";
		}
		$this->tasks = Core::sqlSelect($sql);
		include '../pages/MyWork/lib/TaskListHtml.php';
		
	}
	
	
	public function executeDefault($request)
	{
		
	}
	
	public function render($request)
	{
		if (Core::getGetParameter("action")=="addTask" || Core::getGetParameter("action")=="addnewTask")
		{
			include '../pages/MyWork/AddTaskHtml.php';	
		}
		elseif (Core::getGetParameter("action")=="addSuggestion" || Core::getGetParameter("action")=="addNewSuggestion")
		{
			include '../pages/MyWork/AddSuggestionHtml.php';	
		}
		elseif (Core::getGetParameter("action")=="viewSuggestions")
		{
			include '../pages/MyWork/ViewSuggestionsHtml.php';	
		}
		elseif(Core::getGetParameter("action")=="viewTask")
		{		
			include '../pages/MyWork/ViewTaskHtml.php';	
		}
		else
		{
			include '../pages/MyWork/MyWorkHtml.php';
		}
		
	}
	
}

