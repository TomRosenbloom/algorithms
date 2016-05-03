<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Array reverse</h1>
        <p>Iterate through array up to its halfway point.
        Swap each A[i] with A[N-i], i.e. first with last, second with second last etc.</p>
        <?php
        
        $A = array(1,2,3,4,5);
        $B = array();
        $N = count($A);
        //echo $N/2;
        // 
        for($i = 0; $i < $N/2; $i++){
            $k = $N - $i -1;
            echo "<br>$i $k<br>";
//            $temp = $A[$i];
//            $A[$i] = $A[$k];
//            $A[$k] = $temp;
            list($A[$i],$A[$k]) = array($A[$k],$A[$i]);
        }
        print_r($A);

        ?>
    </body>
</html>
