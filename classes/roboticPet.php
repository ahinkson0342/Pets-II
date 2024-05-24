<?php

class RoboticPet extends Pet
{
    private $_accessories = [];

    /** gets the accessories of the robotic pet
     * @return array
     */
    public function getAccessories(): array
    {
        return $this->_accessories;
    }

    /** sets the accessories of the robotic pet
     * @param array $accessories
     * @return void
     */
    public function setAccessories(array $accessories): void
    {
        $this->_accessories = $accessories;
    }

    /** adds an accessory to the robotic pet
     * @param string $acc
     * @return void
     */
    function addAcc($acc)
    {
        $this->_accessories[] = $acc;
    }

    /** removes an accessory from the robotic pet
     * @param string $acc
     * @return void
     */
    function removeAcc($acc)
    {
        for ($i = 0; $i < sizeOf($this->_accessories); $i++) {
            if (strcmp($acc, (string)$this->_accessories)) {
                array_splice($acc, $i, 1);
            }
        }
    }

    function charge()
    {
        echo "<p>Robotic pet is charging...</p>";
    }
}
