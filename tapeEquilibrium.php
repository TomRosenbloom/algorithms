<?php


function solution($A) {
    
    // time complexity is expected to O(n) so that rules out brute force
    // i.e. can't just iterate over the whole array for each possible value of P
    // was thinking prefix sumes, but...
    // if we sum the entire array, then we can go through once keeping a running
    // total and subtracting that from the array sum

    // having now googled this it seems like the was you make it deal with a two-member array
    // is simply with a conditional trap - so maybe I'm not so dumb after all
    
    // the below gets 100%
    
    $N = count($A);
    

    if($N == 2){
        return abs($A[0] - $A[1]);
    } 
    
    $leftSum = 0;
    $rightSum = 0;

    foreach ($A as $value) {
        $rightSum += $value;
    }
      
    $diff = PHP_INT_MAX; //     
        
    for($i = 0; $i <= $N - 2; $i++){
              
        $leftSum += $A[$i]; 
        $rightSum -= $A[$i]; // you might think this test should be done last, 
                             // but the problem explicitly states that the two segments
                             // are non-empty
                             // Note for same reason we only iterate to n - 2 elements
             
        $diff = min($diff,abs($rightSum - $leftSum));
        
        echo "$leftSum $rightSum $diff<br>";
        
        if($diff == 0){
            return 0; 
        }
        
    }

    return $diff;
       
} 

//$A = array(1000,-1000);
$A = array(3,1,2,4,3);
//$A = array(-3,1,2,-4,3);
//$A = array(0, 1, 2, -5, 2);

print_r(solution($A));

?>

