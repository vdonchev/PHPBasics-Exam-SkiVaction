<?php
declare(strict_types = 1);

use App\Core\Config;
use App\Core\Database\PDODatabase;
use App\Core\Request\Request;
use App\Core\Session\Session;
use App\Core\View\View;

mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
date_default_timezone_set("Europe/Sofia");
session_start();

spl_autoload_register(function (string $class) {
    if (file_exists("{$class}.php")) {
        require_once "{$class}.php";
    }
});

$db = new PDODatabase(Config::DB_HOST, Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
$request = new Request($_SERVER["REQUEST_METHOD"]);
$session = new Session($_SESSION);
$view = new View($session);

require_once "init.php";