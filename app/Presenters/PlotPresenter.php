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
     * @param \Nette\Forms\Form $form
     * @param array             $values
     *
     * @throws \Nette\Application\AbortException
     */
    public function editPlotSucceeded(Form $form, array $values): void
    {
        Debugger::barDump($values);
        $this->flashMessage('Post was published', 'success');
        $this->redirect('list');
    }

    public function renderDefault(): void
    {
        $this->template->add('stats', $this->plotMgr->getTable()->select('SUM(powierzchnia) AS powierzchnia , COUNT(*) AS ilosc')->fetch());
    }

    /**
     * @param int $id
     *
     * @throws \Nette\Application\BadRequestException
     */
    public function renderEdit(int $id): void
    {
        $plot = $this->plotMgr->getById($id);
        if (!$plot) {
            $this->error('Post not found');
        }
        $this['editPlotForm']->setDefaults($plot->toArray());
    }

    public function renderList(): void
    {
        $tList = $this->plotMgr->getAll();
        //Debugger::barDump($tList);
        $this->template->add('tElements', $tList);
    }

    protected function createComponentEditPlotForm(): Form
    {
        $form = new Form();
        $form->addText('id')
             ->setRequired()
        ;
        $form->addText('numer')
             ->setRequired('Wprowadź numer działki')
        ;
        $form->addText('powierzchnia')
             ->setRequired('Wprowadź powierzchnię')
        ;

        $form->addSubmit('send', 'Sign in');
        $form->onValidate[] = [$this, 'editPlotSucceeded'];

        return $form;
    }

    /**
     * Tylko dla zalogowanych
     *
     * @throws \Nette\Application\AbortException
     */
    protected function startup(): void
    {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }
}
