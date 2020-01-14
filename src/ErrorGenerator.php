<?php

namespace App;

use Faker\Generator;

class ErrorGenerator{

    private static function deleteElement(string $record = ''): string {
        $length = mb_strlen($record);
        if($length != 0){
            $index = rand(0, $length);

            if($index == 0){
                return $record = mb_substr($record, $index+1);
            }
            return $record = mb_substr($record, 0, $index-1).mb_substr($record, $index);
        }
        return $record;
    }

    private static function putElement(string $record = '', string $input): string {
        $length = mb_strlen($record);
        if($length != 0){
            $index = rand(0, $length);
            if($index == 0){
                return $record = $input.$record;
            }
            return $record = mb_substr($record, 0, $index).$input.mb_substr($record, $index);
        }
        return $input;
    }

    private static function changeElement(string $record = ''): string {
        $length = mb_strlen($record);
        if($length != 0){
            $index = rand(0, $length-2);
            return $record = mb_substr($record, 0, $index).mb_substr($record, $index+1, 1).mb_substr($record, $index, 1).mb_substr($record, $index+2);
        }
        return $record;
    }

    private static function generateError($record = '', $input){
        $func = rand(0, 2);
        switch ($func) {
            case 0:
                return self::putElement($record, $input);
                break;
            case 1:
                return self::deleteElement($record);
                break;
            case 2:
                return self::changeElement($record);
                break;
        }
    }

    public static function generateErrors(array $data, $errorIndex, Generator $input): array {
        count($data);
        for ($i = 1; $i <= $errorIndex; $i++) {
            $random  = rand(0, count($data) - 1);
            $data[$random] = self::generateError($data[$random], $input->asciify('*'));
        }
        return $data;
    }

}
