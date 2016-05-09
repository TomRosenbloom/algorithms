<?php


function solution($X,$Y,$D) {
    
    $dist = ($Y - $X);
    
    if($dist % $D == 0){
        $jumps = $dist/$D;
    } else {
        $jumps = floor(($Y - $X)/$D) + 1;
    }
    
    return intval($jumps);
    
} 

print_r(solution(1, 5, 2));

?>

