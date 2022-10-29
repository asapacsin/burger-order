<!DOCTYPE HTML>
<html>

<head>
	<title>myinfo</title>
	<link href="css/myinfo.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container" style="width:100%;padding: 0px;margin: 0px;">
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
								<a class="big" href="#">
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
                                <?php
                                    session_start();
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                    }
                                    else{
                                        echo('<a class="small" href="login.php"><span>login</span></a>');
                                    }
                                ?>
							</li>
							<li>
                                <?php
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                    }
                                    else{
										echo "<script>alert('Please log in!');</script>";
                                        echo('<a class="small" href="register.php"><span>sign up</span></a>');
                                    }
                                ?>
							</li>
                            <?php
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
										echo('<li>');
                                        echo('<a class="small" href="logout.php"><span>log out</span></a>');
										echo('</li>');
										$name = trim($_SESSION["username"]);
										echo('<li>');
										echo('<span>Welcome '.$name.'!</span>');
										echo('</li>');
                                    }
                            ?>
						</ul>
					</div>
					<div class="clear"></div>
					</div>
			</div>
		</div>


		<div class="main">
			<div class="wrap0">			
				<div class="wrap2">
						<h1 class="ordertitle">My Information</h1><br/>
						<table class="order">
							<tr>
								<td>ID:</td>
								<?php
									if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
										require_once "config.php";

										$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

										$name = strval(trim($_SESSION["username"]));
										$sql = "SELECT id FROM users WHERE username='$name'";
										$result = $link->query($sql);
										
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<td>".$row["id"]."</td>";
											}
										} else {
											echo "<td>No Data</td>";
										}

									}else{
										echo "<td>No Data</td>";
									}
								?>
							</tr>
							<tr>
								<td>User Name:</td>
								<?php
									if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

										$name = strval(trim($_SESSION["username"]));
										$sql = "SELECT username FROM users WHERE username='$name'";
										$result = $link->query($sql);
										
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<td>".$row["username"]."</td>";
											}
										} else {
											echo "<td>No Data</td>";
										}

									}else{
										echo "<td>No Data</td>";
									}
								?>
							</tr>
							<tr>
								<td>Address:</td>
								<?php
									if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){


										$name = strval(trim($_SESSION["username"]));
										$sql = "SELECT address FROM users WHERE username='$name'";
										$result = $link->query($sql);
										
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<td>".$row["address"]."</td>";
											}
										} else {
											echo "<td>No Data</td>";
										}

									}else{
										echo "<td>No Data</td>";
									}
								?>
							</tr>
							<tr>
								<td>Phone Number:</td>
								<?php
									if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){


										$name = strval(trim($_SESSION["username"]));
										$sql = "SELECT phone_number FROM users WHERE username='$name'";
										$result = $link->query($sql);
										
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<td>".$row["phone_number"]."</td>";
											}
										} else {
											echo "<td>No Data</td>";
										}

										$link->close();
									}else{
										echo "<td>No Data</td>";
									}
								?>
							</tr>
						</table>
						
					

					</div>					
				</div>
				</div>
						
		
				
			<div class="clear"></div>
			
			<div class="footer">
				<div class="wrap">
					<div class="footer-top">
						<div class="col_1_of_4 span_1_of_4">
							<h3>About Us</h3>
							<ul class="first">
								<li>
									<a href="#">about webiste</a>
								</li>
								<li>
									<a href="#">Privacy Policy</a>
								</li>
								<li>
									<a href="#">Service Agreement</a>
								</li>
								<li>
									<a href="#">Site Map</a>
								</li>
								<li>
									<a href="#">Content Us</a>
								</li>
								<li>
									<a href="#">Join Us</a>
								</li>
							</ul>
						</div>
						<div class="col_1_of_4 span_1_of_4">
							<h3>Menu</h3>
							<ul class="first">
								<li>
									<a href="#">Beef</a>
								</li>
								<li>
									<a href="#">Chicken</a>
								</li>
								<li>
									<a href="#">Fish</a>
								</li>
								<li>
									<a href="#">Pork</a>
								</li>
								<li>
									<a href="#">Else</a>
								</li>
							</ul>
						</div>						
						<div class="clear"></div>
					</div>
					
				</div>
			</div>
		</div>
</body>

</html>