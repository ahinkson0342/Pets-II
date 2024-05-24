<?php
class StuffedPet extends Pet {
    private $_size;
    private $_stuffingType;
    private $_material;


    function __construct($animal = "unknown", $color = "?", $size = "?", $stuffingType = "cotton", $material = "fabric") {
        parent::__construct($animal, $color);
        $this->_size = $size;
        $this->_stuffingType = $stuffingType;
        $this->_material = $material;
    }
    function setSize(string $size) {
        $this ->_size = $size;
    }

    /** gets the size of the stuffed pet
     * @return mixed|string
     */
    function getSize() {
        return $this->_size;
    }

    /** sets the stuffing type of the stuffed pet
     * @param $stuffingType
     * @return void
     */
    function setStuffingType($stuffingType) {
        $this->_stuffingType = $stuffingType;
    }

    /** gets the stuffing type of the stuffed pet
     * @return mixed|string
     */
    function getStuffingType() {
        return $this->_stuffingType;
    }

    /** sets the material of the stuffed pet
     * @param $material
     * @return void
     */
    function setMaterial($material) {
        $this->_material = $material;
    }


    /** gets the material of the stuffed pet
     * @return mixed|string
     */
    function getMaterial() {
        return $this->_material;
    }

}


