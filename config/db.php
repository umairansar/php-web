<?php

//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//check connection 
if(mysqli_connect_errno()) {
    //connection failed
    echo "Failed to Connect to DB: ".mysqli_connect_errno();
};