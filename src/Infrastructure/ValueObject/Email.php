<?php

declare(strict_types=1);

namespace App\Infrastructure\ValueObject;

final readonly class Email implements \Stringable
{
    public function __construct(
        private string $email
    )
    {
        if (\filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid email', $this->email));
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
