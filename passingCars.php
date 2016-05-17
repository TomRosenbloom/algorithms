<?php


function solution($A) {
    
    // a 'pair' is any two elements where, reading left to right, 
    // the first P is 0 and the second Q is 1
    // so the first pair is the first 0 and the first 1,
    // the next is the first 0 and the second 1, if there is one and so on up to N
    // then for the second 0, if there is one, the first pair is this plus the next 1 etc.
    // 
    // so for each zero, the number of pairs is the sum of the remaining elements
    // (because the possible values are 0 and 1 only)
    // so if we do a reverse prefix sum array:
    // 0,1,0,1,1
    // 0,3,2,2,1
    // we can just work through it and for each zero (P) add P+1 to the total
    // that would be O(2N) complexity, which is the same as O(N)
    // (because the slope of the line of x=2N is the same as x=N, which is what matters)
    
    // 100/100 first time, hoorah!
    
    $N = count($A); 
    
    function suffixSums($A,$N){

        $P = array_fill(0,$N+1,0); 

        for($i = $N-1; $i > 0; $i--) {                                  
            $P[$i] = $P[$i+1] + $A[$i];                
        }

        return($P);

    }        
    
    $P = suffixSums($A,$N);
    
    $total = 0;
    for($i = 0; $i <= $N-1; $i++){
        if($A[$i] == 0){
            echo $P[$i+1] . "<br>";
            $total += $P[$i+1];
        }
        if($total > 1000000000){
            return -1;
        }
    }
    
    return $total;
    
}
$A = array(0,1,1,1,1,1,1);
//$A = array(-1000,1,2000);
//$A = array(2);
//$A = array(3,6,4,2);

print_r(solution($A));

?>

