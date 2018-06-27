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


        <h1>Insertion sort</h1>

        <section id="description">
            <h2>Description</h2>
            <div>
                <p>
                    Insertion sort is often likened to the way you sort a hand of playing cards. You
                    insert each item into its correct position in a sorted portion
                    to the left, which builds up as you progress.
                    Each item moves backwards towards the the start of the list until it
                    arrives at its correct position.
                </p>
                <p>
                    Following insertion, the items to the right of the inserted
                    member must be shifted to the right. That sounds like it should be
                    difficult and computationally expensive, but actually the
                    shift is not done as a single separate action, rather it happens automatically as
                    part of the comparison/insertion process. Furthermore, a shift
                    is a cheaper operation than a swap - you simply change the value of
                    the index var rather than having to move anything around (via a temporary
                    var, in most languages).
                </p>
                <p>
                    So there's an outer loop that iterates over the array and an inner loop
                    that performs the comparison and insertion/shifting for each element.
                    In the inner loop, the process is to compare the element with the item
                    to its left, and if that item is smaller shift it to the right, then
                    consider the next item to the left. If the leftward item is smaller, then
                    stop and insert.
                </p>
                <p>
                    Because there's two nested loops, the complexity is O(n2), same as bubble sort.
                    If we compare insertion sort with un-optimised bubble sort then it
                    will be on average quicker because it inherently ignores already sorted
                    items. Comparing it with the optimised 'short bubble', it will (I think)
                    still be generally quicker because the mechanism of shifting and insertion is
                    cheaper than complete swapping of elements.
                </p>
                The algorithm:
                <p>
                <pre>
    A is a zero-indexed array of length n

    for i = 1 to n-1
        value = A[i]
        position = i
        while position > 0 and value < A[position-1]
            A[position] = A[position-1]
            position = position-1
        A[position] = value
                </pre>
            </div>
        </section>

        <section id="implementation">
            <h2>Animation</h2>
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
