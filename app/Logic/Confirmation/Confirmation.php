<?php

namespace app\Logic\Confirmation;

use app\Logic\Sender\Sender;

interface Confirmation
{
    public function setSender(Sender $sender): static;

    public function setConfirmationCode(string $code): static;

    public function sendingConfirmationCode(): bool;

    public function verificationConfirmationCode(string $userCode): bool;
}