<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array',FILTER_SANITIZE_STRING);
$K = filter_input(INPUT_POST, 'shift',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Array rotation</h1>
        <p>Rotate an array k places to the right, for e.g. 12345678 rotated 3 places is 67812345</p>
        <p>The method is reverse the array, split the reversed array at k, 
        reverse these two pieces and finally merge them to form the rotated array.</p>
        <p>This is a cute trick, but really what's the point? Why not just 
        split the array at n-k and merge those two bits?</p>
        <form method="POST">
            Array:<input type="text" name="array" value="<?php echo $a; ?>" size="40">
            Shift:<input type="text" name="shift" value="<?php echo $K; ?>" size="10">
            <input type="submit" value="Submit">
        </form>        
        <?php
        
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }        
        
        print_r(rotate($A,$K));
        
        function rotate($A, $K) {

            $L = count($A);
            if($K > $L) { $K = $K % $L; }

            $A = reverse($A);
            $x = array_slice($A,0,$K);
            $y = array_slice($A,$K,count($A));

            return array_merge(reverse($x),reverse($y));
        
        } 
        
        function reverse($A) {
            $L = count($A);
            if($L > 1) {
                for ($i = 0; $i < $L/2; $i++) {

                    $k = $L-$i-1;

                    $temp = $A[$i];
                    $A[$i] = $A[$k];
                    $A[$k] = $temp;

                }
            }

            return $A;

        }            
        ?>
    </body>
</html>
