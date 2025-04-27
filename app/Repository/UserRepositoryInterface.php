<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function store(array $user): void;

    public function getById(int $userId): ?array;
}