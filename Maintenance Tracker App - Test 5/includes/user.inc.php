<?php

class User extends Database 
{
	private $user;
	private $pass;
	private $email;
	private $location;
	private $tablename;
	private $email_name;
	private $sessionId;
	private $sessionName;

	var $valid;
	var $message;

	public function validationRegister($loginName, $password, $password2, $email, $location, $error) 
	{

		if (empty($loginName) || empty($password) || empty($password2) || empty($email) || empty($location)) 
        {
            $this->message = 'Fill all fields!';
            $error = 1;

        } else {

            if (!preg_match("/^[a-zA-Z ]*$/", $loginName)) 
            {
                $this->message = 'Only letters allowed';
                $error = 1;
            }
            if ($password != $password2) 
            {
                $this->message = 'Passwords do not match!';
                $error = 1;
            }
            if (strlen($password) < 6) 
            {
                $this->message = 'Password must be at least 6 characters';
                $error = 1;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $this->message = 'Email is invalid';
                $error = 1;
            }

            if (!($error == 1)) 
            {
            	$this->register($loginName, $password, $email, $location, $error);

            } else {
            	$this->getMessage($this->message);
            }
        }

        return $this->valid;

	}

	public function validationLogin($loginName, $password, $error) 
	{
		$this->message = "";

		if (empty($loginName) || empty($password)) 
        {
            $this->message = 'Fill all fields!';
            $error = 1;

        } else {

            if (strlen($password) < 6) 
            {
                $this->message = 'Password must be at least 6 characters';
                $error = 1;
            }

            if (!($error == 1)) 
            {
            	$this->login($password, $loginName);

            } else {
            	$this->getMessage($this->message);
            }
        }
	}

	public function getMessage($message) 
	{
		$this->message = $message;
	}

	public function echoMessage() 
	{
		return $this->message;
	}

	//Allows user register to the database
	public function register($username, $password, $email, $location, $error) 
	{
		$this->user = $username;
		$this->pass = $password;
		$this->pass = md5(stripslashes($password));
		$this->email = $email;
		$this->location = $location;

		$query = mysqli_query($this->connect(), "SELECT * FROM users where UserPassword = '$this->pass' AND UserName = '$this->user'") or die(mysqli_error($this->connect()));

		$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$this->message = "That username already exists";
				$error = 1;
				$this->getMessage($this->message); 
				
			} else {

				$query2 = mysqli_query($this->connect(), "SELECT * FROM users where UserEmail = '$this->email'");

				$rows2 = mysqli_num_rows($query2);

				if ($rows2 >= 1 ) {
					$this->message = "User Email already in use";
					$error = 1;
					$this->getMessage($this->message);

				} else {

					if($error!=1) {
						//insert new user login information
						$result = mysqli_query($this->connect(), "INSERT INTO users (UserName, UserPassword, UserEmail, UserLocation) VALUES ('$this->user', '$this->pass', '$this->email', '$this->location')");

						if ($result) {
							$_SESSION['login_user'] = $username;
							$this->message = "Registration succeeded";

              $this->login($password, $email);
						} else {
							echo "Failure";
							$this->getMessage($this->message); 
						}
					}
				}
			}			
		mysqli_close($this->connect()); // Closing Connection
	}

	public function login($password, $loginName) 
	{
		$this->pass = md5(stripslashes($password));
		$this->email_name = $loginName;

		$query = mysqli_query($this->connect(), "SELECT * FROM users where UserPassword = '$this->pass' AND UserEmail = '$this->email_name'");

        $rows = mysqli_num_rows($query);

        if ($rows == 1) 
        {
        	$this->session($this->email_name);

        } else {
        	$this->message = "User does not exist";
            $this->getMessage($this->message); 
        }
        mysqli_close($this->connect()); // Closing Connection
    }

    public function session($sessionVariable)
  	{
  		session_start();// Starting Session
  		// Storing Session
		$user_check = $sessionVariable;

		// SQL Query To Fetch Complete Information Of User
		$ses_sql= mysqli_query($this->connect(), "SELECT UserName from users where UserEmail = '$user_check'");
		$sesId_sql = mysqli_query($this->connect(), "SELECT UserId from users where UserEmail = '$user_check'");

		$row = mysqli_fetch_assoc($ses_sql);
		$login_session = $row['UserName'];

		$row = mysqli_fetch_assoc($sesId_sql);
		$login_id = $row['UserId'];
		$this->sessionId = $login_id;

		if(!isset($login_session)){
			mysqli_close($this->connect); // Closing Connection

		} else {
			$_SESSION['login_user'] = $login_session;
			$_SESSION['login_id'] = $login_id;
			
			//Determine which user page to load
			$status_sql = mysqli_query($this->connect(), "SELECT UserCategory from users where UserId = '$login_id'");

			$status_row = mysqli_fetch_assoc($status_sql);
			$stat = $status_row['UserCategory']; 

			if (($stat == "User") || ($stat == "Customer")) {
				header("location: view/userview.php"); // Redirecting To User's page

			} elseif ($stat == "Staff") {
				header("location: view/staffview.php"); // Redirecting To Staff Page

			} else {
				header("location: view/adminview.php");

			}
		}
  	}

  	public function statusUpdate($position)
  	{
  		$userId = $_SESSION['login_id'];

  		$query = mysqli_query($this->connect(), "UPDATE users SET UserCategory = '$position' WHERE UserId='$userId'");
  		$this->message = $position." information updated successfully";
  		$this->getMessage($this->message);
  	}

  	public function companyUpdate($company)
  	{
  		$userId = $_SESSION['login_id'];

  		$query = mysqli_query($this->connect(), "UPDATE users SET Company = '$company' WHERE UserId='$userId'");
  	}

  	public function feedbackUpdate($feedback)
  	{
  		$userId = $_SESSION['login_id'];

  		$query = mysqli_query($this->connect(), "UPDATE users SET Feedback = '$feedback' WHERE UserId='$userId'");
  	}

  	public function companyValidate($companyName)
  	{
  		$comp = mysqli_query($this->connect(), "SELECT Company FROM users WHERE Company = '$companyName'");

  		$row = mysqli_num_rows($comp);
  		if ($row == 1) 
  		{
  			$this->valid = 1;
  		} else {
  			$this->message = "Company name doesn't exist";
  			$this->getMessage($this->message);
  			$this->valid = 0;
  		}
  		return $this->valid;
  	}

  	public function adminUpdate($password, $size, $devIndustry)
  	{
  		$userId = $_SESSION['login_id'];

  		$this->pass = md5(stripslashes($password));

  		$pass_search = mysqli_query($this->connect(), "SELECT CompanyPass FROM users WHERE CompanyPass = '$this->pass'");
  		$row_search = mysqli_num_rows($pass_search);

  		if ($row_search == 1) {
  			$this->message = "Invalid password";
  			$this->getMessage($this->message);
  			$this->valid = 0;

  		} else {
	  		$query = mysqli_query($this->connect(), "UPDATE users SET CompanyPass = '$this->pass', CompanySize = '$size', DeviceIndustry = '$devIndustry' WHERE UserId='$userId'");

	  		if ($query) {
	  			$this->valid = 1;

	  		} else {
	  			$this->message = "Failed to update ".$position." information";
	  			$this->getMessage($this->message);
	  			$this->valid = 0;
	  		}
	  	}

  		return $this->valid;
  	}
}