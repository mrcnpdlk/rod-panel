<?php
/**
 * Created by Marcin.
 * Date: 25.10.2020
 * Time: 23:24
 */

namespace Mrcnpdlk\ROD\App\Model;

use Nette\Database\Context;
use Nette\Database\Table\Selection;
use Nette\SmartObject;
use Tracy\Debugger;

class PlotManager
{
    use SmartObject;

    /** @var \Nette\Database\Context */
    private $database;

    /**
     * PlotManager constructor.
     *
     * @param \Nette\Database\Context $database
     */
    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    /**
     * @return \Nette\Database\Table\Selection
     */
    public function getTable(): Selection
    {
        return $this->database->table('plots');
    }

    /**
     * @return object[]
     */
    public function getAll(): array
    {
        return $this->database->table('plots')->fetchAll();
    }
}
