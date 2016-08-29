<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 22:29
 */

namespace Blog\Service;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AbcService implements ServiceProviderInterface
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
        $pimple['abc'] = function(Container $container){
            return "abcabc";
        };
    }

}