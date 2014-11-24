<?php
$firstWord       = 'jkgh';
$secondWord      = 'ciaoz';
$indexWordRepeat = 100000;

$anagram = new Anagram($firstWord, $secondWord, $indexWordRepeat);
//START Benchmarking
$startTime  = microtime(true);
$startMemory  = memory_get_usage();

$first  = $anagram->createRandomWord($firstWord);
$second = $anagram->createRandomWord($secondWord);


$result = (
	strlen($first) === strlen($second)
	&& $anagram->getMagicValue($first) === $anagram->getMagicValue($second)
)
	? 'It is '
	: 'It is NOT ';

//END Benchmarking
$endTime = microtime(true) - $startTime;
$endMemory  = memory_get_usage() - $startMemory;
echo "$result an anagram!! \nBenchmark: {$endTime} microseconds - {$endMemory} bytes\n";



class Anagram
{
	public $_indexWordRepeat;

	public $_firstWord;
	public $_secondWord;

	public function __construct($firstWord, $secondWord, $indexWordRepeat) {
		$this->_firstWord       = $firstWord;
		$this->_secondWord      = $secondWord;
		$this->_indexWordRepeat = $indexWordRepeat;



	}

	public function createRandomWord($word) {
		$str = null;
		foreach (str_split($word) as $value) {
			for ($i = 1; $i <= $this->_indexWordRepeat; $i++) {
				$str .= $value;
			}
		}

		return str_shuffle($str);
	}

//Get the Magic value that is calculated created a sha1 for each letter
//and get the ascii value added for each letters
	public function getMagicValue($word) {
		$value = 0;
		for ($i = 0; $i < strlen($word); $i++) {
			$singleValue = ord($word[$i]);
			$value += pow($singleValue, 2);
		}

		return $value;
	}
}
?>
