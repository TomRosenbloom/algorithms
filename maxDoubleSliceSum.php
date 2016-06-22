<?php

function solution($A) {
    
    // double slice
    // this is really badly explained...
    // what they mean is slice one is A[x+1] to A[y-1] and slice two is A[y+1] to A[z-1]
    // so the values of x, y and z are excluded, and the 'double slice' is
    // effectively A[x+1] to A[z-1] minus A[y]
    
    // ...this makes me wonder if there is a solution where you calculate
    // maximum slices and try subtracting successive intermediate values...
    // you can record the lowest value encoutered as you test candidate slices
    // ...or rather (?) the lowest value in the max slice should be Y... sort of the same thing
    
    // this works for the example test, but is that a fluke?
    // in what ways could this fail? (would help if I really understood how it worked!)
    // 
    
    $currentSlice = 0; // running total for current candidate slice to a certain point
    $maxSlice = 0; // the running total for max slice in whole array

    $currentDblSlice = 0;
    $maxDblSlice = 0;

    $least = $A[1];

    $n = count($A);

    for($i = 1; $i < $n-1; $i++){ // start at 1 because by definition first element not considered, similarly re n-1

        //echo "<br>$currentSlice $maxSlice";
        echo "<br>$A[$i]";

        $least = min($least,$A[$i]); // so $least will be the least element from the whole array, up to this point
        
        echo "<br>$least";

        $currentSlice = max(0,$currentSlice + $A[$i]); // as per the standard max slice algorithm, 
                                                       // we keep this candidate if it is continuing to increase
        
        if ($currentSlice == 0){ $least = 0; } // reset least if currentSlice was reset, because we want the least 
                                               // in the current slice, not the least in whole array
        
        $currentDblSlice = $currentSlice - $least; // subtract the current least value within the current slice, 
                                                   // and that will be max 'double slice'

        // is it possible for a max dble slice candidate to be replaced wrongly by a smaller one?
        // ...only if we wrongly calculate a current max double slice
        
        
        
        
        // update the global maxima
        $maxSlice = max($maxSlice,$currentSlice);
        $maxDblSlice = max($maxDblSlice,$currentDblSlice);

        echo "<br>current slice: $currentSlice, max: $maxSlice<br>";
        echo "<br>current dbl slice: $currentDblSlice, max: $maxDblSlice<br>";

    }
  
}

//$A = array(3,2,6,-1,4,5,-1,2);
$A = array(3,-2,2,6,-1,4,5,-1,2);


print_r(solution($A));

?>

