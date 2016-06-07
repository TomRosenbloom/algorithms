<?php

function solution($S) {
    
    // this should be easy
    // go through the string
    // if char = open bracket, put onto stack
    // if char = closed bracket, pop the last char of the stack and compare:
    // if it is an open bracket, carry on
    // if it is a closed bracket (or null) then error
    
    // you might think this won't work because it is legit to have substrings of more than one closed bracket
    // but this can't happen in the stack
    
    // hmm, this gets 100/75 fails on:
    // broad_tree_with_deep_paths 
    // string of the form (TTT...T) of 300 T's, each T being '(((...)))' nested 200-fold, length=1 million
    
    // I tried using a pointer, to get rid of count($stack) for each iteration
    // but still same result
    
    
    $stack = array();
    $pointer = 0;
    
    for($i = 0; $i < strlen($S); $i++){
        
        $char = substr($S,$i,1); 
        
        echo "<br>$char<br>";
        
        if($char == "("){
            $pointer = array_push($stack, $char);
        }  
        
        echo $pointer . "<br>";
        
        if($char == ")"){
            if($pointer == 0){
                return 0;
            } else {
                array_pop($stack);
                $pointer--;
            }
        } 
        
        echo implode("",$stack) . "<br>";        
        
    }
    
    if(count($stack) > 0){
        return 0;
    } else {
        return 1;
    }
  
}

$S = "(()(())())";
$S = "())";


print_r(solution($S));

?>

