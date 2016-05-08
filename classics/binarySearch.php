<!DOCTYPE html>
<?php
$x = filter_input(INPUT_POST, 'x',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Binary search</h1>
        <p></p>
        
        <?php
   
        $A = array(3, 11, 14, 9, 4, 6, 8, 18, 20, 13);
        
        print_r($A);
    
        ?>        
        
        <form method="POST">
            <input type="text" name="x" value="<?php echo $x; ?>" size="50">
            <input type="submit" value="Submit">
        </form>

        
        <?php
        
        echo binarySearch($A, $x);
        
        function binarySearch($A, $x){
            
            $n = count($A);
            
            sort($A);
            print_r($A);
            echo "<br>";
            
            $found = -1;
            
            $left = 0;
            $right = $n - 1;
            
            while(!($left > $right) && ($found == -1)){
                $mid = floor(($right + $left)/2);
                echo "$left $mid $right $A[$left] $A[$mid] $A[$right]<br>";
                if($A[$mid] == $x){
                    $found = $mid;
                }
                if($x > $A[$mid]){
                    $left = $mid + 1;
                } elseif($x < $A[$mid]){
                    $right = $mid - 1;
                }
                
            }
            
            return $found;
            
        }   
        
        ?>      
        
    </body>
</html>
