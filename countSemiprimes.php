<?php

function solution($n, $P, $Q) {  
    
    // complexity: O(N*log(log(N))+M), O(N+M)
    // the obvious approach is to first build an array of semiprimes
    // ...or something derived from that, to create a function for counting
    // number of semiprimes between x and y
    // Why do they present the problem ike this? What does it add that there are 
    // three sets of x and y in the two arrays - why not just set the problem to find
    // number of semiprmes between a single x and y?
    
    // get semiprimes from primes:
    // primes 2,3,5,7,11,13
    // semi-primes below 26: 2x2, 2x3, 2x4, 2x5, 3x3, 3x5, 3x7, 5x5
    // but probably we don't want to get the primes and then get the semiprimes?
    // complexity of sieve of E is O(n log log n) already, and then  we would be adding
    // more complexity than just M (?)
    // so we need to modify the sieve to find the semiprimes in one go
    // or modify the facorisation algorithm...
    // how about using an array of largest, rather than smallest primes? 
    
    // this got 75/40 (with a complexity of O(N * log(log(N)) + M * N) or O(M * N ** (3/2)) !!)
    // it timed out some performance tests, also gave wrong answer for 
    // 'extreme_four, small N = 4, got [0,0,0,0,0...] expected [1,1,1,1,0,0,0,...]

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
    
    $S = array_fill(0,$n+1,false);
    
    for($i = 2; $i < $n/2; $i++){
        if($sieve[$i]){
            for($k = $i; $k * $i <= $n; $k++){
                if($sieve[$k]){
                    $semiprime = $k * $i;
                    $S[$semiprime] = true;
                }
            }
        }
    }  
    
   
    foreach($S as $key => $val){
        //if($val == 1){
            //echo $key . " ";
            echo "$key $val<br>";
        //}
    }
    echo "<br>";
    
    
    for($i = 0; $i < count($P); $i++){
        $count = 0;
        for($k = $P[$i]; $k <= $Q[$i]; $k++){
            $count += $S[$k];
        }
        $M[$i] = $count;
    }
    
    echo implode(", ",$M);
    
}

$P = array(1,4,16);
$Q = array(26,10,20);
$n = 26;

echo solution(26,$P,$Q);

?>

