<?php declare(strict_types=1);

namespace SzCustomPlugin\Util;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use Shopware\Core\Kernel;

class LoggerFactory {

    /**
     * @var Kernel
     */
    private $kernel;
    private $nameOfLogFile;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
        $this->nameOfLogFile = "sz_custom.log";
    }

    public function create(): Logger
    {
        $logFile = $this->kernel->getLogDir().$this->nameOfLogFile;

        $logger = new Logger('sz_custom');
        $handler = new StreamHandler($logFile);
        $logger->pushHandler($handler);
        $logger->pushProcessor(new PsrLogMessageProcessor());

        return $logger;
    }
}