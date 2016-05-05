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
        
        <h1>Maximum array slice</h1>
        
        <p></p>
        
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>" size="50">
            <input type="submit" value="Submit">
        </form>
        <?php
        $A = array();
        
        if(isset($a)){
            $A = explode(",",$a);       
        }  
        
        echo "<br>".maxSlice($A);
        
// I tihnk the key to understanding this algorith is properly understanding 
// the problem and what it is really about
// Most importantly: the sum returned will always be zero or greater
// (so in this form it doesn't work for an array of all negative numbers - there 
// is a version that rectifies this, or you can have a flag for all negaitve and 
// in that instance return the least negative number, which will be the max slice)
// And consider if the number are all positive - the maximum slice is necessarily
// the whole array. So the whole problem is about dealing with a mix of
// positive and negative numbers. So now it is easier to understand (I think)
// If in the current position the addition of the next element makes the contiguous
// sum to this point negative, it can't be a max slice so (1) store the current 
// slice sum (in case it turns out to be the maximum) (2) set the current slice sum 
// to zero and start again
        
        function maxSlice(array $A){
            
            $maxEnding = 0;
            $maxSlice = 0; // the running total
            
            foreach($A as $a){
                
                echo "<br>$maxEnding $maxSlice";
                echo "<br>$a";
                
                $maxEnding = max(0,$maxEnding + $a); // if the total of this element 
                                                     // plus current contiguous positive slice
                                                     // is positive then keep it, otherwise zero it
                $maxSlice = max($maxSlice,$maxEnding);
                
                echo "<br>$maxEnding $maxSlice<br>";
            }
            
            return $maxSlice;
            
        }


        
        function quadraticMaxSlice($A){
            
            $n = count($A);
            $result = 0;
            
            foreach($A as $key=>$value){
                $sum = 0;
                for($i = $key; $i < $n; $i++){
                    $sum = $sum + $A[$i];
                    $result = max($result,$sum);
                }
            }
            
            return $result;
            
        }
        
        
        // very naive solution is to find and sum every possible slice
        // so: iterate through the array
        // then for each element p, as a possible starting point of a slice,
        // use a second loop to find every possible end point q between p and n
        // then do a third loop to do all the sums of p to q
        // Not so much naive as fucking stupid
        // Also the suggested use of prefix sums seems silly when the obvious 
        // solution - unless I'm missing something here - is to iterate once 
        // to get each starting point p, start a sum, then do one secondary
        // loop of p to q (you have to maintain an outer sum, the 'grand sum'
        // and an inner sum and it is always the outer one that is updated after comparison)
        // The *clever* soluton depends on the alternative idea of considering 
        // each element as the end of a slice not the beginning
        // This is easy to show visually in a drawing, but the code is a bit tricky
        // 

        ?>
    </body>
</html>
