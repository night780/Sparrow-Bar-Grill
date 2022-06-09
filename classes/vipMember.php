<?php

/**
 * This class represents a VIP member
 */
class VIP_Member extends Member
{
    private $_rewardsPoints;

    /**
     * Constructs a VIP member object
     * @param $_rewardsPoints
     */
    public function __construct($_rewardsPoints)
    {
        $this->_rewardsPoints = $_rewardsPoints;
    }

    /**
     * Retieves the rewards points of the VIP
     * @return mixed
     */
    public function getRewardsPoints()
    {
        return $this->_rewardsPoints;
    }

    /**
     * Sets the rewards points for the VIP
     * @param mixed $rewardsPoints
     */
    public function setRewardsPoints($rewardsPoints): void
    {
        $this->_rewardsPoints = $rewardsPoints;
    }
}