<?php

if (!function_exists('repeatStr')) {

    /**
     * Repeat a string with given times
     *
     * @param string $keyword
     * @param int $times
     * @return mixed
     */
    function repeatStr(string $keyword, int $times = 1)
    {
        $result = "";
        for ($i = 1; $i <= $times; $i++) {
            $result .= $keyword;
        }

        return $result;
    }
}
