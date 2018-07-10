<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Kitsune Lootbox</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand" href="<?=Application::getInstance()->link("home")?>">Kitsune Lootbox</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <?php if(AuthService::isLoggedIn()): ?>
                <a class="nav-link" href="<?=Application::getInstance()->link("profile")?>">Profile</a>
                <a class="nav-link" href="<?=Application::getInstance()->link("auth", "logout")?>">Logout</a>
                <?php else: ?>
                <a class="nav-link" href="<?=Application::getInstance()->link("register")?>">Register</a>
                <a class="nav-link" href="<?=Application::getInstance()->link("login")?>">Login</a>
                <?php endif; ?>
            </form>
        </div>
    </nav>
</header>

<main role="main">