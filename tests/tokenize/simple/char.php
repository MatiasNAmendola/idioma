<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test. en het is gaaf.";
$tokens   = (new \Idioma\Tokenize\Simple\CharTokenizer())->tokenize($document);

var_dump($tokens);