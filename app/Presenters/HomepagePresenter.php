<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Presenters;

use Mrcnpdlk\ROD\App\Services\FirebirdService;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var \Mrcnpdlk\ROD\App\Services\FirebirdService
     */
    private $fbSrv;

    public function __construct(FirebirdService $fbSrv)
    {
        parent::__construct();
        $this->fbSrv = $fbSrv;
    }

    public function renderDefault(): void
    {
        $this->fbSrv->dump();
    }
}
