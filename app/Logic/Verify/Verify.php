<?php

namespace app\Logic\Verify;

use app\Logic\Dispatch\Sender;

interface Verify
{
    public function setSender(Sender $sender): static;

    public function setConfirmationCode(string $code): static;

    public function sendingConfirmationCode(): bool;

    public function verificationConfirmationCode(string $userCode): bool;
}