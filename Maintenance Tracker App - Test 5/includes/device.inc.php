<?php

class Device extends User
{
	private $user;
	private $pass;
	private $email;
	private $location;
	private $tablename;
	private $email_name;
	private $sessionId;
	private $sessionName;

	public function getAllDevices() 
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM device");

		return $result;
	}

	public function viewDevice($userId)
	{
		$result = mysqli_query($this->connect(), "SELECT * FROM device WHERE UserId = '$userId'");

		return $result;
	}

	public function editDevice($rowId, $deviceName, $pdNo, $manufacturer, $ownName, $description, $costPrice, $purchaseDate)
	{
		//update request
		$result = mysqli_query($this->connect(), "UPDATE device SET DeviceName='$deviceName', ProductNo='$pdNo', Manufacturer='$manufacturer', DeviceOwner='$ownName', DeviceDesc='$description', CostPrice='$costPrice', PurchaseDate='$purchaseDate' WHERE DeviceId='$rowId'");

		if ($result) {
			$this->message  = "Device updated Successfully";
			$this->getMessage($this->message);
			$error = 0;

		} else {
			$this->message  = "Failure to Update Device";
			$this->getMessage($this->message);
			$error = 1;

		}
		mysqli_close($this->connect()); // Closing Connection

		return $error;
	}

	public function deviceValidation($userId, $deviceName, $productNo, $manufacturer, $ownName, $description, $costPrice, $purchaseDate)
	{
		if (empty($deviceName) || empty($productNo) || empty($ownName) || empty($description)) {

			$this->message = "Enter required fields!";
			$error = 1;

		} else {
			
			$query = mysqli_query($this->connect(), "SELECT * FROM device where ProductNo = '$productNo' AND DeviceName = '$deviceName'");

			$rows = mysqli_num_rows($query);

			if ($rows == 1) {
				$this->message = "That product already exists";
				$this->getMessage($this->message);
				$error = 1;

			} else {

				if ($this->connect()) {

					//make new request
					$result = mysqli_query($this->connect(), "INSERT INTO  device (DeviceName, ProductNo, Manufacturer, DeviceOwner, DeviceDesc, CostPrice, PurchaseDate, UserId) VALUES ('$deviceName', '$productNo', '$manufacturer', '$ownName', '$description', '$costPrice', '$purchaseDate', '$userId')");

					if ($result) {
						//Redirect to another page
						$this->message = "Device added Successfully";
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
				
			} 

		}

		return $error;
	}

	public function deleteDevice($userId, $rowId)
	{
		if ($this->connect()) {
			$result = mysqli_query($this->connect(), "DELETE FROM device WHERE DeviceId = '$rowId'");

			if ($result) {
				$result2 = mysqli_query($this->connect(), "DELETE FROM requests WHERE DeviceId = '$rowId' AND UserId = $userId");

				if ($result2) {
					$this->message = "Device deleted Successfully";
					$this->getMessage($this->message);
					$error = 0;

				} else {
					$this->message = "Error deleting devce from Request Table";
					$this->getMessage($this->message);
					$error = 1;

				}

			} else {
				$this->message = "Error deleting devce from Device table";
				$this->getMessage($this->message);
				$error = 1;
			}	
		} else {
			$this->message = "Failed to connect to database";
			$this->getMessage($this->message);
			$error = 1;

		}
		return $error;
	}
		
}