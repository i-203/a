<?php
function a($array) {
    rsort($array);
    return $array;
}
$array = [5, 3, 1, 7, 4];
$sorted = a($array);
echo "Original: ";
print_r($array);
echo "Sorted: ";
print_r($sorted);
?>