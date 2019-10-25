<?php

    class Fighter
    {
        public $fighterType;

        public function __construct($target)
        {
           $this->fighterType = $target;
        }
    }