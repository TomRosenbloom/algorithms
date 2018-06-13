<?php

$A = ['93','44','89','52','9','79','17','41','1','11','38','18'];

// for($i = 0; $i < count($A)-1; $i++) {
//     for($j = 0; $j < count($A)-1; $j++) {
//         if($A[$j] > $A[$j+1]){
//             $temp = $A[$j];
//             $A[$j] = $A[$j+1];
//             $A[$j+1] = $temp;
//         }
//     }
// }

$n = count($A);

$bound = $n-1;

for($i = 1; $i <= $n; $i++) {
    $new_bound = 0;
    for($j = 0; $j <= $bound; $j++){
        if(isset($A[$j+1]) && $A[$j] > $A[$j+1]){
            $temp = $A[$j];
            $A[$j] = $A[$j+1];
            $A[$j+1] = $temp;
            $new_bound = $j-1;
        }
    }
    echo "<br>", implode(", ", $A);
    $bound = $new_bound;
}

// echo implode(", ", $A);
