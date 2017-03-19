<?php

namespace App\Core;

class Config
{
    const DB_HOST = "127.0.0.1";
    const DB_NAME = "exam-framework-mini";
    const DB_USER = "root";
    const DB_PASS = "";

    /**
     * if project is in sub-folder "/asd" APP_ROOT should be set to "/asd"
     */
    const APP_ROOT = "/ExamFrameworsk-Mini";
    const HOME = "home";
    const PUBLIC = self::APP_ROOT . "/public";
    const IMG_ROOT = self::APP_ROOT . "/public/static";
    const VIEWS = "App/views/";
    const SHARED_VIEWS = "App/views/_layout/";

    const SITE_NAME = "Ski Vaction";
    const SITE_DESCRIPTION = "A simple PHP web application build with PHP7 and MySQL 5.6 @softuni exam";

    private function __construct()
    {
    }
}