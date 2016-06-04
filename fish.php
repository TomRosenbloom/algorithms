<?php

function solution($A,$B) {
    
    // A gives size of fish, B the direction of travel
    // try not to think about any flow of the river - that doesn't enter into it
    // Also this is about relative motion, so we can consider fish moving
    // upstream to be stationary
    
    // starting with B as 0,1,0,0,0 we have to shift the one to the right by one
    // place each time, but there can be more than one 1
    // ...this is tricky!
    // so shift the array to the right, then for each i that is a 1
    // compare A[i-1] with A[i] and set one of these to 0 accordingly
    // no wait, we would have to shift A too? Or instead of A[i-1] we have to
    // retain the original value of A we started with...
    
    // I suppose we create a new array C in which to model what happens
    // initialise C with zeros
    // then working left to right, if B[i] is zero, move B[i] into C[i] and
    // if B[i] is 1 we make C[i] = 0, because that position is going to vacated,
    // then we keep the value of A[i] and move onto B[i+1]
    // (rather, when we are at B[i+1] we refer back to A[i], which is to say the same as
    // when we are at B[i] we refer back to A[i-1])
    // so... at B[i] we need to compare A[i-1] with A[i], and we also need to consider
    // B[i+1] because if that is also 1 the fish won't meet
    // so, at B[i]:
    // if B[i] = 0, copy A[i] to C[i]
    // if B[i] = 1
    //      make C[i] = 0
    //      if B[i+1] = 1, copy A[i] to C[i+1]
    //      if B[i+1] = 0, then do a comparison:
    //          if A[i] > A[i+1], copy A[i] to C[i+1] and to [A[i+1]
    //          if A[i] < A[i+1], don't do anything else
    
    // I don't think this is right though - very cludgy, and doesn't use stacks or queues
    
    // also, do we really need C?
    
    // this got 75/25 = 50
    // failed on 'simple2, got 5 expected 1, and got 5 expected 2
    // also on performance tests with large N and extreme range 1, 
    // all but one fish flowing in same direction
    // but passed on all fish flowing in the same direction
    
    $n = count($A);
    $alive = $n;
    
    for($i = 0; $i <= $n-1; $i++){
        if($B[$i] == 1){
            $fish = $A[$i];
            $A[$i] = 0;
//            $alive--;
            if(isset($B[$i+1])){
                if($B[$i+1] == 1){
                    $A[$i+1] = $fish;
                } elseif ($B[$i+1] == 0){
                    if($fish > $A[$i+1]){ // left fish eat right fish
                        $A[$i+1] = $fish;
                        $B[$i+1] = 1;
                        $alive--;
                    } elseif($fish < $A[$i+1]){ // right fish eat left fish
                        $alive--;
                    }
                }
            }
        }
    }
    
    echo implode(" ",$A) . "<br>";

    return($alive);    
}
//$A = array(4,3,2,1,5);
//$B = array(0,1,0,0,0);

//$A = array(4,3,2,1,5);
//$B = array(1,1,1,1,1);

//$A = array(4,3,2,1,5);
//$B = array(0,0,0,1,1);

$A = array(5,1,1,1,1);
$B = array(1,0,0,1,1);

print_r(solution($A,$B));

?>

