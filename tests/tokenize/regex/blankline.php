<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test. en het is gaaf\n\n\nen dit is een nieuwe regel";
$tokens   = (new \Idioma\Tokenize\Regex\BlanklineTokenizer())->tokenize($document);

var_dump($tokens);