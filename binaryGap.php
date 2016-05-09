<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        // reading from right to left, if this is a zero (and not the first character)
        // then start counting zeros
        // counting zeros: 
        //      count starts at zero; 
        //      stop when you hit a one; 
        //      advance a pointer;
        // resume in main array at pointer position         
        
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
                $leadingZero = false; // keep re-setting, no good! I mean it works but re-assigns every time
                if($current > $longest) { 
                    $longest = $current; 
                }
                $current = 0;
            }
        }
        
        echo "<br>longest: ".$longest;
        
        ?>
    </body>
</html>
