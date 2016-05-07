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
        <p>Uses not just a count array but an array of the prefix sums of the counts. 
        The magic of this is that the prefix sum array then gives both the number 
        of elements of a given value that are to be copied from the input array to 
        the output array <i>and</i> their positions.</p>
        <p>Because we have (1) an input array (2) a 'prefix sums of counts' array and 
        (3) an output array, we can copy actual  elements from the input array to their 
        correct position in the output array, rather than re-creating elements of 
        similar value, and this gives true stability.</p>
        <p>See <a href="http://stackoverflow.com/questions/2572195/how-is-counting-sort-a-stable-sort">stackoverflow</a> 
        for a very good explanation (by 'nybon', not the currently accepted answer).</p>
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
           
            
            return $B;
            
        }
    
        
        ?>
    </body>
</html>
