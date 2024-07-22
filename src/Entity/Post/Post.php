<?php

declare(strict_types=1);

namespace App\Entity\Post;

use Doctrine\Common\Collections\ArrayCollection;
use function Symfony\Component\String\u;

final class Post
{
    private int $id;
    private int $userId;
    private string $title;
    private string $text;
    private ?int $categoryId;
    private ArrayCollection $tags;
    private ?\DateTimeImmutable $createdAt;
    private ?\DateTime $updatedAt;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTime();
    }

    public function setUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }
}
