<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Presenters;

use Mrcnpdlk\ROD\App\Model\PlotManager;
use Nette\Forms\Form;
use Tracy\Debugger;

/**
 * Class PlotPresenter
 */
final class PlotPresenter extends BasePresenterAbstract
{
    /**
     * @var \Mrcnpdlk\ROD\App\Model\PlotManager
     */
    private $plotMgr;

    public function __construct(PlotManager $plotMgr)
    {
        parent::__construct();
        $this->plotMgr = $plotMgr;
    }

    /**
     * Tylko dla zalogowanych
     */
    protected function startup(): void
    {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

    public function renderDefault(): void
    {
        $this->template->add('stats', $this->plotMgr->getTable()->select('SUM(powierzchnia) AS powierzchnia , COUNT(*) AS ilosc')->fetch());
    }

    public function renderList(): void
    {
        $tList = $this->plotMgr->getAll();
        //Debugger::barDump($tList);
        $this->template->add('tElements', $tList);
    }

    public function actionEdit(int $plotId): void
    {
        $post = $this->plotMgr->getById($plotId);
        if (!$post) {
            $this->error('Post not found');
        }
        //$this['postForm']->setDefaults($post->toArray());
    }
}
