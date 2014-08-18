<?php

 // Create array to hold list of todo items
 $items = array();

 // The loop!
 do {
 	// Iterate through list items
 	foreach ($items as $key => $item) {
 		// Display each item and add newline
 		$key++;
 		echo "[$key]" . " {$item}" . PHP_EOL;
 	}
 	// Show the menu options
 	echo '(N)ew item, (R)emove item, (Q)uit:    ';
 	//Get the input from user
 	//Use trim() to remove whitespace and newlines
 	$input = trim(fgets(STDIN));

 	// Check for actionable input
 	if ($input == 'N' || $input == 'n') {
 		// Ask for entry
 		echo 'Enter item: ';
 		// Add entry to list array
 		$items[] = trim(fgets(STDIN));
 	} elseif ($input == 'R' || $input == 'r') {
 		// Remove which item?
 		echo 'Enter item number to remove: ';
 		// Get array key
 		$key = trim(fgets(STDIN));
 		$key--;
 		//remove from array
 		unset($items[$key]);
 		$items = array_values($items);
 	}
 // Exit when input is (Q)uit
 	
 } while ($input != 'Q' && $input != 'q');

 // Say Goodbye!
 echo "Goodbye!" . PHP_EOL;

 exit(0);



