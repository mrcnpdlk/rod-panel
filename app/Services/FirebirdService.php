<?php
/**
 * Created by Marcin Pudełek <marcin@pudelek.org.pl>
 * Date: 29.09.2020
 * Time: 11:20
 */

namespace Mrcnpdlk\ROD\App\Services;

use Pecee\Pixie\Connection;
use Tracy\Debugger;

class FirebirdService
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct($params)
    {
        $this->pdo = new \PDO($params['dsn'], $params['user'], $params['password'], [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }

    public function dump(): void
    {
        $stm   = $this->pdo->query('SELECT first 10 * FROM "@PZD_DZIALKI"');
        $tList = $stm->fetchAll();
        Debugger::barDump($tList);
    }
}
