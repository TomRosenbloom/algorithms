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
        
        <p>For an array of numbers, its prefix sums array, is
        an array of the totals of all the preceding elements to the current element. For 
        example, the prefix sums array of [1,2,3,4,5] is [1,3,6,10,15].</p>
        
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>" size="50">
            <input type="submit" value="Submit">
        </form>        
        
        <?php
                
        if(isset($a)){
            $A = explode(",",$a);
            print_r(prefixSums($A));
        }  

        
        function prefixSums($A){
            
            $n = count($A);            
            
            // this is the super simple method that results in a prefix array of n+1 length
            // (n+1 because the first element is zero)
            
            $P = array_fill(0,$n,0); 
            
            for($i = 1; $i <= $n; $i++) {                                  
                    $P[$i] = $P[$i-1] + $A[$i - 1];                
            }
            
            // this is the fiddly version where the length of P is exactly equal to A
            // i.e. first element of P is same as first element of A 
            // (although their indexes are still not the same i.e. A[0] = P[1] so
            // wouldn't it just be easier to just remove the first element of P?)
            // The fiddliness is due to dealing with PHP warnings for non-existing array indexes
//            $P = array_fill(1,$n,0); 
//            for($i = 1; $i <= $n; $i++) {
//                if(isset($P[$i])){
//                    if(isset($P[$i-1])){ 
//                        $firstP = $P[$i-1]; 
//                    } else { 
//                        $firstP = 0; 
//                    }                
//                    $P[$i] = $firstP + $A[$i - 1];
//                }
//            }            
            return($P);
            
        }       

        
        ?>
    </body>
</html>
