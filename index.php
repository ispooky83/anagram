<?php

function createRandomWord(array $describeWord, $nTime) {
	$str = null;
	foreach ($describeWord as $value) {
		for ($i = 1; $i <= $nTime; $i++) {
			$str .= $value;
		}
	}

	return str_shuffle($str);
}

//Get the Magic value that is calculated created a sha1 for each letter
//and get the ascii value added for each letters
function getMagicValue($word, $method = null) {
	$value = 0;
	for ($i = 0; $i < strlen($word); $i++) {
		switch ($method) {
			case 'md5':
				$ascii = str_split(md5($word[$i]));
				foreach ($ascii as $l) {
					$value += ord($l);
				}

				break;

			case 'sha1':
				$ascii = str_split(sha1($word[$i]));
				foreach ($ascii as $l) {
					$value += ord($l);
				}
				break;

			default:
				$value += ord($word[$i]);
				break;
		}
	}

	return $value;
}


//note that using 'abc' and 'aad' using only ord wouldn't work (with sha1 yes)
$first  = createRandomWord(array('a', 'b', 'c', 'd', 'e',), 100000);
$second = createRandomWord(array('a', 'b', 'c', 'd', 'e',), 100000);

$start  = microtime(true);
$result = (strlen($first) === strlen($second)
	&& getMagicValue($first, 'md5') === getMagicValue($second, 'md5'))
	? 'It is '
	: 'It is NOT ';

$time = microtime(true) - $start;

echo "$result an anagram!! ({$time} microseconds)";

?>
