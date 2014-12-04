<?php

// Add fwrite capabillity //

 $items = array();

//////////////////////////
/// DEFINED FUNCTIONS ///
////////////////////////


// Defined Function: writeFile() - writes user list to file //

function writeFile($path, $arrayList) {
	$filename = $path;
	$handle = fopen($filename, 'w');
	foreach ($arrayList as $listItem) {
		fwrite($handle, $listItem . PHP_EOL);
	}

	fclose($handle);

	return "The file: $filename has been saved!";
}



// Defined Function: readFile() - Opens/Reads list.txt into $items array //

 function readList($path) {
 	$filename = $path;
 	$handle = fopen($filename, 'r');
	$contents = fread($handle, filesize($filename));
	$contentsArray = explode("\n", $contents);
	fclose($handle);
	return $contentsArray;
}
	  

 // Defined Function: listItems() - List array items formatted for CLI //

 function listItems($list) {
	$todoItem = '';
	foreach ($list as $key => $item) {
		$key++;
		$todoItem .= "$key $item\n";  
	}
	return "$todoItem\n";
}

// Defined Function: getInput() - gets user input //

 function getInput($upper = false)
 {
	 if($upper) {
		return strtoupper(trim(fgets(STDIN)));
	} else {
	 return trim(fgets(STDIN));
	}
}

// Defined Function: sortAz()

function sortAz($sort_Array) {
	asort($sort_Array);
	return $sort_Array;
}

// Defined Function: sortZa()

function sortZa($sort_Array) {
	arsort($sort_Array);
	return $sort_Array;
}

// Defined Function: sortOrd()

function sortOrd($sort_Array) {
	ksort($sort_Array);
	return $sort_Array;
}

// Defined Function: sortRev()

function sortRev($sort_Array) {
	krsort($sort_Array);
	return $sort_Array;
}



/////////////////
// The loop! ///
///////////////

 do {

 	/////////////////////////
	// DISPLAY ITEM LIST ///
 	///////////////////////

	echo listItems($items);

	////////////////////////////
	// DISPLAY MENU OPTIONS ///
	//////////////////////////

	echo '(O)pen, (N)ew item, (R)emove item, (S)ort, s(A)ve, (Q)uit : ';

	// GET INPUT: N, R, S, Q
   
	$input = getInput(true);


	//////////////////////////////////////////
	/// ACTIONS TO TAKE DEPENDING ON INPUT //
	////////////////////////////////////////

	if ($input == 'O') {
		echo 'Enter path to file: ';
		$path = getInput();
		echo $path . PHP_EOL;
			if (filesize($path) > 0) {
				$userList = readList($path);
				$items = array_merge($items, $userList);
			}

			else {
				echo "Empty file";
			}

	} 

	elseif ($input == 'A') {
		echo "\nEnter path/filename: ";
		$pathWrite = getInput();
			if (file_exists($pathWrite) > 0) {
				echo "\nThe file {$pathWrite} already exists.\n";
				echo "\nAre you sure you want to overwrite it? (Y/N): ";
				$overwrite = getInput(true);
					if ($overwrite == 'Y') {
						echo "\n";
						echo writeFile($pathWrite, $items) . PHP_EOL;

					} 

					else {
						echo "You have chosen not to overwrite: $pathWrite\n";
						echo " \n";
					}

				
			}

			else {
				echo "\nThis file does not exist. I shall create it!\n";
				echo writeFile($pathWrite, $items) . PHP_EOL;
			}
	} 

	elseif ($input == 'N') {
		echo "\nEnter item: ";
		$items[] = getInput();
		echo PHP_EOL;
	} 

	elseif ($input == 'R') {
		echo 'Enter item number to remove: ';
		$key = getInput();
		$key--;
		unset($items[$key]);
		echo PHP_EOL;
	} 

	elseif ($input == 'S') {
		echo 'Sort by: (A) to Z, (Z) to A, (O)rder of entry, (R)everse order: ';
		
		$sortType = getInput(true);

		switch ($sortType) {
			case 'A':
				$items = sortAz($items);
				break;
			
			case 'Z':
				$items = sortZa($items);
				break;

			case 'O':
				$items = sortOrd($items);
				break;

			case 'R':
				$items = sortRev($items);
				break;
		}
	}

////////////////////////////////
// Exit when input is (Q)uit //
//////////////////////////////

 } while ($input != 'Q');

 // Say Goodbye! //

 echo "Goodbye!\n";


 // exit(0);
