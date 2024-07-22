<?php

declare(strict_types=1);

namespace App\Infrastructure\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class EnumType extends Type
{
    public const ENUM = 'enum';

    protected string $enumClass;
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        if (empty($column['enumClass'])) {
            throw new \InvalidArgumentException('The parameter \'enumClass\' is required');
        }
        $this->enumClass = $column['enumClass'];

        if (\is_a($column['enumClass'], \IntBackedEnum::class)) {
            return $platform->getSmallIntTypeDeclarationSQL($column);
        }

        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::ENUM;
    }

    /**
     * @param null|\UnitEnum|\BackedEnum $value
     * @param AbstractPlatform $platform
     * @return \UnitEnum|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?\UnitEnum
    {
        // Conversion logic based on parameter
        return $value === null ? null : $this->enumClass::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        if ($value instanceof \BackedEnum) {
            return $value->value;
        }

        return $value?->name;
    }
}

