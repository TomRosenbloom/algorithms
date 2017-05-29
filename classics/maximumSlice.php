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
        
// I think the key to understanding this algorithm is properly understanding 
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
        
// wait though... it's not, if the addition of the next element makes the contiguous sum
// negative, but if it makes it less than the largest slice we've had previously - right?      
// I think both actually: in the code below, we first test if adding this element to the 
// current slice will make it negative, in which case we zero the current slice,
// then we compare it with the maximum recorded slice so far
        
// wikipedia: "if we know the maximum subarray sum ending at position i, 
// what is the maximum subarray sum ending at position i+1?"   

// https://stackoverflow.com/questions/7943903/maximum-subarray-of-an-array-with-integers         
// "...the maximal subarray (which must be a contiguous portion of the given array A) 
// ending at position j either consists of the maximimal subarray ending at position j-1 
// plus A[j], or is empty (this only occurs if A[j] < 0). In other words, we are asking 
// whether the element A[j] is contributing positively to the current maximum sum ending 
// at position j-1. If yes, include it in the maximal subarray so far; if not, don't."       

// here is a very simple pseudocode:
// 
// start:
//    max_so_far = 0
//    max_ending_here = 0
//
//    loop i= 0 to n
//      (i) max_ending_here = max_ending_here + a[i]
//      (ii) if(max_ending_here < 0)
//            max_ending_here = 0
//      (iii) if(max_so_far < max_ending_here)
//            max_so_far = max_ending_here
//    return max_so_far        
        
        function maxSlice(array $A){
            
            $currentSlice = 0; // running total for current candidate slice to a certain point
            $maxSlice = 0; // the running total for max slice in whole array
            
            foreach($A as $a){
                
                echo "<br>$currentSlice $maxSlice";
                echo "<br>$a";
                
                // add the current element to the current slice
                // and keep the slice if the result is positive
                // otherwise zero the current slice 
                
                // so, using example 5,-7,3,5,-2,4,-1
                // first iteration, i = 1:
                //   candidate slice is 0, add current element makes 5, we keep that as max slice
                // i = 2:
                //   candidate slice is 5, add -7 makes -2, so zero the candidate slice, keep max slice = 5
                // i = 3
                //   candidate slice is now 0, add 3 makes 3 which is greater than 0 
                //   so keep that to see what effect the next element will have
                //   (the slice total may grow and ultimately exceed the current max slice, 
                //   on the other hand, if adding the next element will make the candidate
                //   slice negative we will reset the current slice total to zero
                //   and (hence) throw away that element since we know it can't contribute
                //   to a maximum slice)
                // i = 4 
                //   candiate is 3, add 5 makes 8
                //   so we keep that as our candiate, *and* we make it the new maximum slice
                // i = 5
                //   candidate is 8, add -2 makes 6
                //   so the candidate slice has been reduced, but it is still positive so we stick with it and see what will happen next
                // i = 6
                //   candidate is 6, add 4 makes 10, largest so far, so update max slice
                // i = 7 and last
                //   candidate is 10, add -1 makes 9 which reduces the candidate, and so we keep the current max slice of 10
                
                // this is hard to grasp because it seems like we won't be considering all the possible 
                // combinations of elements i.e. all the possible slices, but really that
                // is what makes it clever - it automatically discards slices that have a negative total
                
                $currentSlice = max(0,$currentSlice + $a); // if the total of this element 
                                                     // plus current contiguous positive slice
                                                     // is positive then keep it, otherwise zero it
                $maxSlice = max($maxSlice,$currentSlice);
                
                echo "<br>$currentSlice $maxSlice<br>";
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
