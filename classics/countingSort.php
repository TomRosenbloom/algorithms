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
        <p>Counting sort does not use comparison. 
        Comparison sorts (e.g. insertion, selection and merge sort) have by definition a
        minimum time complexity of O(nlogn), whereas counting sort has O(n+m)</p>
        <p>Method: create an array of counters (an array that shows the number of occurrences
        of each number between 0 and the largest in the array). Then just read through 
        that array to create the ordered output array.</p>
        <p>Example: let's say the array to be sorted is [3,2,5,2]. The count array of this will 
        be [0,0,2,1,0,1], meaning there are zero 0's, zero 1's, two 2's, one 3 and so on to 
        the highest value found in the array. Each array key represents a value that might 
        be found in A, and the corresponding value is the number of times it was found. 
        To create the sorted array we iterate through the count array and for each 
        key value pair we write 'key' 'value' number of times into the output array.</p>
        <p>Note, this simple version of count sort is not 'stable' i.e. will not preserve
            the order of similar values, hence is only suitable for sorting an integer array
            and not where the integers are keys to other information. 
            See <a href="countingSortStable.php">countingSortStable</a> for the more complicated stable version</p>
        <p>The algorithm <i>looks</i> like it ought to have a time complexity of O(n^2)
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
            $C = countingArray($A); echo implode("",$C)."<br>";
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
