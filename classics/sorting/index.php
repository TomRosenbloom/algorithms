<?php
/*
take an array of strings and sort them alphabetically

sorting alogrithms (as applied to an array of single characters):

Comparison sorting:

1.bubble sort - go through the array and compare each a[i] with a[i-1],
if a[i] is less than a[i-1] swap them round. In effect this shuffles each
element backwards through the array until it reaches its correct position.
Inefficient because you have to do two loops, one to move each element of the array
and one to do the moving (which will be from zero to n iterations depending on how
far out of order the element is)

2. selection sort - find the element with the smallest value, swap it with the
first unsorted element, repeat.

3. insertion sort - take each element in turn and insert it into the correct position amongst
the already sorted elements ('behind' it). The algorithms for insertion sort and selection sort are very similar

4. quick sort

5. merge sort

----

Now there is in this example the added complication that we are sorting strings
rather than single characters.
The answer to that might be to have a string comparison function, or it might be to
incorporate examination of the string characters into the sorting alg...
*/

$arr = ['zoe','john','jenny','adam','jedward','edward','dave'];




?>
