<?php

function solution($n, $P, $Q) {  
    
    // improved version that now scores 75/100
    // the improvement was creating a cummulative semiprimes counting array
    // the remaining failure is still: 
    // 'extreme_four, small N = 4, got [0,0,0,0,0...] expected [1,1,1,1,0,0,0,...]
    // I see the problem (and why I missed it):
    // if I set $n to 4, then $S[4] remains false 
    // (whereas if $n > 4, it is set as true, so there is some issue with the final member of the array)
    
    // OK, with a small adjustment to the construction of the semiprimes array 
    // (changed end condition from $i<$n/2 to $i<=$n/2) this now scores 100/100

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
    foreach($sieve as $key => $val){
            echo "$key=>$val, ";
    }
    echo "<br>";     
    
    // use the sieve to create a cummulative semiprimes array
    // I think I have to create it in the original way first *then* make it cummulative
    // use the sieve to create array of semiprimes
    $S = array_fill(0,$n+1,false);
    
    for($i = 2; $i <= $n/2; $i++){
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
            echo "$key=>$val, ";
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
        if($P[$i] == 0){ // cludge to avoid invalid index -1
            $foo = 0;
        } else {
            $foo = $SC[$P[$i]-1];
        }
        echo "<br>" . $SC[$Q[$i]] . " " . $foo . "<br>";
        $M[$i] = $SC[$Q[$i]]-$foo; // we need the minus 1 fr the case where this is the point where the count increases
    }

    
    echo implode(", ",$M);
    
}

$P = array(0,0,0);
$Q = array(4,4,4);
$n = 4;

echo solution($n,$P,$Q);

?>

