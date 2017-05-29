<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertion sort</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        
        <style type="text/css">
            main {
                width: 800px;
            }
            h1 {
                margin-bottom: 0;
                font-family: Gill Sans, sans-serif;
            }
            section div {
                overflow: hidden; /* prevents slideToggle jump */
            }
            p {
                font-family: Times New Roman, serif;
            }
            form {
                margin-top: 10px;
            }
            .active {
                cursor: pointer;
            }

        </style>

        
    </head>
    <body>
        <main>
            
        <h1>Insertion sort</h1>
        
        <section id="description">
            <h1>Description</h1>
            <div>
            <p>Traverse the array from left to right, comparing each element with the 
            preceding one.
            If the current element is less than the preceding one (i.e. they are in 
            the wrong order), swap it with the previous one, then repeat, comparing 
            our current element in its new position with the one before it.
            Do this until the previous element is less than the current one, 
            or we reach the end of the array.</p>
            <p>So elements that are out of their correct order are moved left until
            they reach their correct position.</p>
            </div>
        </section>
        
        <section id="complexity">
            <h1>Complexity</h1>
            <div>           
            <p>This requires two nested loops. The outer loop iterates over the array
            elements, the inner one drives the comparison and swapping of elements.
            This gives the algorithm quadratic complexity O(n^2). (NB 'big O' time complexity
            means "fewer than or the same as". In this case, for each iteration of the
            outer loop there will be at most the same number of iterations of the inner
            loop but usually fewer). Quadratic complexity is ok for small jobs but 
            disastrous for larger ones.</p>
            </div>
        </section>
        
        <section id="pseudoCode">
            <h1>Pseudocode</h1>
            <div>           
            <section>
            <h1>Simplified</h1>
            <pre>
    For each element of array A (except the first element)
        while this element is less than the preceding element
            swap it with the preceding element
            </pre>
            </section>
            <section>
            <h1>Detailed</h1>
            <pre>
    A is the (zero-indexed) array to be sorted
    n is the number of elements in A
    
    for i = 1 to n 
        j = i 
        while A[j] > A[j-1] and j > 0 
            swap A[j] and A[j-1]
            j = j-1

            </pre>
            </section>
            </div>
        </section>
        
        <section id="implementation">
            <h1>Implementation</h1>
            <form method="POST">
                <input type="text" name="array" value="<?php echo $a; ?>">
                <input type="submit" value="Sort">
            </form>
            <?php
            $A = array();

            if(isset($a)){
                $A = str_split(strval($a));            
            }

            function insertionSort(array $A){

                $n = count($A);
                
                echo "<ul>";

                for($i = 1; $i < $n; $i++){ // from the second element to the last
                    echo "<li>Outer loop counter: $i ";
                    
                    $j = $i;
                    
                    echo "<dl>";
                    
                    if($A[$j] < $A[$j-1]){
                    
                        while($j > 0 && $A[$j] < $A[$j-1]){

                            echo "<dt>Inner loop counter: $j </dt>";
                            echo "<dd>";
                            echo $A[$j] . " is less than " . $A[$j-1] . "<br>";
                            foreach($A as $key=>$val){
                                if($key === $j){
                                    echo "<strong>" . $val . "</strong>";
                                } else {
                                    echo $val;
                                }
                            }
                            echo "<br>";

                            $temp = $A[$j-1];
                            $A[$j-1] = $A[$j];
                            $A[$j] = $temp;
                            $j--;

                            foreach($A as $key=>$val){
                                if($key === $j){
                                    echo "<strong>" . $val . "</strong>";
                                } else {
                                    echo $val;
                                }
                            }
                            echo "<br></dd>";
                        }
                    
                    } else {
                        echo "<dt>No inner loop</dt>";
                        echo "<dd>";
                        echo $A[$i] . " is not less than " . $A[$i-1] . "<br>";
                            foreach($A as $key=>$val){
                                if($key === $i){
                                    echo "<strong>" . $val . "</strong>";
                                } else {
                                    echo $val;
                                }
                            }
                            echo "<br>";
                            foreach($A as $key=>$val){
                                if($key === $i){
                                    echo "<strong>" . $val . "</strong>";
                                } else {
                                    echo $val;
                                }
                            }
                            echo "<br></dd>";
                    }
                    
                    echo "</dl>";
                    echo "</li>";
                }
                
                echo "</ul>";

                return $A;

            }

            if(count($A) > 0) {
                //print_r(insertionSort($A));
                insertionSort($A);
            }

            ?>
        </section>
        
        </main>
        
        <script type="text/javascript">
        $(document).ready(function(){ 

            $("section h1").addClass("active");
            
            //$("section h1").next("div").addClass("hide");
            
            $("section h1").next("div").hide();
            
            $("section h1").click(function(){
                $(this).parent().find("div").slideToggle(400);
            });

            $("li").hide();

//            $("li").each(function(index) {
//                $(this).delay(400*index).fadeIn(300);
//                $("dl").each(function(index){
//                    $(this).delay(400*index).fadeIn(300);
//                    $(this).delay(400).fadeOut(100);
//                });
//                $(this).delay(400).fadeOut(100);                
//            });
            
            $("li, li dl").each(function(index) {
                $(this).delay(400*index).fadeIn(300);

                $(this).delay(400).fadeOut(100);                
            });            
            
        });
        </script>        
        
    </body>
</html>
