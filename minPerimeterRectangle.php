<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        print_r(minPerim(30)); 
        
        function minPerim($area){
            
            $i = 1;
            
            while($i * $i < $area){ 
                if($area % $i == 0){ 
                    $A = $i;
                    $B = $area / $A;
                }
                $i++;
            }
            if($i * $i == $area){ 
                $A = $B = $i; 
            }
            
            return 2*($A+$B);
            
        }
        


        ?>
    </body>
</html>
