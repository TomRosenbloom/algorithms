<?php


function solution($S) {
    
    // Create 'currently open brackets' stack
    // read through the string
    // read open brackets onto the stack
    // for closed brackets, pop one of the stack if the open bracket on top of 
    // the stack is same type as this closed bracket else return error
    // finally check that the stack is empty (there weren't any spare open brackets)
  
    $open = array();
    $pointer = 0;
    
    $openBrackets = array("(","{","[");
    $closedBrackets = array(")","}","]");
    

    for($i = 0; $i < strlen($S); $i++){
        
        $char = substr($S,$i,1);  
        
        if(in_array($char,$openBrackets)){
            $pointer = array_push($open, $char);
        }
        if(in_array($char,$closedBrackets)){
            if($pointer == 0) { // the first char is a closed bracket
                return 0;
            } else {
                $lastOpenBracket = $open[$pointer-1];
            }
            switch($char){
                case ")":
                    if($lastOpenBracket == "("){
                        array_pop($open);
                        $pointer--;
                    } else {
                        return(0);
                    }
                    break;
                case "}":
                    if($lastOpenBracket == "{"){
                        array_pop($open);
                        $pointer--;
                    } else {
                        return(0);
                    }
                    break;
                case "]":
                    if($lastOpenBracket == "["){
                        array_pop($open);
                        $pointer--;
                    } else {
                        return(0);
                    }
                    break;                    
            }
        }
        
        echo implode(" ", $open) . "<br>";
        echo ($pointer > 0) ? $open[$pointer - 1] . "<br><br>" : "<br>";
    }
            
    if(count($open) == 0){ // if the brackets equalled out, the stack should be empty
        return 1;
    } else {
        return 0;
    }
    
}
$S = "{[()()]}";
$S = "([)()]";
$S = "([()(()))]";
$S = "{[()()]}{[()()]}";
$S = "[{]}";
$S = ")";
$S = "(";

print_r(solution($S));

?>

