<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        print_r(flags(1,5,3,4,3,4,1,2,3,4,6,2)); 
        

// this is a 100% answer found on SO
// seems like I was on the right lines with the idea of a peaks array etc.
// And I guess this has O(N) time complexity because it iterates over the
// *original* array only once, then the subsequent loops are based on maxFlags...
        
function solution($A)
{
    $p = array(); // peaks
    for ($i=1; $i<count($A)-1; $i++)
        if ($A[$i] > $A[$i-1] && $A[$i] > $A[$i+1])
            $p[] = $i;

    $n = count($p);
    if ($n <= 2)
        return $n;

    $maxFlags = min(intval(ceil(sqrt(count($A)))), $n); // max number of flags
    $distance = $maxFlags; // required distance between flags
    // try to set max number of flags, then 1 less, etc... (2 flags are already set)
    for ($k = $maxFlags-2; $k > 0; $k--)
    {
        $left = $p[0];
        $right = $p[$n-1];
        $need = $k; // how many more flags we need to set

        for ($i = 1; $i<=$n-2; $i++)
        {
            // found one more flag for $distance
            if ($p[$i]-$left >= $distance && $right-$p[$i] >= $distance)
            {
                if ($need == 1)
                    return $k+2;
                $need--;
                $left = $p[$i];
            }

            if ($right - $p[$i] <= $need * ($distance+1))
                break; // impossible to set $need more flags for $distance
        }

        if ($need == 0)
            return $k+2;

        $distance--;
    }
    return 2;
}        
        
        
        
        function flags($A){
            
            // the magnitude of peaks is not important, only if they *are* peaks
            // (can use Kadane to decide which are peaks?)
            // so it's the number and position of peaks relative to the array that matters
            // 
            // I feel like first thing is to establish number of peaks = max number of flags
            // ...then is there a single calculation that can tell you the actual no?
            // (bearing in mind this is supposed to be done in O(N))
            // 
            // or can we go through the array working things out as we go?
            // Using Kadane, we can say if this is a peak
            // If it's the first peak, it can have a flag, and we can record the position
            // but when we get to the next peak we can't say whether or not this should have a flag
            // 
            // what if we build an array where each peak is a +ve number showing the
            // distance back to the previous peak? Then any array value < number of peaks can have a flag
            // but that will require two traversals of the array
            // 
            // in the example, if there were 5 peaks (max for 12 elements) you
            // can only take 2 flags
            // so there is a relationship between max no of flags and size of array/ max no of peaks
            // 
            // 
            
        

            
        }
        


        ?>
    </body>
</html>
