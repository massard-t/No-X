<?php
function my_main($element, $opt=NULL)
{
	$content = my_open_file($element[1]);
	$msg = my_open_file($element[0]);
	$content = dic_to_word($content);
	$msg = msgs_to_word($msg);
	if ($opt['custom']){
		$check = "check_print_";
		$res = $check.$opt['custom'];
	}
	$res = check_print_fi($content, $msg);
	return ($first);
}
?>