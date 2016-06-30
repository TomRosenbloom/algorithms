<?php

function solution($n) { 
    
    // factorisation - dcomposing number into its prime factors
    // can be done with a variant of sieve of eratosthenes
    
    // note that it is the 'fundamental theorem of arithmetic' that every integer
    // greater than 1 that is not prime is a product of a unique set of prime numbers
    
    
    // first we create a factorisation array of some size (the size of the number
    // we want to factorise is sensible!)
    // the resulting array will show the smallest prime that can divide each number:
    // key: 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 ...
    // val: 0 | 0 | 2 | 0 | 2 | 0 | 2 | 3 ...
    // so 2 is the lowest prime that can divide 6, 3 is lowest for 9 etc.
    // the primes themselves are left as 0
    // The creation of this array is a variant of the sieve of E
    function factorisationArray($n){
        
        $F = array_fill(1,$n,0);
        
        $i = 2;
        while($i * $i < $n){
            if($F[$i] == 0){
                $k = $i * $i;
                while($k <= $n){
                    if($F[$k] == 0){
                        $F[$k] = $i;
                    }
                    $k += $i;
                }
            }
            $i++;
        }
        
        return $F;
    }
    
    $F = factorisationArray($n);
    
    foreach ($F as $key => $value) {
        echo $key . "=>" . $value . "<br>";
    }
    
    // "if we know that one of the prime factors of x is p, then all the prime
    // factors of x are p plus the decomposition of x/p"
    // so what happens for n = 20 is:
    // F[20] = 2, add 2 to array, 20/2 = 10,
    // F[10] = 2, add 2 to array, 10/2 = 5,
    // F[5] = 0, don't executte loop
    // add 5 to array
    function factorise($F,$x){
        $primeFactors = array();
        while ($F[$x] > 0){
            $primeFactors[] = $F[$x];
            $x = $x/$F[$x];
        }
        $primeFactors[]=$x;
        return $primeFactors;
    }
    
    return factorise($F, $n);
    
}

echo implode(", ",solution(20));
