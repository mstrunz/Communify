<?php
class Login extends PageTemplate{
	
	
	public function executeLogin($request)
	{
		$username = $request["username"];
		$password =  $request["password"];
		
		if (Core::login($username, $password))
		{
			$am = new AwardManagement();
			$am->checkAwards();
			Core::go2Page(1);
			//die();
		}
		else
		{
			Core::setGlobalMessage("Wrong Username or Password!","error");
		}
	}
	
    public function executeRegister($request)
	{
		if ($request["password"] == $request["password2"])
		{
			if (strlen($request["password"]) >= 6)
			{
				if ($request["username"])
				{
			    
    			    if ($request["email"])
    				{
    					$username = $request["username"];
    					$email = $request["email"];
    					$password = md5($request["password"]);
    					$manager = ($request["ismanager"]==true)?1:0;		
    					$sql = "SELECT * FROM user WHERE username = '{$username}';";
    					
    					
    					if (count(Core::sqlSelect($sql)))
    					{
    						$this->error_message = "Username already in use";
    					}
    					else
    					{
    						$sql = "INSERT INTO user (username,password,email,ismanager) VALUES ('{$username}','{$password}','{$email}',{$manager})";
    						Core::sqlInsert($sql);
    						Core::setGlobalMessage("User created! You can login now.");
    						Core::go2Page(1002);
    					}
    				}
    				else 
    				{
    					$this->error_message = "Email Address is missing";	
    				}
				}
				else
				{
				    $this->error_message = "Please enter a Username.";	   
				}	
			}
			else
			{
				$this->error_message = "Password has to be at least 6 characters long.";	
			}
			
		}
		else
		{
			$this->error_message = "Password did not match.";	
		}
		Core::setGlobalMessage($this->error_message,"error");
	}
	
	public function executeLogout()
	{
		Core::logout();
	}
	
	public function render($request)
	{
		include '../pages/Login/LoginHtml.php';
	}
	
}