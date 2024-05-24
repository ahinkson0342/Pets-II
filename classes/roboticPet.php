<?php

class RoboticPet extends Pet
{
    private $_accessories = [];

    public function getAccessories(): array
    {
        return $this->_accessories;
    }

    public function setAccessories(array $accessories): void
    {
        $this->_accessories = $accessories;
    }

    function addAcc($acc)
    {
        $this->_accessories[] = $acc;
    }

    function removeAcc($acc)
    {
        for($i = 0; $i < sizeOf($this->_accessories); $i++)
        {
            if(strcmp($acc, (string)$this->_accessories))
            {
                array_splice($acc, $i, 1);
            }
        }
    }

    function charge()
    {
        echo "<p>Robotic pet is charging...</p>";
    }
}
