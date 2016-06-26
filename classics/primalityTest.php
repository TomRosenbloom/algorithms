<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        // this is kind of trivial - just a variant on counting factors/divisor
        
        var_dump(testPrime(37)); 
        
        function testPrime($n){
            
            $i = 2; // start factor testing with 2, of course
            $count = 0;
            
            while($i * $i < $n){ // any divisors less than square root of n will have a symmetric divisor 
                if($n % $i == 0){ // if this number is a divisor
                    return false;
                }
                $i++;
            }
            
            return true;
            
        }
        


        ?>
    </body>
</html>
