<?php

 // Create array to hold list of todo items
 $items = array();
 
 function additem($array){
	// Ask for entry
    echo 'Enter item: ';
    // Add entry to list array
    $new_item = get_input();

    echo '(B)eginning or (E)nd of list; ';
    $choice = get_input(TRUE);

    if ($choice == 'B') {
    	array_unshift($array, $new_item);
    }
    elseif ($choice == 'E') {
    	array_push($array, $new_item);
    }
    else {
    	array_push($array, $new_item);
    }
  return $array;
 }




 // List array items formatted for CLI
 function list_items($array)
 {
    $list_string = '';

 	foreach ($array as $number => $item) {
 		$number++;
 		$list_string .= "[{$number}] TODO item: $item\n";
 	}
     // Should be listed [KEY] Value like this:
     // [1] TODO item 1
     // [2] TODO item 2 - blah
 	

 	return $list_string;
 	
 	// Return string of list items separated by newlines.

 }
 
 // Get STDIN, strip whitespace and newlines, 
 // and convert to uppercase if $upper is true
 function get_input($upper = FALSE) 
 {
 	$input = trim(fgets(STDIN));

 	return ($upper) ? strtoupper($input) : $input;
 }

function sort_menu($items) {
	echo "(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered: ";

	$sort_input = get_input(TRUE);

	switch ($sort_input) {
		case 'A':
			asort($items);	
			break;
		
		case 'Z':
			arsort($items);
			break;
		
		case 'O':
			ksort($items);
			break;

		case 'R':
			krsort($items);
			break;

	}
	
	return $items;
}

 // The loop!
 do {
    
 	 
     // Echo the list produced by the function
     echo list_items($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit, (S)ort : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     

     $input = get_input(TRUE);

     // Check for actionable input
     if ($input == 'N') {
        $items = additem($items);

     } 

     elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = get_input();
         $key--;
         // Remove from array
         unset($items[$key]);
     	 $items = array_values($items);
     }
    
     elseif ($input == 'S') {
     	$items = sort_menu($items);  

     }
     
 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);


