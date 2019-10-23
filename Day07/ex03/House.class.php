<?php

    class House
    {
        public function introduce()
        {
            print("House ".$this->house.$this->getHouseName()." of ".$this->getHouseSeat()." : " . "\"" . $this->getHouseMotto() . "\"" . PHP_EOL);
        }
    }