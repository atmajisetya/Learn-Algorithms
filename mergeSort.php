<?php
    //function for splits the array and sort recursively
    function mergesort (&$Array, $left, $right){
        if ($left < $right){
            $mid = $left + (int) (($right - $left)/2);
            mergeSort ($Array, $left, $mid);
            mergeSort ($Array, $mid+1, $right);
            merge ($Array, $left, $mid, $right);
        }
    }


    //function to merge sub problem solution
    function merge(&$Array, $left, $mid, $right){
        //create two array to hold split
        $n1 = $mid - $left +1; //size LeftArray
        $n2 = $right - $mid; //size RightArray
        $LeftArray = array_fill(0, $n1, 0);
        $RightArray = array_fill(0, $n2, 0);
        for ($i=0; $i < $n1; $i++){
            $LeftArray[$i] = $Array[$left + $i];
        }
        for ($i=0; $i < $n2; $i++){
            $RightArray[$i] = $Array[$mid + $i + 1];
        }
        $i = 0;
        $j = 0;
        $k = $left;

        while ($i < $n1 && $j < $n2){
            if ($LeftArray[$i] < $RightArray[$j]){
                $Array[$k] = $LeftArray[$i];
                $i++;
            }else {
                $Array[$k] = $RightArray[$j];
                $j++;
            }
            $k++;
        }
        //copying the remaining elements of LeftArray
        while ($i < $n1){
            $Array[$k] = $LeftArray[$i];
            $i++;
            $k++;
        }

        //copying the remaining elements of RightArray
        while ($j < $n2){
            $Array[$k] = $RightArray[$j];
            $j++;
            $k++;
        }

    }
    //function to print array
    function PrintArray($Array, $n){
        for ($i=0; $i<$n; $i++){
            echo $Array[$i]. " ";
        }
    }

    //test the code
    $coba = array(10, 1, 23, 50, 4, 9, -4);
    $n = sizeof($coba);
    echo "Original Array\n";
    PrintArray($coba, $n);

    echo "\n";

    mergesort ($coba, 0, $n-1);
    echo "Sorted Array\n";
    PrintArray($coba, $n);

?>
