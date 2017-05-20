<?php

function solution($n){
    
    // fibonacci numbers: 0,1,1,2,3,5,8,13,21,34,55,89,144...
    
    $fib = array_fill(0, $n-1, 0);
    $fib[1] = 1;
    
    for($i = 2; $i < $n; $i++){
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    
    return $fib;
    
}

echo implode(", ",solution(24));