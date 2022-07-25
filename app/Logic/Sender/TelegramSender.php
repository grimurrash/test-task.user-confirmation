<?php

namespace app\Logic\Sender;

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
        try {
            # Логика отправки

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