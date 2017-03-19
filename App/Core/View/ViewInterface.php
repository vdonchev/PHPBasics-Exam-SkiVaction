<?php

namespace App\Core\View;

use App\Core\Session\SessionInterface;

interface ViewInterface
{
    public function getSession(): SessionInterface;

    public function render(string $viewName, $viewData);

    public function redirect(string $file);

    public function redirectToUrl(string $url);
}