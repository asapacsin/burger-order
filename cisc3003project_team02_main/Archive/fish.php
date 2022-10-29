<!DOCTYPE HTML>
<html>

<?php
    require_once "config.php";


	$sql = "SELECT price FROM food WHERE food_name = 'cheese'";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<script type='text/javascript'> 
					let cheese_price = ".$row["price"]."
				</script>";
		}
	} else {
		echo "Cheese no Data";
	}

	$sql = "SELECT price FROM food WHERE food_name = 'sauce'";
	$result = $link->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<script type='text/javascript'> 
					let sauce_price = ".$row["price"]."
					</script>";
		}
	} else {
		echo "Sauce no Data";
	}

	$sql = "SELECT price FROM food WHERE food_name = 'filet-o-fish'";
	$result = $link->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<script type='text/javascript'> 
					let base_price = ".$row["price"]."
					</script>";
		}
	} else {
		echo "Base no Data";
	}

	$link->close();
?>
<script>
	let number = 0;
	let subtotal_price = 0;
	subtotal_price =  base_price + cheese_price + sauce_price;
	subtotal_price *= number;
	let delivery_fee = 15;
    
	let total_price = 0;
	
	total_price = subtotal_price + delivery_fee;

</script>
<head>
	<title>fish</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
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
							<a class="big" href="myinfo.php">
								<span>My Info</span>
							</a>
						</li>
						<li>
							<a class="big" href="myorder.php">
								<span>Order</span>
							</a>
						</li>
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
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<div class="main">
		<div class="wrap0">
			<div class="wrap1">
				<aside class="qui-asides">				
					<section class="qui-aside">
						<nav class="qui-asideNav">						
							<ul>
								<li>
									<a href="beef.php">
										<span>Beef Burger</span>
									</a>
								</li>
								<li>
									<a href="chicken.php">
										<span>Chicken Burger</span>
									</a>
								</li>
								<li class="active">
									<a href="fish.php">
										<span>Fish Burger</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span>Else</span>
									</a>
								</li>						
							</ul>
						</nav>
					</section>
				</aside>
			</div>
			<div class="wrap2">
				<h1 style="font-size:50px;text-align:center">Filet-O-Fish</h1>
				<span style="padding:400px"><img id="New_Lacheon_Meat_and_Scrambled_Egg_Burger" src="images/fish.png"></span>

				<span id="have_sauce_text" style="font-size:40px"></span><input type="checkbox" id="have_sauce" checked style="width: 55px; height: 55px; ">
				<span id="have_cheese_text" style="font-size:40px"></span><input type="checkbox" id="have_cheese" checked style="width: 55px; height: 55px; ">&nbsp;&nbsp;
				<span id = "have_base" style="font-size:30px">&nbsp;&nbsp;&nbsp;Base price: </span>
                <span style="font-size:30px">&nbsp;&nbsp;&nbsp;Number</span>
       				 <button class="minus" type="button" onclick="opera('val', false);">-</button>
      				 <input class="numbox" type="number" id="val" value="0"/> 
     				 <button class="minus plus" type="button" onclick="opera('val', true);">+</button>
				<script>
				$(function()
			{
				var customize_sauce = document.getElementById('have_sauce');
				var customize_cheese = document.getElementById('have_cheese');
				$("button").click(function(){	
					number = document.getElementById('val').value;	
					document.cookie = 'Cnumber=' + number;
					if(customize_sauce.checked!=true&&customize_cheese.checked==true){	
						subtotal_price = cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce.png");
					}
					if(customize_sauce.checked!=true&&customize_cheese.checked!=true){	
						subtotal_price = base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce_cheese.png");
					}
					if(customize_sauce.checked==true&&customize_cheese.checked!=true){	
						subtotal_price = sauce_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_cheese.png");
					}
					if(customize_sauce.checked==true&&customize_cheese.checked==true){
						subtotal_price = sauce_price + cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish.png");
					}
				})
				$("#have_sauce").click(function(){	
					number = document.getElementById('val').value;	
					document.cookie = 'Cnumber=' + number;		
					if(customize_sauce.checked!=true&&customize_cheese.checked==true){	
						document.cookie = 'Cno_sauce=' + '1';
						subtotal_price = cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce.png");
					}
					if(customize_sauce.checked!=true&&customize_cheese.checked!=true){	
						document.cookie = 'Cno_sauce=' + '1';
						subtotal_price = base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce_cheese.png");
					}
					if(customize_sauce.checked==true&&customize_cheese.checked!=true){	
						document.cookie = 'Cno_sauce=' + '0';
						subtotal_price = sauce_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_cheese.png");
					}
					if(customize_sauce.checked==true&&customize_cheese.checked==true){
						document.cookie = 'Cno_sauce=' + '0';
						subtotal_price = sauce_price + cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish.png");
					}
				})

				$("#have_cheese").click(function(){	
					number = document.getElementById('val').value;	
					document.cookie = 'Cnumber=' + number;
					if(customize_cheese.checked!=true&&customize_sauce.checked==true){
						document.cookie = 'Cno_cheese=' + '1';
						subtotal_price = sauce_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_cheese.png");
					}
					if(customize_cheese.checked!=true&&customize_sauce.checked!=true){
						document.cookie = 'Cno_cheese=' + '1';
						subtotal_price = base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce_cheese.png");
					}
					if(customize_cheese.checked==true&&customize_sauce.checked!=true){
						document.cookie = 'Cno_cheese=' + '0';
						subtotal_price = cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish_no_sauce.png");
					}
					if(customize_cheese.checked==true&&customize_sauce.checked==true){
						document.cookie = 'Cno_cheese=' + '0';
						subtotal_price = sauce_price + cheese_price + base_price;
						subtotal_price *= number;
						total_price = subtotal_price + delivery_fee;
						document.cookie = 'Ctotal_price=' + total_price;
						document.getElementById('subtotal').innerHTML = subtotal_price  + ' mop';
						document.getElementById('total').innerHTML = total_price  + ' mop';
						$('#New_Lacheon_Meat_and_Scrambled_Egg_Burger').attr('src',"images/fish.png");
					}
				})
			});
				</script>
			</div>
			<div class="wrap3">		
				<table class="order">
					<caption>My Order</caption>
					<tr>
						<td class="f">Send to:</td>
						<?php
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
								require_once "config.php";

								$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

								$name = strval(trim($_SESSION["username"]));
								$sql = "SELECT address FROM users WHERE username='$name'";
								$result = $link->query($sql);
								
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<td class='s'>".$row["address"]."</td>";
									}
								} else {
									echo "<td class='s'>No Data</td>";
								}

								$link->close();
							}else{
								echo "<td class='s'>No Data</td>";
							}
						?>				
					</tr>

					<tr>
						<td class="f">Estimated time:</td>
						<?php
							date_default_timezone_set("Asia/Hong_Kong");
							$ET1 = strtotime("+15 Minutes");
							$ET2 = strtotime("+30 Minutes");
							echo "<td class='s'>".date("H:i", $ET1)." - ".date("H:i", $ET2)."</td>"
						?>
					</tr>
					
					<tr>
						<td class="f">Subtotal:</td>
						<td class="s" id="subtotal"></td>
					</tr>
					
					<tr>
						<td class="f">Delivery fee</td>
						<td class="s" id="delivery"></td>
					</tr>
					
					<tr>
						<td class="f">Total:</td>
						<td class="s" id ="total"></td>
					</tr>
					<script>
						document.cookie = 'Cno_sauce=' + '0';
						document.cookie = 'Cno_cheese=' + '0';
						document.getElementById('total').innerHTML = total_price + ' mop';
						document.getElementById('subtotal').innerHTML = subtotal_price + ' mop';
						document.getElementById('delivery').innerHTML = delivery_fee + ' mop';
						document.getElementById('have_sauce_text').innerHTML = 'Sauce $' + sauce_price;
						document.getElementById('have_cheese_text').innerHTML = 'Cheese $' + cheese_price;
						document.getElementById('have_base').innerHTML = 'base price : $' + base_price;
						number = document.getElementById('val').value;
						document.cookie = 'Cnumber=' + number;
					</script>
				</table>
				<a class="buttons">
					<table>
					<tr>
						<form method="post">
							<td><input class="button" name="check_out" value="Check Out" type = "submit" href="login.php">Checkout</td>
						</form>
						</tr>
					</table>
				</a>
				<?php
					
						if(array_key_exists('check_out', $_POST)) {
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
								$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
								$price = $_COOKIE['Ctotal_price'];
								$number = $_COOKIE['Cnumber'];
								$name = trim($_SESSION["username"]);
								$foodname = 'Filet-o-fish';
								$no_sauce = $_COOKIE['Cno_sauce'];
								$no_cheese = $_COOKIE['Cno_cheese'];
								$sql = 'select * from users where username = "'.$name.'"';
								$result = $link->query($sql);
								$row = $result->fetch_assoc();
								$phone = $row["phone_number"];
								$address = $row["address"];
								$sql = "INSERT INTO orders(username,cost,food_name,no_sauce,no_cheese,phone_number,address,number) values(?,?,?,?,?,?,?,?)";
								$stmt = $link -> prepare($sql);
								$stmt->bind_param("sdsiissd",$name,$price,$foodname,$no_sauce,$no_cheese,$phone,$address,$number);
								if ($stmt->execute()) {
									echo "Insert data successfully";
									$link->close();
									echo "<script>window.location.replace('ordered.php');</script>";
								} else {
									echo "Error INSERT data: " . $link->error;
									$link->close();
								}
								$stmt->close();
							}
							else{
								echo '<script>alert("please login first")</script>';
							}
				
						}
				?>
						
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
	<script type="text/javascript">
        function opera(x, y) {
            var rs = new Number(document.getElementById(x).value);
 
            if (y) {
                document.getElementById(x).value = rs + 1;
            } else if( rs >0) {
                document.getElementById(x).value = rs - 1;
            }
 
        }
    </script>
</body>

</html>