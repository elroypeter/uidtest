<?php /*
	$host = "localhost";
	$user = "id6457595_root";
	$passwd = "emmanuel";
	$dbname = "id6457595_maintenance_tracker_app"; */
?>
<?php

class Database 
{
	// only accessible *inside* of the class
	private $servername = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'app_tracker';

  	// accessible *outside* of the class
  	public $connection = null;
  	public $ses_sql = null;
  	public $sesId_sql = null;

  	private $tbname;
  	private $passwrd;
  	private $email;

  	var $con;

  	public function connect()
  	{

    	// INSIDE the class, so can access it all!
    	$connection = new mysqli($this->servername,
    	  $this->username, $this->password, $this->dbname);

    	return $connection;
  	}
}
?>