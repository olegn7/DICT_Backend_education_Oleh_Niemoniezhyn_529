<?php

$connection = mysqli_connect(
    "localhost",
    "root",
    "",
    "guestbook"
);

if (!$connection) {
    die("Database connection failed");
}