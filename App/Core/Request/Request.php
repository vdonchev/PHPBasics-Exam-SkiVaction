<?php

namespace App\Core\Request;

class Request implements RequestInterface
{
    private $isPost = false;
    private $data = [];

    public function __construct(string $requestMethod)
    {
        if ($requestMethod === "POST") {
            $this->isPost = true;
            $this->data = &$_POST;
        } else {
            $this->data = &$_GET;
        }
    }

    public function isPost(): bool
    {
        return $this->isPost;
    }

    public function getData(): array
    {
        return $this->data;
    }
}