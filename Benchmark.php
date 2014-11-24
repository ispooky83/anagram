<?php

class Benchmark
{

    private $_startTime = null;
    private $_startMemory = null;

    public function __construct()
    {
        $this->_startTime   = microtime(true);
        $this->_startMemory = memory_get_usage();
    }

    public function end($action)
    {
        $endTime   = microtime(true) - $this->_startTime;
        $endMemory = memory_get_usage() - $this->_startMemory;
        print_r("Benchmark [{$action}]: {$endTime} seconds - {$endMemory} Bytes\n");
    }

} 