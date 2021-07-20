<?php
require '../vendor/autoload.php';

use asv2108\String\MathStringChecker;

$checker = new MathStringChecker();
var_dump($checker('((44+6)/(2*6))'));
var_dump($checker('test'));
var_dump($checker('1+1/5'));
