<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BeeJee Tasks</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <script scr="/js/jquery-3.4.1.slim.min.js"></script>
    <script scr="/js/popper.min.js"></script>
    <script scr="/js/bootstrap.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                BeeJee Tasks
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php
                        if (Auth::check()) {
                            echo
                                '<li class="nav-item">'.
                                '<form action="/logout" method="POST">'.
                                '<button class="nav-link btn-logout" type="submit">Logout</button>'.
                                '</form>'.
                                '</li>';
                        } else {
                            echo
                                '<li class="nav-item">'.
                                '<a class="nav-link" href="/login">Login</a>'.
                                '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
