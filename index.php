<?php
//Get the Magic value that is calculated created a sha1 for each letter 
//and get the ascii value added for each letters
function getMagicValue($words){
		for ($i = 0; $i < strlen($words); $i++){
				$sha = str_split(sha1($words[$i]));
				        $value=0;
									foreach ($sha as $l)
												$value += ord($l);
										}
			
			return $value; 
}

$first  = 'abc';
$second = 'aad';
//note that using 'abc' and 'aad' using only ord wouldn't work (with sha1 yes)

$start = microtime();
$result = (strlen($first)=== strlen($second) 
					&& getMagicValue($first) === getMagicValue($second)) 
				? 'It is ' 
							: 'It is NOT ';
							$time = microtime() - $start;

							echo "$result an anagram!! ({$time} microseconds)";

							?>
