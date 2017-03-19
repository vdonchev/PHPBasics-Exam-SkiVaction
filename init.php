<?php

use App\Core\Config;

$uri = rtrim($_SERVER["REQUEST_URI"], "/");
if (!preg_match("/^" . preg_quote(Config::APP_ROOT, "/") . "/", $uri)) {
    exit("Invalid APP_ROOT! Set it in App/Core/Config.php!");
}

$uri = preg_replace("/^" . preg_quote(Config::APP_ROOT, "/") . "/", "", $uri);
if (strlen($uri) === 0) {
    $uri = Config::HOME;
}

try {
    $file = "App/{$uri}.php";
    if (file_exists($file)) {
        require_once $file;
    } else {
        require_once "App/" . Config::HOME . ".php";
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
