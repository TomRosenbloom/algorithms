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
        <h1>Merge sort</h1>
        <p></p>
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>" size="50">
            <input type="submit" value="Sort">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        } 
        
        if(count($A) > 0) {
            $A = divide($A);
            echo "<br>".implode(",",$A)."<br>";
        }
        
        
        // method A
        function divide(array $arr) {
            
            // terminating condition for recursion: single element array
            if (1 === count($arr)) { 
                return $arr;
            }
            
            // divide the current array into left and right half
            $left = $right = array();
            $middle = round(count($arr)/2);
            for ($i = 0; $i < $middle; ++$i) {
                $left[] = $arr[$i];
            }
            for ($i = $middle; $i < count($arr); ++$i) {
                $right[] = $arr[$i];
            }
            
            // recursive calls to further subdivide
            // this does all the left hand side, then all the right hand side
            $left = divide($left);
            $right = divide($right);
            
            echo "<br>We are going to conquer these two arrays: array(",
            implode(", ", $left), ")\narray(", implode(", ", $right), ")";
            
            // when both recusions are complete, 
            // i.e. we have n single element arrays
            // we merge them
            $conquered = conquer($left, $right);
            
            echo "<br>After conquering we get: array(", implode(", ", $conquered), ")";
            return $conquered;
        }

        function conquer(array $left, array $right) {
            $result = array();
            while (count($left) > 0 || count($right) > 0) { // whilst either array has something in it, i.e. until both arrays are empty
                if (count($left) > 0 && count($right) > 0) { // if both arrays have something in them
                    // order them...
                    // get the first element of each array
                    $firstLeft = current($left); // current() is the first element in the array
                    $firstRight = current($right);
                    // put them into result array in correct order
                    if ($firstLeft <= $firstRight) {
                        $result[] = array_shift($left); // array_shift removes and returns the first array element
                    } else {
                        $result[] = array_shift($right);
                    }
                } else if (count($left) > 0) { // if only the left array has something in it
                    // put first element of left array into result array
                    $result[] = array_shift($left);
                } else if (count($right) > 0) { // if only the right array has something in it
                    // put first element of right array into result array
                    $result[] = array_shift($right);
                }
            }
            return $result;
            // so, when we first come into this routine we will be in the deepest 
            // level of recursion and hence the two arrays will be single element
            // say they are 3 and 2 respectively, the outer loop will execute twice
            // on the first iteration, the first conditional is satisfied (both arrays have something in them)
            // so we carry out ordering, and 2 is moved to the result array
            // on the second iteration we just have the 3 remaining in the left array
            // so that is moved to the result array
            
            // once we have dealt with 
        }   



        // method B
        function mergesort($numlist)
        {
            if(count($numlist) == 1 ) {
                return $numlist;
            }

            $mid = count($numlist) / 2;
            $left = array_slice($numlist, 0, $mid);
            $right = array_slice($numlist, $mid);

            $left = mergesort($left);
            $right = mergesort($right);

            return merge($left, $right);
        }

        function merge($left, $right)
        {
            $result=array();
            $leftIndex=0;
            $rightIndex=0;

            while($leftIndex<count($left) && $rightIndex<count($right))
            {
                if($left[$leftIndex]>$right[$rightIndex])
                {

                    $result[]=$right[$rightIndex];
                    $rightIndex++;
                }
                else
                {
                    $result[]=$left[$leftIndex];
                    $leftIndex++;
                }
            }
            while($leftIndex<count($left))
            {
                $result[]=$left[$leftIndex];
                $leftIndex++;
            }
            while($rightIndex<count($right))
            {
                $result[]=$right[$rightIndex];
                $rightIndex++;
            }
            return $result;
        }
        ?>
    </body>
</html>
