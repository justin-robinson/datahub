<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Services\Cache\Storage\Adapter;

use Zend\Cache\Storage\Adapter\BlackHole;

class NoCache extends BlackHole
{
    /**
     * Overwrite to be a noop
     * @param string $options
     */
    public function __construct($options = null)
    {
        // overwrote to not set options
    }

    /**
     * Compatibility with memcache config
     * @param array $servers
     * @return \Services\Cache\Storage\Adapter\NoCache
     */
    public function setServers($servers) {
        return $this;
    }

    /**
     * Compatibility with memcache config
     * @param bool $readable
     * @return \Services\Cache\Storage\Adapter\NoCache
     */
    public function setReadable($readable) {
        return $this;
    }

    /**
     * Compatibility with memcache config
     * @param bool $writeable
     * @return \Services\Cache\Storage\Adapter\NoCache
     */
    public function setWriteable($writeable) {
        return $this;
    }

    /**
     * Compatibility with memcache config
     * @param string $ttl
     * @return \Services\Cache\Storage\Adapter\NoCache
     */
    public function setTtl($ttl) {
        return $this;
    }

    /**
     * Overwrite to be a no-op
     * @param array options
     * @return \Services\Cache\Storage\Adapter\NoCache
     */
    public function setOptions($options) {
        return $this;
    }

    /**
     * Get an item.
     *
     * @param  string  $key
     * @param  bool $success
     * @param  mixed   $casToken
     * @return mixed Data on success, null on failure
     */
    public function getItem($key, & $success = null, & $casToken = null)
    {
        $success = false;
        return null;
    }

    /**
     * Get multiple items.
     *
     * @param  array $keys
     * @return array Associative array of keys and values
     */
    public function getItems(array $keys)
    {
        return array();
    }

    /**
     * Test if an item exists.
     *
     * @param  string $key
     * @return bool
     */
    public function hasItem($key)
    {
        return false;
    }

    /**
     * Test multiple items.
     *
     * @param  array $keys
     * @return array Array of found keys
     */
    public function hasItems(array $keys)
    {
        return array();
    }

    /**
     * Get metadata of an item.
     *
     * @param  string $key
     * @return array|bool Metadata on success, false on failure
     */
    public function getMetadata($key)
    {
        return false;
    }

    /**
     * Get multiple metadata
     *
     * @param  array $keys
     * @return array Associative array of keys and metadata
     */
    public function getMetadatas(array $keys)
    {
        return array();
    }

    /**
     * Store an item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function setItem($key, $value)
    {
        return false;
    }

    /**
     * Store multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function setItems(array $keyValuePairs)
    {
        return array_keys($keyValuePairs);
    }

    /**
     * Add an item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function addItem($key, $value)
    {
        return false;
    }

    /**
     * Add multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function addItems(array $keyValuePairs)
    {
        return array_keys($keyValuePairs);
    }

    /**
     * Replace an existing item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function replaceItem($key, $value)
    {
        return false;
    }

    /**
     * Replace multiple existing items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function replaceItems(array $keyValuePairs)
    {
        return array_keys($keyValuePairs);
    }

    /**
     * Set an item only if token matches
     *
     * It uses the token received from getItem() to check if the item has
     * changed before overwriting it.
     *
     * @param  mixed  $token
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function checkAndSetItem($token, $key, $value)
    {
        return false;
    }

    /**
     * Reset lifetime of an item
     *
     * @param  string $key
     * @return bool
     */
    public function touchItem($key)
    {
        return false;
    }

    /**
     * Reset lifetime of multiple items.
     *
     * @param  array $keys
     * @return array Array of not updated keys
     */
    public function touchItems(array $keys)
    {
        return $keys;
    }

    /**
     * Remove an item.
     *
     * @param  string $key
     * @return bool
     */
    public function removeItem($key)
    {
        return false;
    }

    /**
     * Remove multiple items.
     *
     * @param  array $keys
     * @return array Array of not removed keys
     */
    public function removeItems(array $keys)
    {
        return $keys;
    }

    /**
     * Increment an item.
     *
     * @param  string $key
     * @param  int    $value
     * @return int|bool The new value on success, false on failure
     */
    public function incrementItem($key, $value)
    {
        return false;
    }

    /**
     * Increment multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Associative array of keys and new values
     */
    public function incrementItems(array $keyValuePairs)
    {
        return array();
    }

    /**
     * Decrement an item.
     *
     * @param  string $key
     * @param  int    $value
     * @return int|bool The new value on success, false on failure
     */
    public function decrementItem($key, $value)
    {
        return false;
    }

    /**
     * Decrement multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Associative array of keys and new values
     */
    public function decrementItems(array $keyValuePairs)
    {
        return array();
    }

    /**
     * Capabilities of this storage
     *
     * @return Capabilities
     */
    public function getCapabilities()
    {
        if ($this->capabilities === null) {
            // use default capabilities only
            $this->capabilityMarker = new stdClass();
            $this->capabilities     = new Capabilities($this, $this->capabilityMarker);
        }
        return $this->capabilities;
    }

    /* AvailableSpaceCapableInterface */

    /**
     * Get available space in bytes
     *
     * @return int|float
     */
    public function getAvailableSpace()
    {
        return 0;
    }

    /* ClearByNamespaceInterface */

    /**
     * Remove items of given namespace
     *
     * @param string $namespace
     * @return bool
     */
    public function clearByNamespace($namespace)
    {
        return false;
    }

    /* ClearByPrefixInterface */

    /**
     * Remove items matching given prefix
     *
     * @param string $prefix
     * @return bool
     */
    public function clearByPrefix($prefix)
    {
        return false;
    }

    /* ClearExpiredInterface */

    /**
     * Remove expired items
     *
     * @return bool
     */
    public function clearExpired()
    {
        return false;
    }

    /* FlushableInterface */

    /**
     * Flush the whole storage
     *
     * @return bool
     */
    public function flush()
    {
        return false;
    }

    /* IterableInterface */

    /**
     * Get the storage iterator
     *
     * @return KeyListIterator
     */
    public function getIterator()
    {
        return new KeyListIterator($this, array());
    }

    /* OptimizableInterface */

    /**
     * Optimize the storage
     *
     * @return bool
     */
    public function optimize()
    {
        return false;
    }

    /* TaggableInterface */

    /**
     * Set tags to an item by given key.
     * An empty array will remove all tags.
     *
     * @param string   $key
     * @param string[] $tags
     * @return bool
     */
    public function setTags($key, array $tags)
    {
        return false;
    }

    /**
     * Get tags of an item by given key
     *
     * @param string $key
     * @return string[]|FALSE
     */
    public function getTags($key)
    {
        return false;
    }

    /**
     * Remove items matching given tags.
     *
     * If $disjunction only one of the given tags must match
     * else all given tags must match.
     *
     * @param string[] $tags
     * @param  bool  $disjunction
     * @return bool
     */
    public function clearByTags(array $tags, $disjunction = false)
    {
        return false;
    }

    /* TotalSpaceCapableInterface */

    /**
     * Get total space in bytes
     *
     * @return int|float
     */
    public function getTotalSpace()
    {
        return 0;
    }
}
