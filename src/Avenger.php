<?php

namespace Marvel;

use Monolog\Logger;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Processor\IntrospectionProcessor;

class Avenger {

    private $log;

    public function __construct() {
        $this->log = new Logger('build');
        $handler = new ErrorLogHandler(ErrorLogHandler::OPERATING_SYSTEM, Logger::INFO);
        $handler->pushProcessor(new IntrospectionProcessor());
        $this->log->pushHandler($handler);
    }

    public function getConnection() {
        return Helicarrier::getConnection();
    }

    public function find($id) {
        $this->log->addInfo('Finding by id', [$id]);

        $connection = $this->getConnection();

        $result = $connection->query('select * from avengers WHERE id = ' . $id);

        return $result;
    }
}