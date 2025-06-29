<?php

namespace App\Repository\Cache;

use App\Repository\TaggedUserRepositoryInterface;

use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class TaggedUserRepository implements TaggedUserRepositoryInterface
{
    const CACHE_TAG = 'users';
    const CACHE_PREFIX = 'users';
    const CACHE_TTL_SECONDS = 10;

    protected TagAwareAdapter $cache;

    public function __construct()
    {
        $this->cache = new TagAwareAdapter(
            new RedisAdapter(
                RedisAdapter::createConnection(
                    sprintf(
                        'redis://%s:%s',
                        config('database.redis.cache.host'),
                        config('database.redis.cache.port')
                    )
                )
            )
        );
    }

    public function store(array $user): void
    {
        $this->delete($user); // ensure old entry is removed before updating

        $userId = $user['id'];

        $this->cache->get(
            sprintf('%s:%d', self::CACHE_PREFIX, $userId),
            function (ItemInterface $item) use ($user) {
                $item->expiresAfter(self::CACHE_TTL_SECONDS);
                $item->tag(self::CACHE_TAG);

                return $user;
            }
        );
    }

    public function getById(int $userId): ?array
    {
        return $this->cache->get(
            sprintf('%s:%d', self::CACHE_PREFIX, $userId),
            function (ItemInterface $item) {
                $item->tag(self::CACHE_TAG);
                return null;
            }
        );
    }

    public function delete(array $user): void
    {
        $userId = $user['id'];

        $this->cache->delete(sprintf('%s:%d', self::CACHE_PREFIX, $userId));
    }

    public function clear(): void
    {
        $this->cache->invalidateTags([self::CACHE_TAG]);
    }
}