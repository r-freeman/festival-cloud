<?php
define('COOKIE_NAME', 'aws-cognito-app-access-token');

if (isset($_COOKIE[COOKIE_NAME])) {
    unset($_COOKIE[COOKIE_NAME]);
    setcookie(COOKIE_NAME, '', time() - 3600, '/');
    header('Location: /');
}
