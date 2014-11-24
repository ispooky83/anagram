<?php


class Anagram
{
    public $_indexWordRepeat = 0;

    public $_firstWord;
    public $_secondWord;

    public function __construct($firstWord, $secondWord, $indexWordRepeat)
    {
        if (!$indexWordRepeat) {
            $this->_firstWord  = $firstWord;
            $this->_secondWord = $secondWord;
        } else {
            $this->_indexWordRepeat = $indexWordRepeat;
            $this->_firstWord       = $this->createLongText($firstWord);
            $this->_secondWord      = $this->createLongText($secondWord);
        }
    }

    private function createLongText($word)
    {
        $bm = new Benchmark();
        $longText = null;
        for ($i = 1; $i <= $this->_indexWordRepeat; $i++) {
            $longText .= $word;
        }
        $bm->end(__FUNCTION__ . ' ' .$word);

        return $longText;
    }

    //Get the Magic value that is calculated created a sha1 for each letter
    //and get the ascii value added for each letters
    private function getMagicValue($word)
    {
        $value = 0;
        for ($i = 0; $i < strlen($word); $i++) {
            $singleValue = ord($word[$i]);
            $value += pow($singleValue, 2);
        }

        return $value;
    }

    public function isAnagram()
    {
        $bm = new Benchmark();

        if (strlen($this->_firstWord) !== strlen($this->_secondWord)) {
            $bm->end(__FUNCTION__);
            return false;
        }

        if ($this->getMagicValue($this->_firstWord) === $this->getMagicValue($this->_secondWord)) {
            $bm->end(__FUNCTION__);
            return true;
        }
    }
} 