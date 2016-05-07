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
        i.e. preserves the order of equal values. That is, for example, if the starting array 
        contained three 1's then in the output array they will still be in the same order 
        'first 1', 'second 1', 'third 1' as they appeared in the input array.</p>
        <p>Uses a modified count array containing the prefix sums of the counts. 
        The magic of this is that the count array then conveys both (1) the number 
        of elements of a given value that are to be copied from the input array to 
        the output array and (2) <i>their positions</i>.</p>
        <p>Because we have (1) an input array (2) a 'prefix sums of counts' array and 
        (3) an output array, we can copy actual elements from the input array to their 
        correct position in the output array, rather than re-creating elements of 
        similar value, and this gives true stability.</p>
        <p>See <a href="http://stackoverflow.com/questions/2572195/how-is-counting-sort-a-stable-sort">stackoverflow</a> 
        for a very good explanation (by 'nybon', not the currently accepted answer).</p>
        <p>So how does the modified count array work? Basically, if element i in the cummulative
        count array is the same as i-1, that means that there are no elements of value i 
        in the input array. Best explained with an example: enter 32583691 below. The initial 
        cummulative counts array C is 0124456678. The fact that C[3] = C[4] reflects the fact that
        there is no 4 in the input array...</p>
        <p>...yada yada - one thing that's intersting is that the final values of C are the initial
        values shifted to the right...</p>
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

            for($i = 0; $i < $n; $i++){
                $C[$A[$i]]++;
            }
            echo "count array C: " . implode("",$C)."<br>";
            
            // modify count array - make it into a prefix sums array
            // (for example [0,1,1,2,0] - meaning zero 0's, one 1, one 2, two 3's, and zero 4's
            // would become [0,1,2,4,4]
            for($i = 1; $i <= $max; $i++){
                $C[$i] += $C[$i-1];
            }
            echo "modified C: " . implode("",$C)."<br>";            
            
            // create output array
            // iterate *backwards* over the input array, using the 'prefix sums of counts' array
            // to place elements in correct positions in output array
            $B = array_fill(0,$max,0);
            for($i = $n-1; $i >= 0; $i--){
                // element in original position = $A[$i]
                echo $A[$i]."<br>";
                // position for first element of this value in output array = $C[$A[$i]]
                echo $C[$A[$i]]."<br>";
                // write element into correct position in output array
                $B[$C[$A[$i]]] = $A[$i];
                echo "B: " . implode("",$B)."<br>";
                echo "C: " . implode("",$C)."<br>";
                // decrement position count for this value
                $C[$A[$i]]--;
            }
            
            echo "<br>final C: ".implode("",$C)."<br>";
            
            return $B;
            
        }
    
        
        ?>
    </body>
</html>
