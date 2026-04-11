<?php
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $message = ($user === "host" && $pass === "pass") ? "Login Successful!" : "Login Failed.";
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
</form>
<div><?= $message ?></div>
