<?php


namespace App\Core\Request;


interface RequestInterface
{
    public function isPost(): bool;

    public function getData(): array;
}