<?php

namespace App\Core\Database;

interface DatabaseStatementInterface
{
    public function execute(array $params = []);

    public function rowCount(): int;

    public function fetchRow();

    public function fetchAll();

    public function fetchObj($className = \stdClass::class);
}