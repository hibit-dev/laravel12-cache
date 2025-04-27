<?php

namespace App\Repository\Database;

use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getById(int $userId): array
    {
        return [
            'id' => $userId,
            'source' => 'database',
        ];
    }
}