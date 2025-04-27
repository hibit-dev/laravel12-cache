<?php

namespace App\Repository\Cache;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class UserRepository implements UserRepositoryInterface
{
    const CACHE_PREFIX = 'users';
    const CACHE_TTL_SECONDS = 10;

    public function store(array $user): void
    {
        $userId = $user['id'];

        Cache::set(sprintf('%s:%d', self::CACHE_PREFIX, $userId), $user, self::CACHE_TTL_SECONDS);
    }

    public function getById(int $userId): ?array
    {
        return Cache::get(sprintf('%s:%d', self::CACHE_PREFIX, $userId));
    }

    public function delete(array $user): void
    {
        $userId = $user['id'];

        Cache::forget(sprintf('%s:%d', self::CACHE_PREFIX, $userId));
    }
}