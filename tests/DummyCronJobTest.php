<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 13/05/2018
 * Time: 11:26 ΠΜ
 */

namespace CronJobby\Tests;

use Ideas2life\CronJobby\DummyCronJob;

/**
 * Class DummyCronJobTest
 * @package CronJobby\Tests
 * @covers \Ideas2life\CronJobby\DummyCronJob

 */
class DummyCronJobTest extends \PHPUnit_Framework_TestCase
{

    public function testName()
    {
        $this->assertEquals(DummyCronJob::class,DummyCronJob::name());
    }

    public function testRun()
    {
        $this->assertTrue((new DummyCronJob())->run());
    }

    public function testResult()
    {
        $resultExpected="I just run";
        $job=new DummyCronJob();
        $job->run();
        $this->assertEquals($resultExpected,$job->result());
    }
}
