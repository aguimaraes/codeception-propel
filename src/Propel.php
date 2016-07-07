<?php

namespace Codeception\Module;

use Codeception\Module;

/**
 * Class Propel
 * @package Codeception\Module
 */
class Propel extends Module
{
    /**
     * @var \Propel\Runtime\Connection\ConnectionInterface A database connection
     */
    private $connection;

    /**
     * Initialize Propel connection
     */
    public function _initialize()
    {
        $this->connection = \Propel\Runtime\Propel::getConnection();
    }

    /**
     * Start a transaction before the test execution
     * @param array $settings
     */
    public function _beforeSuite($settings = [])
    {
        $this->connection->beginTransaction();
    }

    /**
     * Rollback a transaction after the test execution
     */
    public function _afterSuite()
    {
        $this->connection->rollBack();
    }


}