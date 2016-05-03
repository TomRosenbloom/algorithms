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
            <input type="submit" value="Sort">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }  
        
        print_r(bitwiseXOR($A));
        
        function bitwiseXOR(array $A){
            

           
            $result = 0;
            
            foreach ($A as $value) {
                
                $result = $value ^ $result; // ^ signifies XOR
                
                echo "<br>$result";
                
            }
            
        }
        
        // this works because:
        // XOR of 0 and a number is the number
        // XOR of two equal numbers is 0
        // so the even numbers in the array ultimately cancel each other out to 0
        // and that 0 XOR the odd occuring number leaves the odd occuring number

    
        ?>
    </body>
</html>
