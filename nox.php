#!/usr/bin/php
<?php
require_once 'main.php';
require_once 'errors.php';
require_once 'functions.php';
require_once 'algo.php';

function main($args)
{
	$time_start = microtime(true);
	if ($args[1] == "--alfred") {
		echo "Alfred is sick today, he didn't come to work.\n";
	} elseif ($args[1] == "help") {
		help();
	} else {
		$reponse = check_args($args);
		if ($reponse["continue"] && check_file($reponse['params'][0]) && check_file($reponse['params'][1]))
		{
			if ($reponse["opt"][0] == "-r")
					my_shuffle_file($reponse["params"]);
				elseif ($reponse["opt"][1]) 
					my_main($reponse["params"], $reponse['opt'][1]);
				else
					my_main($reponse["params"]);
		}
		echo ("Done in : " . (microtime(true) - $time_start) . " seconds. \nGood luck Mr. No-X!\n");
	}
}
main($argv);
?>