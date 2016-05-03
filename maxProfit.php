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
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>" size="50">
            <input type="submit" value="Submit">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }  
        
        // construct as we go along a 'virtual' array of the difference between
        // a[i] and a[i+1], which will be positive or negative, and apply the 
        // max slice technique
        
        
        echo "<br>".maxProfit($A);

        
        function maxProfit(array $A){
            
            $n = count($A);
            
            $maxDiffCurrent = 0;
            $maxDiffFinal = 0; // the running total
            
            for($i = 0; $i < $n-1; $i++){
                
                $diff = $A[$i+1] - $A[$i];
                
                $maxDiffCurrent = max(0,$maxDiffCurrent + $diff); 
                $maxDiffFinal = max($maxDiffFinal,$maxDiffCurrent);
                
            }
            
            return $maxDiffFinal;
            
        }

        ?>
    </body>
</html>
