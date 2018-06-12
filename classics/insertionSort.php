<!DOCTYPE html>
<?php
$a = filter_input(INPUT_POST, 'array',FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertion sort</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../include/jquery-animatedSort.css">
        <link rel="stylesheet" href="../include/local.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="../include/jquery.animatedsort.js"></script>

        <script>
        $( document ).ready(function() {
            $("#insertion-list").animatedSort({
                stepTime: 600,
                highlightColor: "teal",
                listType: {bottom: 0, top: 100, length: 12},
                sortedColor: "#e4701d",
                sortAlgorithm: "insertion",
                animationTrigger: {event: "click", selector: "#insertion-sort"},
                resetTrigger: {event: "click", selector: "#insertion-reset"}
            });
        });
        </script>



    </head>
    <body>
        <div class="container">


        <h1>Insertion sort - [this is actually bubble sort?]</h1>
        <p>Yes this is bubble sort,not insertion sort</p>

        <section id="description">
            <h2>Description</h2>
            <div>
            <p>Traverse the array from left to right, considering each element in turn.
            If the current element (element n) is less than the preceding one (i.e. they are in
            the wrong order relative to each other), swap it with the preceding one.
            Keep repeating this operation, comparing
            our current element in its new position with the one before it.
            Do this until we meet a preceding element that is less than the current one,
            or we reach the start of the array. Then move on to the next element following
            the one we started with (element n+1).</p>
            <p>So elements that are out of their correct order are moved left until
            they reach their correct position.</p>
            </div>
        </section>

        <section id="complexity">
            <h2>Complexity</h2>
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
            <h2>Pseudocode</h2>
            <div>
            <section>
            <h3>Simplified</h3>
            <pre>
    For each element of array A
        while this element is less than the preceding element
            swap it with the preceding element
            </pre>
            </section>
            <section>
            <h3>Detailed</h3>
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
            <h2>Implementation</h2>


            <div id="insertion">
                <div id="insertion-list">
                   <h3>Insertion Sort</h3>
                    <div class="buttons">
                        <button type="button" class="btn btn-primary" id="insertion-sort">Sort</button>
                        <button type="button" class="btn" id="insertion-reset">Reset</button>
                   </div>
                </div>
            </div>


        </section>

        </div>

    </body>
</html>
