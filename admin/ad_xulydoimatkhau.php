<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'CT466-01';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn -> set_charset('utf8');



