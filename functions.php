<?php
function my_open_file($filename)
{
	$handle = fopen($filename, 'r');
	$content = fread($handle, filesize($filename));
	fclose($handle);
	return ($content);
}

function my_shuffle_file($filenames)
{
	foreach ($filenames as $filename) {
		$handle = fopen($filename, 'r');
		$content = fread($handle, filesize($filename));
		fclose($handle);
		$content = msgs_to_word($content);
		shuffle($content);
		$handle = fopen($filename."_shuffled.txt", 'w+');
		$i = 0;
		while ($content[$i]) {
			fwrite($handle, $content[$i++]."\n");
		}
		fclose($handle);
		echo "$filename got shuffled. The shuffled $filename is now ".$filename."_shuffled.txt.\nNice job!.\n";
	}
}

function help()
{
	echo "Welcome Agent No-X.\nThe current options are:\n
	-r \t\tLet me shuffle the content of your files.\n
	./nox.php -r file1 [file2[file3[...]]]\n
	--silent-job \t\tTime will be the only witness.\n
	./nox.php --silent-job dictionnary message\n
	--alfred\t\tGlad to see you again, my fellow Mr. No-X.\n
	Alfred isn't here today. I'm sorry No-X.\n
	./nox.php --alfred\n";
}

function alfred_dic($dic='')
{
	if (!isset($dic['base'])){
		echo "What dictionnary would you use?\n";
		$dic = alfred($dic);
		if (check_file($dic[0])) {
			$dic['base'] = dic_to_word($dic[base]);
			alfred_dic($dic);
		}
		else {
			alfred($dic);
		}
	} elseif (!isset($dic['msg'])) {
		echo "What message would you like to translate?\n";
		$dic = alfred($dic);
		if (check_file($dic[0])) {
			$dic['msg'] = msgs_to_word($dic[0]);
			return (alfred_dic($dic));
		}
		else {
			alfred($dic);
		}
	} else {
		check_print_fi($dic['base'], $dic['msg']);
	}
	return ($dic);
}
function alfred($array='')
{
	print_r($array);
 	if (($file = fopen('php://stdin', 'r')) !== FALSE)
    {
    echo "?> ";
    while (($input = fgets($file)) !== FALSE) {
		$args = msgs_to_word($input);
		if ($args[0] == "exit")
	    	return (false);
	    elseif (!isset($args[0]) && empty($args[0])) {
	    	echo "I didn't quite understand.\n?> ";
	    } else {
	    	return (alfred_dic($args));
		}
	}
	echo "?> ";
	}
echo $content;
}

?>