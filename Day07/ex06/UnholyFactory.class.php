<?php

    class UnholyFactory
    {
        private $pattern = [];

        public function absorb($fighter)
        {
            if (get_parent_class($fighter) != 'Fighter') {
                echo '(Factory can\'t absorb this, it\'s not a fighter)' . PHP_EOL;
            } else if (!in_array($fighter, $this->pattern)) {
                $this->pattern[$fighter->fighterType] = $fighter;
                echo '(Factory absorbed a fighter of type ' . $fighter->fighterType . ')' . PHP_EOL;
            } else {
                echo '(Factory already absorbed a fighter of type ' . $fighter->fighterType.')' . PHP_EOL;
            }
        }

        public function fabricate($fighter)
        {
            if (array_key_exists($fighter, $this->pattern)) {
                echo '(Factory fabricates a fighter of type ' . $fighter.')' . PHP_EOL;
                return ($this->pattern[$fighter]);
            } else {
                echo '(Factory hasn\'t absorbed any fighter of type ' . $fighter.')' . PHP_EOL;
                return NULL;
            }
        }
    }