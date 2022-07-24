<?php

namespace app\Logic\Dispatch;

use app\Logic\Logger\Logger;

class TelegramSender implements Sender
{
    private string $chatId;
    private string $parseMode;
    private ?Logger $logger = null;

    public function __construct(string $chatId, string $parseMode = 'html')
    {
        $this->chatId = $chatId;
        $this->parseMode = $parseMode;
    }

    public function send(string $message): bool
    {
        # Логика отправки
        try {
            # $result = TelegramBot::sendMessage($this->chatId, $message, $this->parseMode);
            $this->log('Логирование результата');
            return true;
        } catch (\Exception $exception) {
            $this->log($exception->getMessage());
        }
        return false;
    }

    public function setChatId(string $chatId): static
    {
        $this->chatId = $chatId;
        return $this;
    }

    public function setLogger(Logger $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    public function log($message)
    {
        $this->logger?->log($message);
    }
}