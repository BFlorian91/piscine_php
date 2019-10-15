<?php

    function ft_is_sort($array)
    {
        $is_sorted = $array;
        sort($is_sorted);        
        $is_rsorted = $array;
        rsort($is_rsorted);
        if ($is_sorted == $array || $is_rsorted == $array)
            return true;
        return false;
    }