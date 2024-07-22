<?php

declare(strict_types=1);

namespace App\Entity\Post;

final class Post
{
    private int $id;
    private int $userId;
    private string $title;
    private string $text;
    private ?int $categoryId;
    private array $tags;
    private ?\DateTimeImmutable $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTime();
    }

    public function setUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }
}
