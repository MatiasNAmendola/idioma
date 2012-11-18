<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test.\nen het is gaaf.";
$tokens   = (new \Idioma\Tokenize\Simple\LineTokenizer())->tokenize($document);

var_dump($tokens);