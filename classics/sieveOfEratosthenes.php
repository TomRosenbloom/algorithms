<?php

function solution($n) {  
    
    // sieve of eratosthenes, for finding prime numbers in n
    // the basic idea is, for the numbers from 2 to n, remove all the multiples 
    // of each number (but not the number itself)
    // so we would remove:
    // (2),4,6,8,10,12,14,16...
    // (3),6,9,12,15,18,21...
    // (4),8,12,16,20,24,28...
    // (5),10,15,20,25,30...
    // But there are some refinements - 
    // first, we actually only want to use the prime numbers, because for e.g.
    // 4 is twice 2 so all it's products will have been counted already
    // second, you start from the square of each prime, since the lower multiples
    // will already have been marked - and the corollary of that is that you don't 
    // consider primes less than sqrt(n)
    // Why is this? Because, taking n = 17, once we get to considering 5, we know 
    // that all the multipliers of 5 below five have already been considererd, because
    // well that's what we've been doing!
    // If n = 21, you might think hang on what about 4 x 5 = 20, but the point is
    // I think, we know that anything that is a multiple of 4 is also a multiple
    // of 2
    
    $sieve = array_fill(0,$n,true);
    
    $sieve[0] = $sieve[1] = false;
    
    $i = 2; // i = the candidates we will test
    while($i * $i < $n){ // for candidate values of i less than sqrt(n)
        if($sieve[$i]){ // this ensure only prime values are considered, because composites will already have been set to false
            $k = $i * $i; // starting from square of i...
            while($k <= $n){
                $sieve[$k] = false; // this is a composite number, hence not prime
                $k = $k + $i; // get the next element for this value of i
            }
        }
        $i++;
    }
    
    foreach($sieve as $key => $val){
        if($val == 1){
            echo $key . " ";
        }
    }
    
}


echo solution(17);

?>

