#!/usr/bin/php
<?PHP
    include("ft_is_sort.php");
//    include("lol.php");
    
    $tab = array("AAA", "BB", "CCCCC", "D", "EEEE");
    if (ft_is_sort($tab))
        echo "Le tableau est trie\n";
    else
        echo "Le tableau n’est pas trie\n";
?>