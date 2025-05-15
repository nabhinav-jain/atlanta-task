<?php

$conn = new mysqli("localhost","root","","atlanta-task");

if($conn->error){
    exit("connection failed");
}else{
    echo "<script>console.log('success')</script>";
}