<?php
include "config.php";

$log_user = '';

// Check user login or not and username is not empty
if (!isset($_SESSION['name']) or !empty($_SESSION['name'])) {
    $log_user = "<nav class=\"log-user\">
    <ul>
        <li class=\"login\"><a href=\"/src/login/login.php\">Sign In</a></li>
        <li class=\"register\"><a href=\"/src/register/register.php\">Sign Up</a></li>
    </ul>
</nav>";
}


// Check login form submit or not.
if (isset($_POST['btn-logout'])) {
    session_destroy();
    header('Location: /index.php');
}


if(isset($_SESSION['name'])) {
    $log_user = "<nav class=\"log-user user\">
    <label for=\"user\"><span></span></label>
    <input type=\"checkbox\" name=\"user\" id=\"user\" class=\"user\">
    <div class=\"sesion-container\">
        <form action=\"\" method=\"POST\">
            <label for=\"btn/logout\">{$_SESSION['name']}</label>
            <input type=\"submit\" name=\"btn-logout\" class=\"btn-logout\" value=\"Cerrar Sesión\">
        </form>
    </div>
</nav>";
}
?>

<!-- <nav class="log-user">
            <ul>
                <li class="login"><a href="/src/login/login.php">Sign In</a></li>
                <li class="register"><a href="/src/register/register.php">Sign Up</a></li>
            </ul>
        </nav> -->

