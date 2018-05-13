<?php
/**
 * Created by PhpStorm.
 * User: xatzistnr
 * Date: 12/05/2018
 * Time: 4:16 ΜΜ
 */

namespace Ideas2life\CronJobby;


interface CronJobInterface
{

    /**
     * @return boolean
     * @throws \RuntimeException
     */
    public function run();

    /**
     * @return string
     */
    public static function name();

    /**
     * @return mixed
     */
    public function result();
}