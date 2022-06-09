<?php

/**
 *VIP extends member, represents a premium member (upgraded)
 */
class Vip extends Member
{
    /**
     * Reward points accumulate with each order
     * @var int|mixed|string
     */
    private int $_points;
    /**
     * Available seats
     * (With our VIP plan, customers are able to reserve seats at the bar
     * on busy nights! check VIP seats left avalible here)
     * @var int
     */
    private int $_seats;

    /**
     * VIP constructor
     * @param $points
     */
    public function __construct($points = '')
    {
        $this->_points = $points;
    }

    /**
     * gets reward points
     * @return mixed
     */
    public function getPoints()
    {
        return $this->_points;
    }

    /**
     * sets reward points
     * @param mixed $points
     */
    public function setPoints($points): void
    {
        $this->_points = $points;
    }

    /**
     * gets seats available
     * @return mixed
     */
    public function getSeats()
    {
        return $this->_seats;
    }

    /**
     * sets seats available
     * @param mixed $seats
     */
    public function setSeats($seats): void
    {
        $this->_seats = $seats;
    }

}