<?php

class Check
{

    public $word;
    private $_level;
    private $_words;
    private $_vsWord;

    public function __construct($level, $words)
    {
        $this->_level  = $level;
        $this->_words  = $words;
        $this->_vsWord = $this->_words[$this->_level];
    }

    public function check($word)
    {
        if (strtolower(trim($word)) == strtolower($this->_vsWord)) {
            return true;
        }
        return false;
    }

    public function endOfGame($level)
    {
        if ($level >= count($this->_words)) {
            return true;
        }
        return false;
    }

}
