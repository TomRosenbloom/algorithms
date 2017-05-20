<?php

function solution($n) { 
    
    // factorisation - decomposing number into its prime factors
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
    // The creation of this array is a variant of the sieve of Eratosthenes
    // In fact what we end up with is a sort of negative of the sieve, where 
    // the primes will be ignored but for the *non* primes we will record the smallest prime factor
    
    
    
    function factorisationArray($n){ 
        // creates the factorisation array
        // basically, we will fill in all the 2's (cases where 2 is smallest prime factor) then the 3's and so on
        
        $F = array_fill(1,$n,0); // fill factorisation array with 0's 
                                 // (which will remain unchanged for primes - 
                                 // I guess this is easier than writing in the 
                                 // prime itself as the lowest prime factor, which would be the strict truth)
        
        $i = 2; // i = the candidates for smallest prime that we will test, starting with the first prime
        while($i * $i < $n){ // for candidate values of i less than sqrt(n), as per the sieve
            if($F[$i] == 0){ // if this is a prime... rather, if we haven't considered this number? - 
                // but surely this will always be true, since we haven't yet considered this i? 
                // Ah no, because $f[4] for example will already have a smallest prime factor of 2,
                // so this saves us re-considering numbers that have already been done
                // ...in fact as per the sieve it ensure we consider primes only, 
                // because as we step through the array in steps of i, below, 
                // again as per the sieve, we guarantee that the next case of zero 
                // must be the next prime
                // (so if you comment out this conditional it doesn't change the final result, 
                // but it will reduce the execution speed exponentially)
                
                $k = $i * $i;
                while($k <= $n){
                    if($F[$k] == 0){ // we haven't found a prime factor yet for this number
                        $F[$k] = $i; // ...and it's smalles prime factor must be i
                    }
                    $k += $i;
                }
            }
            $i++;
        }
        
        return $F;
    }
    
    $F = factorisationArray($n);
    
    // display the factorisation array
    foreach ($F as $key => $value) {
        echo $key . "=>" . $value . "<br>";
    }
    
    // now find the prime factors (and return them in an array)
    
    // "if we know that one of the prime factors of x is p, then all the prime
    // factors of x are p plus the decomposition of x/p"
    // (so this is something that would lend itself to recursion, though it isn't necessary)
    // So what happens for n = 20 is:
    // F[20] = 2, add 2 to array, 20/2 = 10,
    // F[10] = 2, add 2 to array, 10/2 = 5,
    // F[5] = 0, don't execute loop
    // add 5 to array
    // So we are recognising the fact that when F[n]=0 that sort of means F[n]=n
    // (actually recursion would make the algorithm more elegant I think)
    function factorise($F,$x){
        $primeFactors = array();
        while ($F[$x] > 0){ // whilst the factor to be decomposed is not prime
            $primeFactors[] = $F[$x]; // record the lowest prime factor
            $x = $x/$F[$x]; // then use that prime factor to get the next factor for decomposition
        }
        $primeFactors[]=$x; // record the last factor, which by definition is a prime
        return $primeFactors;
    }
    
    return factorise($F, $n);
    
}

echo implode(", ",solution(20));
