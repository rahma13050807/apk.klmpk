<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("Location: dashboard_user.php");
}
?>
