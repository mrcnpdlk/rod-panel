<?php
/**
 * Created by Marcin.
 * Date: 25.10.2020
 * Time: 21:04
 */

namespace Mrcnpdlk\ROD\App\Services;

use JsonMapper\JsonMapperFactory;
use JsonMapper\JsonMapperInterface;

class MapperService
{
    /**
     * @var \JsonMapper\JsonMapperInterface
     */
    private $mapper;

    public function __construct()
    {
        $this->mapper = (new JsonMapperFactory())->default();
    }

    /**
     * @return \JsonMapper\JsonMapperInterface
     */
    public function getEngine(): JsonMapperInterface
    {
        return $this->mapper;
    }
}
