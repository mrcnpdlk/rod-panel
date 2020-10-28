<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Router;

use Mrcnpdlk\ROD\App\Presenters\SignPresenter;
use Nette;
use Nette\Application\Routers\RouteList;

final class RouterFactory
{
    use Nette\StaticClass;

    public static function createRouter(): RouteList
    {
        $router = new RouteList();

        $router->addRoute('logowanie', 'Sign:in');
        $router->addRoute('dzialki', 'Plot:default');
        $router->addRoute('dzialki/lista', 'Plot:list');
        $router->addRoute('dzialka/<id>/edycja', 'Plot:edit');
        $router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');

        return $router;
    }
}
