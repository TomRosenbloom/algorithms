<?php


function solution($A,$B) {
    
    // determine whether there is some pair of values in A and B that when swapped
    // will make their sums equal
    
    // first find difference between the sums of the arrays
    // if the difference is odd, then there is no possibility of doing a successful swap so we stop there
    // then divide the difference by two - 
    // we need to find two elements from A and B that differ by this amount, as soon
    // as we do then we can return True
    // (if the difference between the sums is 4, we need to find two elements where
    // one is two more than the other, because then swapping them increases the sum
    // of one array by 2 and decreases the other by 2)
    // So, having created a counting array based on A, then
    // for each value in B we just need to see if there exists in A a value that differs
    // by d, (sum A - sum B)/2
    // Hence 'if C[B[i] - d] > 0'
    // ...but why are we checking that B[i] - d is greater than 0 less than m? 
    
    // first create count array from $A
    
        function countingArray($A,$n,$m) {           
            $C = array_fill(0,$m+1,0);           
            for($i = 0; $i < $n; $i++){
                $C[$A[$i]]++;
            }           
            return $C;          
        }    
    
    $m = max($A);
    $n = count($A);
    $C = countingArray($A, $n, $m);
    
    $sumA = array_sum($A);
    $sumB = array_sum($B);
    echo "$sumA $sumB<br>";
    
    $d = abs($sumA - $sumB);
    echo $d . "<br>";
    
    if($d % 2 == 1){
        return "false";
    }
    
    $d = floor($d / 2); // why floor? isn't that irrlevant following $d%2 test?
    
    for($i = 0; $i <= $n - 1; $i++){
        $candidateDiff = $B[$i] - $d; // the difference required for this to be a candidate for swapping
        echo $candidateDiff . "<br>";
        if(0 <= $candidateDiff && $candidateDiff <= $m && $C[$candidateDiff] > 0){
            return "true: swap " . $B[$i] . " in B with " . $C[$candidateDiff] . " in A";
        }
    }
    
    return "false";
} 


$A = array(2,3,1,8);
$B = array(1,3,5,3);

print_r(solution($A,$B));

?>

