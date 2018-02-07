<?php

/**
 * Created by PhpStorm.
 * User: masten
 * Date: 07.02.2018
 * Time: 10:49
 */
interface TaxiInterface
{
    public function openDoor();

    public function closedDoor();

    public function letInPassenger($passenger);

    public function letOutPassenger($passenger);

    public function checkIsFull();

    public function checkRestTimeWaiting();

    public function nextStop();

    public function getStopInfo();

}