<?php

namespace app\Models;

class User
{
    private string $id;
    private string $confirmationCode;
    private string $telegramChatId;
    private string $phone;
    private string $email;

    public function __construct(string $telegramChatId = '', string $phone = '', string $email = '')
    {
        $this->telegramChatId =$telegramChatId;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Сохранение изменений в бд
     *
     * @return void
     */
    public function update(): void
    {
    }

    public function getConfirmationCode(): string
    {
        return $this->confirmationCode;
    }

    public function setConfirmationCode(string $confirmationCode): void
    {
        $this->confirmationCode = $confirmationCode;
    }

    public function getTelegramChatId(): string
    {
        return $this->telegramChatId;
    }

    public function setTelegramChatId(string $telegramChatId): void
    {
        $this->telegramChatId = $telegramChatId;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getId(): string
    {
        return $this->id;
    }
}