<?php
define("SHOW_LEAD_TIME", true);

define("LOCALES", ['ru_RU', 'be_BY', 'en_US']);
define("MIN_RECORD", 1);
define("MAX_RECORD", 10000000);
define("MIN_ERROR", 0);
define("MAX_ERROR", 10000);

define("SEPARATOR", ";");

define("INPUT_ERROR_TEXT", "Sorry! Bad input params. Try again: 'php application.php [number of records: int ".MIN_RECORD."-".MAX_RECORD."] [locale: ru_RU, be_BY, en_US] [number of errors: int || float ".MIN_ERROR."-".MAX_ERROR."]'" . PHP_EOL);
