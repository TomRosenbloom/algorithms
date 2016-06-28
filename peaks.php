<?php

// woohoo, 100/100 first time (took a while though)

function solution($A) {  
    
    function findFactors($n){
        // find the factors of n and return in an array
        $i = 1;
        $factors = array();
        while($i <= $n/2){ 
            if($n % $i == 0){
                $factors[] = $i; 
            }
            $i++;
        }
        $factors[] = $n;
        return $factors;
    }
    
    // find peaks, then find number of factors
    // create a peaks array with 1 for peak, 0 for not peak
    
    // look at the position of each peak, 
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
    
    echo implode(", ", $P) . "<br>";
    
    $factors = findFactors($n);

    echo implode(", ", $factors) . "<br>";
    
    // go through the array of factors
    // each factor is a candidate for number of groups (and its symmetric factor will be the number in the group)
    // actually let's say the factors represent the size of group
    // we dismiss 1 and 2
    // for each group size g
    // read from P[0] to P[g-1]
    // if no peak found, break
    
    for($k = 0; $k < count($factors); $k++){
        if($factors[$k] > 2){
            echo "group size " . $factors[$k] . "<br>";
            $i = 0;
            $p = true;
            $s = false;
            $g = $factors[$k];
            while($p == true && $i < $n){
                $limit = $i + $g;
                $p = false;
                while($i < $limit){
                    echo "$i ";
                    if($P[$i] == 1){
                        $p = true;
                    }
                    $i++;
                }
                if($p == true){
                    echo " peak!";
                    $s = true;
                } else {
                    echo " no peak";
                    $s = false;
                }
                echo "<br>$s<br>";
            }
            echo "$s<br>";
            if($s){
                echo "solution " . $factors[$k] . "<br>";
                return $n/$factors[$k];
            }
        }
    }

    return 0;
    
}

//$A = array(1,2,3,4,3,4,1,2,3,4,6,2);
//$A = array(1,2,3,4,3,4,1,2,3,4,6,2,9);
//$A = array(1,2,1,2,1,2,1,2,1,2,1,2);
$A = array(1);

var_dump(solution($A));

?>

