<?php

// Writing a function
function multiplication($a, $b) {
$product = $a * $b * 5;
return $product;
}

// Including a new file
include('new_file.php');

// Connecting to a database
$host = 'localhost';
$username = 'root';
$password = '';
$database_name = 'week_3_db';
$connection = mysqli_connect($host, $username, $password, $database_name);

if ($connection){
    echo 'Database connection established';
}else{
    echo 'Database connection failed';
}
// End of connection
// Project developed by Ebite Miracle Nonso
?>
