<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Counting sort - stable version</h1>
        <p>This is a slightly more complex version of counting sort that is stable, 
        i.e. preserves the order of equal values. For example, if the starting array 
        contained three 1's then in the output array they will still be in the order 
        'first 1', 'second 1', 'third 1'.</p>
        <p>Uses not just a count array but an array of the prefix sums of the counts. 
        The magic of this is that the prefix sum array then gives both the number 
        of elements of a given value that are to be copied from the input array to 
        the output array <i>and</i> their positions.</p>
        <p>Because we have (1) an input array (2) a 'prefix sums of counts' array and 
        (3) an output array, we can copy actual  elements from the input array to their 
        correct position in the output array, rather than re-creating elements of 
        similar value, and this gives true stability.</p>
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>">
            <input type="submit" value="Sort">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = str_split(strval($a));            
        }
        
        if(count($A) > 0) {
            echo "<br>" . implode("",countingSort($A))."<br>";
        }
                
        
        function countingSort(array $A){
            
            $n = count($A);  
            
            $B = array(); // output array

            // find max value in input array
            $max = 0;
            for($i = 0; $i < $n; $i++){
                if($A[$i] > $max) {
                    $max = $A[$i];
                }
            }
            
            // create count array
            
            $C = array_fill(0,$max+1,0);
            echo implode("",$C)."<br>";

            for($i = 0; $i < $n; $i++){
                $C[$A[$i]]++;
            }
            echo implode("",$C)."<br>";
            
            // modify count array
            for($i = 1; $i <= $max; $i++){
                $C[$i] += $C[$i-1];
            }
            echo implode("",$C)."<br>";            
            
            foreach($A as $i=>$x){
                $B[$C[$i]] = $x;
                
            }
            

            

            
//            foreach($P as $elmVal=>$position){
                
                // for the key/value pairs in P,
                // each key gives us the value of an element 
                // each value gives us the position in the output array that
                // the *last* element of this value should be placed in
                // (acting like a sort of stack)
                // so we have to do a reverse count back from $val
                // For example, if there were two elements of value 1 in the input array
                // then P[1]=2 and so in constructing the output array we put the
                // first element of value 1 in position 2, then the second element
                // of value 1 in position 2-1=1
                
                // so how do we actually do this in a way that properly preserves stability
                // i.e. copies elements from input array A to output array B? (rather than just 
                // recreating new elements of the same value)
                
                // for each A:
                // 1. for this element i of A with value k, get the value of P[k] 
                // (which represents both the number of elements of this value 
                // remaining to be copied to the output array *and* their positions)
                // 2. if P[k}>0 copy A[i] tp B[P[k]]
                // 3. decrement P[k]
                
                
//                echo "<br>element value: " . $elmVal . " position: " . $position;
//                
//
//                
//            }

//            $prevPosition = 0;
//            
//            for($i = 0; $i < count($A); $i++){
//                
//                // in fact, better to go through the input array, and 
//                // then re-direct each element into the output array using the
//                // position array to determine where to put them
//                
//                $position = $P[$A[$i]];
//
//                echo "<br>source element key: " . $i . " source element value: " . $A[$i] . " position: " . $position;
//
//                if($position > $prevPosition){
//                    $B[$position] = $A[$i];
//                }
//                
//                $prevPosition = $position;
//                
//            }
            
            
            
            return $B;
            
        }


        function positionArray($A) {
            
            $n = count($A);
            
            // find max value in inut array
            $max = 0;
            for($i = 0; $i < $n; $i++){
                if($A[$i] > $max) {
                    $max = $A[$i];
                }
            }
            
            // initialise output array
            $C = array_fill(0,$max+1,0);
            
            echo implode("",$C)."<br>";
            
            // create count array
            for($i = 0; $i < $n; $i++){
                $C[$A[$i]]++;
            }
            
            echo implode("",$C)."<br>";
            
            // modify count array
            for($i = 1; $i <= $max; $i++){
                echo $C[$i] . " " . $C[$i-1] . "<br>";
                $C[$i] += $C[$i-1];
            }
            
            
            echo implode("",$C)."<br>";
            
            return $C;
            
        }        
        
        ?>
    </body>
</html>
