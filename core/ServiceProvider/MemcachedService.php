<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 19:46
 */

namespace Core\ServiceProvider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MemcachedService implements ServiceProviderInterface
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
        $pimple['memcached'] = function (Container $container) {
            return $container['lazy_service_factory']->getLazyServiceDefinition(\Memcached::class, function () use ($container) {
                $cacheConfig = CoreUtils::getConfig('cache');
                $server_name = 'server1';
                $type = 'memcached';
                if (CoreUtils::getContainer('server_name')) {
                    $server_name = CoreUtils::getContainer('server_name');
                }
                $memcached = new \Memcached();
                foreach ($cacheConfig[$type][$server_name]['servers'] as $key => $server) {
                    $memcached->addServer($server['host'], $server['port'], $server['timeout']);
                }
                return $memcached;
            });
        };
    }

}