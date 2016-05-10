<?php


function solution($A,$X) {
    
    // find the first position in the array where all the values from 1..X have occured
    // array is at least one element long, each element is an integer between 1 and X
    // complexity O(N) O(X)
    
    // do a variant of creating a counting array:
    // instead of incrementing counters we want to register whether each value has been found 
    // then stop when the number of registered unique values = X
    // perhaps create an array of X elements and delete them when they are found
    // then stop when the array is empty - but this will cause array index not found warnings
    // (plus you keep having to count the array)
    
    // the below scores 83% and 80%
    // fails on single element, and large_permutation
    // I can fix for single element, but that might be as good as I can get 
    // with this methodology, at least I'm not
    // going to improve the space complexity
    
    $n = count($A);


    $C = array_fill(1, $X, 0);

    $k = 0;
    for($i = 0; $i < $n-1; $i++){
        echo implode(",", $C)."<br>";
        echo count($C)."<br>";
        echo $A[$i]."<br>";
        if(isset($C[$A[$i]])){
            unset($C[$A[$i]]);
        }
        echo count($C)."<br>";
        if(count($C) == 0){
            return $k;
        }
        $k++;
    }
    if(count($C) > 0){
        return -1;
    }
} 


//$A = array(1,3,1,4,2,3,5,4);
//$X = 5;

$A = array(1);
$X = 1;

//$A = array(1,3,1,4,2,3,4,4);
//$X = 5;

print_r(solution($A,$X));

?>

