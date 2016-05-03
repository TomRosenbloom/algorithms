<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $N = 972932;
        
        //$N = base_convert(483,10,2);
        $N = decbin($N); 
        var_dump($N);
        
        $longest = 0;
        $current = 0;
        $leadingZero = true;
        
        for($i = strlen($N)-1; $i >= 0; $i--){
            
            //echo $N[$i];
            if($N[$i] === '0'){
                if($leadingZero){
                    echo "<br>leading zero";
                } else {
                    echo "<br>zero";
                    $current++;
                    $leadingZero = false;
                }   
            } else {
                echo "<br>one";
                $leadingZero = false; // keep re-setting, no good!
                if($current > $longest) { 
                    $longest = $current; 
                }
                $current = 0;
            }
        }
        
        echo "<br>longest: ".$longest;
        
        // reading from right to left, if this is a 1 (and not the first character)
        // then start counting zeros
        // counting zeros: 
        //      count starts at zero; 
        //      stop when you hit a one; 
        //      advance a pointer;
        // resume in main array at pointer position
        
        
        
        
//        while($N >= 1){
//            echo "<br>".base_convert($N,10,2);            
//            //echo "<br>" . $N;
//            if($N % 2 != 0) { $N--; }
//            $N = $N/2;
//        }
        
        ?>
    </body>
</html>
