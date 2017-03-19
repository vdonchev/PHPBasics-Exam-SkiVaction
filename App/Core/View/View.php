<?php

namespace App\Core\View;

use App\Core\Config;
use App\Core\Session\SessionInterface;

class View implements ViewInterface
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    public function render(string $viewName, $viewData)
    {
        include_once Config::SHARED_VIEWS . "header.php";
        include_once Config::VIEWS . $viewName . ".php";
        include_once Config::SHARED_VIEWS . "footer.php";
    }

    public function redirect(string $file)
    {
        $this->redirectToUrl(Config::APP_ROOT . "/{$file}");
    }

    public function redirectToUrl(string $url)
    {
        header("Location: {$url}");
        exit;
    }
}