<?php

require_once __DIR__ . '/../autoloader.php';

$document = 'is is een a is';
$tokens = (new \Idioma\Tokenize\Regex\WhitespaceTokenizer())->tokenize($document);
$freqdist = (new \Idioma\Probability\FreqDist($tokens))->b('is');

var_dump($freqdist);