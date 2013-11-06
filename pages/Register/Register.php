<?php
class Register extends PageTemplate{

	private $error_message;
	public function executeRegister($request)
	{
		if ($request["password"] == $request["password2"])
		{
			if (strlen($request["password"]) >= 6)
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
				$this->error_message = "Password has to be at least 6 characters long.";	
			}
			
		}
		else
		{
			$this->error_message = "Password did not match.";	
		}
		Core::setGlobalMessage($this->error_message,"error");
		
	}
	
	public function render($request)
	{
		$render .= "<div id='loginform'>";
		$render .= "<h1>Register</h1>";
		$render .= "<form action='index.php?page=1000&action=register' method='post'>";
		$render .= $this->error_message;
		$render .= "<label for='username'>Username</label>";
		$render .= "<input type='text' id='username' name='username' value='{$request['username']}'/>";
		
		$render .= "<label for='email'>Email</label>";
		$render .= "<input type='email' id='email' name='email' value='{$request['email']}'/>";
		
		$render .= "<label for='password'>Password</label>";
		$render .= "<input type='password' id='password' name='password' value='{$request['password']}'/>";
		
		$render .= "<label for='password'>once more</label>";
		$render .= "<input type='password' id='password2' name='password2' value='{$request['password2']}'/>";
		
		if ($request["ismanager"]==true)
		{
			$checked = "checked";
		}
		$render .= "<label for='ismanager'>Manager</label>";
		$render .= "<input type='checkbox' value='true' name='ismanager' {$checked}/><br /><br />";
		
		
		$render .= "<input type='submit' value='Register' class='btn btn-inverse'/>";
		
		$render .= "</form>";
		
		$render .= "</div>";
		
		
		
		return $render;
	}
	
}