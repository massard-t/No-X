<?php
function dic_to_word($dic)
{
	$res = [];
	$tmp1 = str_word_count($dic, 1, "0123456789.'\",");
	$res = array_flip($tmp1);
	return ($res);
}

function msgs_to_word($msg)
{
	$tmp1 = str_word_count($msg, 1, "0123456789.'\",");
	return ($tmp1);
}

function check_print_fi($dic, $msg)
{
    $size = count($msg);
    $word = '';
    $res = 0;
    for ($i=0; $i<$size; $i++)
    {
      	if ($dic[$msg[$i]])
      	{
      		echo $msg[$i]. "\n";
      		$res++;
    	}
    }
    echo "$res mots trouvés.\n";
    return ($res);
}
?>