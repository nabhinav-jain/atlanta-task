<?php

$conn = new mysqli("localhost","root","","atlanta_task");

if($conn->error){
    exit("connection failed");
}