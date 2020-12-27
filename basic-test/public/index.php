<?php

require_once __DIR__.'/src/Calculator.php';
require_once __DIR__.'/src/Tokens.php';

$calculator = Calculator::create(); // use default tokenizer
// echo $calculator->calculate('4PLUS42MULT35DIV47'); // 2.5


$arr = array(
    'PLUS' => Tokens::PLUS,
    'MINUS' => Tokens::MINUS,
    'MULT' => Tokens::MULT, 'DIV' => Tokens::DIV, 'POW' => Tokens::POW, 'MOD' => Tokens::MOD
);

$file_name = "input.txt";
$handle = @fopen($file_name, "r");
$expression = null;
if ($handle) 
{
    $file_data = explode("\n", fread($handle, filesize($file_name)));
    $last_key = array_key_last($file_data);
    $last_data = $file_data[$last_key];
    $last_key_data = explode(' ', $last_data);
    if (strtolower($last_key_data[0]) === 'apply') 
    {
        $expression = $last_key_data[1];
    }
    
    unset($file_data[$last_key]);

    foreach ($file_data as $key => $value) 
    {
        $data = explode(' ', $value);
        if (array_key_exists(strtoupper($data[0]), $arr))
        {
            $expression .= ($arr[strtoupper($data[0])] . $data[1]);
            $expression = $calculator->calculate($expression);
        }
    }
    
    echo($expression);
    fclose($handle);
}
?> 