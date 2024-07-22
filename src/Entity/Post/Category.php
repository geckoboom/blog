<?php

declare(strict_types=1);

namespace App\Entity\Post;

final class Category
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }
}
