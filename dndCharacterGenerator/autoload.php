<?php
spl_autoload_register(function($className) {

	// folders the classes can be located in
	$folders = array(
		'.', 
		'Background',
		'Classes', 
		'Races',
		'Races/Gnome',
		'Races/Halfling',
		'Races/Dwarf',
    'Races/Elf'
	);

	// loop over the folder
	foreach($folders as $folder)
	{
		// get the file name
		$fname = $folder . "/" . $className . '.php';
		
		// check if the file exists in this folder
		if (file_exists($fname))
		{
			// include the class
			include $fname;
      return;
		}
	}
});