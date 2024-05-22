<?php
class StuffedPet extends Pet {
    private $_size;
    private $_stuffingType;
    private $_material;


    function __construct($animal = "unknown", $color = "?", $size = "medium", $stuffingType = "cotton", $material = "fabric") {
        parent::__construct($animal, $color);
        $this->_size = $size;
        $this->_stuffingType = $stuffingType;
        $this->_material = $material;
    }
    function setSize($size) {
        $this ->_size = $size;
    }
    function getSize() {
        return $this->_size;
    }


    function setStuffingType($stuffingType) {
        $this->_stuffingType = $stuffingType;
    }


    function getStuffingType() {
        return $this->_stuffingType;
    }


    function setMaterial($material) {
        $this->_material = $material;
    }


    function getMaterial() {
        return $this->_material;
    }

}

