<?php

    class Jaime extends Lannister
    {
        public function sleepWith($name)
        {
            if (get_class($name) == 'Cersei')
                echo 'With pleasure, but only in a tower in Winterfell, then.' . PHP_EOL;
            else
                parent::sleepWith($name);
        }
    }