<?php
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
unset($_SESSION['phone']);
unset($_SESSION['email']);
unset($_SESSION['address']);
unset($_SESSION['cart']);
header('location: ../index.php');