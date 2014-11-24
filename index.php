<?php
require 'Anagram.php';
require 'Benchmark.php';

$bm = new Benchmark();
$firstWord  = 'cio';
$secondWord = 'cio';

$indexWordRepeat = 10000000;
//set as 0 if you don't want to extend the words
//The system is going to analyze the strings of nchar equals to

$anagram = new Anagram($firstWord, $secondWord, $indexWordRepeat);

if ($anagram->isAnagram()){
    print_r("It is an Anagram!\n");
} else {
    print_r("It is NOT Anagram!\n");
}
$bm->end('Total');



?>
