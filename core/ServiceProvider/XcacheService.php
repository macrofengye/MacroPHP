<?php
/**
 * Created by PhpStorm.
 * User: macro
 * Date: 16-8-26
 * Time: 上午9:24
 */

namespace Core\ServiceProvider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class XcacheService implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['xcache'] = function (Container $container) {
            return $container['lazy_service_factory']->getLazyServiceDefinition(\Doctrine\Common\Cache\XcacheCache::class, function () {
                return new \Doctrine\Common\Cache\XcacheCache();
            });
        };
    }
}