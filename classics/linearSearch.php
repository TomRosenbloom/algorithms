<!DOCTYPE html>
<?php
$x = filter_input(INPUT_POST, 'x',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Linear search</h1>
        
        <p>Generically speaking, a linear search (for value x in array A) is a search where
        each array element in turn is compared against the given value. The naive solution is to
        iterate through the whole array with a for loop and return the index that matched the search value, 
        but this is inneficient because each array element will be checked even after the value has been found - 
        the best case will be the same as the worst case which will always be n, the length of the array. A better 
        solution is:
        <pre>
            1. replace last value in A with x and save last value as L
            2. while A[i] is not x, increment i, otherwise return i
            3. if i = n-1 (it is the last array element) AND L != x return 'not found'
        </pre>
        In step 1, we create a 'sentinel' which guarantees that the while loop will terminate (x will be found).
        In step 3, which is executed only if x was found in the last element of the array,
        we determine whether the last value of A really was x. We know that x will be found in the last 
        array element since we put it there in step 1, so now we check the original value of the last element.
        </p>

        <?php
        // generate random array to search
        // - this doesn't really work because it gets re-generated when you submit the form
//        function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
//            $numbers = range($min, $max);
//            shuffle($numbers);
//            return array_slice($numbers, 0, $quantity);
//        }  
//        $A = UniqueRandomNumbersWithinRange(0, 20, 10);
//        
        
        $A = array(3, 11, 14, 9, 4, 6, 8, 18, 20, 13);
        $values = "";
        foreach($A as $key=>$val){
            $values .= $val.", ";
        }
        echo substr($values, 0, strlen($values)-2);       
        ?>

        
        <form method="POST">
            <input type="text" name="x" value="<?php echo $x; ?>" size="50">
            <input type="submit" value="Submit">
        </form>

        
        <?php
        
        echo linearSearch($A, $x);
        
        function linearSearch($A, $x){
            // 1. replace last value in A with x and save last value as L
            // 2. while A[i] is not x, increment i, otherwise return i
            // 3. if i = n-1 (it is the last array element) AND L != x return 'not found'
            //
            // In step 1, we have created a 'sentinel' which guarantees that the
            // while loop will terminate (x will be found)
            // In step 3 we determine whether the last value of A really was x 
            // 
            
            $found = "not found";
            $n = count($A);
            $L = $A[$n-1];
            $A[$n-1] = $x;
            $i = 0;
            echo "$x $n $L $i $A[$i]<br>";
            while ($A[$i] != $x) {
                echo "$x $n $L $i<br>";
                $i++;
            }
            if(!($i == $n-1 && $L != $x)){
                $found = "found at position " . $i;
            }
            return($found);
        }
        
        
        ?>
        
    </body>
</html>
