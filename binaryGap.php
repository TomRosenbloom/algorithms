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
        
        $N = 1041;
        
        //$N = base_convert(483,10,2);
        $N = decbin($N); 
        var_dump($N);
        
        $longest = 0;
        $current = 0;
        $leadingZero = true;
        
        for($i = strlen($N)-1; $i >= 0; $i--){
         
            if($N[$i] == '1'){ 
                if($leadingZero){ // if leadingZero is true, meaning this is the first '1' encountered
                    $leadingZero = false; // we are ready to start counting zeroes next time around
                } else { // we have previously encountered a '1' and are in zero-counting mode, 
                         // so this '1' means the end of a stretch oz zeroes (or a non-start)
                    if($current > $longest) { // store the current zero count if it is the longest so far
                        $longest = $current; 
                    }
                    $current = 0; // reset the zero count        
                }
            } else { // this char is a zero
                if(!$leadingZero){ // so provided we are in zero-counting mode (we have encountered a '1', and hence not looking at a leading zero)
                    $current++; // increment the count
                }
            }
            
        }
        
        echo "<br>longest: ".$longest;
        
        ?>
    </body>
</html>
