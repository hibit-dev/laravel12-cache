<?php

namespace App\Repository;

interface TaggedUserRepositoryInterface
{
    public function store(array $user): void;

    public function getById(int $userId): ?array;

    public function delete(array $user): void;
}