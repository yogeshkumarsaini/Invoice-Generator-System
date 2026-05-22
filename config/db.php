<?php

$conn = mysqli_connect("localhost", "root", "", "invoice_generator");

if (!$conn) {
    die("Database Connection Failed");
}

?>