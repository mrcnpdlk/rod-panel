<?php
/**
 * Created by Marcin.
 * Date: 25.10.2020
 * Time: 23:24
 */

namespace Mrcnpdlk\ROD\App\Model;

use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\SmartObject;

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
     * @return object[]
     */
    public function getAll(): array
    {
        return $this->database->table('dzialki')->fetchAll();
    }

    /**
     * @param int $plotId
     *
     * @return \Nette\Database\Table\ActiveRow|null
     */
    public function getById(int $plotId): ?ActiveRow
    {
        return $this->database->table('dzialki')->get($plotId);
    }

    /**
     * @return \Nette\Database\Table\Selection
     */
    public function getTable(): Selection
    {
        return $this->database->table('dzialki');
    }
}
