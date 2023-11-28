<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'cportfolio');
if (!$con) {
    echo "connection error";
}
