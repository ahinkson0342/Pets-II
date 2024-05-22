<?php

class Pet
{
    //Fields
    private $_animal;
    private $_color;

    /** Set the pet's name
     * @param $_animal
     * @return void
     */
    function setAnimal($animal)
    {
        $this->_animal = $animal;
    }

    /** gets the pet's name
     * @return mixed|string
     */
    function getAnimal()
    {
        return $this->_animal;
    }

    /** sets the pet's color
     * @param $color
     * @return void
     */
    function setColor($color)
    {
        $this->_color = $color;
    }

    /** gets the pet's color
     * @return mixed|string
     */
    function getColor()
    {
        return $this->_color;
    }


    /** default constructor
     * @param $animal
     * @param $color
     */
    function __construct($animal = "unknown", $color = "?")
    {
        $this->_animal = $animal;
        $this->_color = $color;
    }

    function eat()
    {
        echo "<p>".$this->_animal." is eating</p>";
    }

    function sleep()
    {
        echo "<p>Pet is sleeping</p>";
    }

    function talk()
    {
        echo "<p>Pet is talking</p>";
    }
}