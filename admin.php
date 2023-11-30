<?php
// Start session
session_start();

// Check if the user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // User is logged in
    echo '<a href="index.php">DreamHouse</a> <br>';
    echo '<a href="php/logout.php">Log Out</a> <br>';
    echo '<a href="php/dashboard.php">Dashboard</a> <br>';
} else {
    // User is not logged in
    echo '<a href="index.php">DreamHouse</a> <br>';
    echo '<a href="php/register.php">Register</a> <br>';
    echo '<a href="php/login.php">Log In</a> <br>';
}
?>