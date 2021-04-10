<?php
require 'cognito.php';

if (!$wrapper->isAuthenticated()) {
    header('Location: /views/auth/login.php');
    exit;
}
