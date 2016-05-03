<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        print_r(coins(10)); // this will track heads/tails as 0/1
        
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
        


        ?>
    </body>
</html>
