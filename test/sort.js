$(document).ready(function(){ 

// this is from https://stackoverflow.com/questions/14800987/javascript-sorting-by-algorithm-jquery-maybe
// ...and this seems to use same approach, and/or may be by the same person: https://github.com/cristianjd/jquery-animatedSort

// it animates sorting, with each number in a table row
// note it specifically deals with types of sort that swap to neighbouring elements
// so in the algorithm, instead of doing the swap there, there is a call to a swap function
// and this function references the array of animation steps, i.e. it populates it
// but to do something a little cruder for now, I could just push the current partially sorted
// list onto an array for animation??

var SORT = function(type, list, selector){
    
    var container, 
        containerTr, 
        animSteps = []; // array of animation steps

    // Show all elements in the container
    // called just once to create the initial table html
    // note how functions are being defined as variables - 
    // that's a function expression, as opposed to the more familiar function declaration
    // specifically it's an anonymous function expression
    // it is only evaluated at the point it is reached in the step-by-step execution of the code
    var printArray = function(list){
        var str = ["<table>"], // square brackets means new array
            i = 0, 
            l = list.length;
        for (i; i < l; ++i) { // for each number
            str.push("<tr><td>", list[i], "</td></tr>"); //add bits of html and number to array 
        }
        str.push("</table>");
        container.html(str.join("")); // convert the array into a string
        
        console.log(str);
        
    };
     
    // for each pair of elements that need to be swapped, first do the swap in the array,
    // and also push onto the animSteps array a group of three functions that will 
    // perform the swap animation
    // This is something I don't really like about this method - it removes the swapping
    // part of the algorithm out into this function which then does something else 
    // that is not strictly related
    var swap = function(list, i1, i2) {
        var tmp = list[i1];
        list[i1] = list[i2];
        list[i2] = tmp;
        // Add 3 functions for each swapping action:
        // 1. highlight elements, 2. swap, 3. remove highlight
        animSteps.push(function(){
            containerTr.eq(i1).add(containerTr.eq(i2)).addClass("highlight");
        }, function(){
            var tmp = containerTr.eq(i1).text();
            containerTr.eq(i1).text(containerTr.eq(i2).text());
            containerTr.eq(i2).text(tmp);
        }, function(){
            containerTr.eq(i1).add(containerTr.eq(i2)).removeClass("highlight");
        });
    };

    var animSwap = function(list, i1, i2) {

        // Add 3 functions for each swapping action:
        // 1. highlight elements, 2. swap, 3. remove highlight
        animSteps.push(function(){
            containerTr.eq(i1).add(containerTr.eq(i2)).addClass("highlight");
        }, function(){
            var tmp = containerTr.eq(i1).text();
            containerTr.eq(i1).text(containerTr.eq(i2).text());
            containerTr.eq(i2).text(tmp);
        }, function(){
            containerTr.eq(i1).add(containerTr.eq(i2)).removeClass("highlight");
        });
    };    
    
    // this is where the array of animation steps is processed
    // the animation steps are functions that encapsulate bits of jquery
    // ...this is the kind of thing you can do in javascript
    var animation = function(){
        // Execute all iteration functions one after another
        if (animSteps.length) { // end condition of recursion
            setTimeout(function(){
                animSteps.splice(0,1)[0](); // the curved brackets cause execution of the function
                                            // splice(0,1) will return and remove the first element
                                            /// ...and the square brackets?
                animation();
            }, 250);
        }
    };

    // Collection of sorting algorithms
    // these are defined as a collection (?)
    // so you can choose which one to execute with algorithms[type](list);
    var algorithms = {
        bubblesort: function(list) {
            for (var n = list.length; n > 1; --n) {
                for (var i = 0; i < n-1; ++i) {
                    if (list[i] > list[i+1]) {
                        var tmp = list[i];
                        list[i] = list[i+1];
                        list[i+1] = tmp;                        
                        animSwap(list, i, i+1);
                    }
                }
            }
        }
        // Add more algorithms using "swap" here...
    };

    // this is where the execution is triggered
    if (algorithms[type] != undefined) {
        container = $(selector);
        printArray(list);
        containerTr = container.find("tr"); // will find all tr elements in container
        algorithms[type](list);
        this.sorted = list;
        animation();
    }
    
    
};

// Usage:
var s = new SORT("bubblesort", [5,8,2,4,1,9,7,3,0,6], "#container");
console.log(s.sorted);    //the sorted array

});