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
        $router->addRoute('<presenter>/<action>', 'Homepage:default');
        $router->addRoute('sign/in', 'Sign:in');
        $router->addRoute('plot', 'Plot:default');
        $router->addRoute('plot/list', 'Plot:list');

        return $router;
    }
}
