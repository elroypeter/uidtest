<?php

class Request extends User
{
	private $user;
	private $pass;
	private $email;
	private $location;
	private $tablename;
	private $email_name;
	private $sessionId;
	private $sessionName;

	public function getAllRequests() 
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM requests");

		return $result;
	}

	public function viewRequest($userId)
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM requests WHERE UserId = '$userId'");

		return $result;
	}

	public function viewRequestStat($status)
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM requests WHERE Status='$status'");
		$output = mysqli_num_rows($result);

		echo $output;
	}

	public function viewRequestDet($userId, $status)
	{
		$result = mysqli_query($this->connect(),"SELECT * FROM requests WHERE Status='$status' AND UserId='$userId'");

		return $result;
	}

	public function totalRequestNo($rowId) 
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM requests WHERE UserId = '$rowId'");
		$output = mysqli_num_rows($result);

		echo $output;
	} 

	public function updateReqStatus($rowId, $status) 
	{
		$result = mysqli_query($this->connect(), "UPDATE requests SET Status='$status' WHERE OrderId='$rowId'");

		if ($result) {
			$this->message = "Request updated successfully";
			$this->getMessage($this->message);

		} else {
			$this->message = "Failed to update Request";
			$this->getMessage($this->message);
		}

	}

	public function getSpecificRequestNo($rowId, $status)
	{

		$result = mysqli_query($this->connect(), "SELECT * FROM requests WHERE Status='$status' AND UserId='$rowId'");
		$output = mysqli_num_rows($result);

        echo $output;
	}

	public function editRequest($rowId, $title, $desc, $date)
	{
		//update request
		$result = mysqli_query($this->connect(), "UPDATE requests SET OrderTitle='$title', OrderDesc='$desc', DueDate='$date' WHERE OrderId='$rowId'");

		if ($result) {
			$this->message  = "Request updated Successfully";
			$this->getMessage($this->message);
			$error = 0;

		} else {
			$this->message  = "Failure to Update Request";
			$this->getMessage($this->message);
			$error = 1;

		}
		mysqli_close($this->connect()); // Closing Connection

		return $error;
	}

	public function deleteRequest($rowId)
	{
		$result = mysqli_query($this->connect(), "DELETE FROM requests WHERE OrderId='$rowId'");

		if ($result) {
			$this->message = "Request deleted successfully";
			$this->getMessage($this->message);
			$error = 0;
		
		} else {
			$this->message = "Failed to delete Request";
			$this->getMessage($this->message);
			$error = 1;

		}
		mysqli_close($this->connect());

		return $error;
	}

	public function requestValidation($userId, $title, $productNo, $devName, $date, $desc)
	{
		if (empty($title) || empty($productNo) || empty($devName) || empty($date) || empty($desc)) {

			$this->message = "Enter required fields!";
			$error = 1;

		} else {
			
			$query = mysqli_query($this->connect(), "SELECT * FROM device where ProductNo = '$productNo' AND DeviceName = '$devName'");
			$rows = mysqli_num_rows($query);

			if ($rows == 1) {

				if ($this->connect()) {

					$query2 = mysqli_query($this->connect(), "SELECT DeviceId FROM device WHERE ProductNo = '$productNo' AND DeviceName = '$devName'");
					$row = mysqli_fetch_assoc($query2);
					$device_id = $row["DeviceId"];

					//make new request
					$result = mysqli_query($this->connect(), "INSERT INTO requests (OrderTitle, OrderDesc, DueDate, DeviceName, UserId, DeviceId) VALUES ('$title', '$desc', '$date', '$devName', '$userId', '$device_id')");

					if ($result) {
						//Redirect to another page
						$this->message = "Request added Successfully";
						$this->getMessage($this->message);
						$error = 0;

					} else {
						$this->message = "Failure";
						$this->getMessage($this->message);
						$error = 1;

					} 
				} else {
					$this->message = "Connection to database failed";
					$this->getMessage($this->message);
					$error = 1;

				}
				
			} else {
				$this->message = "That product doesn't exist";
				$this->getMessage($this->message);
				$error = 1;

			}

		}

		return $error;
	}
		
}