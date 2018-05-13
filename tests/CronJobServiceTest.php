<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 13/05/2018
 * Time: 11:07 ΠΜ
 */

namespace CronJobby\Tests;

use Ideas2life\CronJobby\CronJobService;
use Ideas2life\CronJobby\DummyCronJob;
use Ideas2life\I2Log\TempSystemLog;

/**
 * Class CronJobServiceTest
 * @package CronJobby\Tests
 * @covers \Ideas2life\CronJobby\CronJobService
 * @covers \Ideas2life\CronJobby\DummyCronJob
 */
class CronJobServiceTest extends \PHPUnit_Framework_TestCase
{

    private function getLogger()
    {
        return new TempSystemLog();
    }

    public function test__construct()
    {
        $service = new CronJobService($this->getLogger());
        $this->assertInstanceOf(CronJobService::class, $service);
    }

    public function testRunCronJob()
    {
        $service = new CronJobService($this->getLogger());
        $job=new DummyCronJob();
        $result=$service->runCronJob($job);
        $this->assertTrue($result);

    }
}
