<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['queue'])){
    $queue = $_SESSION['queue'];
    $tail = $_SESSION['tail'];    
    $head = $_SESSION['head'];    
} else {
    $_SESSION['N'] = 10; // the like 'reserved' or maximum size of the queue
    $queue = array_fill(0,$_SESSION['N'],0); // not sure why this is really necessary
                                 // prevents reference not found warnings I suppose...

    $head = 0;
    $tail = 0;
    
    $_SESSION['queue'] = $queue;
    $_SESSION['tail'] = $tail;    
    $_SESSION['head'] = $head; 
    $x = 0;
}  
    
    
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $args = array(
        'x'     => FILTER_SANITIZE_NUMBER_INT,
        'push'  => FILTER_SANITIZE_STRING,
        'pop'   => FILTER_SANITIZE_STRING,
        'clear'   => FILTER_SANITIZE_STRING,
    );

    $myinputs = filter_input_array(INPUT_POST, $args);

    $x = intval($myinputs['x']);
    $push = $myinputs['push'];
    $pop = $myinputs['pop'];    
    $clear = $myinputs['clear'];    
    
  
    
    
    if(isset($clear)){
        $_SESSION['N'] = 10; // the 'reserved' or maximum size of the queue
        $queue = array_fill(0,$_SESSION['N'],0); 
        
        $head = 0;
        $tail = 0;
        
        $_SESSION['queue'] = $queue;
        $_SESSION['tail'] = $tail;    
        $_SESSION['head'] = $head; 
        $x = 0;
    } elseif(isset($push) && isset($x)){
        push(intval($x));
    } elseif(isset($pop)){
        pop();
    }
    
}


        
        function push($x){
            // items get pushed onto the tail, which is the right-hand end of the array
            // why do the modulo thing? (N = maximum size of queue, as initialised above)
            // because it makes the queue (or buffer) circular:
            // if we just kept adding to the tail, at some point it will exceed N
            // say N = 10, so the items in the queue are numbered 0..9
            // when tail = 9, tail+1 = 10, and 10%10 = 0
            // when tail = 8, tail+1 = 9, and 9%10 = 9
            // and so the value of tail can never go above N - when it does it just
            // starts to overwrite the head
            // or rather they don't because the head is subject to the same calculation
            // so it moves along in front of the tail... right?
            // yes, and the real point of doing it this way is you can always have a queue
            // up to N long
            // if you didn't do this then once your tail gets to N you can't add any
            // further values, even if other values have been popped of the head
            // e.g. you could this array: 0,0,0,0,0,0,0,0,1,2 where only two of the
            // reserved locations are in use but you can't push any more values
            // onto the tail
            $_SESSION['tail'] = ($_SESSION['tail'] + 1) % $_SESSION['N'];
            $_SESSION['queue'][$_SESSION['tail']] = $x;          
        }
        
        function pop(){
            // items get popped off the head, which is the left-hand end of the array
            $_SESSION['head'] = ($_SESSION['head'] + 1) % $_SESSION['N'];
            $popped = $_SESSION['queue'][$_SESSION['head']];
            $_SESSION['queue'][$_SESSION['head']] = 0;
            return $popped;
        }
        
        function size(){
            // return size of the queue (number of elements)
        }
        
        function emptyQ(){
            // determine if queue is empty
        }
       

var_dump($myinputs);
var_dump($_SESSION);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Queues</h1>
        
        <p></p>
        
     
        <?php
        echo implode(",",$_SESSION['queue']) . "<br>"; 
        ?>
        <form method="POST">
            <input type="text" name="x" value="<?php echo $x; ?>">
            <input type="submit" name="push" value="Push">
            <input type="submit" name="pop" value="Pop">
            <input type="submit" name="clear" value="Clear">
        </form>

        
    </body>
</html>
