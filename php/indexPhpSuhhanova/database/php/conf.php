<?php
$user = "darjaveeb";
$password = "12345";
$database = "darjaveeb";
$servername = "localhost";

$connection = new mysqli($servername, $user, $password, $database);

$connection->set_charset("UTF8");

/*CREATE TABLE weather(
	id INT PRIMARY KEY AUTO_INCREMENT,
    date_ DATE,
    temeprature INT,
    description TEXT,
    color varchar(50)
)*/