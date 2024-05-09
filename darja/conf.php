<?php
$user = "darja";
$password = "123";
$database = "darja";
$servername = "localhost";

$yhendus = new mysqli($servername, $user, $password, $database);

$yhendus->set_charset("UTF8");