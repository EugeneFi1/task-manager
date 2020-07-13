<?php 
    include 'function.php';
    
    if(isset($_COOKIE['name'])){
        echo("<span>ciao, ".$_COOKIE['name']."</span>");
    } else {
        echo("<span>ciao, new client</span>");
    }
    
?>