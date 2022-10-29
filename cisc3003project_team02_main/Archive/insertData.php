<?php
    require_once "config.php";

	$sql = "CREATE TABLE IF NOT EXISTS food(
    food_name VARCHAR(15) PRIMARY KEY,
	price DECIMAL(3,1)
	)";

    if ($link->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone_number VARCHAR(13),
    address VARCHAR(255),
    CREATEd_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    
    if ($link->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS orders(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    cost INT,
    CREATEd_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    
    if ($link->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "INSERT INTO food(food_name, price)
            VALUES
                ('ham',6),
                ('pork',8),
                ('beef',10),
                ('fish',10),
                ('sauce',1),
                ('cheese',3),
                ('filet-o-fish',13);";

    if ($link->query($sql) === TRUE) {
        echo "Insert data successfully";
    } else {
        echo "Error INSERT data: " . $conn->error;
    }

	$link->close();
?>