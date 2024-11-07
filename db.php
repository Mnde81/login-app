<?php

$conn = mysqli_connect("localhost", "root", "", "login_app");

if ($conn) {
    echo "Connected";

} else {
    echo "Not connected" . mysqli_error($conn);
}