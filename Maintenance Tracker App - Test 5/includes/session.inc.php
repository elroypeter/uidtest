<?php

class Session extends User
{
	
	public function sessionCheck($sessVar)
	{
		if (!isset($sessVar)) {
			echo "Redirecting";
			header("location: ../index.php");
		}
	}
}

?>