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
    // semi-primes up to 26: 2x2, 2x3, 2x5, 2x7, 2x11, 2x13, 3x3, 3x5, 3x7, 5x5
    // in order: 4, 6, 9, 10, 14, 15, 21, 22, 25, 26
    // 
    // but probably we don't want to get the primes and then get the semiprimes?
    // complexity of sieve of E is O(n log log n) already, and then  we would be adding
    // more complexity than just M (?)
    // so we need to modify the sieve to find the semiprimes in one go
    // or modify the factorisation algorithm...
    // how about using an array of largest, rather than smallest primes? 
    
    // this got 75/40 (with a complexity of O(N * log(log(N)) + M * N) or O(M * N ** (3/2)) !!)
    // it timed out some performance tests, also gave wrong answer for 
    // 'extreme_four, small N = 4, got [0,0,0,0,0...] expected [1,1,1,1,0,0,0,...]

    // create sieve
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
    
    
//    // use the sieve to create array of semiprimes
//    $S = array_fill(0,$n+1,false);
//    
//    for($i = 2; $i < $n/2; $i++){
//        if($sieve[$i]){
//            for($k = $i; $k * $i <= $n; $k++){
//                if($sieve[$k]){
//                    $semiprime = $k * $i;
//                    $S[$semiprime] = true;
//                }
//            }
//        }
//    }  
//    
//    foreach($S as $key => $val){
//        //if($val == 1){
//            //echo $key . " ";
//            echo "$key $val<br>";
//        //}
//    }
//    echo "<br>";    
//    
//    // use the semiprimes array to count the number between each pair of array values
//    for($i = 0; $i < count($P); $i++){
//        $count = 0;
//        for($k = $P[$i]; $k <= $Q[$i]; $k++){
//            $count += $S[$k];
//        }
//        $M[$i] = $count;
//    }

    // [0=>0,1=>0,2=>0,3=>0,4=>1,5=>0,6=>1,7=>0,8=>0,9=>0,10=>1,12=>0,13=>0,14=>1,15=>1,...]
    // 
    // Aha (I think), if the array had this form:
    // [0=>0,1=>0,2=>0,3=>0,4=>1,5=>1,6=>2,7=>2,8=>2,9=>2,10=>3,12=>3,13=>3,14=>4,15=>5,...]
    // that is, a *cummulative* count of semiprimes, then I just have to do subtractions:
    // S[Q[i]]-$[P[i]]

    // use the sieve to create a cummulative semiprimes array
    // I think I have to create it in the original way first *then* make it cummulative
    // use the sieve to create array of semiprimes
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
            echo "$key=>$val, ";
        //}
    }
    echo "<br>"; 
    
    $SC = array();
    $count = 0;
    for($i = 0; $i <= $n; $i++){ 
        if($S[$i]){
            $count++;
        }
        $SC[$i] = $count;
    }   
    foreach($SC as $key => $val){
            echo "$key=>$val, ";
    }
    echo "<br>"; 
    
    // use the semiprimes array to count the number between each pair of array values
    for($i = 0; $i < count($P); $i++){
        echo "<br>" . $SC[$Q[$i]] . " " . $SC[$P[$i]-1] . "<br>";
        $M[$i] = $SC[$Q[$i]]-$SC[$P[$i]-1]; // we need the minus 1 fr the case where this is the point where the count increases
    }

    
    echo implode(", ",$M);
    
}

$P = array(1,4,16);
$Q = array(26,10,20);
$n = 26;

echo solution(26,$P,$Q);

?>

