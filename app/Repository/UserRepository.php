<?php

namespace App\Repository;

use App\Repository\Cache\UserRepository as CacheUserRepository;
use App\Repository\Database\UserRepository as DatabaseUserRepository;

readonly class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private CacheUserRepository $cacheUserRepository,
        private DatabaseUserRepository $databaseUserRepository,
    ) {
    }

    public function store(array $user): void
    {
        $this->databaseUserRepository->store($user);
        $this->cacheUserRepository->store($user);
    }

    public function getById(int $userId): ?array
    {
        $user = $this->cacheUserRepository->getById($userId);
        $source = 'cache';

        if ($user === null) {
            $user = $this->databaseUserRepository->getById($userId);
            $source = 'database';

            $this->cacheUserRepository->store($user);
        }

        return array_merge($user, ['source' => $source]);
    }
}