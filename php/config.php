<?php
$connection = new mysqli("142.93.65.58","kgrufzsskd","5cdQmg5SCt","kgrufzsskd");
//$connection = new mysqli("localhost","root","","twta");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}