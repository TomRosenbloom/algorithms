<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['stack'])){
    $stack = $_SESSION['stack'];
    $size = $_SESSION['size'];
} else {
    $n = 10; // the like 'reserved' or maximum size of the stack
    $stack = array_fill(0,$n,0); // not sure why this is really necessary
                                 // prevents reference not found warnings I suppose...

    $size = 0; // starting size for stack (actual 'filled' values), 
               // this var also acts as pointer to top of stack (next position to fill)
    $_SESSION['stack'] = $stack;
    $_SESSION['size'] = $size; 
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
        $n = 10; // the like 'reserved' or maximum size of the stack
        $stack = array_fill(0,$n,0); // not sure why this is really necessary
                                     // prevents reference not found warnings I suppose...

        $size = 0; // starting size for stack (actual 'filled' values), 
                   // this var also acts as pointer to top of stack (next position to fill)
        $_SESSION['stack'] = $stack;
        $_SESSION['size'] = $size; 
        $x = 0;
    } elseif(isset($push) && isset($x)){
        push(intval($x));
    } elseif(isset($pop)){
        pop();
    }
    
}


        
        function push($x){
            $_SESSION['stack'][$_SESSION['size']] = $x;
            $_SESSION['size']++;           
        }
        
        function pop(){
            $popped = $_SESSION['stack'][$_SESSION['size']-1];
            $_SESSION['stack'][$_SESSION['size']-1] = 0;
            $_SESSION['size']--; 
            return $popped;
        }





        

var_dump($myinputs);
var_dump($_SESSION);

// nb it's really starting to bug me using this backwards procedural style
// particularly awkward for this example
// ...need to get Laravel going

// I truly am a useless cunt: I can't get the mechanics of this to work
// i.e. the behaviour given particular inputs
// (e.g. prevent the array being re-initialised each time
// How can I seriously expect to get a job doing this stuff?

// actually it is quite difficult - you can test for submission of a POST form
// with if($_SERVER['REQUEST_METHOD'] == 'POST'), or by testing submit button values
// the latter is problematical because using filter_input outside the test creates the vars
// but however we do it, because we are in a stateless scenario the array can't
// just persist from one page request to another
// either it must be passed somehow, or use javascript for the forms
// ...think I'd forgotten about all this!

// has the form been submitted? 
// have session vars been set?
// the latter is secondary to the first, so:
// if POST, then if SESSION (to get current stack and size), then according
// to push/pop/clear, act accordingly

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Stacks</h1>
        
        <p></p>
        
     
        <?php 
        // I actually don't understand why I have to address $_SEESION[stack] here
        // local $stack is a step behind, but such is my great intellect I can't fathom why
        echo implode(",",$_SESSION['stack']) . "<br>"; 
        ?>
        <form method="POST">
            <input type="text" name="x" value="<?php echo $x; ?>">
            <input type="submit" name="push" value="Push">
            <input type="submit" name="pop" value="Pop">
            <input type="submit" name="clear" value="Clear">
        </form>

        
    </body>
</html>
