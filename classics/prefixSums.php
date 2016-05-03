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
        
        <p></p>
        
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
            $P = array_fill(1,$n,0);             
            
            for($i = 1; $i <= $n; $i++) {
                if(isset($P[$i])){
                    if(isset($P[$i-1])){ 
                        $firstP = $P[$i-1]; 
                    } else { 
                        $firstP = 0; 
                    }                
                    $P[$i] = $firstP + $A[$i - 1];
                }
            }
            
            return($P);
            
        }
        

        
        // re all the below about zero-index, in fact the codility example 
        // has the 'extra' zero index in the prefix sum array so presumably this
        // is actually standard and not something to worry about
        
        // mind fuck because of zero-indexing - how to avoid getting $P[0]=0?
        // I can do that by startin the array fill at 1 but then I get
        // a warning about array key P[0] not existing but then if I test for
        // existence of same I get the same problem with P[i-1]!!
        
        
//        for($i = $n-1; $i >= 1; $i--) {
//            if(isset($A[$i+1])){ 
//                $lastA = $A[$i+1]; 
//            } else { 
//                $lastA = 0; 
//            }
//            if(isset($P[$i+1])){ 
//                $lastP = $P[$i+1]; 
//            } else { 
//                $lastP = 0; 
//            }
//            $P[$i] = $lastP + $lastA;
//        }
        // similar mind fuck but worse
        // result should be (15,14,12,9,5)
        
        

        ?>
    </body>
</html>
