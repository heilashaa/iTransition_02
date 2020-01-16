<?php
$start = microtime(true);
require 'vendor/autoload.php';

try {
    $result = \App\Input::isValid($argv, $argc);
    if (!$result){
        throw new Exception(INPUT_ERROR_TEXT);
    }

    ob_start();

    $faker = \Faker\Factory::create($argv[2]);

    //sheet start
    if($argv[3] < 1 && $argv[3] != 0 ){
        $count = [];
        $temp = explode('.', trim($argv[3]));

        @$power = mb_strlen($temp[1]);

        $res = 10;
        for ($i = 1; $i <= (int)$power-1; $i++){
            $res = $res*10;
        }

        $power = $res.PHP_EOL;
        @$a = $temp[1];
        $countOfErrors = trim($a, 0);

        $start = 0;
        $finish = $argv[1]/(int)$power;
        for($j = 1; $j<= $argv[1]/(int)$power + 1; $j++){

            $count[$j] = rand($start, $finish);
            $start = $start + (int)$power;
            $finish = $finish + (int)$power;
        }
    }
    //sheet finish


    for ($i = 1; $i <= $argv[1]; $i++){

        $data = [
            $faker->name,
            $faker->address,
            $faker->phoneNumber
        ];

        if($argv[3] >= 1 || $argv[3] == 0){
            $data = \App\ErrorGenerator::generateErrors($data, $argv[3], $faker);
        }elseif(in_array($i, $count)){
            $data = \App\ErrorGenerator::generateErrors($data, 1, $faker);
        }
        echo \App\Csv::creatRecord($data, SEPARATOR);
    }

    if(SHOW_LEAD_TIME){
        echo PHP_EOL . '------------------------------------------------------------------------';

        echo PHP_EOL . 'The script was executed in ' . round(microtime(true) - $start, 2) . ' sec. ';
    }

    echo ob_get_clean();

    }catch (Exception $exception){
        exit($exception->getMessage());
    }

if(SHOW_LEAD_TIME){
    echo PHP_EOL . '------------------------------------------------------------------------';
    echo PHP_EOL . 'The script was executed in ' . round(microtime(true) - $start, 2) . ' sec.(with output to the console)';
    echo PHP_EOL . '------------------------------------------------------------------------' . PHP_EOL;
}
