<!doctype html>
<html lang="en">
<head>
    <!--CSS-->
    <link rel="stylesheet" href="<?= \App\Core\Config::PUBLIC; ?>/styles/blue.min.css">
    <link rel="stylesheet" href="<?= \App\Core\Config::PUBLIC; ?>/styles/styles.css">

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="<?= \App\Core\Config::PUBLIC; ?>/js/scripts.js"></script>

    <!--META-->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= \App\Core\Config::SITE_NAME; ?></title>
</head>
<body>

<div class="container">
    <div class="row">
        <?php include_once "menu.php"; ?>