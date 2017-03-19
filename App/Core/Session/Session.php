<?php

namespace App\Core\Session;

class Session implements SessionInterface
{
    const MSG = "___MSG___";
    const FORM = "___FORM___";

    private $session;

    public function __construct(&$session)
    {
        $this->session = &$session;

        if (!$this->hasProperty(self::MSG)) {
            $this->session[self::MSG] = [];
        }
    }

    public function setProperty(string $name, $value)
    {
        $this->session[$name] = $value;
    }

    public function unsetProperty(string $name)
    {
        unset($this->session[$name]);
    }

    public function hasProperty(string $name): bool
    {
        return isset($this->session[$name]);
    }

    public function getProperty(string $name)
    {
        return $this->session[$name];
    }

    public function destroy()
    {
        $this->session = null;
        session_destroy();
    }

    public function addFormData(string $formName, string $fieldName, $value)
    {
        $this->session[self::FORM][$formName][$fieldName] = $value;
    }

    public function getFormData(string $formName): array
    {
        if (!isset($this->session[self::FORM][$formName])) {
            return [];
        }

        $formData = $this->session[self::FORM][$formName];
        unset($this->session[self::FORM][$formName]);

        return $formData;
    }

    public function addMessage(string $text, int $type)
    {
        $this->session[self::MSG][$type][] = $text;
    }

    public function getMessages(int $type): array
    {
        if (!isset($this->session[self::MSG][$type])) {
            return [];
        }

        $msg = $this->session[self::MSG][$type];
        unset($this->session[self::MSG][$type]);

        return $msg;
    }

    public function flushMessages()
    {
        $this->unsetProperty(self::MSG);
    }

    public function getMessagesCount(int $type): int
    {
        if (!isset($this->session[self::MSG][$type])) {
            return 0;
        }

        return count($this->session[self::MSG][$type]);
    }
}