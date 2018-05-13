<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 12/05/2018
 * Time: 4:20 ΜΜ
 */


// Add this line to your crontab file:
// * * * * * cd /path/to/project && php jobby.php 1>> /dev/null 2>&1
// uncomment this and run if you want to get the path
// echo __DIR__; die();

use Ideas2life\CronJobby\CronJobService;
use Ideas2life\CronJobby\DummyCronJob;
use Ideas2life\I2Log\StdOutLogger;

require_once __DIR__ . '/../vendor/autoload.php';

$jobby = new \Jobby\Jobby();
$globallogger = new \Ideas2life\I2Log\TempSystemLog();

$service = new CronJobService(new StdOutLogger());
$logpath = __DIR__ . '/logs/cron.log';
$errorlogpath = __DIR__ . '/logs/error.log';
try {

    $jobby->add(DummyCronJob::name(), array(
        'command' => function () use ($service) {
            $job=new DummyCronJob();
           return  $service->runCronJob($job);

        },
        'schedule' => '* * * * *',
        'output' => $logpath,
        'enabled' => true,
    ));
} catch (Exception $e) {
    $globallogger->log($e->getMessage(), $e->getTrace());
}

try {
    $jobby->run();
} catch (\Jobby\Exception $e) {
    // Log this somewhere or notify something
    file_put_contents($errorlogpath,$e->getMessage().PHP_EOL.$e->getTraceAsString());
}