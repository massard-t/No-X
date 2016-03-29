<?php
function 	check_args($args)
{
	$results = array("continue" => 0,
					 "params" => array(),
					 "opt" => array());
	if	(count($args) === 3)
	{
		$results["continue"] = 1;
		array_push($results["params"], $args[1]);
		array_push($results["params"], $args[2]);
	}
	elseif (count($args) === 4 && ($args[1] === "-a" || $args[1] === "-r"))
	{
		$results["continue"] = 1;
		array_push($results["params"], $args[2]);
		array_push($results["params"], $args[3]);
		array_push($results["opt"], $args[1]);
	}
	elseif ( count($args) === 5 && $args[1] === "-l" && preg_match("/\d+/", $args[2]))
	{
		$results["continue"] = 1;
		array_push($results["params"], $args[3]);
		array_push($results["params"], $args[4]);
		array_push($results["opt"], $args[1]);
		array_push($results["opt"], $args[2]);
	}
	else
		print_help();
	return($results);
}


function 	print_help()
{
	echo(
		"/!\\----WRONG USAGE OF \"nox.php\"----/!\\\n\n" .
		"usage :" .
		"	 php nox.php [-a | -r] message_file dictionary_file\n" .
		"	 php nox.php -ls nb_of_words message_file dictionary_file\n" .
		"\n/!\\--------------------------------/!\\\n"

	);
}

function check_file($filename)
{
	if (file_exists($filename)) {
		if (!is_dir($filename)) {
			if (is_readable($filename)) {
				return (true);
				
			} else {
			echo "$filename cannot be read.\n";
			return (false);
			}
		} else {
		echo "$filename is a directory.\n";
		return (false);
		}
	} else {
		echo "$filename doesn't exist.\n";
		return (false);
	}
}

?>