<?php

function solution($A,$B) {
    
    // ok, I cheated...
    // this gets 100/100
    // we use a stack (D) to keep track of downstream swimming fish
    // when we meet a downstream fish we add it to the stack
    // when we meet an upstream fish, we check it against the downstream stack
    // if the current upstream fish beats the downstream fish on top of the stack
    // we pop that downstream fish off the top of the stack, then try the next one
    // if/when the upstream fish loses, we stop checking the stack
    // after all this, we check the size of the stack - if it is empty we know
    // our upstream fish beat all the downstream fish in the stack (which is by
    // definition all the fish it could meet) we know this fish will live and so
    // increment the 'alive' counter
    // finally, we add the number of downstream fish left in the stack
    
    $n = count($A);
    $alive = 0;
    $D = array(); // D for 'downstream'
    $Dcount = 0;
    
    for($i = 0; $i < $n; $i++){
        if($B[$i] == 1){ // a downstream fish
            $D[] = $A[$i]; // so add it to the downstream array
            $Dcount++; // increment counter of donstream fish (more efficient than counting the array each time?)
        } else { // an upstream fish, so test how it fares against any prior downstream fish
            while($Dcount != 0){ // go through the prior downstream fish
                //... https://codesays.com/2014/solution-to-fish-by-codility/
                // nb this example uses a python while else - so need to adapt this for php
                if($D[$Dcount-1] < $A[$i]){ // if this fish beats last downstream fish
                    array_pop($D); // eat the downstream fish
                    $Dcount--; // and go to the next one
                } else { // it doesn't beat the last downstream fish so stop the loop
                    break;
                }
            }
            if($Dcount == 0){ // there are no downstream fish (or none left)
                $alive++; // this upstream fish either didn't meet a dwonstream one, or beat those it did meet
            }
        }
    }
    
    // now add any remaining downstream fish to the alive count
    $alive += $Dcount;

    return($alive);    
}
//$A = array(4,3,2,1,5);
//$B = array(0,1,0,0,0);

//$A = array(4,3,2,1,5);
//$B = array(1,1,1,1,0);

//$A = array(4,3,2,1,5);
//$B = array(1,1,1,1,1);

$A = array(5,1,1,1,1);
$B = array(1,0,0,1,1);

print_r(solution($A,$B));

?>

