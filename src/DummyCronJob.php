<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 12/05/2018
 * Time: 4:18 ΜΜ
 */

namespace Ideas2life\CronJobby;


class DummyCronJob implements CronJobInterface
{
    protected $result;

    /**
     * @return boolean
     * @throws \RuntimeException
     */
    public function run()
    {
        sleep(2);
        $this->result="I just run";
        return true;
    }

    /**
     * @return string
     */
    public static function  name()
    {
        return static::class;
    }

    /**
     * @return mixed
     */
    public function result()
    {
        return $this->result;
    }
}