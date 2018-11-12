<?php 
    
    function display_sign_up_form() {
        $message = " ";
        $feedback_msg = " ";

        if (isset($_POST['submit-signup'])) 
        {
            $userObject = new User;
            $error = " ";

            $loginName = $_POST['username'];
            $password = $_POST['userpassword'];
            $password2 = $_POST['confirmpassword'];
            $email = $_POST['email'];
            $location = $_POST['userlocation'];

            $userObject->validationRegister($loginName, $password, $password2, $email, $location, $error);

            $message = $userObject->echoMessage();



            
        }

        if (isset($_POST['submit-comment'])) {
            $emailSubject = 'Customer Has a Comment!';
            $mailto = 'emmanuel15okot@gmail.com';

            $nameField = $_POST['name-contact'];
            $emailField = $_POST['email-contact'];
            $commentsField = $_POST['comments'];

            $body = "<br>
                      Name: ".$nameField."<br>
                      Email: ".$emailField."<br>
                      Comment: ".$commentsField."<br>";

            $headers = "From: ".$emailField."\r\n"; // This takes the email and displays it as who this email is from.
            $headers .= "Content-type: text/html\r\n"; // This tells the server to turn the coding into the text.
            $success = mail($mailto, $emailSubject, $body, $headers); // This tells the server what to send.

            if ($success) {
                   // echo "Mail sent to ".$mailto." from ".$emailField."<p>"."Email Subject: ".$emailSubject."<p>"."Body: ".$body;
                header("location: index.php#contact");
            }

        }


echo '
    <div class="nested">
        <div class="container">
        <div class="card" style="margin-top:60px;">
                <div class="card-body">
                <h3 class="text-center">Account Sign Up</h3>
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="error-message">'; echo "<p>".$message."</p>"; echo '</div>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control form-control-sm" placeholder="Enter name">
                    <label>Password</label>
                    <input type="password" name="userpassword"  class="form-control form-control-sm" placeholder="Enter any password">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword"  class="form-control form-control-sm" placeholder="Enter any password">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Enter email address">
                    <label>Location</label>
                    <input type="text" name="userlocation"  class="form-control form-control-sm" placeholder="Enter City">
                    <label>I am </label>
                    <input type="radio" class="radiobox" name="gender-m">Male 
                    <input type="radio" class="radiobox" name="gender-f">Female<br>
                    <input type="checkbox" class="checkbox" name="checkbox">Keep me signed in?
                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                    <input type="submit" name="submit-signup" class="btn btn-xs btn-outline-primary" value="Sign In">
                    <p>Already have an Account?<a href="login.php" style="color: blue"> Login</a></p>
                </form>
                </div>
                </div>
            </div>
           </div>
        ';
    
    }

    function display_log_in_form() {
        $message = " ";

        if (isset($_POST['submit-login'])) 
        {
            $userObject = new User;

            $error=" ";
            
            $loginName = $_POST['email_name'];
            $password = $_POST['userpassword'];

            $userObject->validationLogin($loginName, $password, $error);

            $message = $userObject->echoMessage();
        }

echo '
    <div class="nested" style="height:100vh;">
        <div class="container">
        <div class="card" style="margin-top:60px;">
        <div class="card-body">
        <div class="form1">
            <h3>Account Login</h3>
            <form action="" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
                <div class="error-message">'; echo "<p>".$message."</p>"; echo '</div>
                <label>Email</label>
                <input type="text" name="email_name" class="form-control" placeholder="Enter your email address"><br>
                <label>Password</label>
                <input type="password" name="userpassword" class="form-control" placeholder="Enter any password"><br>
                <input type="checkbox" class="checkbox" name="checkbox">Keep me signed in?<br/>
                <button type="submit" name="submit-login" class="btn btn-outline-primary">Login </button>
                <p>Do not have an Account?<a href="signup.php" style="color: blue"> Sign Up</a></p>
            </form>
         </div>
         </div>
         </div>
        </div>
    </div>
    ';
    
    }

    function display_index(){


echo '
        <div class="card shadow mt-5">
        <div class=" nested" style="height:95vh;">
            <div class="container text-white mt-4 p-5">
                <h3 class="h3 display-4">Getting Started...</h3>
                <p class="lead text-justify">Hey there! Get the best known services everyday by joining Maintenance Tracker App.
                Maintenance Tracker App is an application that provides users with the ability to reach out to operations or repairs department regarding repair or maintenance requests and monitor the status of their requests</p>
                 <p class="lead text-justify">Hey there! Get the best known services everyday by joining Maintenance Tracker App<br/>
                Maintenance Tracker App is an application that provides users with the ability to reach out to operations or repairs department regarding repair or maintenance requests and monitor the status of their requests</p>
                <a href="signup.php" class="btn btn-outline-info">Sign Up</a>  Or
                <a class="btn btn-outline-info" href="login.php">Sign In</a>
            </div>
            </div>
        </div>
        <div id="about" class="jumbotron jumbotron-fluid about" style="height:110vh;">
           <div class="container">
            <h2 class="h2 display-3 text-muted font-italic" style="text-align: center; font-size:3.0em;">About Us</h2>
            <h4 class="h4 display-4">What we do</h4>
            <p class="lead">Very often you find that you own an electronic device, yet you either don\'t know how to maintain it, or who to fix when it\'s damaged or destroyed. Maintenance Tracker App solves the long ongoing pattern by letting you know of well trusted companies that can offer this assistance to you at your convenience.</p>
            <p class="lead">We take the burden off you by ensuring companies watch over your devices and regularly offer assistance on how you can maintain them. Wouldn\'t you be glad that a device you bought gets to see your third and forth generation. I would give anything at least to ensure my earphones last for long. Maintenance Tracker App, guarantees maintenance, safety repairs and monitoring of your devices.</p>
            <p class="lead">Maintenance organisations agree to
               <ul class="list-unstyled">
                <li class="lead">Be honest in all dealings with you.</li>
                <li class="lead">Immediate notification of ability to handle a task</li>
                <li class="lead">Treat your and your property with honour and respect</li>
                </ul>
                <button class="btn btn-outline-info">Get in Touch</button>
            </p>
          </div>
          </div>
        </div>

        <div id="services" class="services" style="height:100vh;">
            <div class="service-header">
                <h2 class="h2 display-3 text-muted font-italic" style="font-size:3.0em;">SERVICES</h2>
                <h4 class="h4 display-4" style="font-size:2.5em;">What we offer</h4>
            </div>
            <div class="service">
                <div class="service1">
                    <img src="assets/icons/businessman.PNG"/>
                    <h4 class="h4">Happier Customers</h4>
                    <p class="lead">Speedy service, fewer errors</p>
                </div>
                <div class="service2">
                    <img src="assets/icons/get-money.PNG"/>
                    <h4 class="h4">Clarity</h4>
                    <p class="lead">No hidden costs</p>
                </div>
                <div class="service3">
                    <img src="assets/icons/chatting.PNG"/>
                    <h4 class="h4">Instant Feedback</h4>
                    <p class="lead">First response time</p>
                </div>
            </div>
        </div>

        <div id="pricing" class="pricing mt-4" style="height:110vh;">
            <div class="price-header">
                <h2 class="h2 display-3 text-muted font-italic" style="font-size:3.0em;">Pricing</h2>
                <h4 class="h4 display-4 text-left" style="font-size:2.5em;">Choose a payment plan that works for you</h4>
            </div>
            
            <div class="price">
                <div class="card shadow panel price-panel1">
                    <div class="panel-header">
                        <h1 class="h1">Basic</h1>
                    </div>
                    <div class="card-body text-left">
                        <span class="lead"><strong>20</strong> Devices</span><br/>
                        <span class="lead"><strong>15</strong> Requests</span><br/>
                        <span  class="lead"><strong>5</strong> Technicians</span><br/>
                        <span class="lead"><strong>2</strong> Administrators</span><br/>
                        <p  class="lead"><strong>Amateur</strong> User</p>
                        <p  class="lead">Favours small businesses who desire to streamline work orders and keep track of their devices</p>
                        <div class="panel-footer text-center">
                        <h3>$19</h3>
                        <h4  class="lead">per month</h4>
                        <button class="btn btn-xs btn-outline-primary">Sign Up</button>
                    </div>
                    </div>
                    
                </div>      
                <div class="card shadow panel price-panel2">
                    <div class="panel-header">
                        <h1 class="h1">Pro</h1>
                    </div>
                    <div class="card-body text-left">
                        <span class="lead"><strong>50</strong> Devices</span><br/>
                        <span class="lead"><strong>25</strong> Requests</span><br/>
                        <span class="lead"><strong>10</strong> Technicians</span><br/>
                        <p class="lead"><strong>5</strong> Administrators</p>
                        <p class="lead"><strong>Professional</strong> User</p>
                        <p class="lead">Favours small and medium sized businesses by offering reporting services</p> 

                        <div class="panel-footer text-center">
                        <h3 class="h3">$29</h3>
                        <h4 class="h4 lead">per month</h4>
                        <button class="btn btn-xs btn-outline-primary" style="border-radius:none;">Sign Up</button>
                    </div>
                    </div>
                    
                </div>
                <div class="card shadow panel price-panel3">
                    <div class="panel-header">        
                        <h1 class="h1">Premium</h1>
                    </div>
                    <div class="card-body text-left">
                        <span class="lead"><strong>100</strong> Devices</span><br/>
                        <span class="lead"><strong>50</strong> Requests</span><br/>
                        <span class="lead"><strong>25</strong> Technicians</span><br/>
                        <span class="lead"><strong>10</strong> Administrators</span><br/>
                        <p class="lead"><strong>Enterprise</strong> User</p>
                        <p class="lead">Favours medium sized business by offering planning and scheduling services</p>
                         <div class="panel-footer text-center">
                        <h3 class="h3">$49</h3>
                        <h4 class="h4">per month</h4>
                        <button class="btn btn-xsbtn-outline-primary">Sign Up</button>
                    </div>
                    </div>
                   
                </div>  
            </div>
        </div>

        <div id="contact" class="contact mt-5" style="height:80vh;">
            <div class="contacts">
                <h2 class="h2 display-4 font-italic text-center" style="font-size:2.5em;">CONTACT</h2>
                <p class="lead display-4" style="font-size:1.8em;">Contact us and we\'ll get back to you within 24 hours.</p>
                <p class="lead font-italic"><span class="icon-location"></span> Kampala, Uganda</p>
                <p class="lead font-italic"><span class="icon-phone"></span> +256 759 611 614</p>
                <p class="lead font-italic"><span class="icon-envelop"></span> inquire@map.com</p>
            </div>
            <div class="form-group">
                <form action="" method="post" autocomplete="off">
                    <input name="name-contact" class="form-control" placeholder="Name" type="text" required><br>
                    <input name="email-contact" class="form-control" placeholder="Email" type="email" required><br>
                    <textarea name="comments" class="form-control" placeholder="Comment" ></textarea><br>
                    <button type="submit" name="submit-comment" class="btn btn-xs btn-outline-primary">Send</button>
                </form>
            </div>
        </div>
        ';
    }
    function display_admin_log_in_form() {
        $message = " ";

        if (isset($_POST['admin-login'])) {
            session_start();

            $company = $_SESSION['companyName'];
            $position = $_SESSION['position'];
            $feedback = $_SESSION['feedback'];
            $password = $_POST['adminPassword'];
            $size = $_POST['compSize'];
            $devIndustry = $_POST['devIndustry'];

            $userObject = new User;

            $userObject->adminUpdate($password, $size, $devIndustry);

            if ($userObject->adminUpdate($password, $size, $devIndustry) == 1) {
                $userObject->statusUpdate($position);
                $userObject->companyUpdate($company);
                $userObject->feedbackUpdate($feedback);
                $message = $userObject->echoMessage();
                header("location: view/adminview.php");
            } else {
                $message = $userObject->echoMessage();
            }

        }

     //   include('includes/form_process.php');

echo '
    <div class="mid-container">
        <div></div>
        <div class="mid-cont">
            <div class="form1">
                <h3>Almost there!</h3>
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="error-message">'; echo "<p>".$message."</p>"; echo '</div>
                    <label>Company Password</label>
                    <input type="password" class="form-control" name="adminPassword">
                    <label>Company Size</label>
                    <select name="compSize" class="form-control">
                        <option value="1">Self-employed</option>
                        <option selected value="1-7">1-7</option>
                        <option value="8-15">8-15</option>
                        <option value="16-35">16-35</option>
                    </select>
                    <label>Device Industry</label>
                    <select name="devIndustry" class="form-control">
                        <option value="Home Appliances">Home Appliances</option>
                        <option value="Equipment">Office Equipment</option>
                        <option value="Mobile Phones">Mobile Phones</option>
                    </select>
                    <button type="submit" name="admin-login" class="btn btn-success">Update</button> 
                </form>
            </div>
        </div>
        <div></div>
    </div>
    ';

    }

     function display_leaderboard_form() {
        $message = " ";

        if (isset($_POST['submit'])) {
            session_start();
            $position = $_POST['position'];
            $companyName = $_POST['companyName'];
            $feedback = $_POST['feedback'];

            $_SESSION['position'] = $position;
            $_SESSION['feedback'] = $feedback;
            $_SESSION['companyName'] = $companyName;
                

            if ($position == "Customer") {
                $userObject = new User;

                $userObject->statusUpdate($position);
                $userObject->companyUpdate($companyName);
                $userObject->feedbackUpdate($feedback);
                $message = $userObject->echoMessage();

            } elseif ($position == "Staff") {

                $userObject = new User;

                $userObject->companyValidate($companyName);
                if ($userObject->companyValidate($companyName) == 1) {
                //    $userObject->companyUpdate($companyName);
                //    $userObject->feedbackUpdate($feedback);
                //    header("location: sds.php");

                } else {
                    $message = $userObject->echoMessage();

                }

            } elseif ($position == "Administrator") {
                header("location: adminLogin.php");
            }
        }

     //   include('includes/form_process.php');

echo '
    <div class="mid-container">
        <div></div>
        <div class="mid-cont">
            <div class="form1">
                <h3>Change Status</h3>
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="error-message">'; echo "<p>".$message."</p>"; echo '</div>
                    <label>Position</label>
                    <select name="position" class="form-control">
                        <option value=" "> </option>
                        <option selected value="Customer">Customer</option>
                        <option value="Staff">Staff</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                    <label>Company Name</label>
                    <input type="text" name="companyName" class="form-control" placeholder="Enter Company Name">
                    <label>How did you hear about Us?</label>
                    <select name="feedback" class="form-control">
                        <option value=" "> </option>
                        <option value="A friend told me">A friend</option>
                        <option value="Google Search">Google Search</option>
                        <option value="Company">Company Administrator</option>
                        <option value="Other">Other</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-success">update</button/>
                </form>
            </div>
        </div>
        <div></div>
    </div>
    ';

    }

    function display_thank_you()
    {
        echo "Thank you for your comment, we'll get back to you shortly";
    }

?>