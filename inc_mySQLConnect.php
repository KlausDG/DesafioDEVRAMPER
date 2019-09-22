<?php
    $link = mysqli_connect('localhost', 'root', '', 'db_empresa');

    if (!$link) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>