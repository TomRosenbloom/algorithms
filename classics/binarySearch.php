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
        
        echo binarySearchRecursive($A, $x);
        
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
                // something I don't like about this implementation is that the 
                // adjustment of left/right happens even after the item is found
                // that can be avoided by breaking the loop (and making the L/R adjustment conditional)
                // but I don't like that either
            }
            
            return $found;
            
        }   
        
        function binarySearchRecursive($A, $x){
            
            $n = count($A);
            
            sort($A);
            print_r($A);
            echo "<br>";
            
            $found = -1;
            
            $left = 0;
            $right = $n - 1;
            
            function doSearch($left, $right, $A, $x){
                $mid = floor(($right + $left)/2);
                echo "$left $mid $right $A[$left] $A[$mid] $A[$right]<br>";
                
                if($left > $right){
                    return -1;
                }
                elseif($A[$mid] == $x){
                    return $mid;
                } else {
                
                    if($x > $A[$mid]){
                        $left = $mid + 1;
                    } elseif($x < $A[$mid]){
                        $right = $mid - 1;
                    } 
                    return doSearch($left, $right, $A, $x);
                }
                                
            }
            
            $found = doSearch($left, $right, $A, $x);
            
            return $found;
            
        }         
        ?>      
        
    </body>
</html>
