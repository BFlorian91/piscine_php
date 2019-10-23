<?php

class Targaryen
{
    public function resistsFire()
    {

    }
    public function getBurned()
    {
        if ($this->resistsFire()) {
            return "Daenerys emerges naked but unharmed" . PHP_EOL;
        } else {
            return "Viserys burns alive";
        }
    }
}