<?php

    function display_userview_content() {

        echo '
            <div class="body-content text-justify">
                <h2>Maintenance Tracker App</h2>
                <p class="content text-justify">Welcome <span class="icon-happy"></span></p>
                <h3>Getting Started</h3>
                <p class="lead content text-justify">Maintenance tracker app users can either be customers, company staff or company.</p>
                <p class="lead content text-justify">Currently, you are a Customer. A customer begins by entering devices he or she would like Maintenance and Repairs companies to monitor. Then can the customer make requests to companies currently using this online system and wait for response.</p>
                <p class="lead content text-justify">In order for a user to change status, a user can click Leaderboard on the top horizontal navigation bar where he or she will fill special information to either register as staff or an administrator.</p>
            </div>
        </div>
            ';
    }

    function display_userRequest_content() {

        echo '
            <div class="body-content text-justify">
                <h2>My Requests</h2>
                <a href="viewRequest.php" class="btn1">
                    <span class="icon-database"> </span>View My Requests
                </a>
                <a href="addRequest.php" class="btn1">
                    <span class="icon-plus"> </span>Add A Request
                </a> 
              </div>
        </div>
                  ';
    }

    function display_requestDetails_menu1() {
 
        echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2 active-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div>
                        ';
    }

    function display_requestDetails_menu2() {

        echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div> 
                        ';
    }

    function display_requestDetails_menu3() {
    
        echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div>
                        ';  
    }
    
    function display_requestDetails_menu4() {
    
        echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="requestOrder.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="requestOrderRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="requestOrderClosed.php">Closed</a></li>
                            </ul>
                        </div>
                        ';
    }

    function display_requestDetails_content($num) {    

                        echo "<div style='padding-top: 25px'></div>";

                            $userObject = new Request();
                            $userId = $_SESSION['login_id'];
                            
                            // Accepted      
                            if ($num == 1) {

                                $result = $userObject->viewRequestDet($userId, $status='Accepted');

                                if (mysqli_num_rows($result) > 0) {
                                        // output data of accepted requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                    echo "<div class='not-found'> No requests available yet</div>";
                                }
                                    
                                mysqli_close($userObject->connect());
                            }

                            // In progress
                            if ($num == 2) {

                                $result = $userObject->viewRequestDet($userId, $status='Started');

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of requests in progress
                                    
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<table class='table'>
                                                <tr>
                                                    <th>Request Id: ". $row["OrderId"]. "</th>
                                                </tr>
                                                <tr>
                                                    <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Description: " . $row["OrderDesc"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Due Date: " . $row["DueDate"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Device Name : " . $row["DeviceName"]. "</td>
                                                </tr>
                                            </table>";
                                        }
                                } else {
                                    echo "<div class='not-found'> No requests available yet</div>";
                                }
                                    
                                mysqli_close($userObject->connect());
                            }

                            // Rejected
                            if ($num == 3) {

                                $result = $userObject->viewRequestDet($userId, $status='Rejected');

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of rejected requests
     
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<table class='table'>
                                                <tr>
                                                    <th>Request Id: ". $row["OrderId"]. "</th>
                                                </tr>
                                                <tr>
                                                    <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Description: " . $row["OrderDesc"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Due Date: " . $row["DueDate"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Device Name : " . $row["DeviceName"]. "</td>
                                                </tr>
                                            </table>";
                                    }
                                } else {
                                    echo "<div class='not-found'> No requests available yet</div>";
                                }
                                    
                                mysqli_close($userObject->connect());
                            }

                            // Closed
                            if ($num == 4) {

                                $result = $userObject->viewRequestDet($userId, $status='Closed');

                                if (mysqli_num_rows($result) > 0) {
                                        // output data of closed requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<table class='table'>
                                                <tr>
                                                    <th>Request Id: ". $row["OrderId"]. "</th>
                                                </tr>
                                                <tr>
                                                    <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Description: " . $row["OrderDesc"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Due Date: " . $row["DueDate"]. "</td>
                                                </tr>
                                                <tr>
                                                    <td>Device Name : " . $row["DeviceName"]. "</td>
                                                </tr>
                                            </table>";
                                    }
                                } else {
                                    echo "<div class='not-found'> No requests available yet</div>";
                                }
                                    
                                mysqli_close($userObject->connect());
                            }

                        echo "
                                </div>
                                <div class='tb2'>
                                    <h3>Details/</h3>  
                                </div>
                            </div>
                          </div>
                    </div>
                    ";
    }

     function display_viewRequest() {
        $success_message = " ";
        $error_message = " ";
        $userId = $_SESSION['login_id'];

        if (isset($_POST['updateRequest'])) {
            $rowId = $_POST['id'];
            $title = $_POST['orderTitle'];
            $desc = $_POST['description'];
            $date = $_POST['dueDate'];

            $userObject = new Request;

            $result = $userObject->editRequest($rowId, $title, $desc, $date);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
            mysqli_close($userObject->connect()); // Closing Connection 
        }

        if (isset($_POST['deleteRequest'])) {
            $rowId = $_POST['id'];

            $userObject = new Request;
            $result = $userObject->deleteRequest($rowId);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
        }

        echo '
            <div class="body-content text-justify">
                    <h2>View Requests</h2>
                    <div class="success-message">'; echo $success_message; echo'</div>';
        echo '
                    <div class="error-message">'; echo $error_message; echo'</div>';                    

                        /* view values in table */

                        $userObject = new Request();
                        $result = $userObject->viewRequest($userId);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['OrderId'];

                            echo "<table class='table'>
                                    <tr>
                                        <th class='colmn-lg-width'>Request Id: ". $row["OrderId"]. "</th>
                                        <th class='colmn-shrt-width'>Action</th>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Request Summary: " . $row["OrderTitle"]. "</td>
                                        <td class='colmn-shrt-width'>
                                            <input type='hidden' name='id' value='$row_id'>
                                            <a href='#edit$row_id' class='update-btn accept-btn'>Edit</a>
                                            <a href='#delete$row_id' class='update-btn reject-btn'>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Description: " . $row["OrderDesc"]. "</td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Due Date: " . $row["DueDate"]. "</td>
                                    </tr>
                                    <tr>
                                        <td class='colmn-lg-width'>Device Name : " . $row["DeviceName"]. "</td>
                                    </tr>
                                </table>";

                            echo '
                                <!--Edit Modal -->
                                <div id="edit'.$row_id.'" class="modal">
                                    <!-- Modal Content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a href="#"><span class="close">&times;</span></a>
                                            <h3>Edit Request</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form3" method="post" action=" ">
                                                <input type="hidden" name="id" value="'.$row_id.'">
                                                <input type="text" name="orderTitle" class="form-control" value="'.$row["OrderTitle"].'" placeholder="Title...">
                                                <input type="text" name="description" class="form-control" value="'.$row["OrderDesc"].'" placeholder="Description...">
                                                <input type="date" name="dueDate" class="form-control" value="'.$row["DueDate"].'">
                                                <input type="submit" name="updateRequest" value="Update" class="mdl-btn updte-btn">
                                            </form>
                                        </div>
                                    </div>
                                </div>';

                            echo '
                                <!--Delete Modal -->
                                <div id="delete'.$row_id.'" class="modal">
                                    <!-- Modal Content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a href="#"><span class="close">&times;</span></a>
                                            <h3>Delete Request</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form3" method="post" action=" ">
                                                <input type="hidden" name="id" value="'.$row_id.'">
                                                <div class="delete-msg">Are You Sure You Want to delete Request Id '.$row_id.'</div>
                                                <input type="submit" name="deleteRequest" value="Yes" class="mdl-btn yes-btn">
                                                <input type="submit" value="No" class="mdl-btn no-btn">
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                        echo "<div class='not-found'> No requests available yet</div>";
                        }
                        
                        mysqli_close($userObject->connect());

        echo'   </div>
            </div>';
    }

    function display_addRequest_content() {
        $error_message = " ";
        $success_message = " ";

        if (isset($_POST['makeRequest'])) {
            $userId = $_SESSION['login_id'];
            $title = $_POST['orderTitle'];
            $productNo = $_POST['prdctNo'];
            $devName = $_POST['devcName'];
            $date = $_POST['dueDate'];
            $desc = $_POST['description'];

            $userObject = new Request;
            $result = $userObject->requestValidation($userId, $title, $productNo, $devName, $date, $desc);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
            mysqli_close($userObject->connect()); // Closing Connection 
        }

        echo '
                <div class="body-content text-justify">
                    <h2>Make Request</h2>
                    <div class="form2">
                        <form method="post" action="">
                            <div class="error-message">'; echo $error_message; echo '</div>
                            <div class="success-message">'; echo $success_message; echo '</div>
                            <div class="row">
                                <label class="col-25">Request Title <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" class="form-control" name="orderTitle">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Product model number <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" class="form-control" name="prdctNo">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Device Name <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" class="form-control" name="devcName">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Description <span class="required">*</span></label>
                                <span class="col-75">
                                    <textarea type="text" placeholder="Write something..." class="form-control" name="description"></textarea>
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Due Date <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="date" name="dueDate" class="form-control">
                                </span>
                            </div>
                            <div class="row">
                                <span class="col-25"></span>
                                <span class="col-75">
                                    <input type="submit" name="makeRequest" value="Make Request" class="add-btn">
                                    <input type="submit" name="cancelRequest" value="Cancel" class="cancel-btn">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
    }

    function display_userassets_content() {

        echo '
            <div class="body-content text-justify">
                    <h2>My Devices</h2>
                        <a href="viewDevices.php" class="btn1">
                            <span class="icon-database"> </span>View My Devices
                        </a>
                        <a href="addDevice.php" class="btn1">
                            <span class="icon-plus"> </span>Add My Devices
                        </a> 
                  </div>
                  ';
    }

    function display_viewDevices() {
        $success_message = " ";
        $error_message = " ";
        $userId = $_SESSION['login_id'];

        if (isset($_POST['updateDevice'])) {
            $rowId = $_POST['id'];
            $devName = $_POST['deviceName'];
            $productNo = $_POST['prdctNo'];
            $manufacturer = $_POST['manFName'];
            $owner = $_POST['ownerName'];
            $desc = $_POST['deviceDesc'];
            $costPrice = $_POST['costPrice'];
            $purchaseDate = $_POST['purchaseDate'];

            $userObject = new Device;
            $result = $userObject->editDevice($rowId, $devName, $productNo, $manufacturer, $owner, $desc, $costPrice, $purchaseDate);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
            mysqli_close($userObject->connect()); // Closing Connection
        }

        if (isset($_POST['deleteDevice'])) {
            $rowId = $_POST['id'];

            $userObject = new Device;
            $result = $userObject->deleteDevice($userId, $rowId);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
            mysqli_close($userObject->connect()); // Closing Connection
        }

        echo '
            <div class="body-content text-justify">
                    <h2>View Devices</h2>
                    <div class="success-message">'; echo $success_message; echo '</div>
                    <div class="error-message">'; echo $error_message;  echo'</div>';

                    $userObject = new Device;
                    $result = $userObject->viewDevice($userId);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['DeviceId'];

                           echo "<table class='table'>
                                    <tr>
                                        <th class='colmn-lg-width'>Device Id: ".$row_id. "</th>
                                        <th class='colmn-shrt-width'>Action</th>
                                    </tr>
                                    <tr>
                                        <td>Device Name: " .$row["DeviceName"]. "</td>
                                        <td class='colmn-shrt-width'>
                                            <input type='hidden' name='id' value='$row_id'>
                                            <a href='#editDevice$row_id' class='update-btn accept-btn'>Edit</a>
                                            <a href='#deleteDevice$row_id' class='update-btn reject-btn'>Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Number: " . $row["ProductNo"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Manufacturer: " . $row["Manufacturer"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Device Owner : " . $row["DeviceOwner"]. "</td>
                                    </tr>
                                </table>";

                            echo '
                                <!--Edit Modal -->
                                <div id="editDevice'.$row_id.'" class="modal">
                                    <!-- Modal Content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a href="#"><span class="close">&times;</span></a>
                                            <h3>Edit Device</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form3" method="post" action=" ">
                                                <input type="hidden" name="id" value="'.$row_id.'">
                                                <input type="text" name="deviceName" value="'.$row["DeviceName"].'" placeholder="Device name...">
                                                <input type="text" name="prdctNo" value="'.$row["ProductNo"].'" placeholder="Product number...">
                                                <input type="text" name="manFName" value="'.$row["Manufacturer"].'" placeholder="Manufacturer...">
                                                <input type="text" name="ownerName" value="'.$row["DeviceOwner"].'" placeholder="Device Owner...">
                                                <input type="text" name="deviceDesc" value="'.$row["DeviceDesc"].'" placeholder="Description...">
                                                <input type="text" name="costPrice" value="'.$row["CostPrice"].'" placeholder="Cost Price...">
                                                <input type="date" name="purchaseDate" value="'.$row["PurchaseDate"].'">
                                                <input type="submit" name="updateDevice" value="Update" class="mdl-btn updte-btn">
                                            </form>
                                        </div>
                                    </div>
                                </div>';

                            echo '
                                <!--Delete Modal -->
                                <div id="deleteDevice'.$row_id.'" class="modal">
                                    <!-- Modal Content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a href="#"><span class="close">&times;</span></a>
                                            <h3>Delete Request</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form3" method="post" action=" ">
                                                <input type="hidden" name="id" value="'.$row_id.'">
                                                <div class="delete-msg">Are You Sure You Want to delete Device Id '.$row_id.'</div>
                                                <input type="submit" name="deleteDevice" value="Yes" class="mdl-btn yes-btn">
                                                <input type="submit" value="No" class="mdl-btn no-btn">
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                        echo "<div class='not-found'> No device available yet</div>";
                        }
                        
                        mysqli_close($userObject->connect());

    echo '
                </div>
            </div>';
    }

    function display_addDevice_content() {
        $error_message = " ";
        $success_message = " ";

        if (isset($_POST['addDevice'])) {
            $userId = $_SESSION['login_id'];
            $deviceName = $_POST['deviceName'];
            $productNo = $_POST['prdctNo'];
            $manufacturer = $_POST['manFName'];
            $owner = $_POST['ownerName'];
            $desc = $_POST['deviceDesc'];
            $costPrice = $_POST['costPrice'];
            $purchaseDate = $_POST['purchaseDate'];

            $userObject = new Device;
            $result = $userObject->deviceValidation($userId, $deviceName, $productNo, $manufacturer, $owner, $desc, $costPrice, $purchaseDate);

            if ($result == 1) {
                $error_message = $userObject->echoMessage();

            } else {
                $success_message = $userObject->echoMessage();

            }
            mysqli_close($userObject->connect()); // Closing Connection 
        }

        echo '
                <div class="body-content text-justify">
                    <h2>Add Device</h2>
                    <div class="form2">
                        <form method="post" action="">
                            <div class="error-message">'; echo $error_message; echo '</div>
                            <div class="success-message">'; echo $success_message; echo '</div>
                            <div class="row">
                                <label class="col-25">Device Name <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" name="deviceName">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Product model number <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" name="prdctNo">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Category</label>
                                <span class="col-75">
                                     <select>
                                         <option value="volvo">Electronic</option>
                                         <option value="saab">Automobile</option>
                                         <option value="opel">Building</option>
                                         <option value="other">Other</option>
                                    </select> 
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Manufacturer Name</label>
                                <span class="col-75">
                                    <input type="text" name="manFName" class="form-control">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Owner/ Assigned To <span class="required">*</span></label>
                                <span class="col-75">
                                    <input type="text" name="ownerName" class="form-control">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Description <span class="required">*</span></label>
                                <span class="col-75">
                                    <textarea type="text" name="deviceDesc" placeholder="Write something..."></textarea>
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Cost Price</label>
                                <span class="col-75">
                                    <input type="text" name="costPrice" class="form-control">
                                </span>
                            </div>
                            <div class="row">
                                <label class="col-25">Purchased on</label>
                                <span class="col-75">
                                    <input type="date" name="purchaseDate" class="form-control">
                                </span>
                            </div>
                            <div class="row">
                                <span class="col-25"></span>
                                <span class="col-75">
                                    <input type="submit" name="addDevice" value="Add Device" class="add-btn">
                                    <input type="submit" name="cancelDevice" value="Cancel" class="cancel-btn">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                    
            </div>';

    }

    function display_dashboard()  {

        $userId = $_SESSION['login_id'];

        $userObject = new Request();

        echo '
            <div class="body-content">
                <h2>Dashboard</h2>
                <div class="dashboard">
                    <div class="box-big-fluid">
                        <div class="box">
                            <h3>Total Request Orders</h3>
                            <p class="wd2">';

                                $userObject->totalRequestNo($userId);
                                mysqli_close($userObject->connect());

        echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Accepted Requests</h3>
                            <p class="wd3">';

                                $userObject->getSpecificRequestNo($userId, $status = 'Accepted');
                                mysqli_close($userObject->connect());

        echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Requests In Progress</h3>
                            <p class="wd4">';

                                $userObject->getSpecificRequestNo($userId, $status = 'Started');
                                mysqli_close($userObject->connect());

            echo '                                
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Rejected Requests</h3>
                            <p class="wd1">';

                                $userObject->getSpecificRequestNo($userId, $status = 'Rejected');
                                mysqli_close($userObject->connect());

        echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Closed</h3>
                            <p class="wd5">';

                                $userObject->getSpecificRequestNo($userId, $status = 'Closed');
                                mysqli_close($userObject->connect());

        echo '
                            </p>
                        </div>
                    </div>
                </div>
                <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%2333ffff&amp;src=en.ug%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Africa%2FNairobi" frameborder="0" scrolling="no"></iframe>
            </div>
         </div>';
    }

    /* ADMINISTRATOR */

    function display_adminview_content() {

echo '
            <div class="body-content text-justify">
                <h2 class="h2">Maintenance Tracker App</h2>
                <p class="lead content text-justify">This is the administrator\'s view content</p>
                <p class=" lead content text-justify">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).</p>
            </div>
        </div>
        ';
    }

    function display_adminRequest_menu1() {

echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
                        ';
    }

    function display_adminRequest_menu2() {

echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
                        ';

    }

    function display_adminRequest_menu3() {

echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div> 
                        ';
    }

    function display_adminRequest_menu4() {

echo '
            <div class="body-content">
                <h2>Request Order Details</h2>
                <div class="content-container">
                    <div class="tb1">
                        <div class="assets-menu">
                            <ul class="assets-nav">
                                <li><a class="btn2 btn2-2" href="adminRequestsDetails.php">Accepted</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestInProgress.php">In Progress</a></li>
                                <li><a class="btn2 btn2-2" href="adminRequestRejected.php">Rejected</a></li>
                                <li><a class="btn2 btn2-2 active-2" href="adminRequestClosed.php">Closed</a></li>
                            </ul>
                        </div>
                        ';
    }

    function display_adminRequestDetails_content($num) {  

                            echo '<div style="padding-top: 25px"></div>';

                            $userObject = new User;

                            // Accepted
                            
                            if ($num == 1) {

                                $sql = "SELECT * FROM requests WHERE Status='Accepted'";

                                $result = mysqli_query($userObject->connect(), $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of accepted requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($userObject->connect());
                            }

                            // In progress

                            if ($num == 2) {

                                $sql = "SELECT * FROM requests WHERE Status='Started'";

                                $result = mysqli_query($userObject->connect(), $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of requests in progress
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($userObject->connect());
                            }

                            // Rejected

                            if ($num == 3) {

                                $sql = "SELECT * FROM requests WHERE Status='Rejected'";

                                $result = mysqli_query($userObject->connect(), $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of rejected requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($userObject->connect());
                            }

                            // Closed

                            if ($num == 4) {

                                $sql = "SELECT * FROM requests WHERE Status='Closed'";

                                $result = mysqli_query($userObject->connect(), $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of closed requests
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo "<table class='table'>
                                            <tr>
                                                <th>Request Id: ". $row["OrderId"]. "</th>
                                            </tr>
                                            <tr>
                                                <td>Request Summary: " . $row["OrderTitle"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Description: " . $row["OrderDesc"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Due Date: " . $row["DueDate"]. "</td>
                                            </tr>
                                            <tr>
                                                <td>Device Name : " . $row["DeviceName"]. "</td>
                                            </tr>
                                        </table>";
                                    }
                                } else {
                                echo "<div class='not-found'> No requests available yet</div>";
                                }
                                
                                mysqli_close($userObject->connect());
                            }
echo '
                    </div>
                    <div class="tb2">
                        <h3>Details/</h3>
                        
                    </div>
                </div>
              </div>
        </div>
        ';
    } 

     function display_adminRequests_content() {
        $message = " ";

        $userObject = new Request;

        if (isset($_POST['update_accept'])) {
            $row_Id = $_POST['id'];
            $status = "Accepted";

            $userObject->updateReqStatus($row_Id, $status);

            $message = $userObject->echoMessage();
        
        } elseif (isset($_POST['update-start'])) {
            $row_Id = $_POST['id'];
            $status = "Started";

            $userObject->updateReqStatus($row_Id, $status);

            $message = $userObject->echoMessage();

        } elseif (isset($_POST['update-reject'])) {
            $row_Id = $_POST['id'];
            $status = "Rejected";

            $userObject->updateReqStatus($row_Id, $status);

            $message = $userObject->echoMessage();

        } elseif (isset($_POST['update-close'])) {
            $row_Id = $_POST['id'];
            $status = "Closed";

            $userObject->updateReqStatus($row_Id, $status);

            $message = $userObject->echoMessage();

        }

echo '
        <div class="body-content text-justify">
            <h2>Submitted Requests</h2>
            <div>'; echo "<p>".$message."</p></div>";

            $result = $userObject->getAllRequests();

            if (mysqli_num_rows($result) > 0) {
            
                //output all requests in the sytem
                while ($row = mysqli_fetch_assoc($result)) {
                    $row_id = $row['OrderId'];

                    echo "<table class='table' style='border:1 solid #000'>
                            <tr>
                                <th class='colmn-lg-width'>Request Id: ". $row["OrderId"]. "</th>
                                <th class='colmn-shrt-width'>Action</th>
                            </tr>
                            <tr>
                                <td class='colmn-lg-width'>Request Summary: " . $row["OrderTitle"]. "</td>
                                <td class='colmn-shrt-width'>
                                <form method='post' action=''>
                                    <input type='hidden' name='id' value='$row_id'>
                                        <input type='submit' name='update_accept' class='update-btn accept-btn' value='Accept'> 
                                        <input type='submit' name='update-start' class='update-btn start-btn' value='Start'>
                                        <input type='submit' name='update-reject' class='update-btn reject-btn' value='Reject'>
                                        <input type='submit' name='update-close' class='update-btn closed-btn' value='Close'>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class='colmn-lg-width'>Description: " . $row["OrderDesc"]. "</td>
                            </tr>
                            <tr>
                                <td class='colmn-lg-width'>Due Date: " . $row["DueDate"]. "</td>
                            </tr>
                            <tr>
                                <td class='colmn-lg-width'>Device Name : " . $row["DeviceName"]. "</td>
                            </tr>
                            <tr>
                                <td class='colmn-lg-width'>Request Status : " . $row["Status"]. "</td>
                            </tr>
                        </table>";
                    }

                } else {
                    echo "<div class='not-found'> No requests available yet</div>";
                    
                }
                mysqli_close($userObject->connect());

echo '
            </div>
        </div>
            ';
    }

    function display_admin_dashboard()  {

        $userObject = new Request;

echo '
            <div class="body-content">
                <h2>Dashboard</h2>
                <div class="dashboard">
                    <div class="box-big-fluid">
                        <div class="box">
                            <h3>Total Request Orders</h3>
                            <p class="wd2">';

                                    $result = $userObject->getAllRequests();

                                    $output = mysqli_num_rows($result);

                                    echo $output;
                                    mysqli_close($userObject->connect());
                                    

echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Accepted Requests</h3>
                            <p class="wd3">';

                                    $result = $userObject->viewRequestStat($status = 'Accepted');
                                    mysqli_close($userObject->connect());
                                    
echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Requests In Progress</h3>
                            <p class="wd4">';

                                    $result = $userObject->viewRequestStat($status = 'Started');
                                    mysqli_close($userObject->connect());
                                    
echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Rejected Requests</h3>
                            <p class="wd1">';

                                    $result = $userObject->viewRequestStat($status = 'Rejected');
                                    mysqli_close($userObject->connect());
                                    
echo '
                            </p>
                        </div>
                    </div>
                    <div class="box-fluid">
                        <div class="box">
                            <h3>Closed</h3>
                            <p class="wd5">';

                                    $result = $userObject->viewRequestStat($status = 'Closed');
                                    mysqli_close($userObject->connect());
                                    
echo '
                            </p>
                        </div>
                    </div>
                </div>
             <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%2333ffff&amp;src=en.ug%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Africa%2FNairobi" frameborder="0" scrolling="no"></iframe>
            </div>
         </div>
         ';
    }

    function display_devices() {

        $userObject = new Device;

echo '
        <div class="body-content text-justify">
                <h2>View Devices</h2>';

                    /* view values in table */

                    $result = $userObject->getAllDevices();

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                       echo "<table class='table'>
                                    <tr>
                                        <th>Device Id: ". $row["DeviceId"]. "</th>
                                    </tr>
                                    <tr>
                                        <td>Device Name: " . $row["DeviceName"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Product Number: " . $row["ProductNo"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Manufacturer: " . $row["Manufacturer"]. "</td>
                                    </tr>
                                    <tr>
                                        <td>Device Owner : " . $row["DeviceOwner"]. "</td>
                                    </tr>
                                </table>";
                        }
                    } else {
                    echo "<div class='not-found'> No device available yet</div>";
                    }
                    
                    mysqli_close($userObject->connect());


echo '          </div>
            </div>
                    ';
    }

?>