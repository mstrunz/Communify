<?php 
		if (is_array($this->tasks ))
		{	
			foreach ($this->tasks as $task)
			{
				echo "<tr>";
				if (Core::getUser()->getIsManager())
				{
					echo "<td>{$task['username']}</td>";	
				}
				echo "<td>{$task['name']}</td>";
				echo "<td>{$task['duedate']}</td>";
				echo "<td>{$task['coins']}</td>";
				echo "<td>{$task['status']}</td>";
				echo "<td>";
				if($task['status'] != "Completed" && $task['userid'] == Core::getUser()->getId())
					echo "<a href='index.php?page=1&action=completeTask&taskid={$task['id']}' class='listactions' title='Complete Task'><i class='icon-ok'></i></a>";
				echo "<a href='index.php?page=1&sub=addSuggestion&action=addSuggestion&taskid={$task['id']}' class='listactions' title='Add Suggestion'><i class='icon-tag'></i></a>";
				echo "<a href='index.php?page=1&sub=viewSuggestions&action=viewSuggestions&taskid={$task['id']}' class='listactions' title='See Suggestions'><i class='icon-tags'></i></a>";
				echo "<a href='index.php?page=1&sub=viewTask&action=viewTask&taskid={$task['id']}' class='listactions' title='View Task'><i class='icon-eye-open'></i></a>";
				echo "</td>";
				echo "</tr>";
			}
		}
?>