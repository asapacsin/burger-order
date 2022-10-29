<!DOCTYPE html>
<html>
<head>
    <title>index</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			</div>
		</div>

		<div class="main">
			<div class="wrap">
				<div class="about">
					<div class="about-top row">
						<div class="col span_1_of_about col-md-8 col-ms-12">
							<h3>Choose Your Burger</h3>
							<div class="services-box">
								<div class="col_1_of_2 span_1_of_2">
									<div class="img_container">
										<a href="beef.php"><img src="images/beef.png" alt="" /></a> 
										<div class="mask">Beef Burger</div>
									</div>

									<p class="text1">beef burger</p>
								</div>
								<div class="col_1_of_2 span_1_of_2">
									<div class="img_container">
										<a href="chicken.php"><img src="images/chicken.png" alt="" /></a>
										<div class="mask">chicken burger</div>
									</div>
									<p class="text1">chicken burger</p>
								</div>
								<div class="clear"></div>
							</div>
							<div class="services-box">
								<div class="col_1_of_2 span_1_of_2">
									<div class="img_container">
										<a href="fish.php"><img src="images/fish_menu.png" alt="" /></a>
										<div class="mask">fish burger</div>
									</div>
									<p class="text1">fish burger</p>
								</div>
								<div class="col_1_of_2 span_1_of_2">
									<div class="img_container">
										<img src="images/rickroll.gif" alt="" />
										<div class="mask">else</div>
									</div>
									<p class="text1">else</p>
								</div>
								<div class="clear"></div>
							</div>
						</div>						
					</div>
						<div class="clear"></div>
				</div>
			</div>
		</div>
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
