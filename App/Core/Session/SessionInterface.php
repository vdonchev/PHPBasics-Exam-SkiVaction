<?php

namespace App\Core\Session;

interface SessionInterface
{
    public function setProperty(string $name, $value);

    public function unsetProperty(string $name);

    public function hasProperty(string $name): bool;

    public function getProperty(string $name);

    public function destroy();

    public function addFormData(string $formName, string $fieldName, $value);

    public function getFormData(string $formName): array;

    public function addMessage(string $text, int $type);

    public function getMessages(int $type): array;

    public function getMessagesCount(int $type): int;

    public function flushMessages();
}