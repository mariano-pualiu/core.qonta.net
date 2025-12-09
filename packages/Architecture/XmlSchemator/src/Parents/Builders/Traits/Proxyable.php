<?php

namespace Architecture\XmlSchemator\Parents\Builders\Traits;

use App\Builders\Pdf\HigherOrderBuilderProxy;
use Exception;

trait Proxyable
{
    /**
     * The methods that can be proxied.
     *
     * @var string[]
     */
    protected static $proxies = [];

    /**
     * The default method to call if we cant find a called proxy method.
     *
     * @var ?string
     */
    protected static $defaultProxyMethod = null;

    /**
     * Add a method to the list of proxied methods it can be aliased.
     *
     * @param  string  $method
     * @param  string  $alias
     * @return void
     */
    public static function proxy($method, $alias = null)
    {
        static::$proxies[$alias ?? $method] = $method;
    }

    /**
     * Set the fallback method.
     *
     * @param  string  $method
     * @return void
     */
    public static function fallbackProxy($fallbackMethod = 'parent')
    {
        static::$defaultProxyMethod = $fallbackMethod;
    }

    /**
     * Dynamically access builder proxies.
     *
     * @param  string  $key
     * @return mixed
     *
     * @throws \Exception
     */
    public function __get($key)
    {
        if (! in_array($key, array_keys(static::$proxies))) {
            throw new Exception("Property [{$key}] does not exist on this builder ".get_class($this)." instance.");
        }

        return new HigherOrderBuilderProxy($this, static::$proxies[$key], static::$defaultProxyMethod);
    }

    public function __call($method, $parameters)
    {
        return $this->{static::$defaultProxyMethod}()->$method(...$parameters);
        // dd($this, $method, $parameters);
        // if (! in_array($key, array_keys(static::$proxies))) {
        //     throw new Exception("Method [{$method}] does not exist on this builder ".get_class($this)." instance.");
        // }

        // return new HigherOrderBuilderProxy($this, static::$proxies[$key], static::$defaultProxyMethod);
    }
}
