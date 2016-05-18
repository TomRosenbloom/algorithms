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
        <h1>Maximum product of three</h1>
        <p>Find maximum product of three members of an array of integers (positive or negative)</p>
        <p>This is trivial if all the numbers are positive, but seems hard if there are negative numbers.
        First sort the array (descending). The maximum product of all positive numbers would then obviously
        be the product of the first three - but not if there are some large negative numbers, 
        because the product of two negative and one positive numbers will be positive.</p>
        <p>Actually this is very easy to deal with. The largest product of two negative numbers and one 
            positive must be the two largest negative numbers times the largest positive i.e. 
            A[0]*A[n-1]*A[n-2], so we just compare that with A[0]*A[1]*A[2] and return the larger</p>
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>">
            <input type="submit" value="Submit">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }

        
        print_r("<br>".maxProductOfThree($A));
        
        function maxProductOfThree($A){
            
            $N = count($A);
                        
            // reject array of less than 3
            if($N < 3) { 
                return 0;
            }
            
            // sort descending, without keeping array keys
            rsort($A);
            
            $candidate1 = $A[0] * $A[1] * $A[2];
            $candidate2 = $A[$N-2] * $A[$N-1] * $A[0];
            
            return max($candidate1,$candidate2);
           
        }
           
        ?>
    </body>
</html>
