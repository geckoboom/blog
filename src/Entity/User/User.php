<?php

namespace App\Entity\User;

use App\Infrastructure\ValueObject\Email;

final class User
{
    private int $id;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private Email $email;
    private string $password;
    private ?\DateTimeImmutable $birthday = null;
    private ?Gender $gender = null;
    private ?\DateTimeImmutable $createdAt;
    private ?\DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }
}
