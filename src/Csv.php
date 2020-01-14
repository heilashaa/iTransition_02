<?php

namespace App;

class Csv{

    public static function creatRecord(array $data , $separator): string{

        $record = '';

        foreach ($data as $item){
            if (strpos($item, '"') || strpos($item, ',') || strpos($item, ';')){
                if(strpos($item, '"')){
                    $item = str_replace('"', '""', $item);
                }
                $item = '"' . $item . '"';
            }
            $record = $record . trim(str_replace("\n", ' ', $item)) . $separator;
        }

        $record = trim($record, $separator) . PHP_EOL;

        return $record;

    }
}
