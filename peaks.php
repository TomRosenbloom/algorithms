<?php

function solution($A) {  
    
    function countFactors($n){
        $i = 1;
        $count = 0;
        while($i * $i < $n){ // any divisors less than square root of n will have a symmetric divisor 
            if($n % $i == 0){ // this number is a divisor
                $count += 2; // increment count by two, to include the symmetric divisor
            }
            $i++;
        }
        if($i * $i == $n){ // finally see if final i is square root of n
            $count++; // increment counter by one only
        }
        return $count;
    }
    
    // find peaks, then find number of factors
    // create a peaks array with 1 for peak, 0 for not peak
    // for each factor divide into sub-arrays and see if they contain peaks - ?
    // ...though these trial and error type solutions are rarely optimal
    // (nb when the array has 12 elements, you can't have 6 groups of 2 elements 
    // each containing peaks, right? Because the first and last elements can't be peaks)
    
    // other way: look at the position of each peak, 
    // if position of first peak is greater than some factor, then we can reject
    // that factor as a potential block size
    
    // or consider the number of peaks: if there is only one for e.g. you can
    // rule out (in the example case) all but one block of 12
    // if there are two peaks, we might be able to split into two blocks, but no more
    
    // remember we are trying to find the maximum number of blocks, not all permutations
    
    // the factors of 12 are 1 (x12), 2 (x6), 3 (x4), 4 (x3), 6 (x2), 12 (x1)
    // if taking a trial and error approach, we would work backwards from the largest
    // factor that could be a candidate for number of groups - so not 12 or 6
    
    // 1x2x3x4x5 = 120
    // factors are 1,2,3,4,5,6,8,10,12,15,20,24,30,40,60,120
    
    $n = count($A);
    
    $P = array_fill(0, $n, 0);
    
    $countPeaks = 0;
    
    for ($i = 1; $i <= $n-2; $i++){
        if($A[$i] > $A[$i-1] && $A[$i] > $A[$i+1]){
            echo "element $i is a peak<br>";
            $P[$i] = 1;
            $countPeaks ++;
        } else {
            $P[$i] = 0;
        }
    }
    
    var_dump($P); echo "<br>";
    
    $i = ($n/2)-1; // first candidate is the factor that will create groups of 2
               // (rather the first candidate is one less than this, because groups of two can never all contain a peak)

    while($i > 0){ 
        if($n % $i == 0){ // a factor
            echo "$i is a factor<br>";
            // are there i peaks?
            // what is the distribution of the peaks?
            // this method must be too long-winded
            // we are looking for O(N*log(log(N))) remember
        }
        $i--;
    }

}

$A = array(1,2,3,4,3,4,1,2,3,4,6,2);
//$A = array(1,2,1,2,1,2,1,2,1,2,1,2);


var_dump(solution($A));

?>

