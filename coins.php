<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        echo "<br>" . smartCoins(99);
        
        function coins($n){
            
            $result = 0; // number of tails
            
            $coins = array_fill(1, $n, 0);
            
            foreach($coins as $i=>$foo){
                echo "<br>i $i<br>";
                $k = $i; // so we will flip multiples of 1, then 2, then 3 etc.
                while($k <= $n){ // this go through the array atarting at current multiplier
                    echo "k $k<br>";
                    echo "coins[k] $coins[$k]<br>"; // state before flip
                    $coins[$k] = ($coins[$k] + 1) % 2; // does the flip: turns 1 to 0 or 0 to 1
                    echo "coins[k] $coins[$k]<br>"; // state after flip
                    $k = $k + $i; // increment k *by the current multiplier*
                }
                echo "coins[i] $coins[$i]<br>"; 
                $result = $result + $coins[$i]; // count of tails (because tails = 1)
            }
            
            var_dump($coins); // final representation of the state of the coins
            return $result;
            
        }
        

        function smartCoins($n){
            // the clever version that has O(log n) time complexity (rather than the above O(n log n))
            
            // this follows the observation that the number of times each coin is
            // turned over equals the number of divisors it has
            // So prime numbers will always be turned over twice - and hence end up
            // heads - as they have two divisors, 1 and themselves. But not every
            // coin that ends up heads is a prime number, of course, e.g. 6 gets 
            // turned over for 1, 2, 3, and 6 i.e. four times
            // Now of course whther the coins end up heads or tails depends on the 
            // number of times it is flipped - an odd number will mean tails, and even = heads
            // Finally, referring back to counting factors/divisors, we know that 
            // numbers have pairs of symmetric divisors e.g. 1*10, 2*5, 5*2, 10*1
            // and *may* also have an additional non-symmetric divisor, the square root
            // so only square numbers have an odd number of divisors, and the quick
            // solution to the current problem is thus to find the number of square numbers
            // less than than n
            // The number of square numbers less than n is floor(squareRoot(n)), (why?)
            // and finding that value takes logarithmic time (apparently, but why?)
            
            // why is it that the number of square numbers less than n = floor(sqrt(n))?
            // it's kind of because the value of sqare roots is both cardinal and ordinal
            // floor(sqrt(n)) means 'the root of the square number immediately preceding n'
            // if n=20, the preceding square number is 16, and its root is 4,
            // but it is also the 4th square number/square root
            
            // finding floor(sqrt(n)) is logarithmic because as the value of n increases
            // the rate of increase of square nnumbers less than n decreases
            // for n=20, there are 4 square numbers of lesser value
            // for n=120, there are 10 square number of lesser value
            
//            $i = 0;
//            
//            while($i * $i < $n){
//                $i++;
//            }
//            
//            return $i - 1;
            
            // this makes it abundantly obvious why time complexity is O(log n)
            // it's even more obvious if we do it the following way
            // (even if the code is clumsy):
            
            for($i = 1; $i < $n; $i++){
                if ($i * $i > $n){
                    return $i-1;
                }
            }
            return -1;
            
            // the for conditions suggest that i may go as far as n-1
            // but we can clearly see that, the larger n gets, the further
            // from n the terminating condition will be
            
        }

        ?>
    </body>
</html>
