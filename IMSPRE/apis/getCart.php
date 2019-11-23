<?php
    class Individual {
        public $name;
        public $age;
        public $favorite_color;
        public $happy;

        function __construct($name, $age, $favorite_color, $happy) {
            $this -> name = $name;
            $this -> age = $age;
            $this -> favorite_color = $favorite_color;
            $this -> happy = $happy;
        }
    }

    $miguel = new Individual("Miguel Tapia", 20, "black", true);

    $responseJSON = json_encode($miguel);

    echo $responseJSON;
?>