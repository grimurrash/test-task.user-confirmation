<?php

namespace app\Logic\Confirmation;

use app\Logic\Sender\Sender;
use app\Models\User;

class UserVerify implements Verify
{
    private Sender $sender;

    private User $user;
    private string $code;

    private string $message = 'Код подтверждения: %s';

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->code = '';
    }

    private function generateCode(): int
    {
        return rand(1000, 9999);
    }

    public function setSender(Sender $sender): static
    {
        $this->sender = $sender;
        return $this;
    }

    public function setConfirmationCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function sendingConfirmationCode(): bool
    {
        if (!$this->code) {
            $this->setConfirmationCode($this->generateCode());
        }
        $this->user->setConfirmationCode($this->code);
        $this->user->update();
        return $this->sender->send(sprintf($this->message, $this->code));
    }

    public function verificationConfirmationCode(string $userCode): bool
    {
        $isVerified = $this->user->getConfirmationCode() === $userCode;

        $this->user->setConfirmationCode('');
        $this->user->update();

        return $isVerified;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}