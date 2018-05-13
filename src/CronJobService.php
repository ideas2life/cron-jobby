<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 12/05/2018
 * Time: 4:14 ΜΜ
 */

namespace Ideas2life\CronJobby;


use Ideas2life\I2Log\SystemLogInterface;

class CronJobService
{
    /**
     * @var SystemLogInterface
     */
    protected $logger;

    /**
     * CronJobService constructor.
     * @param SystemLogInterface $logger
     */
    public function __construct(SystemLogInterface $logger)
    {
        $this->logger = $logger;
    }

    public function runCronJob(CronJobInterface $cronJob){
        $this->logger->log('started: '.$cronJob->name());
        $result=$cronJob->run();
        $this->logger->log('finished: '.$cronJob->name());

        return $result;
    }
}