<?php

namespace tests\Verify;

use app\Logic\Sender\EmailSender;
use app\Logic\Sender\PhoneSender;
use app\Logic\Sender\TelegramSender;
use app\Logic\Verify\UserVerify;
use app\Models\User;
use PHPUnit\Framework\TestCase;

class UserVerifyTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('1555555', '89999999999', 'test@email.com');
    }

    public function testVerificationConfirmationCode()
    {
        $this->user->setConfirmationCode('8888');
        $userVerify = new UserVerify($this->user);
        $this->assertEquals(true, $userVerify->verificationConfirmationCode('8888'));
    }

    public function testSendingConfirmationCode()
    {
        $userVerify = new UserVerify($this->user);
        $userVerify->setSender(new TelegramSender($this->user->getTelegramChatId()));
        $this->assertEquals(true, $userVerify->sendingConfirmationCode());

        $userVerify->setSender(new PhoneSender($this->user->getPhone()));
        $this->assertEquals(true, $userVerify->sendingConfirmationCode());

        $userVerify->setSender(
          new EmailSender(
            'test@email.com',
            [
              $this->user->getEmail()
            ],
            'UnitTest Email Verify'
          )
        );
        $this->assertEquals(true, $userVerify->sendingConfirmationCode());
    }
}
