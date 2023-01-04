<?php

session_start(); /* Session Start name */

$host = "localhost:3308"; /* Database Host name */
$user = "root"; /* Database User */
$password = ""; /* Database Password */
$dbname = "bacio_gelato"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection is established or not. if not then stop execution with Connection failed error
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
