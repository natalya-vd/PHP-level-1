<?php
function sum($x, $y) 
{
  return $x + $y;
};

function subtraction($x, $y) 
{
  return $x - $y;
};

function multiplication($x, $y)
{
  return $x * $y;
};

function division($x, $y) 
{
  return $y === 0 ? 'errorOperation' : $x / $y;
}

function mathOperation($arg1, $arg2, $operation) 
{
  return $operation($arg1, $arg2);
}

function initCalculator()
{
  return [
    'arg1' => 0,
    'arg2' => 0,
    'result' => 0
  ];
}

function calculator($arg1, $arg2, $operation)
{
  $result = mathOperation($arg1, $arg2, $operation);

  return [
    'arg1' => $arg1,
    'arg2' => $arg2,
    'result' => $result === 'errorOperation' ? 0 : $result,
    'errorOperation' => $result === 'errorOperation' ? 'На ноль делить нельзя' : ''
  ];

  header("Location: /calculator");
  die();
}

function getArrayDate($string)
{
  $result = explode($string['operation'], $string['input']);
  $result[] = $string['operation'];

  return $result;
}

function calculatorPostRequest($dataCalculation)
{
  $operations = [
    '+' => 'sum',
    '-' => 'subtraction',
    '*' => 'multiplication',
    '/' => 'division'
  ];

  if(isset($dataCalculation['input'])) {
    $arrayresolve = getArrayDate($dataCalculation);
    $result = mathOperation((int)$arrayresolve[0], (int)$arrayresolve[1], $operations[$arrayresolve[2]]);
    
    return [
      'originalData' => $result === 'errorOperation' ? '' : $dataCalculation['input'],
      'result' => $result === 'errorOperation' ? '' : $result,
      'errorOperation' => $result === 'errorOperation' ? 'На ноль делить нельзя' : ''
    ];
  }
}

function getDataPostRequest()
{
  $request = json_decode(file_get_contents('php://input'));

  $data = [];
  foreach($request as $value) {
    $data[$value->name] = $value->value;
  }

  header("Content-type: application/json");
  return $data;
}