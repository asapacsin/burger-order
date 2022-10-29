<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users(username,password,email,phone_number,address) values(?,?,?,?,?)";
        $stmt = $link -> prepare($sql);
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $email = trim($_POST['mailbox']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $stmt->bind_param("sssss",$username,$param_password,$email,$phone,$address);
        if($stmt->execute()){
                // Redirect to login page
                echo('<script>alert("sign up succeed!");</script>');
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE HTML>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="css/register.css">
        <script src="js/register.js" type="text/JavaScript"></script>
		<script type='text/javascript'> 
        var code ;    
          
        function createCode(){ 
             code = "";    
             var codeLength = 4;  
             var checkCode = document.getElementById("code");    
             var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R',   
             'S','T','U','V','W','X','Y','Z');  
             for(var i = 0; i < codeLength; i++) { 
                var index = Math.floor(Math.random()*36);
                code += random[index];  
            }   
            checkCode.value = code;  
        } 
        </script> 

    </head>

    <body>
	<div style="width:100%;padding: 0px;margin: 0px;">
		<div class="header">
			<div class="wrap">
					<div class="cssmenu">
					<ul>
							<li>
								<a class="big" href="index.php">
									<span>Main</span>
								</a>
							</li>
							<li>
								<a class="big" href="myinfo.php">
									<span>My Info</span>
								</a>
							</li>
							<li>
								<a class="big" href="myorder.php">
									<span>Order</span>
								</a>
							</li>
							<li class="space">
							</li>
							<li>
								<a  class="small" href="login.php">
									<span>login</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
        <div class="page-container">
            <h1>Sign-Up</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" class="username required hilightable" placeholder="Create User ID">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                <input type="password" name="password" class="password required hilightable" placeholder="Create Password">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <input type="password" name="confirm_password" class="repassword required hilightable" placeholder="Confirm password">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                <input type="email" name="mailbox" class="mailbox" placeholder="Enter Email">
                <input type="text" name="phone" class="phone" placeholder="Enter Phone Number">
                <input type="text" name="address" class="address" placeholder="Enter Address">
          		<input type="Captcha" class="Captcha" name="Captcha" placeholder="Enter Vercode">
				<input type="button" id="code" onclick="createCode()" style="width:120px" title='click change' value=" "/> 
                <button type="submit" class="submit_button" value="Submit" onclick=check(this)>register</button>
                <input type="reset" value="Clear Form" class="clear"> 
            </form>       
        </div>	
        <script type="text/javascript">
                main();
                check();
         </script>
    </body>
<div style="text-align:center;">

</div>
</html>

