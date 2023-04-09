<?php
// Start a session and unset all session variables
session_start();
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the homepage
header("Location: index.php");
exit();
?>





