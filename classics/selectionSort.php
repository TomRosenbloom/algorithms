<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array', FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Selection sort</h1>
        <p>Similar to insertion sort. Find minimal element and swap with first. Repeat.</p>
        <form method="POST">
            <input type="text" name="array" value="<?php echo $a; ?>">
            <input type="submit" value="Sort">
        </form>
        <?php
        $A = array();

        if (isset($a)) {
            $A = str_split(strval($a));
        }

        if (count($A) > 0) {
            selectionSort($A);
        }


        function selectionSort(array $A)
        {
            $n = count($A);

            for ($i = 0; $i < $n; $i++) {
                $minimal = $i;

                for ($j = $i+1; $j < $n; $j++) {
                    if ($A[$j] < $A[$minimal]) {
                        $minimal = $j;
                    }
                }

                // a conditional here would prevent this swap happening if minimal hasn't changed
                $temp = $A[$i];
                $A[$i] = $A[$minimal];
                $A[$minimal] = $temp;

                echo "<br>".implode("", $A);
            }

            return $A;
        }


        ?>
    </body>
</html>
