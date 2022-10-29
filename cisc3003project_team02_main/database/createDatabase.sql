create database HamburgerData;
use HamburgerData;

create table food
	(food_name		varchar(15),
	 price		decimal(3,1),
	 primary key (food_name)
	);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email varchar(255),
    phone_number varchar(13),
    address varchar(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
create table orders(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    cost INT,
    food_name varchar(15),
    number int,
    no_sauce boolean,
    no_cheese boolean,
    phone_number varchar(13),
    address varchar(255),
    statue boolean default 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)