<?php
session_start(); 

unset($_SESSION['user']);

header('location: /controllers/home-ctrl.php');
die;