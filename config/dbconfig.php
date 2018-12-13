<?php
/**
 * Configuratiebestand voor het openen van de PDO database connectie.
 */
session_start();
$db = "rewinkel"; 
$host = "localhost"; 
$dsn = "mysql:dbname=$db;host=$host";
$user_name = "admin"; 
$pass_word = "admin";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use rewinkel\user\User as User;
$user = new User();
$user->dbConnect($dsn, $user_name, $pass_word);
