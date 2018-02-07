<?php
require_once('Taxi.php');


$taxi = new Taxi();
$taxi->letOutPassenger(0);
$taxi->letInPassenger(3);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(1);
$taxi->letInPassenger(4);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(3);
$taxi->letInPassenger(6);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(1);
$taxi->letInPassenger(3);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(2);
$taxi->letInPassenger(1);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(9);
$taxi->letInPassenger(0);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(0);
$taxi->letInPassenger(9);
echo $taxi->getStopInfo();

$taxi->letOutPassenger(2);
$taxi->letInPassenger(4);
echo $taxi->getStopInfo();