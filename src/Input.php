<?php

namespace App;

class Input{

    public static function isValid(array $values, $count){
        if ($count != 4){
            return false;
        }
        if (
            !is_numeric($values[1]) ||
            strpos($values[1], '.') ||
            $values[1] < MIN_RECORD ||
            $values[1] > MAX_RECORD ||
            strpos($values[1], '.') ||
            !in_array($values[2], LOCALES, true) ||
            !is_numeric($values[3]) ||
            $values[3] < MIN_ERROR ||
            $values[3] > MAX_ERROR
        ){
            return false;
        }
        return true;
    }
}
