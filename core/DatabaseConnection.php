<?php
class DatabaseConnection{

	private $connection;
	
	public function DatabaseConnection()
	{
		$this->connection = new mysqli('127.0.0.1', 'webuser', 'NSmQThN95BRP5Lzj', "communify");
		if ($this->connection->connect_errno) {
    		Core::setGlobalMessage("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error,"error");
		}
	}
	
	public function sqlSelect($sql)
	{
	    $result_array = array();
		if ($result = $this->connection->query($sql)) 
	    { 
		    while ($row = $result->fetch_assoc()) 
		    {
	        	$result_array[] = $row;
	    	}
	    	return $result_array;
	    }	
	}
	
	public function sqlInsert($sql)
	{
	    $this->connection->query($sql);
	    return mysqli_insert_id($this->connection);
	}
	
}
?>