<?php
$user = "d124967_darjadb";
$password = "Ssyyogpumeh16";
$database = "d124967_database";
$servername = "d124967.mysql.zonevs.eu";

$connection = new mysqli($servername, $user, $password, $database);
$connection->set_charset("UTF8");

/*CREATE TABLE weather(
	id INT PRIMARY KEY AUTO_INCREMENT,
    date_ DATE,
    temprature INT,
    description TEXT)*/