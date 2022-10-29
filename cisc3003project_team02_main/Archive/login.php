<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;      
                            // Redirect user to welcome page
                            echo('<script>alert("login succeed! Redirect into front page!");</script>');
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                    echo('<script>alert("invalid user");</script>');
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE HTML>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="js/login.js" type="text/JavaScript"></script>
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
								<a class="big" href="#">
									<span>Order</span>
								</a>
							</li>
							<li class="space">
							</li>
							<li>
								<a  class="small" href="register.php">
									<span>sign up</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
        <div class="page-container">
            <h1>Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" class="username required hilightable" placeholder="Enter User Name">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                <input type="password" name="password" class="password required hilightable" id="myInput" placeholder="Enter Password">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <input type="checkbox" onclick="myFunction()">Show Password
                <input type="Captcha" class="Captcha required hilightable" name="Captcha" placeholder="Enter Vercode">
                <input type="button" id="code" onclick="createCode()" style="height:40px;width:120px" title='click change' value=" "/> 
                
                <button type="submit" class="submit_button" value="Login" onclick=check(this)>User Login</button>
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

