<?php

    class Lannister
    {
        public function sleepWith($name)
        {
            if (get_parent_class($name) == 'Lannister')
                echo 'Not even if I\'m drunk !' . PHP_EOL;
            else
                echo 'Let\'s do this' . PHP_EOL;
        }
    }