<?php

function solution($S) {
    
    // the trick here is you don't actually need a stack
    
    
    $openBrackets = 0;
    
    for($i = 0; $i < strlen($S); $i++){
        
        $char = substr($S,$i,1); 
        
        echo "<br>$char<br>";
        
        if($char == "("){
            $openBrackets++;
        }  
        
        echo $openBrackets . "<br>";
        
        if($char == ")"){
            if($openBrackets == 0){
                return 0;
            } else {
                $openBrackets--;
            }
        } 
        
        
    }
    
    if($openBrackets > 0){
        return 0;
    } else {
        return 1;
    }
  
}

$S = "(()(())())";
//$S = "())";


print_r(solution($S));

?>

