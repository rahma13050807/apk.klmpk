<?php
session_start();
if ($_SESSION['role'] != "user") {
    header("Location: dashboard_admin.php");
}
?>
