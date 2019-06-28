<?php

$database['db_host']  = 'localhost';
$database['db_user']  = 'root';
$database['db_password']  = '';
$database['db_name']  = 'custom_cms';

foreach($database as $key => $value){

    define(strtoupper($key),$value);

}

$dbconnect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)OR die("Error Connecting to DB").mysqli_connect_error();








