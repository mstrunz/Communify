<?php
class MessageManagement{
	
	
	public static function renderGlobalMessages()
	{
		$render .= "<div class='alert' style='visibility:hidden' id='messageboard'>No Messages</div>"; 	
		$messagestype = Core::getGlobalMessages();
		if ($_SESSION['GLOBALMESSAGESShow'] !== false)
		{
			if (is_array($messagestype))
			{
				foreach ($messagestype as $type => $messages)
				{
					if ($type == "award")
					{
						MessageManagement::renderAward($messages);		
					}
					else
					{
						$class = 'alert-success';
						if ($type == "error")
						{
							$class = 'alert-error';		
						}
						
						$render = "<div class='alert {$class}' id='messageboard'>";
						foreach ($messages as $message)
						{
							$render .= $message;	
						}
						$render .= "</div>";
					}
				}
				
				
				Core::resetGlobalMessages();
			}
		}
		else
		{
			$_SESSION['GLOBALMESSAGESShow']= true;
		}
		return $render;
	}
	
	private static function renderAward($messages)
	{
		foreach ($messages as $message)
		{
			include '../pages/Other/AwardMessageHtml.php';
		}
	}
	
}


?>