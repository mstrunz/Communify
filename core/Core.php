<?php
include_once '../classes/User.php';
include_once '../classes/Task.php';
include_once '../classes/IdeaTopic.php';
include_once '../classes/IdeaContributions.php';
include_once '../classes/UserJob.php';
include_once '../classes/Job.php';
include_once '../core/Request.php';
include_once '../core/Page.php';
include_once '../core/DatabaseConnection.php';
include_once '../classes/AwardManagement.php';
include_once '../classes/MessageManagement.php';

class Core
{
	
	private static function preventFraud($array)
   {
       if (is_array($array))
       {
           foreach ($array as $key => $value)
           {
               if (is_array($value))
               {
                   $array[$key] = self::preventFraud($value);
               }
               else
               {
                   $array[$key] = htmlspecialchars($value, ENT_QUOTES);
               }
           }   
       }
       return $array;
   }
	
	
	public static function getPostParameters()
	{
		return self::preventFraud($_POST);	
	}
	
	public static function getGetParameters()
	{
		return self::preventFraud($_GET);	
	}
	
	public static function getGetParameter($parameter_name)
	{
		$get_parameters = self::getGetParameters();
		if (key_exists($parameter_name, $get_parameters))
			return $get_parameters[$parameter_name];
		else
			return null;	
	}
	
	public static function getPOSTParameter($parameter_name)
	{
		$post_parameters = self::getPostParameters();
		if (key_exists($parameter_name, $post_parameters))
			return $post_parameters[$parameter_name];
		else
			return null;	
	}
	
	public static function login($username, $password)
	{
		$password = md5($password);
		$sql = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
		$result = Core::sqlSelect($sql);
		
		if (count($result))
		{
			$user = new User();	
			$user->setUsername($username);
			$user->setId($result[0]["id"]);
			$user->setIsManager($result[0]["ismanager"]);
			$_SESSION['user'] = $user;	
			return true;	
		}
		return false;		
	}
	
	public static function logout()
	{
		if ($_SESSION['user'])
		{
			$_SESSION['user'] = null;
		}	
	}

	public static function checkAuth()
	{
		if (key_exists("user", $_SESSION))
		{	
			if (is_a($_SESSION["user"], "User"))
				return true;
		}
		return false;
	}
	
	public static function String2UpperCase($string)
	{
		return ucfirst(strtolower($string));
	}
	
	public static function go2Page($page_id, $action= null)
	{
		$_SESSION['GLOBALMESSAGESShow'] = false;
		//echo "<script> window.location.replace('index.php?page={$page_id}') </script>";
		header("Location: index.php?page={$page_id}");	
	}
	
	public static function sqlSelect($sql)
	{
		$db = new DatabaseConnection();
		return $db->sqlSelect($sql);
		
	}
	
	public static function sqlInsert($sql)
	{
		$db = new DatabaseConnection();
		return $db->sqlInsert($sql);	
	}
	
	public static function setGlobalMessage($message, $type=null)
	{
		$_SESSION["GLOBALMESSAGES"][$type][] = $message;
	}
	
	public static function getGlobalMessages()
	{
		return $_SESSION["GLOBALMESSAGES"];
	}
	
	public static function resetGlobalMessages()
	{
		$_SESSION["GLOBALMESSAGES"] = null;
	}
	
	/**
	 * 
	 * @return User
	 */
	public static function getUser()
	{
		return $_SESSION["user"];	
	}
	
	public static function date2Mysql($date)
	{
		$phpdate = strtotime( $date );
		return date( 'Y-m-d H:i:s', $phpdate );
	}
	public static function setInSession($key,$value)
	{
		$_SESSION['customValues'][$key] = $value;
	}
	public static function getInSession($key)
	{
		return $_SESSION['customValues'][$key];
	}
	
}
?>