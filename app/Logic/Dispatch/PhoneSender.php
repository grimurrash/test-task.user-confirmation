<?php

namespace app\Logic\Dispatch;

use app\Logic\Logger\Logger;

class PhoneSender implements Sender
{
    private string $phone;
    private ?Logger $logger = null;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function send(string $message): bool
    {
        # Логика отправки
        try {
//            $result = SMSManager::setPhone($this->phone)
//              ->setMessage($message)
//              ->send();
            $this->log('Логирование результата');
            return true;
        } catch (\Exception $exception) {
            $this->log($exception->getMessage());
        }
        return false;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;
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