<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test. en het is gaaf.\nEn dit is een nieuwe regel.";
$tokens   = (new \Idioma\Tokenize\Regex\WordPunctTokenizer())->tokenize($document);

var_dump($tokens);