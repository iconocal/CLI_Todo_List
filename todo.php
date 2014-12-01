<?php

// Todo Exercise


// Create array to hold list of todo items
$items = array();

// //////////
// FUNCTIONS
// /////////

// Defined Function: List Items

function listItems($list) {
    $todoItem = '';
    foreach ($list as $key => $item) {
        $todoItem .= "$key $item\n";
        $key++;
    }
    return "$todoItem\n";
}
// Defined Function: Get input

function getInput($input) {

}



// The loop!
do {

    echo listItems($items);

    //Show the menu options

    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = strtolower(trim(fgets(STDIN)));

    // Check for actionable input
    if ($input == 'n') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = trim(fgets(STDIN));
    } elseif ($input == 'r') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
        // Remove from array
        $key--;
        unset($items[$key]);
    }
// Exit when input is (Q)uit
} while ($input != 'q');

// Say Goodbye!
echo "Goodbye!\n";

// // Exit with 0 errors
exit(0);













