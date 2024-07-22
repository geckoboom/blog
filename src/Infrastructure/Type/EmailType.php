<?php

declare(strict_types=1);

namespace App\Infrastructure\Type;

use App\Infrastructure\ValueObject\Email;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class EmailType extends Type
{
    public const NAME = 'email';
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    /**
     * @param Email|null $value
     * @param AbstractPlatform $platform
     * @return string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        return $value?->getEmail();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Email
    {
        return $value ? new Email($value) : null;
    }


    public function getName(): string
    {
        return self::NAME;
    }
}
