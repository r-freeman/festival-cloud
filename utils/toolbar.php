<?php
require 'cognito.php';

$user = null;
$isLoggedIn = false;

if ($wrapper->isAuthenticated()) {
    $isLoggedIn = true;
    $user = $wrapper->getUser();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">FestivalCloud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <?php
                require_once 'functions.php';

                echo '<li class="nav-item"><a class="nav-link" href="/">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/views/festivals/index.php">Festivals</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/views/stages/index.php">Stages</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/views/shows/index.php">Shows</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/views/performers/index.php">Performers</a></li>';
                ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item">
                        <span class="nav-link"><?= $user['Username']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="/views/auth/logout.php" class="nav-link text-primary">Log out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/views/auth/login.php" class="nav-link">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a href="/views/auth/register.php" class="nav-link text-primary">Register</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>



