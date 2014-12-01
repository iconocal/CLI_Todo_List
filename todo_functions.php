<?php

 // Create array to hold list of todo items
 $items = array();

 // List array items formatted for CLI
 function listItems($list) {
    $todoItem = '';
    foreach ($list as $key => $item) {
        $key++;
        $todoItem .= "$key $item\n";  
    }
    return "$todoItem\n";
}

// Defined Function: Get Input
// Get STDIN, strip whitespace and newlines,
// and convert to uppercase if $upper is true

 function getInput($upper = false)
 {
     if($upper) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
     return trim(fgets(STDIN));
    }
}



 // The loop!
 do {
     // Echo the list produced by the function
     echo listItems($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     $input = getInput(true);

     // Check for actionable input
     if ($input == 'N') {
         // Ask for entry
         echo 'Enter item: ';
         // Add entry to list array
         $items[] = getInput();
     } elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = getInput();
         // Remove from array
         unset($items[$key]);
     }
 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);