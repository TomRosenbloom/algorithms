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
            <input type="text" name="array" value="<?php echo $a; ?>">
            <input type="submit" value="Submit">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }

        print_r(triangle($A));
        
        function triangle(array $A){
            
            // the point of this one is that sorting the array makes it do-able with O(NlogN) complexity
            // the sort is logN, and once the array is sorted we only have to examine consecutive elements
            // we don't have to worry about duplicate values because the $A[$i] < $A[$i+1] + $A[$i+2] test
            // will still hold true, e.g. 1,1,1 is a triangle, as is 2,2,1 but not 2,1,1
            
            // reject array of less than 3
            if(count($A) < 3) { return 0; }
            
            // sort descending, without keeping array keys
            rsort($A);
            
            // for each element, examine this and next two elements
            for($i = 0; $i < count($A); $i++){
                
                // if we have three values to try
                if(isset($A[$i+1])&& isset($A[$i+2])){
                    
                    // reject any zero or negative values
                    if($A[$i] <= 0 || $A[$i+1] <= 0 || $A[$i+2] <= 0){
                        return 0;
                    }                    
                    
                    // look for possible triangles                   
                    if($A[$i] < $A[$i+1] + $A[$i+2]){    
                        echo "triangle $A[$i] {$A[$i+1]} {$A[$i+2]}<br>";
                        return 1;
                    }
                }
            }
            
            return 0;
            
        }
           
        ?>
    </body>
</html>
