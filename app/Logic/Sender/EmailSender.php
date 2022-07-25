<?php

namespace app\Logic\Sender;

use app\Logic\Logger\Logger;

class EmailSender implements Sender
{
    private array $to;
    private string $subject;
    private string $from;

    private ?Logger $logger = null;

    public function __construct(string $from, array $to, string $subject = '')
    {
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
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

    public function setFrom(string $from): static
    {
        $this->from = $from;
        return $this;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;
        return $this;
    }

    public function setRecipients(array $to): static {
        $this->to = $to;
        return $this;
    }

    public function getRecipients(): array
    {
        return $this->to;
    }

    public function getSubject(): string
    {
        return $this->subject;
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