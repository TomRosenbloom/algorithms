<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        print_r(countFactors(36)); 
        
        function countFactors($n){
            
            $i = 1;
            $count = 0;
            
            while($i * $i < $n){ // any divisors less than square root of n will have a symmetric divisor 
                if($n % $i == 0){ // this number is a divisor
                    $count += 2; // increment count by two, to include the symmetric divisor
                }
                $i++;
            }
            if($i * $i == $n){ // finally see if final i is square root of n
                $count++; // increment counter by one only
            }
            
            return $count;
            
        }
        


        ?>
    </body>
</html>
