<?php

class RoboticPet extends Pet
{
    private $_accessories = [];

    function addAcc($acc)
    {
        $this->_accessories[] = $acc;
    }

    function removeAcc($acc)
    {
        for($i = 0; $i < sizeOf($this->_accessories); $i++)
        {
            if(strcmp($acc, $this->_accessories))
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
