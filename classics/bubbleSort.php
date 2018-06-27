<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bubble sort</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../include/jquery-animatedSort.css">
        <link rel="stylesheet" href="../include/local.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="../include/jquery.animatedsort.js"></script>

        <script>
        $( document ).ready(function() {
            $("#bubble-list").animatedSort({
                stepTime: 600,
                highlightColor: "teal",
                listType: {bottom: 0, top: 100, length: 12},
                sortedColor: "#e4701d",
                sortAlgorithm: "bubble",
                animationTrigger: {event: "click", selector: "#bubble-sort"},
                resetTrigger: {event: "click", selector: "#bubble-reset"}
            });
        });
        </script>



    </head>
    <body>
        <div class="container">

        <h1>Bubble sort</h1>

        <section id="description">
            <h2>Description</h2>
            <div>
                <p>
                    The basic idea of bubble sort is to make multiple passes over an array,
                    in each pass comparing the
                    value in each position with the value following it, and swapping the two
                    round if they are in the wrong order i.e. the second is smaller than the first.
                    This causes larger values to 'bubble' their way to the end, which will (eventually) sort the array.
                </p>
                <p>The simplest possible implementation is this:</p>
                <pre>
    A is an array of length n

    for i = 1 to n
        for j = 0 to n-1
            if A[j] > A[j+1], swap their values
                </pre>
                <p>This basic algorithm can be optimized in a few ways:</p>
                <ul>
                    <li>
                        Add a flag to record whether any swapping took place in each pass
                        of the inner loop. If not then the array must now be in order so we can halt the process.
                    </li>
                    <li>
                        At the end of each pass of the inner loop the largest item has been 'bubbled'
                        to the end, so "at the end of the i-th pass, the last i numbers are already in place".
                        So the inner loop can be made progressively shorter by not going back over already
                        sorted elements at the end of the array
                    </li>
                    <li>
                        You can combine the two ideas above for a further optimisation by
                        recording in the inner loop the last position at which a swap took place,
                        and then using that as the upper bound of the next inner loop.
                        That is, if there was no swap beyond A[k], then we know
                        that the elements beyond that point are in order, so we can use that
                        as our next upper bound
                    </li>
                </ul>
                <p>Optimised implementation:</p>
                <pre>
    bound = n-1
    for i = 1 to n
        newbound = 0
        for j = 0 to bound
            if A[j] > A[j+1], swap their values
                newbound = j-1
        bound = newbound
                </pre>
                <p>A couple of points to note:</p>
                <ul>
                    <li>
                        The outer loop is from 1 to n, whilst the inner loop is from 0 to n-1.
                        That's because the purpose of the outer loop index is just to iterate
                        n times, whilst in the inner loop the index variable is used to
                        reference array elements so must start at zero
                    </li>
                    <li>
                        The new bound is set at j-1 because it must record the last point at
                        which a swap <em>didn't</em> happen, whereas at this point in the algorithm a swap has
                        just happened.
                    </li>
                    <li>Implementing this in PHP I found that on the first pass through the array
                        (i = 1) in the final iteration of that pass (j = bound) there is no value A[j+1], because
                        we've gone beyond the end of the array. A quick fix for this is to add a conditional
                        to test that A[j+1] is set, but there must surely be a better way...
                    </li>
                </ul>
            </div>
        </section>

        <section id="complexity">
            <h2>Complexity</h2>
            <div>
            <p>
                Regardless of any optimisations, this requires two nested loops, so
                in the worst case it will have quadratic complexity O(n^2).
                (NB 'big O' time complexity
            means "fewer than or the same as". In this case, for each iteration of the
            outer loop there will be at most the same number of iterations of the inner
            loop but usually fewer). Quadratic complexity is ok for small jobs but
            disastrous for larger ones.</p>
            </div>
        </section>


        <section id="implementation">
            <h2>Demo</h2>


            <div id="bubble">
                <div id="bubble-list">
                   <h3>Bubble Sort</h3>
                    <div class="buttons">
                        <button type="button" class="btn btn-primary" id="bubble-sort">Sort</button>
                        <button type="button" class="btn" id="bubble-reset">Reset</button>
                   </div>
                </div>
            </div>


        </section>

        </div>

    </body>
</html>
