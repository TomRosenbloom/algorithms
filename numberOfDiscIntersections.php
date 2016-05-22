<?php


function solution($A) {
    
    // the key of the disc gives its x coordinate (the y coord is always 0)
    // and the value gives its radius
    // discs that touch are intersecting, e.g. 0=>1 and 2=>1
    // a disc can have radius 0, and 0=>1 would intersect 1=>0
    
    // each 'coordinate' creates a range (key minus value) to (key plus value)
    // e.g. 3=>1 makes 2 to 4
    // 0=>1 makes -1 to 1 and these don't intersect because x1 > y2
    // and y1 < x2 (actually lets call them p and q to avoid confusion)
    // i.e. if the lower bound of pair A is greater than the upper bound of
    // pair B (and hence by definition is also higher than the lower bound of pair B)
    // and the upper bound of pair A is less than the lower bound of pair B (hence also lower than upper bound)
    // they do not intersect
    
    // you could do an obvious O(N**2) solution, but seeing as we are looking 
    // for O(N*(logN)) the question is, how can sorting help?
    
    // create array C, of lower bound => upper bound for each A (doesn't matter that we lose
    // connection between members of C and A because we are just intersted in number of intersections)
    // then order ascending on lower bound
    // then from left to right, C[i] intersects with all subsequent members of C until C[k] > i
    // then start again with next i
    
    // wait, we don't need (?) this extra array, because the upper bound is calculable
    // from centre and lower bound, so we can just replace the radius with the lower bound
    
    // note, there is a circle (range) centred on every value from 0..N
    
    // ok the problem I keep running into is if I make an array of low bounds then sort it
    // I have to asort it to maintain the association between low bound and centre
    // but then I can't get the next low bound for comparison
    
    $N = count($A);
    $lowBounds = array();
    
    for($i = 0; $i < $N; $i++){
        $lowBound = $i - $A[$i];
        $upperBound = $i + $A[$i];
        $lowBounds[$i] = $lowBound;
        $upperBounds[$i] = $upperBound;
    }    
    
    asort($lowBounds);
    sort($upperBounds);
    
    print_r($A); echo "<br>";
    print_r($lowBounds); echo "<br>";
    print_r($upperBounds); echo "<br>";
    
    $intersectingPairs = 0;  
    
    foreach ($lowBounds as $centre=>$lowBound){

        $radius = $A[$centre];
        $upperBound = $centre + $radius; 
        echo "the circle with lower bound $lowBound has centre $centre and upper bound $upperBound<br>";
        // now see how many circles have upper bounds >= this lower bound (not including the current one)
        
        echo current($upperBounds) . "<br>";
        
        // aargh! What the fuck are the mechanics of doing this in php???
        // we can it seems have two additional arrays without violating O(N) space complexity
        // so we have:
        // - original array of centre=>radius
        // - an array of lower bounds
        // - an array of upper bounds
        // we need both the lower and the upper bounds arrays to be sorted because
        // we either (1) go through the lower bounds from left to right then for each
        // one, find the upper bound of this circle so we can (2) find how many lower 
        // bounds are below the upper bound of each lower bounded circle - in most efficient way
        // 
        // 
        
    }


    
}
$A = array(1,5,2,1,4,0);
//$A = array(-1000,1,2000);
//$A = array(2);
//$A = array(3,6,4,2);

print_r(solution($A));

?>

