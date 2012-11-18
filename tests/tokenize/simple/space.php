<?php

require_once __DIR__ . '/../../autoloader.php';

$document = "Dit is een test. En het is gaaf.";
$tokens   = (new \Idioma\Tokenize\Simple\SpaceTokenizer())->tokenize($document);

var_dump($tokens);