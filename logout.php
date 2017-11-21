<?php
@session_start();
$_SESSION['login_user'] = null;
session_destroy();
Header("Location: ./login.php");