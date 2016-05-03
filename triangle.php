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
            
            // reject array of less than 3
            if(count($A) < 3) { return 0; }
            
            // sort descending, without keeping array keys
            rsort($A);
            
            // for each element, examine this and next two elements
            for($i = 0; $i < count($A); $i++){
                
//                // reject any ero or negative values
//                if($A[$i] <= 0 || $A[$i+1] <= 0 || $A[$i+2] <= 0){
//                    return 0;
//                }
                
                // if we have three values to try
                if(isset($A[$i+1])&& isset($A[$i+2])){
                    
                    // reject any zero or negative values
                    if($A[$i] <= 0 || $A[$i+1] <= 0 || $A[$i+2] <= 0){
                        return 0;
                    }                    
                    
                    // look for possible triangles
                    
//                    // equilateral
//                    if($A[$i] == $A[$i+1] && $A[$i] == $A[$i+2]){
//                        echo "equilateral $A[$i] {$A[$i+1]} {$A[$i+2]}";
//                        return 1;
//                    }
//                    
//                    // isocellese
//                    if(($A[$i]/$A[$i + 1] < 2) && ($A[$i+1] == $A[$i+2])){
//                        echo "isocellese $A[$i] {$A[$i+1]} {$A[$i+2]}";
//                        return 1;
//                    }
                    
                    if($A[$i] < $A[$i+1] + $A[$i+2]){    
                        //echo "other $A[$i] {$A[$i+1]} {$A[$i+2]}";
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
