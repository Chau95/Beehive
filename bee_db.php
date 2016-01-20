<?php
    $username = "joe_bee";
    $password = "55881123";
    $hostname = "localhost";
    $database = "joe_bee";

    $cnxn = @mysqli_connect($hostname, $username, $password, $database)
            or die("Error connecting to database: " .
                    mysqli_connect_error());
    //echo 'Connected to database';

?>