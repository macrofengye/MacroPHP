<?php
/**
 * Created by PhpStorm.
 * User: macro
 * Date: 16-9-8
 * Time: 上午8:38
 */

namespace Core\ServiceProvider;


use Core\Middleware\Session;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SessionService implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['session'] = function (Container $container) {
            $session = new Session();
            return $session;
        };
    }

}