<?php

namespace app\Logic\Dispatch;

use app\Logic\Logger\Logger;

interface Sender
{
    public function send(string $message): bool;

    public function setLogger(Logger $logger): static;

    public function log($message);
}