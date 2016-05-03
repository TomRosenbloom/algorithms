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
        <h1>Counting sort</h1>
        <p>Create an array of counters (an array that shows the number of occurrences
        of each number between 0 and the largest in the array). Then just read through 
        that array to create the ordered output array.</p>
        <p>This looks like it ought to have a time complexity of O(n^2)
        because of the nested loops, but is actually O(n+m) because the nesting 
        of those loops doesn't represent the product of every member of one 
        array combined with every member of another, rather they are a two stage 
        process to getting back the original n number of elements (well, there 
        will be an additional step for any value between 0 and m that wasn't represented 
        in the original array).</p>
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>">
            <input type="submit" value="Sort">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = str_split(strval($a));            
        }
        
        if(count($A) > 0) {
            echo implode("",countingSort($A))."<br>";
        }
        
        
        function countingSort(array $A){
            
            $B = array();
            $C = countingArray($A);
            $n = count($C);
            
            foreach($C as $number=>$count){
               for($i = 1; $i <= $count; $i++){
                   $B[] = $number;
               }
            }
                        
            return $B;
            
        }

        function countingArray($A) {
            $n = count($A);
            
            // find max value
            $max = 0;
            for($i = 0; $i < $n; $i++){
                if($A[$i] > $max) {
                    $max = $A[$i];
                }
            }
            
            $C = array_fill(0,$max+1,0);
            
            for($i = 0; $i < $n; $i++){
                $C[$A[$i]]++;
            }
            
            return $C;
            
        }
        ?>
    </body>
</html>
