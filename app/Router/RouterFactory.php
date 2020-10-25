<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Router;

use Nette;
use Nette\Application\Routers\RouteList;

final class RouterFactory
{
    use Nette\StaticClass;

    public static function createRouter(): RouteList
    {
        $router = new RouteList();
        $router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');
        $router->addRoute('sign/in', 'Sign:in');

        return $router;
    }
}
