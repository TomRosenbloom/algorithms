$( document ).ready(function() {
   
    var list = [45,75,37,8,19,46,52,2,28,6,78,89,39,54,16,7,13,12,5,11,4];
    console.log(mergeSort(list));
                
    function mergeSort(list){

            // terminating condition for recursion: single element array
            if (list.length === 1) { 
                return list;
            } 
            
            var mid = list.length / 2;
            var left = list.slice(0,mid);
            var right = list.slice(mid,list.length);
            console.log(left);
            console.log(right);

            left = mergeSort(left);
            right = mergeSort(right);

            return merge(left, right);            
           
    }
    
        function merge(left, right)
        {
            var result = [];
            var leftIndex = 0;
            var rightIndex = 0;

            while(leftIndex < left.length && rightIndex < right.length)
            {
                if(left[leftIndex] > right[rightIndex])
                {

                    result.push(right[rightIndex]);
                    rightIndex++;
                }
                else
                {
                    result.push(left[leftIndex]);
                    leftIndex++;
                }
            }
            while(leftIndex < left.length)
            {
                result.push(left[leftIndex]);
                leftIndex++;
            }
            while(rightIndex < right.length)
            {
                result.push(right[rightIndex]);
                rightIndex++;
            }
            return result;
        }
        
});
