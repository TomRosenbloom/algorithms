<?php


function solution($S) {
    
    // first imagine it was just one kind of bracket...
    // if the first character is closed bracket we've failed straight away
    // if we meet an open bracket, push it onto a stack
    // (we can read any number of open brackets without generating an error)
    // if we meet a closed bracket, take an open bracket off the stack
    // if there is no open bracket to take off the stack, then error
    // (which is the same as what happens if the first one is closed)
    
    // when there are three different types of bracket...
    // we can't just have three stacks, one for each type of bracket
    // because [{]} would still pass
    
    // another way would be to hunt through the string removing closed pairs e.g. []
    // but that would have a v high time complexity
    
    // is it the case that there is simply a second error case to look for
    // i.e. a closed bracket of one type follows an open bracket of another?
    // so we just record type of last open bracket?
    // so ({[])} fails at char 5 because 'last open bracket type' doesn't match
    
    // can we do it with one stack?
    // say, ([()(()))], if we have literally 'last open bracket type' that will incorrectly pass
    
    // what if we just any open bracket onto a stack, then for each closed bracket
    // read down the stack until we meet a matching open bracket and remove 
    // that character from its position in the stack
    // is that legit? It's not a straight 'pop' as in the last element...
    // this will fail on time complexity?
    
    
    
    $curved = array();
    $square = array();
    $curly = array();
    
    for($i = 0; $i < strlen($S); $i++){
        
        $char = substr($S,$i,1);  
        
        echo "curved " . implode("", $curved) . "<br>";
        echo "square " . implode("", $square) . "<br>";
        echo "curly " . implode("", $curly) . "<br>";
        
        echo $char . "<br>";
        
        switch ($char){
            case "(":
                array_push($curved, $char);
                break;
            case "[":
                array_push($square, $char);
                break;
            case "{":
                array_push($curly, $char);
                break;
            case ")":
                if(count($curved) > 0){
                    array_pop($curved);
                } else {
                    return 0;
                }
                break;
            case "]":
                if(count($square) > 0){
                    array_pop($square);
                } else {
                    return 0;
                }     
                break;
            case "}":
                if(count($curly) > 0){
                    array_pop($curly);
                } else {
                    return 0;
                }
                break;
            }
        
    }
    
    
}
//$S = "{[()()]}";
$S = "([)()]";

print_r(solution($S));

?>

