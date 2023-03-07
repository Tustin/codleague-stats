<?php

namespace Tustin\CodLeague\Models;

use Tustin\CodLeague\Client;
use Tustin\Haste\Http\HttpClient;

abstract class ApiModel extends HttpClient
{
    protected Client $client;

    private array $cache = [];

    private bool $hasFetched = false;

    public function __construct(Client $client)
    {
        $this->httpClient = $client->getHttpClient();
    }

    /**
     * Plucks a property from the model.
     *
     * @return mixed
     */
    public function pluck(string $property, bool $ignoreCache = false): mixed
    {
        $pieces = explode('.', $property);

        $root = $pieces[0];

        $exists = array_key_exists($root, $this->cache);

        if (!$exists) {
            if (!$this->hasFetched() || $ignoreCache) {
                $this->setCache($this->performFetch());
                return $this->pluck($property);
            } else {
                return null;
            }
        }

        if (empty($this->cache)) {
            throw new \InvalidArgumentException('Failed to populate cache for model [' . get_class($this) . ']');
        }

        $value = $this->cache[$root];

        array_shift($pieces);

        foreach ($pieces as $piece) {
            if (!is_array($value)) {
                throw new \RuntimeException("Value [$value] passed to pluck is not an array, but tried accessing a key from it.");
            }

            $value = $value[$piece];
        }

        return $value;
    }

    /**
     * Performs the fetch and sets the hasFetched flag.
     */
    private function performFetch(): object
    {
        $this->hasFetched = true;

        return $this->fetch();
    }

    /**
     * Returns whether or not the model has fetched.
     */
    protected function hasFetched(): bool
    {
        return $this->hasFetched;
    }

    /**
     * Sets the cache as an array and returns it.
     */
    public function setCache(object $data): array
    {
        // So this is bad and probably slow, but it's less annoying than some recursive method.
        $this->cache = json_decode(json_encode($data, JSON_FORCE_OBJECT), true);

        return $this->getCache();
    }

    /**
     * Returns the cache.
     */
    public function getCache(): array
    {
        return $this->cache;
    }

    /**
     * Gets the client.
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Fetches the model from the API.
     */
    public abstract function fetch(): mixed;
}
