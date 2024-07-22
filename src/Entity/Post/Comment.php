<?php

declare(strict_types=1);

namespace App\Entity\Post;

final class Comment
{
    private int $id;
    private int $postId;
    private string $comment;
    private int $userId;
    private \DateTimeImmutable $createdAt;
    private \DateTime $updatedAt;

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
