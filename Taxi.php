<?php
require_once('TaxiInterface.php');

class Taxi implements TaxiInterface
{

    const TIME_WAITING_MINUTES = 1;
    const ONE_WAY_STOP = 5;
    const ALL_STOP = 10;
    const MAX_COUNT_PASSENGER = 10;

    private $_stoppedOnTheRoute = 0;
    private $_countPassengerInTaxi = 0;
    private $_openDoor = false;
    private $_whatRouteNow = '';


    public function openDoor()
    {
        $this->_openDoor = true;
    }

    public function closedDoor()
    {
        $this->_openDoor = false;
    }

    public function getCountFreePlaces()
    {
        return self::MAX_COUNT_PASSENGER - $this->_countPassengerInTaxi;
    }

    public function letInPassenger($passenger)
    {
        $waitTime = 0;

        // if count passenger is less max_count and taxi is not filed = add new passenger
        if ($this->_countPassengerInTaxi + $passenger <= self::MAX_COUNT_PASSENGER && !$this->checkIsFull()) {
            $this->openDoor();
            $this->_countPassengerInTaxi += $passenger;

            $passenger = 0;
        }

        // if rest is a part of passengers = add rest passenger
        if ($passenger > 0) {
            $this->_countPassengerInTaxi += $this->getCountFreePlaces();
        }

        if (!$this->checkIsFull() && $waitTime < self::TIME_WAITING_MINUTES) {
            $this->checkRestTimeWaiting();
        }

        $this->closedDoor();
        $this->nextStop();

    }

    /**
     * @return bool
     */
    public function checkRestTimeWaiting()
    {
        $waitTime = 1;

        if ($waitTime == self::TIME_WAITING_MINUTES)
            return true;

        return false;
    }

    public function letOutPassenger($passenger)
    {
        $this->openDoor();

        $this->_countPassengerInTaxi = $this->_countPassengerInTaxi - $passenger;

        $this->closedDoor();
    }

    /**
     * @return bool
     */
    public function checkIsFull()
    {
        if ($this->_countPassengerInTaxi == self::MAX_COUNT_PASSENGER) {
            return true;
        }

        return false;
    }

    public function nextStop()
    {
        if ($this->_stoppedOnTheRoute == self::ALL_STOP) {
            $this->_stoppedOnTheRoute = 0;
        }

        $this->_stoppedOnTheRoute++;
    }

    public function getStopInfo()
    {
        if ($this->_stoppedOnTheRoute > self::ONE_WAY_STOP) {
            $this->_whatRouteNow = "в обратную сторону.";
        } else {
            $this->_whatRouteNow = "в первую сторону.";
        }

        return "Маршрут движется " . $this->_whatRouteNow . "Количество пассажиров в такси: " . $this->_countPassengerInTaxi . "<br>";
    }

}