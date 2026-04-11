<?php
session_start();
$sessionToken = $_SESSION["confirmation"] ?? "";
$postToken = $_POST["confirmation"] ?? "";

if ($sessionToken !== $postToken || empty($sessionToken)) {
    die("CSRF validation failed. Request blocked.");
}

$user = $_POST["username"];
$pass = $_POST["password"];
echo ($user === "host" && $pass === "pass") ? "Login Successful!" : "Login Failed.";
?>
