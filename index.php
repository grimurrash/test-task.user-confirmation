<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

require_once __DIR__. "/vendor/autoload.php";

use app\Logic\Sender\TelegramSender;
use app\Logic\Confirmation\UserConfirmation;
use app\Models\User;

$userCode = $_GET['code'] ?? null;
$user = new User();

if ($userCode) {
    $user->setConfirmationCode('8888');
    $userVerify = new UserConfirmation($user);
    $isVerified = $userVerify->verificationConfirmationCode($userCode);

    echo $isVerified ? 'Код совпадает' : 'Код не совпадает';
} else {
    $userVerify = new UserConfirmation($user);
    $userVerify->setSender(new TelegramSender($user->getTelegramChatId()));
    $userVerify->sendingConfirmationCode();
    echo "Код отправлен";
}