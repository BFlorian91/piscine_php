#!/usr/bin/php
<?PHP
    include("ft_is_sort.php");
    
    $tab = array("ZZZZ", "SSSS", "DDDD", "C", "BB");
    $tab[] = "AA";
    if (ft_is_sort($tab))
        echo "Le tableau est trie\n";
    else
        echo "Le tableau n’est pas trie\n";
?>