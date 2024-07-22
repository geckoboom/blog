<?php

declare(strict_types=1);

namespace App\Entity\User;

enum Gender: int
{
    case Male = 0;
    case Female = 1;
}

