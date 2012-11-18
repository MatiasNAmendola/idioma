<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test.\tEn het is gaaf.";
$tokens   = (new \Idioma\Tokenize\Simple\TabTokenizer())->tokenize($document);

var_dump($tokens);