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
        
        <h1>Prefix sums</h1>
        
        <p>For an array of numbers, its prefix sums array is
        an array of the totals of all the preceding elements to the current element. For 
        example, the prefix sums array of [1,2,3,4,5] is [1,3,6,10,15].</p>
        <p>For array A of length n:</p>
        <ol>
            <li>Make a new array P of length n + 1, filled with zeroes</li>
            <li>Iterate over this array, starting at P[1] setting each P[i] = P[i - 1] + A[i - 1]</li>
            <li>Return P</li>
        </ol>
        <p>Because the array is of length n + 1, and we start at p[1] we avoid any 
            awkward 'index not found' errors. For neatness we could remove P[0] before returning P.</p>
        
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>" size="50">
            <input type="submit" value="Submit">
        </form>        
        
        <?php
        // this is a rather Fereday-esque way of dealing with POST input...
        // not very good
        if(isset($a)){
            $A = explode(",",$a);
            print_r(prefixSums($A));
        }  

        
        function prefixSums($A){
            
            $n = count($A);            

            $P = array_fill(0,$n,0); 
            
            for($i = 1; $i <= $n; $i++) {                                  
                    $P[$i] = $P[$i-1] + $A[$i - 1];                
            }
                       
            return($P);
            
        }       

        
        ?>
    </body>
</html>
