<?php

namespace App\Repository\Database;

use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function store(array $user): void
    {
        // TODO store in DB
    }

    public function getById(int $userId): ?array
    {
        // TODO retrieve from DB

        return [
            'id' => $userId,
            'name' => 'John',
        ];
    }

    public function delete(array $user): void
    {
        // TODO delete from DB
    }
}