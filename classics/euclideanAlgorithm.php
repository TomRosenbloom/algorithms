<?php

function solution($x,$y) {  
    
    // find greatest common divisor of two numbers
    
    // 1. by subtraction, O(n)
    // keep subtracting the smaller of the two numbers from the larger
    // until they become equal, and that value is the gcd (and note it might be 1)
    // why does this work?
    // "the greatest common divisor of two numbers does not change if the 
    //  larger number is replaced by its difference with the smaller number"
    // 
    // If there is some number that can be divided into x and y,
    // think of it like a number line - lengths x and y can be chopped up into some
    // exact number of pieces of the same length z, so visually it is obvious that
    // the difference between them must also be divisible by z
    // 
    // Take a slightly awkward example like x = 3 and y = 53, gcd of 1
    // y = nx + m (where, if m = 0, x is a divisor of y)
    
    // I'm not really getting closer to understanding properly the subtraction method,
    // but looks like the division method is emerging...
    // obvs if m is zero, then x is the gcd
    // otherwise m is the gcd? No, doesn't work for 24, 9
    // gdc(x,y) = gcd(y,x mod b)
    
    function gcd($x,$y){
        echo "$x $y<br>";
        if($x == $y){
            return $x;
        }
        if($x > $y){
            return gcd($x - $y, $y);
        } else {
            return gcd($x, $y - $x);
        }
    }
    
    return gcd($x, $y);
    
}


echo solution(8,12);

?>

