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
    // Why is this? 
    // Let's say n = 17, where sqrt is something slightly more than four, 
    // so we would only consider starting with prime numbers less than four, 
    // and rule out five and above. 
    // Once we get to considering 5, we know that all the multipliers of 5 
    // *below* 5 have already been considererd, because well that's what 
    // we've been doing! So the first multiplier we would consider would be 5
    // itself, but 5*5 will take us above 17.
    // 
    // (If n = 21, you might think hang on what about 4 x 5 = 20, that is, couldn't
    // there be some multiplier of 5 other than the primes we've looked at, 
    // but the point is I think, we know that anything that is a multiple of 4 
    // is also a multiple of 2, and hence we have considered it)
    
    $sieve = array_fill(0,$n,true);
    
    $sieve[0] = $sieve[1] = false; // 0 and 1 are not primes
    
    $i = 2; // i = the candidates we will test and we start at 2, which we know *is* a prime
    while($i * $i < $n){ // for candidate values of i less than sqrt(n)
        if($sieve[$i] === true){ // if this is a prime
        // as we go forward, this test ensures only prime values are considered, 
        // because below we are going to set composites to false
            $k = $i * $i; // starting from square of i...
            // ...we are going to step through the array in steps of i, 
            // eliminating each number we fall on, as it must be composite
            // nb the first one will be a composite number since it is i squared
            while($k <= $n){ 
                $sieve[$k] = false; // this is a composite number, hence not prime
                $k = $k + $i; // get the next element for this value of i
            }
        }
        $i++;
    }
    
    // display the primes
    foreach($sieve as $key => $val){
        if($val === true){
            echo $key . " ";
        }
    }
    
}


echo solution(17);

?>

